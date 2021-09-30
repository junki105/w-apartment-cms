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
    <header class="header request-header">
      <h1 class="logo"><a href="{{ url('/') }}"><img src="{{ URL::asset('images/logo.png') }}" alt=""></a></h1>
      <div class="header-aside">
        <div class="menu-btn" id="menu_btn">
          <div></div>
          <div></div>
          <div></div>
        </div>
        <div class="line"></div>
        <div id="num" class="slide-number">REQUEST</div>
      </div>
      <div class="header-aside">
        <a href="" class="login-btn"><img src="{{ URL::asset('images/ico_login.png') }}" alt=""></a>
        <div class="header-aside-txt">
          <span class="btn">説明会情報</span>
          <img src="{{ URL::asset('images/side_link.png') }}" alt="">
          <span class="btn">資料請求</span>
        </div>
        <div class="copyright">
          © W-APARTMENT
        </div>
        <div class="line"></div>
      </div>
      <a href="#list" id="moveDown" class="btn scroll-btn">
        SCROLL
        <img src="{{ URL::asset('images/ico_arrow_down.png') }}" alt="">
      </a>
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
    <main class="container request">
      <section class="content sec-hero">
        <h1>資料請求</h1>
        <p>
          弊社のサービスに興味を持って頂きありがとうございます。<br>
サービスの詳細について資料を配信しておりますので下記のフォームよりご請求ください。<br>
お電話からのご請求も承っておりますのでご連絡ください。
        </p>
      </section>
      <section class="content">
        <div class="request-address">
          お電話でのお問い合わせはこちら
          <span>0123-456-7890</span>
          <span>平日  00:00~00:00</span>
        </div>
        <form action="" class="request-form">
          <div class="input-group">
            <label for="">会社名*</label>
            <input type="text" placeholder="入力してください">
          </div>
          <div class="input-group">
            <label for="">氏名*</label>
            <input type="text" placeholder="入力してください">
          </div>
          <div class="input-group">
            <label for="">メールアドレス*</label>
            <input type="text" placeholder="入力してください">
          </div>
          <div class="input-group">
            <label for="">電話番号*</label>
            <input type="text" placeholder="入力してください">
          </div>
          <div class="input-group">
            <label for="">資料請求の目的を選択してください*</label>
            <div class="radio-group">
              <label class="radio-container">ーーーーに課題がある
                <input type="radio" checked="checked" name="radio">
                <span class="checkmark"></span>
              </label>
              <label class="radio-container">ーーーーに興味がある
                <input type="radio" name="radio">
                <span class="checkmark"></span>
              </label>
              <label class="radio-container">その他
                <input type="radio" name="radio">
                <span class="checkmark"></span>
              </label>              
            </div>
          </div>
          <div class="input-group textarea-group">
            <label for="">ご相談、要望などあればご記入ください</label>
            <textarea name="" id="" placeholder="入力してください"></textarea>
          </div>
          <div class="privacy">
            <div class=""><a href="">プライバシーポリシー</a>に同意の上、送信ください。</div>
            <div class="radio-group">
              <label class="radio-container">プライバシーポリシーに同意する
                <input type="radio" name="radio">
                <span class="checkmark"></span>
              </label>
            </div>
          </div>
          <div class="btn-container">
            <button type="submit" class="btn hover-spacing-btn">送信する<img src="{{ URL::asset('images/ico_triangle.png') }}" alt=""></button>
          </div>
        </form>
      </section>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.1.2/fullpage.min.js" integrity="sha512-gSf3NCgs6wWEdztl1e6vUqtRP884ONnCNzCpomdoQ0xXsk06lrxJsR7jX5yM/qAGkPGsps+4bLV5IEjhOZX+gg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ URL::asset('js/common.js') }}" async defer></script>
  </body>
</html>