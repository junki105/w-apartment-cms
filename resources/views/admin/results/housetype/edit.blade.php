@extends('admin.layouts.master')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="alert alert-dismissible" id="alert" style="background-color: white;display:none; border-left-color: #00a32a;">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong id="notify_string"></strong>
    </div>
  <div class="content-header">
    <div class="container-fluid">
      <div class="mb-2 row">
        <div class="col-sm-6">
          <h4 class="m-0"><strong>間取り編集</strong></h4>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active"><a href='admin/results/housetype'>間取り/</li>
            <li class="breadcrumb-item">間取り編集</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
      <div class="mt-4 mb-2" id="url_string" style="display: none">
        <span class="font-weight-bold mr-2 h6">リンク:
            <span id="created_url">
            </span>
        </span>
        <a id="link_url" class="btn btn-sm btn-default">表示</a>
      </div>
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="col-sm-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title"><strong>間取り編集</strong></h5>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class=" row">
                        <label for="housetype" class="col-sm-3 col-form-label">間取り</label>
                        <input type="text" class="col-sm-7 form-control ml-1" name="housetype" value="{{$housetype->type}}" id="housetype">
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
              <div class="card-header">
                <h6 class="card-title"><strong>ステータス</strong></h6>
              </div>
              <div class="card-body">
                <div class=" d-flexs">
                    <label style="color:red">削除する</label>
                    <button  name='save' id='save' class="btn btn-sm btn-primary float-sm-right">更新</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      <!-- /.row -->
    </div><!--/.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<script>
  $(document).ready(function() {
    $('#save').click(function(e){
        let type = $('#housetype').val();
        console.log(type);
        const current_housetype =<?php echo json_encode($housetype);?>;
        let formdata = new FormData();
        formdata.append('type',type);
        $('#alert').css('display','none');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'X-HTTP-Method-Override': 'PATCH'
            },
            type:"POST",
            url: '/admin/results/housetype/'+current_housetype.id,
            data: formdata,
            cache:false,
            contentType:false,
            processData:false,
            success: function (data) {
                $('#notify_string').html('更新しました。');
                $('#alert').css('display','block');
            },
            error: function (data) {
                $('#notify_string').html('Update Failed');
                $('#alert').css('display','block');
            }
        });
    });
});
</script>
@endsection
