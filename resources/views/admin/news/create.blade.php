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
        <div class="col-sm-6">
          <h4 class="m-0">お知らせ新規追加</h4>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">お知らせ新規追加</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
      <div class="mt-4 mb-2 d-flex align-items-center">
        <span class="mr-2"><span class="font-weight-bold mr-2 h6">リンク:</span>https://hogehoge.jp/test</span>
        <a href="" class="btn btn-sm btn-default">表示</a>
      </div>
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <form action="/foo/bar" method="POST">
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
                <h6 class="card-title">ステータス</h6>
              </div>
              <div class="card-body">
                <div class="form-group d-flex justify-content-between align-content-end">
                  <label class="font-weight-normal mb-0 text-sm mt-1">公開状態</label>
                  <select name="state" class="form-control col-3 form-control-sm p-1">
                    <option>公開</option>
                    <option>非公開</option>
                  </select>
                </div>
                <div class="mt-4 text-sm">公開日:2021/05/26</div>
                <div class="mt-2 text-sm">更新日:2021/05/26</div>
                <div class="mt-3 d-flex justify-content-end">
                  <button type="submit" class="btn btn-sm btn-primary">更新</button>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h6 class="card-title">アイキャッチ画像</h6>
              </div>
              <div class="card-body">
                <label for="upload-image" id="preview">アイキャッチ画像を設定</label>
                <input type="file" name ="image" id="upload-image">
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
  });
</script>

@endsection