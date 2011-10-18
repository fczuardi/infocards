(function($) {
  var PAGINATION_INTERVAL = 6 * 1000; //6 seconds
  var autoPaginationInterval = 0;
  function resetAutoPagination(){
    clearInterval(autoPaginationInterval);
    autoPaginationInterval = setInterval(function(){
      var currentPanelIndex = $('#destaques ul').data('selected-panel'),
          totalPanels = $('#destaques ul li').length,
          nextPanelIndex = (currentPanelIndex + 1) % totalPanels;
      $('#destaques nav li a[data-index="'+nextPanelIndex+'"]').click();
    }, PAGINATION_INTERVAL);
  }
	$(document).ready( function() {
    $('#destaques nav li a').click(function(e){
      e.preventDefault();
      this.blur();
      var index = $(this).data('index');
      $('#destaques nav li, #destaques .panel').removeClass('active');
      $(this).parents('li').addClass('active');
      $('#destaques .panel.p'+index).addClass('active');
      $('#destaques ul').css('left', -797 * index);
      $('#destaques ul').data('selected-panel', index);
      resetAutoPagination();
    });
    resetAutoPagination();
	});
})(jQuery);