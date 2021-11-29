(function($) {
  $("#menu_btn").click(function() {
    $(this).toggleClass("opened");
    $('#site_menu').toggleClass('menu-open');
    $('#num').toggleClass('hidden-sp-open');
    $('#aside_left>.line').toggleClass('hidden-sp-open');
    $('#fp-nav').toggleClass('hidden-sp-open');
  });
  $("#house_menu_btn").click(function() {
    $(this).toggleClass("opened");
    $('#house_site_menu').toggleClass('menu-open');
    $('#num_house').toggleClass('hidden-sp-open');
    $('#aside_left_house>.line').toggleClass('hidden-sp-open');
    $('#fp-nav').toggleClass('hidden-sp-open');
    $('#minimal_title').toggleClass('hidden-sp-open');
  });

})(jQuery);