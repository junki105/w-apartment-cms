@extends('admin.layouts.master')

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="mb-2 row">
        <div class="col-sm-6 align-self-center">
          <h4 class="m-0"><strong>お知らせ新規追加</strong></h4>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
            <li class="breadcrumb-item active">お知らせ新規追加</li>
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
      <form id="postform" action="javascript:void(0)" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-sm-9">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">タイトル</h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <input type="text" name="title" class="form-control form-control-lg" id="title" placeholder="">
              </div>
              <!-- /.card-body -->
            </div>
            <textarea id="summernote" name="content"></textarea>
          </div>
          <div class="col-sm-3">
            <div class="card">
              <div class="card-header">
                <h6 class="card-title"><strong>ステータス</strong></h6>
              </div>
              <div class="card-body">
                <div class="form-group d-flex justify-content-between align-content-end">
                  <label class="mt-1 mb-0 text-sm font-weight-normal">公開状態</label>
                  <select name="state" id="state" class="p-1 form-control col-3 form-control-sm">
                    <option value="1">公開</option>
                    <option value="0">非公開</option>
                  </select>
                </div>
                <div class="mt-4 text-sm">公開日: <span id="created_at"></span></div>
                <div class="mt-2 text-sm">更新日: <span id="updated_at"></span></div>
                <div class="mt-3 d-flex justify-content-end">
                  <button type="submit" name='post_save' id='post_save' class="btn btn-sm btn-primary">公開</button>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h6 class="card-title"><strong>アイキャッチ画像</strong></h6>
              </div>
              <div class="card-body">
                <label for="upload-image" id="preview">アイキャッチ画像を設定</label>
                <input type="file" name ="upload-image" id="upload-image">
              </div>
            </div>
          </div>
        </div>
      </form>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<script>
  $(document).ready(function() {
    let current_id;
    let update_flag = false;

    $('#summernote').summernote({
      height: 450,
    });
        
    var current_date = new Date();
    var current_year = String(current_date.getFullYear());
    var current_month = current_date.getMonth() + 1;
    
    current_month<10?current_month = '0' + String(current_month) : current_month = String(current_month);

    var current_day = current_date.getDate();

    current_day<10?current_day = '0' + String(current_day) : current_day = String(current_day);

    let created_at = current_year + '/' + current_month + '/' + current_day;
    
    $('#created_at').html(created_at);
    $('#updated_at').html(created_at);
    
    function imagePreview(fileInput) {
      if (fileInput.files && fileInput.files[0]) {
        var fileReader = new FileReader();
        
        fileReader.onload = function (event) {
            $('#preview').html('<img src="'+event.target.result+'"/>');
        };

        fileReader.readAsDataURL(fileInput.files[0]);
      }
    }
    
    $("#upload-image").change(function () {
      imagePreview(this);
    });
    
    $('#title').change(function(event) {
      title = event.target.value;
    })
    
    $('#postform').on('submit',function(e) {
      let validation = true;
      $('#alert').css('display','none');
      
      if($('#title').val()==='') {
        $('#title').css('border-color','red');
        validation = false;
      }
      else {
        $('#title').css('border-color','');
      }
      
      if($('#summernote').summernote('code')==='<p><br></p>') {
        $('.note-editor').css('border-color','red');
        validation = false;
      }
      else {
        $('.note-editor').css('border-color','');
      }
      
      if(validation) {
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        
        e.preventDefault();

        var formData = new FormData(this);
        
        $.ajax({
          type: 'post',
          url: '/admin/news',
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          success: function (data) {
            if(data.success) {
                window.location.href = data.url+"/edit";
            }
          },
          error: function (data) {
            console.log('Error:', data);
          }
        });
      }
      else {
        $('#notify_string').html('入力内容でエラーがあります。');
        $('#alert').css({'display':'block','border-left-color':'red','color':'red'});
      }
    });
  });
</script>

@endsection


