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
          <h4 class="m-0"><strong>商品住宅一覧</strong></h4>
        </div>
        <div class="col-sm-3">
            <a href="url(/admin/blogs/create)">
                <Button class="btn btn-primary">新規追加</Button>
            </a>
        </div><!-- /.col -->
        <div class="col-sm-7">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">商品住宅一覧</li>
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
                <div class="p-0.2">検索</div>
            </div>
            <div class="card-body">
                <form id="search_form" action="javascript:void(0)">
                    <div class="form-group row">
                        <label for="search_word" class="col-sm-2 col-form-label">フリーワード</label>
                        <input type="text" class="col-sm-4 form-control ml-1" name="search_word" id="search_word">
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
                        <button class="btn btn-block btn-primary px-5 pl-2 pr-4"  type="submit">
                            検索
                            <i class="fa fa-search ml-2 mr-3 "></i>
                        </button>
                        </div>
                    </div>
                  </form>
            </div>
        </div>
        <div class="card" id="table_card">
            @include('admin.housing.pagination_data');
        </div>
    </div>
  </div>
</div>
</div>
<script>
    function fetch_data(page,search_word,public_status)
        {
            $.ajax({
                url:"/admin/housing/search?page="+page+"&search_word="+search_word+"&public_status="+public_status,
                method:"GET",
                success:function(data){
                    $('#table_card').html(data);
                },
                error:function(err){
                    console.log(err);
                }
            })
        }
    $(document).ready(function() {
        let page = 1;
        let search_word,public_status;
       
        $('#search_form').on('submit',function(){
            let formData = new FormData(this);
            search_word = formData.get('search_word');
            public_status = formData.get('public_status');
            page = 1;
            fetch_data(page,search_word,public_status);
        })
        let delete_id;
        let count = <?php echo json_encode($row_count)?>;
        $('.deleteHousing').click(function(e){
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
                url: "/admin/housing"+'/'+delete_id,
                success: function (data) {
                    $('.deleteHousing').each(function(){
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
        $('.viewHousing').click(function(e){
            var id = $(this).data("id");
            $.ajax({
                type: "GET",
                url: "/housing"+'/'+id,
            });
        })
        $('.editHousing').click(function(e){
            var id = $(this).data("id");
            $.ajax({
                type: "GET",
                url: "/admin/housing/edit/"+id,
            });
        })
        $('.form-check-input').click(function(){
            $('.form-check-input').not(this).prop('checked',false);
        });
        $(document).on('click', '.pagination a', function(event){
            event.preventDefault(); 
            var test=$(this).attr('href');
            var page = $(this).attr('href').split('page=')[1];
            fetch_data(page,search_word,public_status);
        });
    });
</script>

@endsection


