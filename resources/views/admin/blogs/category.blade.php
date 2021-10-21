@extends('admin.layouts.master')

@section('content')
<div class="content">
    <div id="deleteModal" class="modal fade" role='dialog'>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <p>Do You Really Want to Delete This ?</p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <span id= 'deleteButton'></span>
                </div>

            </div>
        </div>
    </div>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="mb-2 row">
                    <div class="col-sm-6">
                        <h4 class="m-0"><strong>カテゴリ</strong></h4>
                    </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">お知らせ新規追加</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <div class="mt-4 mb-2" id="url_string" style="display: none">
                <span class="font-weight-bold mr-2 h6">リンク:
                    <span id="created_url"></span>
                </span>
                <a id="link_url" class="btn btn-sm btn-default">表示</a>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- alert-->
    <!-- Main content -->
    <div class="container-fluid">
        <div class="alert alert-dismissible" id="alert" style="background-color: white;display:none; border-left-color: #00a32a;">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Create Success!</strong>
        </div>
        <div class="card">
            <div class="card-header">
                <div class="form-group row">
                    <input type="text" class="col-sm-3 form-control ml-1" name="category_name_input" id="category_name_input">
                    <button id="categoryAdd" class="btn btn-sm">新規作成</button>
                </div>
            <div class="card-body col-8">
                @if(count($categories)>0)
                    <table class="table table-striped">
                        <thead>
                            <tr class="row">
                                <th class="col-sm-2">ID</th>
                                <th class="col-sm-4">カテゴリ</th>
                                <th class="col-sm-6 float-right"></th>
                            </tr>
                        </thead>
                        <tbody id="category_table">
                            @foreach ($categories as $category)
                                <tr class="row" id="{{$category->id}}">
                                    <td class="col-sm-2">{{$category->id}}</td>
                                    <td class="col-sm-4" id="td{{$category->id}}">{{$category->name}}</td>
                                    <td class="col-sm-6">
                                        <div class="float-sm-right">
                                            <button class="btn btn-info btn-sm editCategory" type="button" data-id="{{$category->id}}">
                                                <i class="fa fa-pencil-alt ml-1 mr-1"></i>
                                                編集
                                            </button>
                                            <button  class="btn btn-danger btn-sm deleteCategory" id="deleteCategory" data-id="{{$category->id}}">
                                                <i class="fa fa-trash ml-1 mr-1"></i>削除
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                <table class="table table-striped">
                    <thead>
                    <tr class="row">
                        <th class="col-sm-2">ID</th>
                        <th class="col-sm-4">カテゴリ</th>
                        <th class="col-sm-4 float-right"></th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <div style="height: 200px; width:inherit;display: flex;justify-content: center;align-items: center;">
                    <div>Data not exist.</div>
                </div>
                @endif
            </div>
            <div class="card-footer">
                <div class="card-tools float-right d-inline-flex"></div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>
  <!-- /.content -->
</div>
<script>
 $(document).ready(function() {
    let delete_id;
    let update_flag = false;
    let current_category;
    $('#categoryAdd').click(function(){
        let new_category_name = $('#category_name_input').val();
        if(new_category_name!==''){
            if(update_flag){
                $.ajax({
                    headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type:'POST',
                    url:'/admin/blogs/category/update/'+current_category.id,
                    data:{
                        new_category_name : new_category_name
                    },
                    success:function(data){
                        console.log(data);
                        if(data.success){
                            $('#alert').css('display','block');
                            $('#'+current_category.id).html('<td class="col-sm-2">'+
                                current_category.id+'</td><td class="col-sm-4">'+data.name+
                                '</td><td class="col-sm-6">'+'<div class="float-sm-right">'+
                                '<button class="btn btn-info btn-sm editCategory" type="button" data-id="'+
                                current_category.id+'"'+'>'+'<i class="fa fa-pencil-alt ml-1 mr-1"></i>編集</button>'+
                                '<button  class="btn btn-danger btn-sm deleteCategory" id="deleteCategory" data-id="'+
                                current_category.id+'"'+'>'+'<i class="fa fa-trash ml-1 mr-1"></i>削除</button>'+
                                '</div></td>'
                            );
                            $('#category_name_input').val('');
                            update_flag = false;
                            $('#categoryAdd').html('新規作成');
                        }
                    }
                })
            }
            else{
                $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:'post',
                url:'/admin/blogs/category/add',
                data:{
                    new_category_name : new_category_name
                },
                success: function (data) {
                    if(data.success){
                        $('#alert').css('display','block');
                    }
                    let category = data.category;
                    $('#category_table').append('<tr class="row" id="'+category.id+
                        '">'+'<td class="col-sm-2">'+category.id+'</td><td class="col-sm-4">'+
                        data.name+'</td><td class="col-sm-6">'+'<div class="float-sm-right">'+
                        '<button class="btn btn-info btn-sm editCategory" type="button" data-id="'+
                        category.id+'"'+'>'+'<i class="fa fa-pencil-alt ml-1 mr-1"></i>編集</button>'+
                        '<button  class="btn btn-danger btn-sm deleteCategory" id="deleteCategory" data-id="'+
                        category.id+'"'+'>'+'<i class="fa fa-trash ml-1 mr-1"></i>削除</button>'+
                        '</div></td>'+'</td></tr>');
                    $('#category_name_input').val('');
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            })
            }
            
        }
    });
    $('.deleteCategory').click(function(e){
        delete_id = $(this).data("id");
        console.log(delete_id);
        $('#deleteModal').modal();
        $('#deleteButton').html('<a class="btn btn-danger">Delete</a>');
    });
    $('#deleteButton').click(function(e){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "DELETE",
            url: "/admin/blogs/category/delete"+'/'+delete_id,
            success: function (data) {
                $('.deleteCategory').each(function(){
                    var id = $(this).data("id");
                    if(id===delete_id){
                        $(this).parents("tr").remove();
                    }
                })
                $('#deleteModal').modal("hide");
            },
            error: function (data) {
                console.log('Error:', data);
            }
        })
    });
    $('.editCategory').click(function(e){
        edit_id = $(this).data("id");
        const categories = <?php echo json_encode($categories)?>;
        current_category = categories.find(category=>{
            return category.id === edit_id;
        })
        $('#category_name_input').val(current_category.name);
        update_flag = true;
        $('#categoryAdd').html('更新');
    });
});
</script>

@endsection


