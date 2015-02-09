(function ($) {

  $('#content').infinitescroll({
      navSelector  : "nav.post-nav", // selector for the paged navigation (it will be hidden)
      nextSelector : ".post-nav .pager .previous a", // selector for the NEXT link (to page 2)
      itemSelector : "#content article.post", // selector for all items you'll retrieve
      loading : {
        img: img,
        msgText: msgText,
        finishedMsg: finishedMsg,
      },
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

  $("button[data-toggle='modal']").click(function(){
    /*var chosenmethod = $(this).val();
  $.ajax({  
    type: 'GET',  
    url: '<?php echo admin_url('admin-ajax.php');?>',  
    data: { action : 'CCAjax', chosen : chosenmethod },  
    success: function(textStatus){  
       $( '.default-form' ).html( textStatus ); 
    },  
    error: function(MLHttpRequest, textStatus, errorThrown){  
        alert(errorThrown);  
    }  
  }); */ 
});

  // change modal title

  $('[data-toggle="modal"]').click(function(){

    var template = $(this).attr('data-template'),
    modal = $('#modal'),
    modalBody = modal.find('.modal-body');

    /*$.ajax({
      type:'post',
      url:modalBody,
      data:'template=' + template,
      statusCode: {
        404: function() {
          alert( "page not found" );
        }
      }
    }).done(function(html){
      if (modal.attr('data-template') !== template) {
        modal.attr('data-template', template).find('.modal-body').html(html);
      }
    });*/

  var data = {
    'action': 'modal_load',
    'template': template
  };

  modalBody.addClass('loading');

  $.post(ajaxurl, data, function(response) {
    if (modal.attr('data-template') !== template) {
      modal.attr('data-template', template);
      modalBody.html(response).removeClass('loading');
    }
  });

});

  $('#modal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget),
    recipient = button.data('title'),
    modal = $(this);

    modal.find('.modal-title').text(recipient);

  });


  $(document).ready(function(){

    $('#pagination').hide();

    catNavi = {
      args: {
        navi: $('.cat-navi'),
        items: $('.cat-navi > li:not(.active)'),
        //activeItems: $('.cat-navi > li.active')
      },
      init: function() {
        catNavi.setup();
      },
      setup: function() {
        /*catNavi.args.items.each(function() {
          catNavi.actions.makeUnactive($(this));
        });
        catNavi.args.activeItems.each(function() {
          catNavi.actions.makeActive($(this));
        });*/
catNavi.events();
},
actions: {
        /*makeActive : function(el) {
          color = el.attr('data-background-color');
          el.css({
            'background-color': color
          }).find('a').css({
            'color': '#FFFFFF'
          });
        },
        makeUnactive : function(el) {
          if (!el.hasClass('active')) {
            color = el.attr('data-background-color');
            el.css({
              'background-color': '#FFFFFF'
            }).find('a').css({
              'color': color
            });
          }
        }*/
      },
      events: function() {
        /*catNavi.args.items.bind('mouseenter', function() {
          catNavi.actions.makeActive($(this));
        });
        catNavi.args.items.bind('mouseleave', function() {
          catNavi.actions.makeUnactive($(this));
        });*/
catNavi.args.items.bind('mouseenter mouseleave', function(){
          //if (!$(this).hasClass('active')) {
            $(this).toggleClass('active');
          //}
        });
},
};
catNavi.init();

});
/*$('#more').click(function(){
  alert('start');
  $(document).load('/page/2/ #content article', function(){
    $(this).appendTo('#content');
    alert('done');
  });
});*/
})(jQuery);