<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>W-Apartment - Admin</title>
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome Icons -->
<link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
<!-- Site fevicon icons -->
<link rel="icon" href="{{ URL::asset('images/favicon.png') }}" sizes="32x32" />
<link rel="icon" href="{{ URL::asset('images/favicon.png') }}" sizes="192x192" />
<link rel="apple-touch-icon-precomposed" href="{{ URL::asset('images/favicon.png') }}" />
<meta name="msapplication-TileImage" content="{{ URL::asset('images/favicon.png') }}" />
<!-- jQuery -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- include summernote css/js-->
<link href="{{ asset('vendor/summernote/summernote-bs4.min.css') }}" rel="stylesheet">
<script src="{{ asset('vendor/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('js/RowSorter.js') }}"></script>
<style>
  body {
    font-family: Yu Gothic;
  }
  .nav:focus{
    color:#eb76ec;
  }
  #featured_image, #author_image {
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
  #upload-image {
    opacity: 0;
    position: absolute;
    z-index: -1;
    display: none;
  }
  #eyecatch_image {
    opacity: 0;
    position: absolute;
    z-index: -1;
    display: none;
  }
  .dropzone-wrapper {
    border: 2px dashed #ced4da;
    color: #495057;
    width: inherit;
    display: flex;
    min-height: 70px;
    height: auto!important;
    border-radius: 2px;
  }
  .dropzone-desc {
    margin: auto;
    font-size: 16px;
    width: 100%;
    text-align: center;
  }
  .dropzone-desc button {
    border: 1px solid #ced4da;
    border-radius: 5px;
    outline: none;
    background: white;
    padding: 5px 10px;
  }
  .dropzone,
  .dropzone:focus {
    position: absolute;
    outline: none !important;
    width: 100%;
    height: 150px;
    cursor: pointer;
    opacity: 0;
  }
  .dropzone-wrapper:hover,
  .dropzone-wrapper.dragover {
    background: #ecf0f5;
  }
  .preview-zone {
    text-align: center;
  }
  .preview-zone .box {
    box-shadow: none;
    border-radius: 0;
    margin-bottom: 0;
  }
  .custom-file-input:lang(en) ~ .custom-file-label::after {
    content: "参照";
  }
  .custom-file-label::after {
    content: "参照";
  }
  #author_image_upload_button{
    border: 1px solid;
    border-radius: 2px;
  }
  #author_img_preview {
    cursor: pointer;
    width: 100%;
    height: 150px;
    background-color: rgb(156, 150, 150);
    color: #333;
    display: inline-flex;
    justify-content: center;
    align-items: center;
  }
  .alert-green {
    background-color: white;
    border-left-color: #00a32a;
  }
  .alert-red {
    border-left-color: red;
    color: red;
  }
  .hidden {
    display: none;
  }
  .no-data {
    height: 200px;
    width: inherit;
    display: flex;
    justify-content: center;
    align-items: center;
  }
  #firstview_upload_button {

  }
  #add_input_btn, #remove_input_btn {
    width: 16px;
    height: 16px;
    border-radius: 50%;
    font-size: 11px;
    font-weight: bolder;
    color: white;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
  }
  #add_input_btn {
    background: #007bff;
  }
  #remove_input_btn {
    background: red;
  }
</style>