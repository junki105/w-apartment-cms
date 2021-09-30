(function($) {
  $("#menu_btn").click(function() {
    $(this).toggleClass("opened");
    $('#site_menu').toggleClass('menu-open');
  });

})(jQuery);