@extends('admin.layouts.master')

@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="mb-2 row">
        <div class="col-sm-2 align-self-center">
          <h4 class="m-0"><strong>施工実績一覧</strong></h4>
        </div>
        <div class="col-sm-3">
            <a href="/admin/case-study/create">
                <Button class="btn btn-primary">新規追加</Button>
            </a>
        </div><!-- /.col -->
        <div class="col-sm-7">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>
            <li class="breadcrumb-item active">施工実績一覧</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    @include('admin.layouts.modal_delete')
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <div class="p-0.2"><strong>検索</strong></div>
        </div>
        <div class="card-body">
          <div class="form-group row">
            <label for="search_word" class="col-sm-2 col-form-label">フリーワード</label>
            <input type="text" class="ml-1 col-sm-4 form-control" name="search_word" id="search_word">
          </div>
          <div class="form-group row">
            <label for="instructor_name" class="col-sm-2 col-form-label">著者名</label>
            <input type="text" class="ml-1 col-sm-4 form-control" name="instructor_name" id="instructor_name">
          </div>
          <div class="form-group row" id="areas">
            <label for="areas_check" class="col-sm-2 col-form-label">地域</label>
            @foreach ($areas as $area)
            <div class="ml-1 form-check form-check-inline" name="areas_check">
              <input class="form-check-input area_check" type="checkbox" id="area{{$area->id}}" name="area"  value="{{$area->id}}"">
              <label class="form-check-label" for="area{{$area->id}}">{{$area->name}}</label>
            </div>
            @endforeach
          </div>
          <div class="form-group row" id="amounts">
            <label for="amounts_check" class="col-sm-2 col-form-label">金額</label>
            @foreach ($amounts as $amount)
            <div class="ml-1 form-check form-check-inline" name="amounts_check">
              <input class="form-check-input amount_check" type="checkbox" id="amount{{$amount->id}}" name="amount"  value="{{$amount->id}}">
              <label class="form-check-label" for="amount{{$amount->id}}">{{$amount->type}}</label>
            </div>
            @endforeach
          </div>
          <div class="form-group row" id="housetypes">
            <label for="housetypes_check" class="col-sm-2 col-form-label">間取り</label>
            @foreach ($housetypes as $housetype)
            <div class="ml-1 form-check form-check-inline" name="housetypes_check">
              <input class="form-check-input housetype_check" type="checkbox" id="housetype{{$housetype->id}}" name="housetype"  value="{{$housetype->id}}">
              <label class="form-check-label" for="housetype{{$housetype->id}}">{{$housetype->type}}</label>
            </div>
            @endforeach
          </div>
          <div class="form-group row">
            <label for="check_type" class="col-sm-2 col-form-label">公開状態</label>
            <div class="ml-1 form-check form-check-inline" name="check_type">
              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="public_status"  value="1">
              <label class="form-check-label" for="inlineCheckbox1">公開</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="public_status" value="0">
              <label class="form-check-label" for="inlineCheckbox2">非公開</label>
            </div>
          </div>
          <div class="form-group row ">
            <div class="mx-auto">
              <button class="px-5 pl-2 pr-4 btn btn-block btn-primary" id="searchButton">
                  検索
                  <i class="ml-2 mr-3 fa fa-search "></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="card" id="table_card">
        @include('admin.case-study.pagination')
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    let delete_id;
    let areas_query;
    let amounts_query;
    let housetypes_query;
    let public_status;
    let instructor_name = '';
    let search_word = '';
    
    function fetch_data(page,search_word,instructor_name,areas_query,amounts_query,housetypes_query,public_status)
    {
      let url = "/admin/search_results?page="+page;
      
      url=url+"&search_word=";
      ( typeof(search_word) ==='undefined'||search_word==='' ) ?  url=url+null : url=url+search_word;
      
      url=url+"&instructor_name=";
      ( typeof(instructor_name) === 'undefined' || instructor_name === '' ) ? url=url+null : url+=instructor_name;
      
      url=url+"&public_status=";
      ( typeof(public_status) ==='undefined'||public_status==='' ) ? url=url+null : url+=public_status;
      
      url=url+"&areas_query=";
      ( areas_query === '' || typeof(areas_query) === 'undefined')? url+=null : url+=areas_query;
      
      url=url+"&amounts_query=";
      ( amounts_query === '' || typeof(amounts_query) === 'undefined')? url+=null : url+=amounts_query;
      
      url=url+"&housetypes_query=";
      ( housetypes_query === '' || typeof(housetypes_query) === 'undefined')? url+=null : url+=housetypes_query;
      
      $.ajax({
        url:url,
        method:"GET",
        success:function(data) {
          $('#table_card').html(data);
        },
        error:function(err) {
          console.log(err);
        }
      })
    }
    
    let count = <?php echo json_encode($count)?>;
    
    $('.viewBlog').click(function(e) {
      var id = $(this).data("id");
      $.ajax({
        type: "GET",
        url: "/news"+'/'+id,
      });
    });
    
    $('.editBlog').click(function(e) {
      var id = $(this).data("id");
      $.ajax({
        type: "GET",
        url: "/admin/case-study/"+id+"/edit",
      });
    });

    var index =0;
    
    $('#searchButton').click(function(e) {
        
      var index = 0;
      
      search_word = $('#search_word').val();
      instructor_name = $('#instructor_name').val();

      var selected = new Array();

      $("#areas input[type=checkbox]:checked").each(function () {
        selected.push(this.value);
      });
      
      areas_query = selected.toString();

      let selected_amounts = new Array();
      
      $("#amounts input[type=checkbox]:checked").each(function() {
        selected_amounts.push(this.value)
      });
      
      amounts_query = selected_amounts.toString();

      let selected_housetypes = new Array();
      
      $('#housetypes input[type=checkbox]:checked').each(function() {
        selected_housetypes.push(this.value);
      });
      
      housetypes_query = selected_housetypes.toString();
      
      $('.form-check-input:checked').each(function() {
        public_status = $(this).val();
      }); 
      
      // console.log(category_array);
      // if(category_array.length>0) {
      //     category = category_array.toString();
      // }
      // console.log(category)

      page = 1;
      
      fetch_data(page,search_word,instructor_name,areas_query,amounts_query,housetypes_query,public_status);
      
    });
    
    // $('.form-check-input').click(function() {
    //   $('.form-check-input').not(this).prop('checked',false);
    // });
    
    $(document).on('click', '.pagination a', function(event) {
      event.preventDefault(); 
      var page = $(this).attr('href').split('page=')[1];
      fetch_data(page,search_word,instructor_name,areas_query,amounts_query,housetypes_query,public_status);
    });
  });
</script>

@endsection


