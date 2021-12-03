@include('layouts.header')
<main class="container request">
  <section class="content sec-hero">
    <h1>資料請求</h1>
    <p>
        弊社に興味を持って頂き<br class="hidden sm:block">ありがとうございます。<br>
    商談やサービスのご利用について<br class="hidden sm:block">下記のフォームより<br class="hidden sm:block">お問い合わせください。<br>
    お電話からのご相談も<br class="hidden sm:block">承っておりますのでご連絡ください。
    </p>
  </section>
  <section class="content">
    <div class="request-address">
      お電話でのお問い合わせはこちら
      <span>0123-456-7890</span>
      <span>平日  00:00~00:00</span>
    </div>
    <form  class="request-form" method="POST" action="/contact">
    @csrf
      <div class="input-group">
        <label for="">会社名*</label>
        <input type="text" name = "companyName" id = "companyName" placeholder="入力してください">
        <span class="text-danger">{{ $errors->first('companyName')!= ""? "*必須項目に入力してください。":"" }}</span>
      </div>
      <div class="input-group">
        <label for="">氏名*</label>
        <input type="text" name = "name" id = "name" placeholder="入力してください">
        <span class="text-danger">{{ $errors->first('name')!= ""? "*必須項目に入力してください。":"" }}</span>
      </div>
      <div class="input-group">
        <label for="">メールアドレス*</label>
        <input type="text" type = "email" name = "email" id = "email" placeholder="入力してください">
        <span class="text-danger">{{ $errors->first('email')!= ""? "*必須項目に入力してください。":"" }}</span>
      </div>
      <div class="input-group">
        <label for="">電話番号*</label>
        <input type="text" id = "phoneNumber" name = "phoneNumber" placeholder="入力してください">
        <span class="text-danger">{{ $errors->first('phoneNumber')!= ""? "*必須項目に入力してください。":"" }}</span>
      </div>
      <div class="input-group">
        <label for="">資料請求の目的を選択してください*</label>
        <div class="radio-group">
          <label class="radio-container">ーーーーに課題がある
            <input type="radio" value = "ーーーーに課題がある" checked="checked" name="purpose">
            <span class="checkmark"></span>
          </label>
          <label class="radio-container">ーーーーに興味がある
            <input type="radio" value = "ーーーーに興味がある" name="purpose">
            <span class="checkmark"></span>
          </label>
          <label class="radio-container">その他
            <input type="radio" value = "その他" name="purpose">
            <span class="checkmark"></span>
          </label>              
        </div>
      </div>
      <div class="input-group textarea-group">
        <label for="">ご相談、要望などあればご記入ください</label>
        <textarea  id="content" name = "content" placeholder="入力してください"></textarea>
        <span class="text-danger">{{ $errors->first('content')!= ""? "*必須項目に入力してください。":"" }}</span>
      </div>
      <div class="privacy">
        <div class=""><a href="">プライバシーポリシー</a><br class="hidden sm:block">に同意の上、送信ください。</div>
        <div class="radio-group">
          <label class="radio-container">プライバシーポリシーに同意する
            <input type="radio" name="agree" value = "agree">
            <span class="checkmark"></span>
          </label>
        </div>
        <span class="text-danger">{{ $errors->first('agree')!= ""? "*必須項目に入力してください。":"" }}</span>
      </div>
      <div class="btn-container">
        <button type="submit" id = "submit" class="btn hover-spacing-btn">送信する<img src="{{ URL::asset('images/ico_triangle.png') }}" alt=""></button>
      </div>
    </form>
  </section>
  @include('layouts.footer-sub')
</main>
@include('layouts.footer')
