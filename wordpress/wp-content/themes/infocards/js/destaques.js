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
      var index = $(this).data('index');
      $('#destaques nav li a, #destaques .panel').removeClass('active');
      $(this).addClass('active');
      $('#destaques .panel.'+index).addClass('active');
      $('#destaques ul').css('left', -770 * index);
      $('#destaques ul').data('selected-panel', index);
      resetAutoPagination();
    });
    resetAutoPagination();
	});
})(jQuery);