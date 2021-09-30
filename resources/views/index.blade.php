<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>w-apartment</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.1.2/fullpage.min.css" integrity="sha512-4rPgyv5iG0PZw8E+oRdfN/Gq+yilzt9rQ8Yci2jJ15rAyBmF0HBE4wFjBkoB72cxBeg63uobaj1UcNt/scV93w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    <script>
      (function(d) {
        var config = {
          kitId: 'phz1yyq',
          scriptTimeout: 3000,
          async: true
        },
        h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
      })(document);
    </script>
  </head>
  <body>
    <!--[if lt IE 7]>
      <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <header class="header">
      <h1 class="logo"><a href="{{ url('/') }}"><img src="{{ URL::asset('images/logo.png') }}" alt="" id="logo"></a></h1>
      <div class="header-aside" id="aside_left">
        <div class="menu-btn" id="menu_btn">
          <div></div>
          <div></div>
          <div></div>
        </div>
        <div class="line"></div>
        <div id="num" class="slide-number">01</div>
      </div>
      <div class="header-aside" id="aside_right">
        <a href="" class="login-btn"><img src="{{ URL::asset('images/ico_login.png') }}" alt="" id="login_img"></a>
        <div class="header-aside-txt">
          <span class="btn">説明会情報</span>
          <img src="{{ URL::asset('images/side_link.png') }}" alt="" id="side_link">
          <span class="btn">資料請求</span>
        </div>
        <div class="copyright">
          © W-APARTMENT
        </div>
        <div class="line"></div>
      </div>        
      <button id="moveDown" class="btn scroll-btn">
        SCROLL
        <img src="{{ URL::asset('images/ico_arrow_down.png') }}" alt="">
      </button>
      <button id="moveLeft" class="ctr-btn btn"><img src="{{ URL::asset('images/ico_prev.png') }}" alt="">PREV</button>
      <button id="moveRight" class="ctr-btn btn">NEXT<img src="{{ URL::asset('images/ico_next.png') }}" alt=""></button>
      <div class="site-menu" id="site_menu">
        <div class="site-menu-left">
          <ul>
            <li><a href="{{url('/philosophy')}}" class="btn"><span>01</span>理念</a></li>
            <li><a href="{{url('/#support')}}" class="btn"><span>02</span>住宅/経営支援</a></li>
            <li><a href="{{url('/philosophy')}}" class="btn"><span>03</span>部材共有</a></li>
            <li><a href="{{url('/house')}}" class="btn"><span>04</span>商品住宅</a></li>
            <li><a href="{{url('/feature')}}" class="btn"><span>05</span>特徴</a></li>
            <li><a href="{{url('/#philosophy')}}" class="btn"><span>06</span>料金</a></li>
            <li><a href="{{url('/case-study')}}" class="btn"><span>07</span>施工実績</a></li>
            <li><a href="{{url('/#flow')}}" class="btn"><span>08</span>プロモーション</a></li>
            <li><a href="{{url('/news')}}" class="btn"><span>09</span>NEWS</a></li>
            <li><a href="{{url('/company-profile')}}" class="btn"><span>10</span>会社概要</a></li>
          </ul>
        </div>
        <div class="menu-content-line"></div>
        <div class="site-menu-right">
          <ul>
            <li><span>CONTACT</span></li>
            <li><a href="{{url('/contact')}}">お問い合わせ</a></li>
            <li><a href="{{url('/document-request')}}">資料請求</a></li>
          </ul>
          <div class="phone">
            <a href="tel: 0123-456-7890" class="btn"><img src="{{ URL::asset('images/ico_phone.png') }}" alt="">0123-456-7890</a>
            <div>平日 00:00-00:00</div>
          </div>
        </div>
      </div>
    </header>
    <div id="fullpage" class="home">
      <div class="section hero">
        <div class="slide-content">
          <h1>
            キャッチコピーあああ
            ああああああ
          </h1>
          <p>
            ショルダーコピーショルダーコピーショルダーコピー
            ショルダーコピーショルダーコピー<br>
            ショルダーコピーショルダーコピーショルダーコピー
            ショルダーコピー
          </p>
        </div>
        <div class="slide">
        </div>
        <div class="slide">
        </div>
        <div class="slide">
        </div>
        <div class="slide">
        </div>
      </div>
      <div class="section support">
        <div class="content">
          <h2 class="sec-ttl">SUPPORT</h2>
          <div class="link-group">
            <a href="" class="btn">経営支援</a>
            <a href="" class="btn">経営支援</a>
            <a href="" class="btn">部材支援</a>
          </div>
        </div>
      </div>
      <div class="section philosophy">
        <div class="content">
          <h2 class="sec-ttl">W-APARTMENTとは？</h2>
          <div class="philosophy-content">
            <h3>大手金融機関も導入する<br>
              万全のセキュリティ対策</h3>
            <p>
              テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
<br>
テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
            </p>
            <a href="" class="btn sec-link-btn"><img src="{{ URL::asset('images/ico_arrow-right.png') }}" alt=""></a>
          </div>
        </div>
      </div>
      <div class="section news">
        <div class="content">
          <h2 class="sec-ttl">NEWS</h2>
          <div class="news-content">
            <article class="home-article">
              <div class="home-article-left">
                <h3>売上が100%向上。</h3>
                <figure>
                  <img src="{{ URL::asset('images/top_news.png') }}" alt="">
                </figure>
              </div>
              <div class="home-article-right">
                <div class="news-date">2021.01.01</div>
                <div class="article-logo">
                  <img src="{{ URL::asset('images/business_logo.png') }}" alt="">
                  <span>株式会社〇〇〇〇〇〇〇〇〇</span>
                </div>
                <div class="article-content">
                  <div><span>業種○○○</span></div>
                  <div><span>従業員数○○○○○</span></div>
                  <div><span>課題○○○○○○○○○○○○○○</span></div>
                </div>
              </div>
            </article>
            <article class="home-article">
              <div class="home-article-left">
                <h3>売上が100%向上。</h3>
                <figure>
                  <img src="{{ URL::asset('images/top_news.png') }}" alt="">
                </figure>
              </div>
              <div class="home-article-right">
                <div class="news-date">2021.01.01</div>
                <div class="article-logo">
                  <img src="{{ URL::asset('images/business_logo.png') }}" alt="">
                  <span>株式会社〇〇〇〇〇〇〇〇〇</span>
                </div>
                <div class="article-content">
                  <div><span>業種○○○</span></div>
                  <div><span>従業員数○○○○○</span></div>
                  <div><span>課題○○○○○○○○○○○○○○</span></div>
                </div>
              </div>
            </article>
            <article class="home-article">
              <div class="home-article-left">
                <h3>売上が100%向上。</h3>
                <figure>
                  <img src="{{ URL::asset('images/top_news.png') }}" alt="">
                </figure>
              </div>
              <div class="home-article-right">
                <div class="news-date">2021.01.01</div>
                <div class="article-logo">
                  <img src="{{ URL::asset('images/business_logo.png') }}" alt="">
                  <span>株式会社〇〇〇〇〇〇〇〇〇</span>
                </div>
                <div class="article-content">
                  <div><span>業種○○○</span></div>
                  <div><span>従業員数○○○○○</span></div>
                  <div><span>課題○○○○○○○○○○○○○○</span></div>
                </div>
              </div>
            </article>
            <article class="home-article">
              <div class="home-article-left">
                <h3>売上が100%向上。</h3>
                <figure>
                  <img src="{{ URL::asset('images/top_news.png') }}" alt="">
                </figure>
              </div>
              <div class="home-article-right">
                <div class="news-date">2021.01.01</div>
                <div class="article-logo">
                  <img src="{{ URL::asset('images/business_logo.png') }}" alt="">
                  <span>株式会社〇〇〇〇〇〇〇〇〇</span>
                </div>
                <div class="article-content">
                  <div><span>業種○○○</span></div>
                  <div><span>従業員数○○○○○</span></div>
                  <div><span>課題○○○○○○○○○○○○○○</span></div>
                </div>
              </div>
            </article>
            <a href="{{ url('/news') }}" class="btn sec-link-btn"><img src="{{ URL::asset('images/ico_arrow-right.png') }}" alt=""></a>
          </div>
        </div>
      </div>
      <div class="section service">
        <div class="content">
          <h2 class="sec-ttl">SERVICE</h2>
          <div class="service-content">
            <img src="{{ URL::asset('images/top_support.png') }}" alt="">
            <img src="{{ URL::asset('images/top_support.png') }}" alt="">
            <img src="{{ URL::asset('images/top_support.png') }}" alt="">
            <img src="{{ URL::asset('images/top_support.png') }}" alt="">
            <img src="{{ URL::asset('images/top_support.png') }}" alt="">
            <img src="{{ URL::asset('images/top_support.png') }}" alt="">
            <img src="{{ URL::asset('images/top_support.png') }}" alt="">
            <img src="{{ URL::asset('images/top_support.png') }}" alt="">
          </div>
        </div>
      </div>
      <div class="section case">
        <div class="content">
          <h2 class="sec-ttl">事例</h2>
          <div class="news-content">
            <article class="home-article">
              <div class="home-article-left">
                <h3>売上が100%向上。</h3>
                <figure>
                  <img src="{{ URL::asset('images/top_news.png') }}" alt="">
                </figure>
              </div>
              <div class="home-article-right">
                <div class="article-logo">
                  <img src="{{ URL::asset('images/business_logo.png') }}" alt="">
                  <span>株式会社〇〇〇〇〇〇〇〇〇</span>
                </div>
                <div class="article-content">
                  <div><span>業種○○○</span></div>
                  <div><span>従業員数○○○○○</span></div>
                  <div><span>課題○○○○○○○○○○○○○○</span></div>
                </div>
              </div>
            </article>
            <article class="home-article">
              <div class="home-article-left">
                <h3>売上が100%向上。</h3>
                <figure>
                  <img src="{{ URL::asset('images/top_news.png') }}" alt="">
                </figure>
              </div>
              <div class="home-article-right">
                <div class="article-logo">
                  <img src="{{ URL::asset('images/business_logo.png') }}" alt="">
                  <span>株式会社〇〇〇〇〇〇〇〇〇</span>
                </div>
                <div class="article-content">
                  <div><span>業種○○○</span></div>
                  <div><span>従業員数○○○○○</span></div>
                  <div><span>課題○○○○○○○○○○○○○○</span></div>
                </div>
              </div>
            </article>
            <article class="home-article">
              <div class="home-article-left">
                <h3>売上が100%向上。</h3>
                <figure>
                  <img src="{{ URL::asset('images/top_news.png') }}" alt="">
                </figure>
              </div>
              <div class="home-article-right">
                <div class="article-logo">
                  <img src="{{ URL::asset('images/business_logo.png') }}" alt="">
                  <span>株式会社〇〇〇〇〇〇〇〇〇</span>
                </div>
                <div class="article-content">
                  <div><span>業種○○○</span></div>
                  <div><span>従業員数○○○○○</span></div>
                  <div><span>課題○○○○○○○○○○○○○○</span></div>
                </div>
              </div>
            </article>
            <article class="home-article">
              <div class="home-article-left">
                <h3>売上が100%向上。</h3>
                <figure>
                  <img src="{{ URL::asset('images/top_news.png') }}" alt="">
                </figure>
              </div>
              <div class="home-article-right">
                <div class="article-logo">
                  <img src="{{ URL::asset('images/business_logo.png') }}" alt="">
                  <span>株式会社〇〇〇〇〇〇〇〇〇</span>
                </div>
                <div class="article-content">
                  <div><span>業種○○○</span></div>
                  <div><span>従業員数○○○○○</span></div>
                  <div><span>課題○○○○○○○○○○○○○○</span></div>
                </div>
              </div>
            </article>
            <a href="{{ url('/case-study') }}" class="btn sec-link-btn"><img src="{{ URL::asset('images/ico_arrow-right.png') }}" alt=""></a>
          </div>
        </div>
      </div>
      <div class="section flow">
        <div class="content">
          <h2 class="sec-ttl">ご契約の流れ</h2>
          <div class="flow-content">
            <div class="flow-wrap">
              <img src="{{ URL::asset('images/ico_flow01.png') }}" alt="">
              <h3>1<span>｜</span>ヒアリング</h3>
              <p>
                テキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
              </p>
            </div>
            <div class="flow-wrap">
              <img src="{{ URL::asset('images/ico_flow02.png') }}" alt="">
              <h3>2<span>｜</span>ご契約</h3>
              <p>
                テキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
              </p>
            </div>
            <div class="flow-wrap">
              <img src="{{ URL::asset('images/ico_flow03.png') }}" alt="">
              <h3>3<span>｜</span>利用開始</h3>
              <p>
                テキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="section blog">
        <div class="content">
          <h2 class="sec-ttl">ブログ</h2>
          <div class="blog-content">
            <div class="blog-wrap">
              <img src="{{ URL::asset('images/top_blog.png') }}" alt="">
              <div class="blog-inner">
                <div class="blog-info">
                  <a href="{{ url('/blog/recommend') }}" class="blog-category btn">カテゴリ</a>
                  <div class="blog-date">2021-07-01</div>
                </div>
                <a href="{{ url('/blog/') }}" class="blog-ttl">ブログタイトルテキストテキストテキストテキスト</a>
              </div>
            </div>
            <div class="blog-wrap">
              <img src="{{ URL::asset('images/top_blog.png') }}" alt="">
              <div class="blog-inner">
                <div class="blog-info">
                  <a href="{{ url('/blog/recommend') }}" class="blog-category btn">カテゴリ</a>
                  <div class="blog-date">2021-07-01</div>
                </div>
                <a href="{{ url('/blog/') }}" class="blog-ttl">ブログタイトルテキストテキストテキストテキスト</a>
              </div>
            </div>
            <div class="blog-wrap">
              <img src="{{ URL::asset('images/top_blog.png') }}" alt="">
              <div class="blog-inner">
                <div class="blog-info">
                  <a href="{{ url('/blog/recommend') }}" class="blog-category btn">カテゴリ</a>
                  <div class="blog-date">2021-07-01</div>
                </div>
                <a href="{{ url('/blog/') }}" class="blog-ttl">ブログタイトルテキストテキストテキストテキスト</a>
              </div>
            </div>
            <div class="blog-wrap">
              <img src="{{ URL::asset('images/top_blog.png') }}" alt="">
              <div class="blog-inner">
                <div class="blog-info">
                  <a href="{{ url('/blog/recommend') }}" class="blog-category btn">カテゴリ</a>
                  <div class="blog-date">2021-07-01</div>
                </div>
                <a href="{{ url('/blog/') }}" class="blog-ttl">ブログタイトルテキストテキストテキストテキスト</a>
              </div>
            </div>
            <div class="blog-wrap">
              <img src="{{ URL::asset('images/top_blog.png') }}" alt="">
              <div class="blog-inner">
                <div class="blog-info">
                  <a href="{{ url('/blog/recommend') }}" class="blog-category btn">カテゴリ</a>
                  <div class="blog-date">2021-07-01</div>
                </div>
                <a href="{{ url('/blog/') }}" class="blog-ttl">ブログタイトルテキストテキストテキストテキスト</a>
              </div>
            </div>
            <div class="blog-wrap">
              <img src="{{ URL::asset('images/top_blog.png') }}" alt="">
              <div class="blog-inner">
                <div class="blog-info">
                  <a href="{{ url('/blog/recommend') }}" class="blog-category btn">カテゴリ</a>
                  <div class="blog-date">2021-07-01</div>
                </div>
                <a href="{{ url('/blog/') }}" class="blog-ttl">ブログタイトルテキストテキストテキストテキスト</a>
              </div>
            </div>
          </div>
          <a href="{{ url('/blog/') }}" class="btn sec-link-btn"><img src="{{ URL::asset('images/ico_arrow-right.png') }}" alt=""></a>
        </div>
      </div>
      <div class="content-line"></div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.1.2/vendors/scrolloverflow.min.js" integrity="sha512-pYyQWhzi2lV+RM4GmaUA56VPL48oLVvsHmP9tuQ8MaZMDHomVEDjXXnfSVKXayy+wLclKPte0KbsuVoFImtE7w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.1.2/fullpage.min.js" integrity="sha512-gSf3NCgs6wWEdztl1e6vUqtRP884ONnCNzCpomdoQ0xXsk06lrxJsR7jX5yM/qAGkPGsps+4bLV5IEjhOZX+gg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ URL::asset('js/common.js') }}" async defer></script>
    <script src="{{ URL::asset('js/top.js') }}" async defer></script>
  </body>
</html>