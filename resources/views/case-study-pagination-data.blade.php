<h1>新着一覧</h1>
<div class="result-content">
    @foreach ($results as $result)
    <article>
    <div class="article-left">
        <h2>{{$result->title}}</h2>
        <img src="{{ url($result->eyecatch_image_url) }}" alt="">
    </div>
    <div class="article-right">
        <div class="article-date">{{ date('Y.m.d', strtotime($result->updated_at)) }}</div>
        <div class="investment">{{$result->instructor_name}}</div>
        <p>{!!$result->instruction_summary!!}
        </p>
        <a href="/case-study/{{$result->id}}" class="btn sec-link-btn"><img src="{{ URL::asset('images/ico_arrow-right.png') }}" alt=""></a>
    </div>
    </article>
    @endforeach
</div>
<div class="article-pagination">
    {!! $results->links('pagination') !!}
</div>