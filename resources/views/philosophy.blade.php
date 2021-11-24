@include('layouts.header')
<main class="container feature lineup about">
  <section class="content feature-hero sec-hero">
    <h1>理念</h1>
    <p>
      安定した収益を得られる不動産投資を。<br>
      不動産投資は本当に上手くいくか、不安に思われる方が多いです。<br>
      そのためW-aprtmentシリーズでは不動産の経営支援はもちろん、<br>
      入居募集の支援、住居管理までオーナー様に向き合った支援を充実させていきます。
    </p>
  </section>
  <section class="content feature-list about-list" id="list">
    <h1></h1>
    <article>
        <div class="article-left">
          <h2></h2>
          <img src="{{ URL::asset('images/feature01.png') }}" alt="">
        </div>
        <div class="article-right">
          <h2>圧倒的なデザイン</h2>
          <p>
            W-APARTMENTでは、流行からミニマルに至るまで、<br>
            オーナー様が不動産を選ぶ楽しさを提供することの<br>
            できる圧倒的なデザインをご用意いたします。
          </p>
        </div>
    </article>
    <article>
        <div class="article-left">
          <h2></h2>
          <img src="{{ URL::asset('images/feature01.png') }}" alt="">
        </div>
        <div class="article-right">
          <h2>コストの最適化</h2>
          <p>
            圧倒的なデザインを、最適な費用でご提案する。<br>
            W-APARTMENTがオーナー様にご提案する価値は、<br>
            デザインだけではありません。<br>
            コストの最適化も我々の使命です。
          </p>
        </div>
    </article>
    <article>
        <div class="article-left">
          <h2></h2>
          <img src="{{ URL::asset('images/feature01.png') }}" alt="">
        </div>
        <div class="article-right">
          <h2>万全なサポート体制</h2>
          <p>
            不動産は人生において大きな投資であることに違いはありません。W-APARTMENTはオーナー様に不動産を
            ご提案するだけでなく、ご提案後もオーナー様に
            寄り添うサポート体制を提供いたします。
          </p>
        </div>
    </article>
  </section>
  <section class="content about-sec">
    <h1>LINE UP</h1>
    <div class="lineup-content">
      @foreach ($houses as $house)
        <a href="/house/{{$house->id}}" class="lineup-article">
          <div class="lineup-article-img">
            <img src="{{ $house->featured_image_url }}" alt="">
          </div>
          <div class="lineup-info">
            <h2>{{$house->title}}</h2>
            <div>{{$house->book}}</div>
          </div>
        </a>
      @endforeach
    </div>
  </section>
  @include('layouts.footer-sub')
</main>
@include('layouts.footer')