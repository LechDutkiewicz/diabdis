(function ($) {

  function resizeModal(modal) {
    var ch = modal.elements.content.innerHeight(),
    hh = modal.elements.header.innerHeight(),
    fh = modal.elements.footer.innerHeight(),
    bh = ch - (hh + fh);
    modal.elements.body.innerHeight( bh );
  }

  $('.infi-scr-container').infinitescroll({
      navSelector  : "nav.post-nav", // selector for the paged navigation (it will be hidden)
      nextSelector : ".post-nav .pager .previous a", // selector for the NEXT link (to page 2)
      itemSelector : ".infi-scr-container article.post", // selector for all items you'll retrieve
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

  // change modal title

  $('[data-dismiss="modal"]').click(function(){
    var modal = $('#modal'),
    modalBody = modal.find('.modal-body');

    modalBody.removeClass('loading');
  });

  $('[data-toggle="modal"]').click(function(){

    var template = $(this).attr('data-template'),
    modal = $('#modal'),
    modalContent = modal.find('.modal-content'),
    modalHeader = modal.find('.modal-header'),
    modalBody = modal.find('.modal-body'),
    modalFooter = modal.find('.modal-footer');

    var data = {
      'action': 'modal_load',
      'template': template
    };

    $.post(ajaxurl, data, function(response) {
      if (modal.attr('data-template') !== template) {
        modalBody.addClass('loading');
        modal.attr('data-template', template);
        modalBody.html(response).removeClass('loading');
        modalContainer.resize();
      }

    });

/*$.post(ajaxurl, data, function(response) {
  if (modal.container.body.attr('data-template') !== template) {
    modal.elements.body.addClass('loading');
    modal.container.body.attr('data-template', template);
    modal.elements.body.html(response).removeClass('loading');
    modal.resize();
  }

});*/

});

$('#modal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget),
  recipient = button.data('title'),
  modal = $(this);

  modal.find('.modal-title').text(recipient);

});

// Lisf of contents scroll

listOfContents = {
  args: {
    article: $('main > article'),
    list: $('aside.list-of-contents'),
    elements: $('aside.list-of-contents a'),
  },
  init: function() {
    listOfContents.args.elements.bind('click', function(){
      var targetID = $(this).attr('data-target'),
      target = listOfContents.args.article.find('#' + targetID);
      //alert(listOfContents.args.article.find('#' + target).html());
      $('body, html').animate({
        scrollTop: target.offset().top-70
      });
    });
  }
};

listOfContents.init();


$(document).ready(function(){

  //$('#pagination').hide();

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