@include('layouts.header')
<main class="container feature">
  <section class="content feature-hero sec-hero">
    <h1>BROOKLYN</h1>
    <p>
      アメリカのニューヨークをテーマにしてアパート「BROOKLYN」。<br>
      アメリカらしい広々とした造りに加え、どこか居心地のいい木目調の内装。<br>
      日本にいながらホッと一息つける空間を入居者様に提供できます。
    </p>
    <h2>１分でわかる「BROOKLYNの特徴」</h2>
    <video class="feature-video" controls muted poster="https://assets.codepen.io/6093409/river.jpg">
      <source src="https://assets.codepen.io/6093409/river.mp4" type="video/mp4">
    </video>
  </section>
  <section class="content feature-list" id="list">
    <h1>特 徴</h1>
    <article>
        <div class="article-left">
          <h2></h2>
          <img src="{{ URL::asset('images/feature01.png') }}" alt="">
        </div>
        <div class="article-right">
          <h2>圧倒的なデザイン</h2>
          <p>
            NYらしいレンガ調の外観に加え、中は至ってシンプルに。木材を多く使用することで、洗練されたデザインを実現。単身者に好まれやすいデザインですが、空間は広々としているため、2人暮らしにも最適なシリーズです。
          </p>
        </div>
    </article>
    <article>
        <div class="article-left">
          <h2></h2>
          <img src="{{ URL::asset('images/feature01.png') }}" alt="">
        </div>
        <div class="article-right">
          <h2>シンプルなモダンテイスト</h2>
          <p>
            モダンテイストな装いは若者からの人気が出やすいです。<br>
            外観含め内装の雰囲気にあった運びを致します。
          </p>
        </div>
    </article>
    <article>
        <div class="article-left">
          <h2></h2>
          <img src="{{ URL::asset('images/feature01.png') }}" alt="">
        </div>
        <div class="article-right">
          <h2>圧倒的なデザイン</h2>
          <p>
            内装の雰囲気が楽しくなるシンプルな趣。
          </p>
        </div>
    </article>
  </section>
  <section class="content flow feature-flow">
    <h2 class="sec-ttl">ご契約の流れ</h2>
    <div class="flow-content">
      <div class="flow-wrap">
        <img src="{{ URL::asset('images/ico_flow01.png') }}" alt="">
        <h3>1<span>｜</span>ヒアリング</h3>
        <p>
          立地、希望入居者など不動産を運営する上でオーナー様が外せない条件をお伺い致します。
        </p>
      </div>
      <div class="flow-wrap">
        <img src="{{ URL::asset('images/ico_flow02.png') }}" alt="">
        <h3>2<span>｜</span>ご契約</h3>
        <p>
          双方合意の上で、ご契約書を作成し、ご契約とさせて頂きます。その後着工を致します。
        </p>
      </div>
      <div class="flow-wrap">
        <img src="{{ URL::asset('images/ico_flow03.png') }}" alt="">
        <h3>3<span>｜</span>利用開始</h3>
        <p>
          工事が完了後、遠営を開始。入居者募集から運営までワンストップで行います。
        </p>
      </div>
    </div>
  </section>
  @include('layouts.footer-sub')
</main>
@include('layouts.footer')