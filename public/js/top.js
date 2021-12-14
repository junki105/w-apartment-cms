(function($) {
  var url = window.location.origin;

  function asideColorWhite () {
    $('#aside_left').css('color','white');
    $('#aside_right').css('color','white');
    $('.line').css('border-color','white');
    $('#menu_btn>div').css('background-color','white');
    $('#fp-nav>ul>li>a>span').css('background-color','rgba(255, 255, 255, 0.35)');
    $('#fp-nav>ul>li>.active>span').css('background-color','#506285');
  }

  function asideColorBlack () {
    $('#aside_left').css('color','black');
    $('#aside_right').css('color','black');
    $('.line').css('border-color','black');
    $('#menu_btn>div').css('background-color','black');
    $('#fp-nav>ul>li>a>span').css('background-color','rgba(0, 0, 0, 0.35)');
    $('#fp-nav>ul>li>.active>span').css('background-color','#506285');
  }

  function moveBtnWhite () {
    $('#moveLeft').css('color','white');
    $('#moveRight').css('color','white');
    $('#moveDown').css('color','white');
    $('#moveLeft>img').attr('src', '' + url + '/images/ico_prev_white.png');
    $('#moveRight>img').attr('src', '' + url + '/images/ico_next_white.png');
    $('#moveDown>img').attr('src', '' + url + '/images/ico_arrow_down_white.png');
    $('#login_img').attr('src', '' + url + '/images/ico_login_white.png');
    $('#side_link').attr('src', '' + url + '/images/side_link_white.png');
  }

  function moveBtnBlack () {
    $('#moveLeft').css('color','black');
    $('#moveRight').css('color','black');
    $('#moveDown').css('color','black');
    $('#moveLeft>img').attr('src', '' + url + '/images/ico_prev.png');
    $('#moveRight>img').attr('src', '' + url + '/images/ico_next.png');
    $('#moveDown>img').attr('src', '' + url + '/images/ico_arrow_down.png');
    $('#login_img').attr('src', '' + url + '/images/ico_login.png');
    $('#side_link').attr('src', '' + url + '/images/side_link.png');
  }

  function logoWhite () {
    $('#logo').attr('src', '' + url + '/images/logo_white.png');
  }

  function logoBlack () {
    $('#logo').attr('src', '' + url + '/images/logo.png');
  }

  function contentLineWhite () {
    $('.content-line').show();
    $('.content-line').css('background-color','#ffffff50');
  }

  function contentLineBlack () {
    $('.content-line').show();
    $('.content-line').css('background-color','#00000050');
  }
  // fullpage customization
  $('#fullpage').fullpage({
    sectionSelector: '.section',
    slideSelector: '.slide',
    navigation: true,
    navigationPosition: 'left',
    slidesNavigation: false,
    controlArrows: false,
    loopBottom: true,
    scrollOverflow: true,
    anchors: ['hero', 'support', 'philosophy', 'news', 'service', 'case', 'flow', 'blog'],
    menu: '#menu',
    afterLoad: function (hero) {
      var g_interval;

      var slideNumber = $('.fp-section.active').index() + 1;
      if (slideNumber > 9) {
        $('#num').html(slideNumber);
      }
      else {
        //This will change the input of NUM to current section number
        $('#num').html("0" + slideNumber);
      }

      clearInterval(g_interval);
      
      // 1000 milliseconds lapse
      const lapse = 5000;
      
      if(slideNumber == 1) {
        g_interval = setInterval(function () {
          $.fn.fullpage.moveSlideRight();
        }, lapse);
      }

      switch (slideNumber) {
        case 2:
          $('#aside_left').css('background-image','url(' + url + '/images/bg_side_left_support.png)');
          $('#aside_right').css('background-image','url(' + url + '/images/bg_side_right_support.png)');
          asideColorBlack();
          moveBtnBlack();
          logoBlack();
          $('.content-line').hide();

          break;
          
        case 4:
          $('#aside_left').css('background-image','url(' + url + '/images/bg_side_left_news.png)');
          $('#aside_right').css('background-image','url(' + url + '/images/bg_side_right_news.png)');
          asideColorBlack();
          moveBtnBlack();
          logoBlack();
          contentLineBlack();
          break;
        case 5:
          $('#aside_left').css('background-image','url(' + url + '/images/bg_side_left_black.png)');
          $('#aside_right').css('background-image','url(' + url + '/images/bg_side_right_black.png)');
          asideColorWhite();
          moveBtnWhite();
          logoWhite();
          contentLineWhite();
          break;
          
        case 6:
          $('#aside_left').css('background-image','url(' + url + '/images/bg_side_left.png)');
          $('#aside_right').css('background-image','url(' + url + '/images/bg_side_right.png)');
          asideColorBlack();
          moveBtnBlack();
          logoBlack();
          contentLineBlack();
          break;

        case 7:
          $('#aside_left').css('background-image','url(' + url + '/images/bg_side_left_black.png)');
          $('#aside_right').css('background-image','url(' + url + '/images/bg_side_right_black.png)');
          asideColorWhite();
          moveBtnWhite();
          logoBlack();
          $('.content-line').hide();
          break;
      
        default:
          $('#aside_left').css('background-image','url(' + url + '/images/bg_side_left.png)');
          $('#aside_right').css('background-image','url(' + url + '/images/bg_side_right.png)');
          asideColorBlack();
          moveBtnBlack();
          logoBlack();
          $('.content-line').hide();
          break;
      }
    }
    
  }); 
  // fullpage_api.setAllowScrolling(false);
  $.fn.fullpage.setAllowScrolling(false);

  $(document).on('click', '#moveRight', function(){
    // fullpage_api.moveSectionDown();
    $.fn.fullpage.moveSectionDown();

  });
  $(document).on('click', '#moveLeft', function(){
    $.fn.fullpage.moveSectionUp();
  });
  $(document).on('click', '#moveDown', function(){
    $.fn.fullpage.moveSectionDown();
  });

})(jQuery);

  