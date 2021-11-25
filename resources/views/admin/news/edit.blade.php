@extends('admin.layouts.master')

@section('content')

<style>



</style>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="mb-2 row">
        <div class="col-sm-2 align-self-center">
          <h4 class="m-0">お知らせ編集</h4>
        </div><!-- /.col -->
        <div class="col-sm-4">
          <a href="/admin/news/create" class="btn btn-primary" id = "new_house_btn">
            新規追加
          </a>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
            <li class="breadcrumb-item active">お知らせ編集</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
      <div class="mt-4 mb-2" id="url_string">
        <span class="mr-2 font-weight-bold h6">リンク:
            <span id="created_url">{{url("/news/")."/".$post->id}}</span>
        </span>
        <a href='{{url("/news/")."/".$post->id}}'id="link_url" class="btn btn-sm btn-default" target="_blank">表示</a>
      </div>
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="alert alert-dismissible" id="alert" style="background-color: white;display:none; border-left-color: #00a32a;">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>更新しました。</strong>
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
                <input type="text" name="title" value="{{$post->title}}" class="form-control form-control-lg" id="title" placeholder="">
              </div>
              <!-- /.card-body -->
            </div>
            <textarea id="summernote" name="content" ></textarea>
          </div>
          <div class="col-sm-3">
            <div class="card">
              <div class="card-header">
                <h6 class="card-title">ステータス</h6>
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
                  <button type="submit" name='post_save' id='post_save' class="btn btn-sm btn-primary">更新</button>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h6 class="card-title">アイキャッチ画像</h6>
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
    $('#summernote').summernote({
      height: 450,
    });
    var post = <?php echo json_encode($post);?>;
    var url = '<?php echo $url;?>';
    $('#summernote').summernote('pasteHTML', post.content);
    $('#preview').html('<img src="'+post.image_url+'"/>');
    $('#state').val(post.state);
    var created_at = post.created_at.substr(0,10);
    var updated_at = post.updated_at.substr(0,10);
    $('#created_at').html(created_at);
    $('#updated_at').html(updated_at);
    $('#state').val(post.state);
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
    let validation = true;
    $('#postform').on('submit',function(e) {
      if($('#title').val()==='') {
        $('#title').css('border-color','red');
        validation = false;
      }
      else {
        $('#title').css('border-color','');
        validatioin = true;
      }
      if($('#summernote').summernote('code')==='<p><br></p>') {
        $('.note-editor').css('border-color','red');
        validation=false;
      }
      else {
        $('.note-editor').css('border-color','');
        validation = true
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
            url: '/admin/news/update/'+post.id,
            data: formData,
            cache:false,
            contentType:false,
            processData:false,
            success: function (data) {
                if(data.success) {
                    $('#alert').css('display','block');
                    var current_date = new Date();
                    var current_year = String(current_date.getFullYear());
                    var current_month = current_date.getMonth() + 1;
                    current_month<10?current_month = '0' + String(current_month) : current_month = String(current_month);
                    var current_day = current_date.getDate();
                    current_day<10?current_day = '0' + String(current_day) : current_day = String(current_day);
                    let created_at = current_year + '/' + current_month + '/' + current_day;
                    $('#updated_at').html(created_at);
                }
                },
                error: function (data) {
                    console.log('Error:', data);
                }
        });
      }
       
    })
  });
</script>

@endsection


