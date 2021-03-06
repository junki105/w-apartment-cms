@extends('admin.layouts.master')

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="mb-2 row">
        <div class="col-sm-4 align-self-center">
          <h4 class="m-0"><strong id = "action_title">商品住宅新規追加</strong></h4>
        </div><!-- /.col -->
        <div class="col-sm-8">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
            <li class="breadcrumb-item active">商品住宅新規追加</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <!-- alert-->
      <div class="hidden alert alert-dismissible alert-green" id="alert">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong id="notify_string"></strong>
      </div>
      <!--end alert-->
      <form id="housingform" action="javascript:void(0)" enctype="multipart/form-data">
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
            <div class="card">
                <div class="card-header">
                  <h5 class="card-title"><strong>商品住宅登録</strong></h5>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">動画（ファーストビュー）</label>
                        <div class="ml-1 custom-file col-sm-7">
                            <input type="file" class="custom-file-input" accept="video/*" id="video_file" name="video_file">
                            <label class="custom-file-label" id="video_file_url" for="video_file">動画をアップロード</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ow_image" class="col-sm-4 col-form-label">画像（圧倒的なデザイン）<br>
                        <small>※3枚までアップロード可能</small></label>
                        <div class="ml-1 dropzone-wrapper col-sm-7" id="dropzon_wrap">
                            <div class="dropzone-desc">
                              <i class="fa fa-cloud-upload-alt"></i>
                              <span id="ow_image_url"style="position: relative;">画像をドラッグ&ドロップまたは</span>
                              <button id="ow_image_upload_button">ファイルを選捉</button>
                            </div>
                            <input type="file" name="ow_images[]" accept="image/*" id="ow_dropzone" class="dropzone" accept="image/*" multiple="multiple">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="book" class="col-sm-4 col-form-label">本文（圧倒的なデザイン）</label>
                        <textarea rows="4" id="book" name="book" class="ml-1 col-sm-7 form-control" ></textarea>
                    </div>
                    <div class="form-group row">
                        <label for="gallery_image_upload" class="col-sm-4 col-form-label">画像(GALLERY)<br>
                            <small>※制限なし</small></label>
                        <div class="ml-1 dropzone-wrapper col-sm-7" id="gallery_dropzone_wrap">
                            <div class="dropzone-desc">
                              <i class="fa fa-cloud-upload-alt"></i>
                              <span id="gallery_image_url">画像をドラッグ&ドロップまたは</span>
                              <button id="gallery_image_upload_button">ファイルを選捉</button>
                            </div>
                            <input type="file" name="gallery_images[]" class="dropzone" accept="image/*" id="gallery_dropzone" multiple>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">動画（Ownerʼs Voice）</label>
                        <div class="ml-1 custom-file col-sm-7">
                            <input type="file" class="custom-file-input" id="voice_file" accept="video/*" name="voice_file">
                            <label class="custom-file-label" id="voice_file_url" for="voice_file">動画をアップロード</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="url_input" class="col-sm-4 col-form-label">URL</label>
                        <input type="text" class="ml-1 col-sm-7 form-control" name="url_input" id="url_input">
                    </div>
                </div>
                <!-- /.card-body -->
              </div>
          </div>
          <div class="col-sm-3">
            <div class="card">
              <div class="card-header">
                <h6 class="card-title">ステータス</h6>
              </div>
              <div class="card-body">
                <div class="form-group d-flex justify-content-between align-content-end">
                  <label class="mt-1 mb-0 text-sm font-weight-normal">公開状態</label>
                  <select name="public_status" id="public_status" class="p-1 form-control col-3 form-control-sm">
                    <option value="1">公開</option>
                    <option value="0">非公開</option>
                  </select>
                </div>
                <div class="mt-4 text-sm">公開日: <span id="created_at"></span></div>
                <div class="mt-2 text-sm">更新日: <span id="updated_at"></span></div>
                <div class="mt-3 d-flex justify-content-end">
                  <button type="submit" name='save' id='save' class="btn btn-sm btn-primary">公開</button>
                </div>
              </div>
            </div>
            <div class="card">
            <div class="card-header">
                <h6 class="card-title">アイキャッチ画像</h6>
            </div>
            <div class="card-body">
                <label for="featured_image" id="preview">アイキャッチ画像を設定</label>
                <input type="file" name ="featured_image" id="featured_image" accept="image/*">
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
    
    function upload_files_list(input) {
      let list_string = '';
      let temp_index = 0;
      
      for(file of input.files) {
        if(temp_index>0) {
          list_string = list_string +','+file.name;
        }
        else {
          list_string = file.name;
        }
        temp_index++;
      }
      return list_string;
    }
    
    $("#featured_image").change(function () {
      imagePreview(this);
    });

    $('#housingform').on('submit',function(e) {
      let validation_flag = true;
      $('#alert').addClass('hidden');
      e.preventDefault();
      
      if($('#title').val()==='')
      {
        $('#title').css('border-color','red');
        validation_flag = false;
      }
      else {
        $('#title').css('border-color','');
      }
      
      if($('#book').val()==='') {
        $('#book').css('border-color','red')
        validation_flag = false;
      }
      else {
        $('#book').css('border-color','');
      }
      
      if($('#url_input').val()==='') {
        $('#url_input').css('border-color','red');
        validation_flag = false;
      }
      else {
        $('#url_input').css('border-color','');
      }
      
      if($('#video_file').val()==='') {
        $('#video_file_url').css('border-color','red');
        validation_flag = false;
      }
      else {
        $('#video_file_url').css('border-color','');
      }
      
      if($('#ow_dropzone').val()==='') {
        $('#dropzon_wrap').css('border-color','red');
        validation_flag = false;
      }
      
      else {
        ow_dropzone_files = $('#ow_image_url').html();
        ow_dropzone_files_array = ow_dropzone_files.split(',');
        
        if (ow_dropzone_files_array.length > 3) {
          $('#dropzon_wrap').css('border-color','red');
          validation_flag = false;
        }
        else {
          $('#dropzon_wrap').css('border-color','');
        }
      }
      
      if($('#gallery_dropzone').val()==='') {
        $('#gallery_dropzone_wrap').css('border-color','red');
        validation_flag = false;
      }
      else {
        $('#gallery_dropzone_wrap').css('border-color','');
      }
      
      if($('#voice_file').val()==='') {
        $('#voice_file_url').css('border-color','red');
        validation_flag = false;
      }
      else {
        $('#voice_file_url').css('border-color','');
      }
      
      if(validation_flag) {
          $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
          var formData = new FormData(this);
          $.ajax({
            type: 'POST',
            url: '/admin/house',
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
        $('#alert').removeClass('hidden');
        $('#alert').addClass('alert-red');
      }
    });
    
    $("#ow_dropzone").change(function() {
      $('#ow_image_url').html(upload_files_list(this));
      $('#ow_image_upload_button').addClass('hidden');
    });
    
    $("#gallery_dropzone").change(function() {
      $('#gallery_image_url').html(upload_files_list(this));
      $('#gallery_image_upload_button').addClass('hidden');
    });

    $('#voice_file').change(function() {
      $('#voice_file_url').html(upload_files_list(this));
    });

    $('#video_file').change(function() {
      $('#video_file_url').html(upload_files_list(this));
    })

    $('.dropzone-wrapper').on('dragover', function(e) {
      e.preventDefault();
      e.stopPropagation();
      $(this).addClass('dragover');
    });

    $('.dropzone-wrapper').on('dragleave', function(e) {
      e.preventDefault();
      e.stopPropagation();
      $(this).removeClass('dragover');
    });
});
</script>

@endsection


