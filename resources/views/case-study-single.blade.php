@include('layouts.header')
<main class="container works-list works">
  <section class="content works-sec sec-hero">
    <h1>{{ $result->title }}</h1>
    <div class="works-info">
      <div class="works-info-left">
        <div class="works-investment">投資用物件</div>
        <div class="client-name">{{ $result->instructor_name }}</div>
      </div>
      <div class="works-date">{{ date('Y-m-d', strtotime($result->updated_at)) }}</div>
    </div>
    <figure id="firstview">
      <img id="" src="{{ url( $result->firstview_url ) }}" alt="">
    </figure>
    <div class="works-content">
      <h2>お名前：{{ $result->instructor_name }}</h2>
      <table>
        <tr>
          <td>導入の背景：</td>
          <td>{{ $result->instruction_summary }}</td>
        </tr>
        @if ($result->instruction_effects != "")
          @php
            $i = 1;
            $delimeter = '';
            $delimeter .= chr(1);
            $instruction_effects = explode($delimeter, $result->instruction_effects);
          @endphp
          @foreach($instruction_effects as $instruction_effect)
            <tr>
              <td>導入後の効果{{ $i }}：</td>
              <td>{{ $instruction_effect }}</td>
            </tr>
            @php
              $i++;
            @endphp
          @endforeach
        @endif
      </table>
    </div>
  </section>
  <section class="content works-list-sec">
    <article class="article">
      <div class="article-left" id="instruction_bg">
        <img src="{{ url( $result->instruction_bg_url ) }}" alt="">
      </div>
      <div class="article-right">
        <h1>導入の背景</h1>
        <!-- <h2>テキストテキストテキストテキストテキストテキスト</h2> -->
        <p>{{ $result->instruction_details }}</p>
      </div>
    </article>
    <article class="article">
      <div class="article-left" id="post_introduction_bg">
        <img src="{{ url( $result->choosing_reason_url ) }}" alt="">
      </div>
      <div class="article-right">
        <h1>選んだ理由</h1>
        <!-- <h2>テキストテキストテキストテキストテキストテキスト</h2> -->
        <p>{{ $result->choosing_reason }}</p>
      </div>
    </article>
  <article class="article">
      <div class="article-left" id="eyecatch_image">
        <img src="{{ url( $result->post_introduction_url ) }}" alt="">
      </div>
      <div class="article-right">
        <h1>導入後の効果</h1>
        <!-- <h2>テキストテキストテキストテキストテキストテキスト</h2> -->
        <p>{{ $result->post_introduction_details }}</p>
      </div>
    </article>
  </section>
  <section class="content works-social">
    <h1>今後の展望</h1>
    <!-- <h2>テキストテキストテキストテキストテキストテキスト</h2> -->
    <p>{{ $result->future_outlook_details }}</p>
    <div class="link-group">
      <a href="{{ url( $result->download_material_url ) }}" download class="btn hover-spacing-btn">資料ダウンロード<img src="{{ URL::asset('images/ico_triangle.png') }}" alt=""></a>
      <a href="{{ url( $result->url ) }}" target="_blank" class="btn hover-spacing-btn">詳細<img src="{{ URL::asset('images/ico_triangle.png') }}" alt=""></a>
    </div>
    <div class="social-link-wrap">
      {!! $social_share !!}
    </div>
    <!-- <img src="{{ URL::asset('images/social.png') }}" alt=""> -->
  </section>
  @include('layouts.footer-sub')
</main>
@include('layouts.footer')