(function ($) {
  $(document).ready(function(){
    $('#content').infinitescroll({

      navSelector  : "nav.post-nav",            
                   // selector for the paged navigation (it will be hidden)
                   nextSelector : ".post-nav .pager .previous a",    
                   // selector for the NEXT link (to page 2)
                   itemSelector : "#content article.post"          
                   // selector for all items you'll retrieve
                 });
  });
})(jQuery);