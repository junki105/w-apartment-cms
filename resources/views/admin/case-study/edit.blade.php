@extends('admin.layouts.master')

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="mb-2 row">
        <div class="col-sm-2 align-self-center">
          <h4 class="m-0"><strong>施⼯実績編集</strong></h4>
        </div><!-- /.col -->
        <div class="col-sm-4">
          <a href="/admin/case-study/create" class="btn btn-primary" id = "new_house_btn">
            新規追加
          </a>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
            <li class="breadcrumb-item active">施⼯実績編集</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
      <div class="mt-4 mb-2" id="url_string">
        <span class="mr-2 font-weight-bold h6">リンク:
            <span id="created_url">{{url("/case-study/")."/".$result->id}}</span>
        </span>
        <a href='{{url("/case-study/")."/".$result->id}}'id="link_url" class="btn btn-sm btn-default" target="_blank">表示</a>
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
      <form id="resultsform" action="javascript:void(0)" enctype="multipart/form-data">
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
                <h5 class="card-title"><strong>施工実績登録</strong></h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="form-group row">
                  <label for="firstview" class="col-sm-4 col-form-label">画像(ファーストビュー)</label>
                  <div class="ml-1 dropzone-wrapper col-sm-7">
                    <div class="dropzone-desc">
                      <i class="fa fa-cloud-upload-alt"></i>
                      <span id="firstview_url"style="position: relative;">画像をドラッグ&ドロップまたは</span>
                      <button id="firstview_upload_button">ファイルを選捉</button>
                    </div>
                    <input type="file" name="firstview" id="firstview_dropzone" class="dropzone">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="instructor_name" class="col-sm-4 col-form-label">導入者氏名</label>
                  <input type="text" class="ml-1 col-sm-7 form-control" name="instructor_name" id="instructor_name">
                </div>
                <div class="form-group row">
                  <label for="instruction_summary" class="col-sm-4 col-form-label">導入の背景（要約）</label>
                  <textarea row="3" class="ml-1 col-sm-7 form-control" name="instruction_summary" id="instruction_summary"></textarea>
                </div>
                <div class="form-group row">
                  <div class="col-sm-4">
                    <label for="instruction_effects" class="col-form-label">導入後の効果(要約)</label>
                    <span id="add_input_btn">+</span>
                    <span id="remove_input_btn">×</span>
                  </div>
                  <div class="p-0 ml-1 col-sm-7" id="new_chq">
                  </div>
                  <input type="hidden" value="2" id="total_chq">
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h5 class="card-title"><strong>導入の背景</strong></h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="form-group row">
                  <label for="instruction_details" class="col-sm-4 col-form-label">導入の背景（詳細•テキスト）</label>
                  <textarea row="3" class="ml-1 col-sm-7 form-control" name="instruction_details" id="instruction_details"></textarea>
                </div>
                <div class="form-group row">
                  <label for="instruction_bg" class="col-sm-4 col-form-label">画像(ファーストビュー)</label>
                  <div class="ml-1 dropzone-wrapper col-sm-7">
                    <div class="dropzone-desc">
                      <i class="fa fa-cloud-upload-alt"></i>
                      <span id="instruction_bg_url"style="position: relative;">画像をドラッグ&ドロップまたは</span>
                      <button id="instruction_bg_upload_button">ファイルを選捉</button>
                    </div>
                    <input type="file" name="instruction_bg" id="instruction_bg_dropzone" class="dropzone">
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h5 class="card-title"><strong>選んだ理由</strong></h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="form-group row">
                  <label for="choosing_reason" class="col-sm-4 col-form-label">選んだ理由（詳細•テキスト）</label>
                  <textarea row="3" class="ml-1 col-sm-7 form-control" name="choosing_reason" id="choosing_reason"></textarea>
                </div>
                <div class="form-group row">
                  <label for="choosing_reason" class="col-sm-4 col-form-label">選んだ理由（詳細•画像）</label>
                  <div class="ml-1 dropzone-wrapper col-sm-7">
                    <div class="dropzone-desc">
                      <i class="fa fa-cloud-upload-alt"></i>
                      <span id="choosing_reason_url"style="position: relative;">画像をドラッグ&ドロップまたは</span>
                      <button id="choosing_reason_upload_button">ファイルを選捉</button>
                    </div>
                    <input type="file" name="choosing_reason_file" id="choosing_reason_dropzone" class="dropzone">
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h5 class="card-title"><strong>導入後の効果</strong></h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="form-group row">
                  <label for="post_introduction_details" class="col-sm-4 col-form-label">導入後の効果（詳細•テキスト）</label>
                  <textarea row="3" class="ml-1 col-sm-7 form-control" name="post_introduction_details" id="post_introduction_details"></textarea>
                </div>
                <div class="form-group row">
                  <label for="pi_image" class="col-sm-4 col-form-label">導入後の効果（詳細•画像）</label>
                  <div class="ml-1 dropzone-wrapper col-sm-7">
                    <div class="dropzone-desc">
                      <i class="fa fa-cloud-upload-alt"></i>
                      <span id="pi_image_url"style="position: relative;">画像をドラッグ&ドロップまたは</span>
                      <button id="pi_upload_button">ファイルを選捉</button>
                    </div>
                    <input type="file" name="pi_image" id="pi_image_dropzone" class="dropzone">
                  </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h5 class="card-title"><strong>今後の展望</strong></h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="form-group row">
                  <label for="future_outlook_details" class="col-sm-4 col-form-label">今後の展望（詳細•テキスト）</label>
                  <textarea row="3" class="ml-1 col-sm-7 form-control" name="future_outlook_details" id="future_outlook_details"></textarea>
                </div>
                <div class="form-group row">
                  <label class="col-sm-4 col-form-label">資料ダウンロード</label>
                  <div class="ml-1 custom-file col-sm-7">
                    <input type="file" class="custom-file-input" id="download_material" name="download_material">
                    <label class="custom-file-label" id="download_material_url" for="download_material">資料をアップロード</label>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="url" class="col-sm-4 col-form-label">詳細URL</label>
                  <textarea row="3" class="ml-1 col-sm-7 form-control" name="url" id="url"></textarea>
                </div>
              </div>
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
                  <h6 class="card-title">地域</h6>
              </div>
              <div class="card-body">
                @foreach ($areas as $area)
                  <div class="form-check">
                    <input type="radio" class="form-check-input" name="area" value="{{$area->id}}" id="area{{$area->id}}">
                    <label class="form-check-label" for="area{{$area->id}}">
                    {{$area->name}}
                  </div>
                @endforeach
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h6 class="card-title">金額</h6>
              </div>
              <div class="card-body">
                @foreach ($amounts as $amount)
                  <div class="form-check">
                    <input type="radio" class="form-check-input" name="amount" value="{{$amount->id}}" id="amount{{$amount->id}}">
                    <label class="form-check-label" for="amount{{$amount->id}}">
                    {{$amount->type}}
                  </div>
                @endforeach
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                  <h6 class="card-title">間取り</h6>
              </div>
              <div class="card-body">
                @foreach ($housetypes as $housetype)
                  <div class="form-check">
                    <input type="radio" class="form-check-input" name="housetype" value="{{$housetype->id}}" id="housetype{{$housetype->id}}">
                    <label class="form-check-label" for="housetype{{$housetype->id}}">
                    {{$housetype->type}}
                  </div>
                @endforeach
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                  <h6 class="card-title">アイキャッチ画像</h6>
              </div>
              <div class="card-body">
                  <label for="eyecatch_image" id="preview">アイキャッチ画像を設定</label>
                  <input type="file" name ="eyecatch_image" id="eyecatch_image">
              </div>
            </div>
          </div>
        </div>
      </form>
    </div><!-- /.container-fluid -->
  </div><!-- /.content -->
</div>
<script>
  $(document).ready(function() {
    
    let result = <?php echo json_encode($result)?>;
    
    $('#title').val(result.title);

    $('#firstview_url').html(result.firstview_url);
    $('#firstview_upload_button').css('display','none');
    
    $('#instruction_bg_url').html(result.instruction_bg_url);
    $('#instruction_bg_upload_button').css('display','none');
    
    $('#instructor_name').val(result.instructor_name);
    $('#instruction_summary').val(result.instruction_summary);

    
    var instruction_effects = result.instruction_effects;
    var delimeter = String.fromCharCode(1);
    var instruction_effects_list = instruction_effects.split(delimeter)
    
    $('#total_chq').val(instruction_effects_list.length);
    
    for (var i = 0; i < instruction_effects_list.length; i++)
    {
      new_input = "<textarea row='3' class='mt-2 form-control instruction_effects' name='instruction_effects' id='instruction_effects_" + (i+1) + "'>";
      $('#new_chq').append(new_input);
      $('#instruction_effects_' + (i + 1)).val(instruction_effects_list[i])
    }
   

    $('#add_input_btn').on('click', addInputField);
    $('#remove_input_btn').on('click', removeInputField);

    function addInputField() {
      var new_chq_no = parseInt($('#total_chq').val()) + 1;
      var new_input = "<textarea row='3' class='mt-2 form-control instruction_effects' name='instruction_effects' id='instruction_effects_" + new_chq_no + "'>";
      
      $('#new_chq').append(new_input);

      $('#total_chq').val(new_chq_no);
    }

    function removeInputField() {
      var last_chq_no = $('#total_chq').val();

      if (last_chq_no > 1) {
        $('#instruction_effects_' + last_chq_no).remove();
        $('#total_chq').val(last_chq_no - 1);
      }
    }

    
    $('#instruction_details').val(result.instruction_details);
    $('#choosing_reason').val(result.choosing_reason);

    $('#choosing_reason_url').html(result.choosing_reason_url);
    $('#choosing_reason_upload_button').css('display','none');
    
    $('#post_introduction_details').val(result.post_introduction_details);

    $('#pi_image_url').html(result.post_introduction_url);
    $('#pi_upload_button').css('display','none');
    
    $('#future_outlook_details').val(result.future_outlook_details);
    $('#download_material_url').html(result.download_material_url);
    $('#public_status').val(result.public_status);
    $('#url').val(result.url);
    $('#public_status').val(result.public_status);
    $('#preview').html('<img src="'+result.eyecatch_image_url+'"/>');
    $("input[name=area][value=" + result.area_id + "]").prop('checked', true);
    $("input[name=amount][value=" + result.amount_id + "]").prop('checked', true);
    $("input[name=housetype][value=" + result.housetype_id + "]").prop('checked',true);
    
    var created_at = result.created_at.substr(0,10);
    var updated_at = result.updated_at.substr(0,10);
    
    $('#created_at').html(created_at);
    $('#updated_at').html(updated_at);
    
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
    function imagePreview(fileInput) {
      if (fileInput.files && fileInput.files[0]) {
        var fileReader = new FileReader();
        
        fileReader.onload = function (event) {
            $('#preview').html('<img src="'+event.target.result+'"/>');
        };

        fileReader.readAsDataURL(fileInput.files[0]);
      }
    }
    
    $("#eyecatch_image").change(function () {
      imagePreview(this);
    });

    $('#resultsform').on('submit',function(e) {
      e.preventDefault();
      
      var formData = new FormData(this);
      
      new_instruction_value = ""
      
      var instruction_effects = $(".instruction_effects")
      for (var i = 0; i < instruction_effects.length; i++ ) {
        
        var i_effects = $(instruction_effects[i]);
        
        if(i < instruction_effects.length - 1)
          new_instruction_value += i_effects.val() + String.fromCharCode(1);
        else
          new_instruction_value += i_effects.val()
        
      }
      
      var formData = new FormData(this);
      formData.set("instruction_effects", new_instruction_value);
        
      $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        url: '/admin/case-study/update/'+result.id,
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        
        success: function (data) {
          if(data.success) {
            $('#alert').css('display','block');
            // $('#created_url').html('http://localhost:8000/blog/'+data.id);
            // $('#url_string').css('display','block');
            // $('#link_url').attr('href','http://localhost:8000/blog/'+data.id).css('display','inline');
          }
        },
        error: function (data) {
          console.log('Error:', data);
        }
      });
    })

    $("#firstview_dropzone").change(function() {
      $('#firstview_url').html(upload_files_list(this));
      $('#firstview_upload_button').css('display','none');
    });
    
     $("#instruction_bg_dropzone").change(function() {
      $('#instruction_bg_url').html(upload_files_list(this));
      $('#instruction_bg_upload_button').css('display','none');
    });

    $("#choosing_reason_dropzone").change(function() {
      $('#choosing_reason_url').html(upload_files_list(this));
      $('#choosing_reason_upload_button').css('display','none');
    });
    
    $("#pi_image_dropzone").change(function() {
      $('#pi_image_url').html(upload_files_list(this));
      $('#pi_upload_button').css('display','none');
    });
    
    $('#download_material').change(function() {
      $('#download_material_url').html(upload_files_list(this));
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


