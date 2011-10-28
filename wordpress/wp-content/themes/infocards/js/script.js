(function($) {
var PAGINATION_INTERVAL = 6 * 1000, //6 seconds
    autoPaginationInterval = 0,
    is_iPhone = (navigator.userAgent.match(/iPhone/i) !== null),
    is_iPad = (navigator.userAgent.match(/iPad/i) !== null),
    is_webApp = (window.navigator.standalone === true);


function changeViewport(){
  if (is_iPhone || is_iPad) {
    var viewportmeta = document.querySelector('meta[name="viewport"]');
    if (viewportmeta) {
      if (is_iPhone){
        viewportmeta.content = "width=device-width; initial-scale=0.33, maximum-scale=0.33";
      } else if (is_iPad){
        viewportmeta.content = "width=768,initial-scale=1,maximum-scale=1";
      }
      //give back to the user the ability to pinch zoom
      document.body.addEventListener('touchstart', function() {
        viewportmeta.content = 'width=device-width, minimum-scale=0.25, maximum-scale=1.6';
        document.body.removeEventListener('touchstart');
      }, false);
    }
  }
}

function resetAutoPagination(){
  clearInterval(autoPaginationInterval);
  autoPaginationInterval = setInterval(function(){
    var currentPanelIndex = $('#destaques ul').data('selected-panel'),
        totalPanels = $('#destaques ul li').length,
        nextPanelIndex = (currentPanelIndex + 1) % totalPanels;
    $('#destaques nav li a[data-index="'+nextPanelIndex+'"]').click();
  }, PAGINATION_INTERVAL);
}

function destaquenavButtonClick(e){
  e.preventDefault();
  this.blur();
  var index = $(this).data('index');
  $('#destaques nav li, #destaques .panel').removeClass('active');
  $(this).parents('li').addClass('active');
  $('#destaques .panel.p'+index).addClass('active');
  $('#destaques ul').css('left', -850 * index);
  $('#destaques ul').data('selected-panel', index);
  resetAutoPagination();
}

function fixIECorners(){
  if ($('html').hasClass('oldie')){
    var settings = {
      tl: { radius: 12 },
      tr: { radius: 12 },
      bl: { radius: 12 },
      br: { radius: 12 },
      antiAlias: true
    }
    $('body.slug-home .box, article.slug-tecnologia .entry-content .section, article.page, blockquote').each(function(index, element){
      curvyCorners(settings, element);
    });
  }
}

//init
$(document).ready( function() {
  $(window).load(function() { $('body').addClass('ready'); });
  $('#destaques nav li a').click(destaquenavButtonClick);
  changeViewport();
  fixIECorners();
  if ($('body').hasClass('slug-home')){ resetAutoPagination(); }
});

})(jQuery);