<script>
  function deleteResult(id) {
    count = <?php echo json_encode($count)?>;
    delete_id = id;
    $('#deleteModal').modal();
    $('#deleteButton').html('<a class="btn btn-danger">削除</a>');
  }
  $('#deleteButton').click(function(e) {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      type: "DELETE",
      url: "/admin/case-study" + '/' + delete_id,
      success: function(data) {
 
        window.location.reload();
      },
      error: function(data) {
        console.log('Error:', data);
      }
    });
  });
</script>
<div class="card-header">
    <h6 class="card-title">施工実績一覧</h6>

    <div class="float-right card-tools d-inline-flex"><span class="mt-1 mr-2">全<span class="count">{{$count}}</span>件</span>
    {{$results->links()}}
    </div>
</div>
<div class="card-body">
    @if(count($results)>0)
        <table class="table table-striped">
            <thead>
            <tr class="row">
                <th class="col-sm-1">ID</th>
                <th class="col-sm-2">タイトル</th>
                <th class="col-sm-1">地域</th>
                <th class="col-sm-2">金額</th>
                <th class="col-sm-1">間取り</th>
                <th class="col-sm-2">公開状態</th>
                <th class="float-right col-sm-3"></th>
            </tr>
            </thead>
            <tbody id="resultrows">
                @foreach ($results as $result)
                    <tr class="row" id="{{$result->id}}">
                        <td class="col-sm-1">{{$result->id}}</td>
                        <td class="col-sm-2">{{$result->title}}</td>
                        <td class="col-sm-1">{{$result->name}}</td>
                        <td class="col-sm-2">{{$result->type}}</td>
                        <td class="col-sm-1">{{$result->type}}</td>
                        <td class="col-sm-2">
                            @if($result->public_status=='0')
                                非公開
                            @else
                                公開
                            @endif
                        </td>
                        <td class="col-sm-3">
                            <div class="float-sm-right">
                                <a href="/case_study/{{$result->id}}" class="mr-2" target="_blank">
                                    <button class="btn btn-primary btn-sm viewResult" data-id="{{$result->id}}"  type="button">
                                        <i class="fa fa-external-link-alt"></i>
                                        表示
                                    </button>
                                </a>
                                <a href="/admin/case-study/{{$result->id}}/edit" class="mr-2">
                                    <button class="btn btn-info btn-sm editResult" type="button" data-id="{{$result->id}}">
                                        <i class="ml-1 mr-1 fa fa-pencil-alt"></i>
                                        編集
                                    </button>
                                </a>
                                <button  class="btn btn-danger btn-sm deleteResult" id="deleteresult" data-id="{{$result->id}}">
                                    <i class="ml-1 mr-1 fa fa-trash"></i>削除
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
    <table class="table table-striped">
        <thead>
        <tr class="row">
            <th class="col-sm-1">ID</th>
            <th class="col-sm-2">タイトル</th>
            <th class="col-sm-1">地域</th>
            <th class="col-sm-2">金額</th>
            <th class="col-sm-1">間取り</th>
            <th class="col-sm-2">公開状態</th>
            <th class="float-right col-sm-3"></th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <div class="no-data">
        <div>データがありません。</div>
    </div>
    @endif
</div>
<div class="card-footer">
    <div class="float-right card-tools d-inline-flex"><span class="m-2">全<span class="count">{{$count}}</span>件</span>{{$results->links()}}</div>
</div>