@include('layouts.header')
<main class="container works-list blog-list">
  <section class="content sec-hero">
    <div class="blog-list-ttl">
      <h1>ブログ</h1>
      <div class="category-group">
        <a href="{{ url('/blog') }}" class = "{{($activitad_category_name == '新着一覧')?'active':''}}" >新着</a>
        <span></span>
        <a href="{{url('/blog/recommend')}}">おすすめ</a>
        @foreach ($categories as $category)
          <span></span>
          <a href="{{url('/blog/category/'.$category->id)}}" class = "{{($category->name == $activitad_category_name)?'active':''}}"  id="{{$category->id}}">{{$category->name}}</a>
        @endforeach
      </div>
    </div>
  </section>
  <section class="content search-result">
    <h1>{{$activitad_category_name}}</h1>
    <div class="result-content">
      @foreach ($blogs as $blog)
        <article>
          <div class="article-left">
            <h2>{{$blog->title}}</h2>
            <img src="{{ URL::asset($blog->featured_image_url) }}" alt="">
          </div>
          <div class="article-right">
              <div class="article-date">{{ date('Y-m-d', strtotime($blog->updated_at)) }}</div>
              <div class="investment article-blog-category"><a href="{{ url('/blog/category').'/'.$blog->category_id }}" class="blog-category btn">{{$blog->category_name}}</a></div>
              <p>{!!$blog->content!!}
              </p>
              <a href="{{url('/blog/'.$blog->id)}}" class="btn sec-link-btn"><img src="{{ URL::asset('images/ico_arrow-right.png') }}" alt=""></a>
          </div>
        </article>
      @endforeach
    </div>
    <div class="article-pagination">
      {!! $blogs->links('pagination') !!}
    </div>
  </section>
  @include('layouts.footer-sub')
</main>
@include('layouts.footer')