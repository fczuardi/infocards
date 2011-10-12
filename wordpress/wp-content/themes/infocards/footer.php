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
	    <ul class="adr">
	      <li>Endereço: <span class="street-address">Av. São Gabriel, 495 1º Andar</span> - <span class="locality">São Paulo</span> - <span class="region">SP</span></li>
	      <li>|</li>
	      <li>Email: <a href="mailto:contato@infocards.com.br">contato@infocards.com.br</a></li>
	      <li>|</li>
	      <li>Fone: <a class="tel" href="tel:+55-11-30791466">(11) 3079-1466</a></li>
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