@extends('admin.layouts.master')

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="mb-2 row">
        <div class="col-sm-2 align-self-center">
          <h4 class="m-0"><strong>ブログ編集</strong></h4>
        </div><!-- /.col -->
        <div class="col-sm-4">
          <a href="/admin/blog/create" class="btn btn-primary" id="new_house_btn">
            新規追加
          </a>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
            <li class="breadcrumb-item active">ブログ編集</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
      <div class="mt-4 mb-2" id="url_string">
        <span class="mr-2 font-weight-bold h6">リンク:
            <span id="created_url">{{url("/blog/")."/".$blog->id}}</span>
        </span>
        <a href='{{url("/blog/")."/".$blog->id}}'id="link_url" class="btn btn-sm btn-default" target="_blank">表示</a>
      </div>
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="alert alert-dismissible" id="alert" style="background-color: white;display:none; border-left-color: #00a32a;">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong id="notify_string">更新しました。</strong>
      </div>
      <form id="blogform" action="javascript:void(0)" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-sm-9">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">タイトル</h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <input type="text" name="title" value="{{$blog->title}}" class="form-control form-control-lg" id="title" placeholder="">
              </div>
              <!-- /.card-body -->
            </div>
            <textarea id="summernote" name="content"></textarea>
            <div class="card">
              <div class="card-header">
                <h5 class="card-title"><strong>著者情報</strong></h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="form-group row">
                  <label for="author_name" class="col-sm-3 col-form-label">著者名</label>
                  <input type="text" class="ml-1 col-sm-7 form-control" value="{{$blog->author_name}}" name="author_name" id="author_name">
                </div>
                <div class="form-group row">
                  <label for="author_profile" class="col-sm-3 col-form-label">著者プロフィール</label>
                  <textarea rows="4" id="author_profile"  name="author_profile" class="ml-1 col-sm-7 form-control" ></textarea>
                </div>
                <div class="form-group row">
                  <label for="author_image" id="author_image_preview" class="col-sm-3 col-form-label">著者プロフィール画像</label>
                  <div class="ml-1 dropzone-wrapper col-sm-7">
                    <div class="dropzone-desc">
                      <i class="fa fa-cloud-upload-alt"></i>
                      <span id="author_image_url"></span>
                      <button id="author_image_upload_button">ファイルを選捉</button>
                    </div>
                    <input type="file" name="author_image" class="dropzone">
                  </div>
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
                  <button type="submit" name='post_save' id='post_save' class="btn btn-sm btn-primary">更新</button>
                </div>
              </div>
            </div>
            <div class="card">
                <div class="card-header">
                  <h6 class="card-title"><strong>カテゴリ</strong></h6>
                </div>
                <div class="card-body">
                  @foreach ($categories as $category)
                  <div class="form-check" name="check_type">
                      <input class="form-check-input category_check" type="checkbox" id="category{{$category->id}}" name="category"  value="{{$category->id}}">
                      <label class="form-check-label" for="category{{$category->id}}">{{$category->name}}</label>
                  </div>
                  @endforeach
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                  <h6 class="card-title"><strong>おすすめ</strong></h6>
                </div>
                <div class="card-body">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" checked="{{$blog->recommended_flag}}" name="recommended_flag" id="recommended_flag">おすすめに登録する
                  </div>
                </div>
            </div>
            <div class="card">
            <div class="card-header">
                <h6 class="card-title">アイキャッチ画像</h6>
            </div>
            <div class="card-body">
                <label for="featured_image" id="preview">アイキャッチ画像を設定</label>
                <input type="file" name ="featured_image" id="featured_image">
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

    blog = <?php echo json_encode($blog)?>;

    $('#summernote').summernote('pasteHTML',blog.content);
    $('#preview').html('<img src="'+blog.featured_image_url+'"/>');
    $('#public_status').val(blog.public_status);
    
    var created_at = blog.created_at.substr(0,10);
    var updated_at = blog.updated_at.substr(0,10);
    
    $('#created_at').html(created_at);
    $('#updated_at').html(updated_at);
    $('#author_profile').html(blog.author_profile);
    $('#author_image_url').html(blog.author_image_url);

    var blog_id = blog.id;
    
    $("input[name=category][value=" + blog.category + "]").prop('checked', true);
    
    function imagePreview(fileInput) {
      if (fileInput.files && fileInput.files[0]) {
        var fileReader = new FileReader();

        fileReader.onload = function (event) {
            $('#preview').html('<img src="'+event.target.result+'"/>');
        };
        
        fileReader.readAsDataURL(fileInput.files[0]);
      }
    }
    
    $("#featured_image").change(function () {
      imagePreview(this);
    });
    
    $('#blogform').on('submit',function(e) {
      let validation_flag = true;
      $('#alert').css('display','none');
      
      if($('#title').val()==='') {
        $('#title').css('border-color','red');
        validation_flag = false;
      }
      else {
        $('#title').css('border-color','');
      }
      // if($('#author_name').val()==='') {
      //   $('#author_name').css('border-color','red')
      //   validation_flag = false;
      // }
      // else {
      //   $('#author_name').css('border-color','');
      // }
      // if($('#author_profile').val()==='') {
      //   $('#author_profile').css('border-color','red');

      //   validation_flag = false;
      // }
      // else {
      //   $('#author_profile').css('border-color','');
      // }

      if($('#summernote').summernote('code')==='<p><br></p>') {
        $('.note-editor').css('border-color','red');
        validation_flag=false;
      }
      else {
        $('.note-editor').css('border-color','');
      }
      
      if(validation_flag) {
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        e.preventDefault();
        
        var formData = new FormData(this);
        
        $.ajax({
          type: "POST",
          url: '/admin/blog/update/'+blog_id,
          data:formData,
          cache:false,
          contentType:false,
          processData:false,
          success: function (data) {
            if(data.success) {            
              $('#notify_string').html('更新しました。');
              $('#alert').css({'display':'block','border-left-color':'#00a32a', 'color':'black'});
              
              var current_date = new Date();
              var current_year = String(current_date.getFullYear());
              var current_month = current_date.getMonth() + 1;
              
              current_month<10?current_month = '0' + String(current_month) : current_month = String(current_month);
              
              var current_day = current_date.getDate();
              
              current_day<10?current_day = '0' + String(current_day) : current_day = String(current_day);

              let updated_at = current_year + '/' + current_month + '/' + current_day;
              
              $('#updated_at').html(updated_at);
            }
          },
          error: function (data) {
            console.log('Error:', data);
          }
        });
      }
      else {
        $('#notify_string').html('入力内容でエラーがあります。');
        $('#alert').css('display','block');
        $('#alert').css('border-left-color','red');
        $('#alert').css('color','red');
      }
    })
    
    function readFile(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
        };
        
        $('#author_image_url').html(input.files[0].name);
        
        reader.readAsDataURL(input.files[0]);
      }
    }
    
    $('.category_check').click(function() {
      $('.category_check').not(this).prop('checked',false);
    });

    $(".dropzone").change(function() {
      readFile(this);
    });

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


