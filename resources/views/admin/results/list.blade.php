@extends('admin.layouts.master')

@section('content')

<style>

  #upload-image {
    opacity: 0;
    position: absolute;
    z-index: -1;
    display: none;
  }

  #preview {
    cursor: pointer;
    width: 100%;
    height: 150px;
    background-color: rgb(156, 150, 150);
    color: #333;
    display: inline-flex;
    justify-content: center;
    align-items: center;
  }

  #preview img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

</style>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="mb-2 row">
        <div class="col-sm-2">
          <h4 class="m-0"><strong>施工実績一覧</strong></h4>
        </div>
        <div class="col-sm-3">
            <a href="http://localhost:8000/admin/blogs/create">
                <Button class="btn btn-primary">新規追加</Button>
            </a>
        </div><!-- /.col -->
        <div class="col-sm-7">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">施工実績一覧</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
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
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="p-0.2"><strong>検索<strong></div>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label for="search_word" class="col-sm-2 col-form-label">フリーワード</label>
                    <input type="text" class="col-sm-4 form-control ml-1" name="search_word" id="search_word">
                </div>
                <div class="form-group row">
                    <label for="author_name" class="col-sm-2 col-form-label">著者名</label>
                    <input type="text" class="col-sm-4 form-control ml-1" name="author_name" id="author_name">
                </div>
                <div class="form-group row">
                    <label for="areas_check" class="col-sm-2 col-form-label">地域</label>
                    @foreach ($areas as $area)
                    <div class="form-check form-check-inline  ml-1" name="areas_check">
                        <input class="area_check" type="checkbox" id="{{$area->id}}" name="area"  value="{{$area->id}}">
                        <label class="form-check-label">{{$area->name}}</label>
                    </div>
                    @endforeach
                </div>
                <div class="form-group row">
                    <label for="amounts_check" class="col-sm-2 col-form-label">金額</label>
                    @foreach ($amounts as $amount)
                    <div class="form-check form-check-inline  ml-1" name="amounts_check">
                        <input class="amount_check" type="checkbox" id="{{$amount->id}}" name="amount"  value="{{$amount->id}}">
                        <label class="form-check-label">{{$amount->type}}</label>
                    </div>
                    @endforeach
                </div>
                <div class="form-group row">
                    <label for="housetypes_check" class="col-sm-2 col-form-label">間取り</label>
                    @foreach ($housetypes as $housetype)
                    <div class="form-check form-check-inline  ml-1" name="housetypes_check">
                        <input class="housetype_check" type="checkbox" id="{{$housetype->id}}" name="housetype"  value="{{$housetype->id}}">
                        <label class="form-check-label">{{$housetype->type}}</label>
                    </div>
                    @endforeach
                </div>
                <div class="form-group row">
                    <label for="check_type" class="col-sm-2 col-form-label">公開状態</label>
                    <div class="form-check form-check-inline  ml-1" name="check_type">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="public_status"  value="1">
                        <label class="form-check-label" for="inlineCheckbox1">公開</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="public_status" value="0">
                    <label class="form-check-label" for="inlineCheckbox2">非公開</label>
                    </div>
                </div>
                <div class="form-group row ">
                    <div class=" mx-auto">
                    <button class="btn btn-block btn-primary px-5 pl-2 pr-4" id="searchButton">
                        検索
                        <i class="fa fa-search ml-2 mr-3 "></i>
                    </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h6 class="card-title">お知らせ一覧</h6>

                <div class="card-tools float-right d-inline-flex"><span class="mt-1 mr-2">全<span class="count">{{$count}}</span>件</span>{{$results->links()}}</div>
            </div>
            <div class="card-body">
                @if(count($results)>0)
                    <table class="table table-striped">
                        <thead>
                        <tr class="row">
                            <th class="col-sm-1">ID</th>
                            <th class="col-sm-2">タイトル</th>
                            <th class="col-sm-1">地域</th>
                            <th class="col-sm-2">金額</th>
                            <th class="col-sm-1">間取り</th>
                            <th class="col-sm-2">公開状態</th>
                            <th class="col-sm-3 float-right">カテゴリ</th>
                        </tr>
                        </thead>
                        <tbody id="resultrows">
                            @foreach ($results as $result)
                                <tr class="row" id="{{$result->id}}">
                                    <td class="col-sm-1">{{$result->id}}</td>
                                    <td class="col-sm-2">{{$result->title}}</td>
                                    <td class="col-sm-1">{{$result->name}}</td>
                                    <td class="col-sm-2">{{$result->type}}</td>
                                    <td class="col-sm-1">{{$result->type}}</td>
                                    <td class="col-sm-2">
                                        @if($result->public_status=='0')
                                            非公開
                                        @else
                                            公開
                                        @endif
                                    </td>
                                    <td class="col-sm-3">
                                        <div class="float-sm-right">
                                            <a href="/case-study/{{$result->id}}" class="mr-2">
                                                <button class="btn btn-primary btn-sm viewResult" data-id="{{$result->id}}"  type="button">
                                                    <i class="fa fa-external-link-alt"></i>
                                                    表示
                                                </button>
                                            </a>
                                            <a href="url(s.area.edit)" class="mr-2">
                                                <button class="btn btn-info btn-sm editResult" type="button" data-id="{{$result->id}}">
                                                    <i class="fa fa-pencil-alt ml-1 mr-1"></i>
                                                    編集
                                                </button>
                                            </a>
                                            <button  class="btn btn-danger btn-sm deleteResult" id="deleteresult" data-id="{{$result->id}}">
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
                        <th class="col-sm-1">ID</th>
                        <th class="col-sm-2">タイトル</th>
                        <th class="col-sm-1">地域</th>
                        <th class="col-sm-2">金額</th>
                        <th class="col-sm-1">間取り</th>
                        <th class="col-sm-2">公開状態</th>
                        <th class="col-sm-3 float-right">カテゴリ</th>
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
                <div class="card-tools float-right d-inline-flex"><span class="m-2">全<span class="count">{{$count}}</span>件</span>{{$results->links()}}</div>
            </div>
        </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
      
        let delete_id;
        let count = <?php echo json_encode($count)?>;
        $('.deleteResult').click(function(e){
            delete_id = $(this).data("id");
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
                url: "/admin/results"+'/'+delete_id,
                success: function (data) {
                    $('.deleteResult').each(function(){
                        var id = $(this).data("id");
                        if(id===delete_id){
                            $(this).parents("tr").remove();
                        }
                    })
                    $('#deleteModal').modal("hide");
                    count--;
                    $('.count').html(count);
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            })
        });
        $('.viewBlog').click(function(e){
            var id = $(this).data("id");
            $.ajax({
                type: "GET",
                url: "/news"+'/'+id,
            });
        })
        $('.editBlog').click(function(e){
            var id = $(this).data("id");
            $.ajax({
                type: "GET",
                url: "/admin/results/"+id+"/edit",
            });
        })
        var index =0;
        $('#searchButton').click(function(e){
            console.log('sdlfsdf');
            let search_word = $('#search_word').val();
            let author_name = $('#author_name').val();
            var category_array = [];
            $('.category_check:checked').each(function () {
                category_array[index++] = $(this).val();
            });  
            let public_status = ''
            $('.form-check-input:checked').each(function(){
                public_status = $(this).val();
            }); 
            recommended_flag = '';
            $('.recommended_flag:checked').each(function(){
                recommended_flag = $(this).val();
            });
            console.log(recommended_flag);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "/admin/blogs/search",
                data:{
                    search_word:search_word,
                    author_name:author_name,
                    category_array:category_array,
                    public_status:public_status,
                    recommended_flag:recommended_flag
                },
                success: function (data) {
                    console.log(data)
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            })
        })
        $('.form-check-input').click(function(){
            $('.form-check-input').not(this).prop('checked',false);
        })
    });
</script>

@endsection


