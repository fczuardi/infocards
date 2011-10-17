(function($) {
	$(document).ready( function() {
    $('#destaques nav li a').click(function(e){
      e.preventDefault();
      var index = $(this).data('index');
      $('#destaques nav li a, #destaques .panel').removeClass('active');
      $(this).addClass('active');
      $('#destaques .panel.'+index).addClass('active');
      $('#destaques ul').css('left', -770 * index);
    });
	});
})(jQuery);