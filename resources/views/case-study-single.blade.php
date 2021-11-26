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
        <tr>
          <td>導入後の効果１：</td>
          <td>{{ $result->instruction_effects }}</td>
        </tr>
        <tr>
          <td>導入後の効果２：</td>
          <td>{{ $result->instruction_effects }}</td>
        </tr>
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
        <h1>導入の背景</h1>
        <!-- <h2>テキストテキストテキストテキストテキストテキスト</h2> -->
        <p>{{ $result->post_introduction_details }}</p>
      </div>
    </article>
  </section>
  <section class="content works-social">
    <h1>導入後の効果</h1>
    <!-- <h2>テキストテキストテキストテキストテキストテキスト</h2> -->
    <p>{{ $result->future_outlook_details }}</p>
    <img src="{{ URL::asset('images/social.png') }}" alt="">
  </section>
  @include('layouts.footer-sub')
</main>
@include('layouts.footer')