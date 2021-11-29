@extends('admin.layouts.master')

@section('content')
@include('admin.layouts.modal_delete')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="mb-2 row">
        <div class="col-sm-6 align-self-center">
          <h4 class="m-0"><strong>金額編集</strong></h4>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active"><a href="{{ url('/admin') }}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{ url('/admin/case-study-amount/create') }}">地域</a></li>
            <li class="breadcrumb-item">金額編集</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="alert alert-dismissible" id="alert" style="background-color: white;display:none; border-left-color: #00a32a;">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong id="notify_string"></strong>
      </div>
      <div class="row">
        <div class="col-sm-8">
          <div class="card">
            <div class="card-header">
              <h5 class="card-title"><strong>金額編集</strong></h5>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <div class="form-group row">
                <label for="amount" class="col-sm-3 col-form-label"><strong>金額</strong></label>
                <input type="text" class="ml-1 col-sm-7 form-control" name="amount" value="{{$amount->type}}" id="amount">
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
              <div>
                <button id="delete_amount" style="background-color:white;color:red;border:none" class="btn btn-sm btn-danger"><strong>削除する</strong></button>
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
    const current_amount =<?php echo json_encode($amount);?>;
    $('#delete_amount').click(function(e) {
        $('#deleteModal').modal();
        $('#deleteButton').html('<a class="btn btn-danger">削除</a>');
    });
    $('#deleteButton').click(function(e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "DELETE",
            url: "/admin/case-study-amount"+'/'+current_amount.id,
            success: function (data) {
                window.location=("/admin/case-study-amount/create")
            },
            error: function (data) {
                console.log('Error:', data);
            }
        })
    });
    $('#save').click(function(e) {
        let type = $('#amount').val();
        console.log(type);
        const current_amount =<?php echo json_encode($amount);?>;
        let formdata = new FormData();
        formdata.append('type',type);
        $('#alert').css('display','none');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'X-HTTP-Method-Override': 'PATCH'
            },
            type:"POST",
            url: '/admin/case-study-amount/'+current_amount.id,
            data: formdata,
            cache: false,
            contentType: false,
            processData: false,
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
