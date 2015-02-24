/*
* GLOBAL ADD TIMEOUT PARAMETER TO EVENTS
*/

;(function ($) {
  var on = $.fn.on, timer;
  $.fn.on = function () {
    var args = Array.apply(null, arguments);
    var last = args[args.length - 1];

    if (isNaN(last) || (last === 1)) { return on.apply(this, args); }

    var delay = args.pop();
    var fn = args.pop();

    args.push(function () {
      var self = this, params = arguments;
      clearTimeout(timer);
      timer = setTimeout(function () {
        fn.apply(self, params);
      }, delay);
    });

    return on.apply(this, args);
  };
}(this.jQuery || this.Zepto));

/*
* TEMPLATE FUNCTIONS
*/

(function ($) {


  function setFocusIframe() {
    var iframe = $("#typeform")[0];
    iframe.contentWindow.focus();
  }

/*
* INFINITE SCROLL SETUP FOR POSTS FEED SECTIONS
*/

$('.infi-scr-container').infinitescroll({
      navSelector  : "nav.post-nav", // selector for the paged navigation (it will be hidden)
      nextSelector : ".post-nav .pager .previous a", // selector for the NEXT link (to page 2)
      itemSelector : ".infi-scr-container article.post", // selector for all items you'll retrieve
      animate      : true,
      loading : {
        img: img,
        msgText: msgText,
        finishedMsg: finishedMsg,
      },
    });

$(window).unbind('.infscr');

$('#more').click(function(){
  $('#content').infinitescroll('retrieve');
  return false;
});

$(document).ajaxError(function(e,xhr,opt){
  if(xhr.status===404) {
    $('#more').remove();
  }
});

/*
* MANAGE BOOTSTRAP MODALS
*/

  // AJAX LOAD TO MODAL

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


    if (modal.attr('data-template') !== template) {
      modalBody.html('').addClass('loading');
      if (template === 'typeform') {
        modalBody.animate({
          height: $(window).height() - 200 + 'px'
        });
      } else if (template === 'mailchimp') {
        modalBody.animate({
          height: '500px'
        });
      } else {
        modalBody.animate({
          height: '200px'
        });
      }
    }

    $.post(ajaxurl, data, function(response) {
      if (modal.attr('data-template') !== template) {
        modal.attr('data-template', template);
        modalBody.removeClass('loading').html(response);
      }

    });

  });

  // REMOVE LOADER ON MODAL CLOSE

  $('[data-dismiss="modal"]').click(function(){
    var modal = $('#modal'),
    modalBody = modal.find('.modal-body');

    modalBody.removeClass('loading');
  });

  // CHANGE MODAL TITLE ON OPEN

  $('#modal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget),
    recipient = button.data('title'),
    modal = $(this);

    modal.find('.modal-title').text(recipient);

  });

  $('#modal').on('shown.bs.modal', function (event) {
    modal = $(this);
    if (modal.attr('data-template') === 'typeform') {
      setTimeout(setFocusIframe, 100);
    } else {
      modal.find('.focus').focus();
    }
  });

/*
* MENAGE SCROLLING FOR LIST OF CONTENTS ON BLOG POSTS
*/

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
      $('body, html').animate({
        scrollTop: target.offset().top-70
      });
    });
  }
};

listOfContents.init();

/*
* DOCUMENT READY FUNCTIONS
*/

$(document).ready(function(){

/*
* CATEGORY MENU HOVER
*/

  catNavi = {
    args: {
      items: $('.cat-navi > li:not(.active)'),
    },
    init: function() {
      catNavi.setup();
    },
    setup: function() {
      catNavi.events();
    },
    events: function() {
      catNavi.args.items.bind('mouseenter mouseleave', function(){
        $(this).toggleClass('active');
      });
    },
  };

  catNavi.init();

  /*
  * SCROLL TO TOP
  */

  /*var scrlTop=$('#scroll-top');
  $(window).scroll(function(){
    if($(window).scrollTop()<10){
      scrlTop.fadeOut();
    } else {
      scrlTop.fadeIn();
    }
  });
  scrlTop.hover(
    function(){
      $(this).find('span').removeClass('hidden');
    },
    function(){
      $(this).find('span').addClass('hidden');
    }
    );
  scrlTop.click(function(){
    $("html, body").animate({
      scrollTop:0
    },300);
    return false;
  });*/

/*
* SIDEBAR POSITIONING
*/

/*sidebarSingle = {
  args: {
    container: $('aside.sidebar'),
    featuredContainer: $('.featured-content'),
    articleHeader: $('main > article > header'),
    content: $('.wrap > .content'),
    main: $('main'),
  },
  init: function() {
    sidebarSingle.reposition();
    sidebarSingle.show();
    sidebarSingle.resize();

    var hh = sidebarSingle.args.container.offset();

    sidebarSingle.scroll(hh);
  },
  getOffset: function() {
    var offset = {
      featuredTop: sidebarSingle.args.featuredContainer.height(),
      articleHeader: sidebarSingle.args.articleHeader.height()
    };
    return offset;
  },
  show: function() {
    sidebarSingle.args.container.removeClass('hidden').addClass('show');
  },
  reposition: function() {
    var cw= sidebarSingle.args.content.innerWidth(),
    mw= sidebarSingle.args.main.innerWidth();
      //alert(mw + '/' + cw);

      if ( cw !== mw ) {
        var hh = sidebarSingle.getOffset();

        sidebarSingle.args.container.css({
          'top': hh.articleHeader
        });
      } else {
        sidebarSingle.args.container.css({
          'margin-top': '0'
        });
      }
    },
    resize: function() {
      $(window).bind('resize', function(){
        sidebarSingle.reposition();
      });
    },
    scroll: function(hh) {
      $(window).bind('scroll', function(){

        var windowScroll = $(window).scrollTop(),
        possibleOffset = sidebarSingle.getOffset(),
        trueOffset = 0,
        move = 0,
        additionalOffset = 0;

        if ( possibleOffset.featuredTop > 0 ) {
          trueOffset = hh.top;
          move = windowScroll - trueOffset;
        } else if ( possibleOffset.articleHeader > 0 ) {
          trueOffset = possibleOffset.articleHeader;
          move = windowScroll;
          additionalOffset = possibleOffset.articleHeader;
        } else {
          trueOffset = 0;
          move = windowScroll;
        }

        if ( windowScroll > trueOffset ) {
          sidebarSingle.args.container.animate({
            'top': move - 50 + 'px'
          });
        } else {
          sidebarSingle.args.container.animate({
            'top': additionalOffset + 'px'
          });
        }

      },500);
    }
  };

  sidebarSingle.init();*/

});
})(jQuery);