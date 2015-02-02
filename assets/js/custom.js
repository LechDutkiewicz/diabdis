(function ($) {
    $('#content').infinitescroll({
      navSelector  : "nav.post-nav", // selector for the paged navigation (it will be hidden)
      nextSelector : ".post-nav .pager .previous a", // selector for the NEXT link (to page 2)
      itemSelector : "#content article.post" // selector for all items you'll retrieve
    });
    $(window).unbind('.infscr');
    $('#more').click(function(){
      //$(document).trigger('retrieve.infscr');
      $('#content').infinitescroll('retrieve');
      return false;
    });
    $(document).ajaxError(function(e,xhr,opt){
      if(xhr.status===404) {
        $('#more').remove();
      }
    });
  $(document).ready(function(){
    $('#pagination').hide();
  });
/*$('#more').click(function(){
  alert('start');
  $(document).load('/page/2/ #content article', function(){
    $(this).appendTo('#content');
    alert('done');
  });
});*/
})(jQuery);