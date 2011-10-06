<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

	</div><!-- #main -->

	<footer id="colophon" role="contentinfo">
	  <div class="top">
	    <ul>
	      <li>Endereço: Av. São Gabriel, 495 1º Andar - São Paulo - SP</li>
	      <li>|</li>
	      <li>Email: contato@infocards.com.br</li>
	      <li>|</li>
	      <li>Fone: (11) 3079-1466</li>
	    </ul>
	  </div>
	  <div class="sitemap">
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
	  </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>