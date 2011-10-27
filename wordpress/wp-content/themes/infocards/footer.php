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
    <div class="abas">
      <ul>
        <li <?php if ($post->post_name == 'produtos'){ echo 'class="disabled"';} ?>>
          conheça nossos <a href="<?php echo esc_url( home_url( '/produtos' ) ); ?>">Produtos</a>
        </li>
        <li <?php if ($post->post_name == 'servicos'){ echo 'class="disabled"';} ?>>
          conheça nossos <a href="<?php echo esc_url( home_url( '/servicos' ) ); ?>">Serviços</a>
        </li>
        <li <?php if ($post->post_name == 'clientes'){ echo 'class="disabled"';} ?>>
          conheça nossos <a href="<?php echo esc_url( home_url( '/clientes' ) ); ?>">Clientes</a>
        </li>
        <li class="last">
          entre em <strong>Contato</strong>
        </li>
      </ul>
    </div>
	  <div class="top">
	    <ul class="adr">
	      <li>Endereço: <span class="street-address"><a href="http://maps.google.com/maps?q=Av.+S%C3%A3o+Gabriel,+495+S%C3%A3o+Paulo+-+SP&hl=en&ie=UTF8&ll=-23.580458,-46.670694&spn=0.01062,0.013089&sll=-23.580439,-46.670694&sspn=0.01062,0.013089&vpsrc=0&hnear=Av.+S%C3%A3o+Gabriel,+495+-+Itaim+Bibi,+S%C3%A3o+Paulo,+01435-001,+Brazil&t=m&z=17" target="_blank">Av. São Gabriel, 495 1º Andar</a></span> - <span class="locality">São Paulo</span> - <span class="region">SP</span></li>
	      <li>|</li>
	      <li>Email: <a href="mailto:contato@infocards.com.br">contato@infocards.com.br</a></li>
	      <li>|</li>
	      <li>Fone: <a class="tel" href="tel:+55-11-30791466">(11) 3079-1466</a></li>
	    </ul>
	  </div>
	  <div class="sitemap">
			<?php wp_nav_menu( array( 
                          'menu' => 'sitemap', 
                          'container' => 'div', 
                          'container_class' => 'menu', 
                          'menu_class' => ''
                          ) ); ?>
	  </div>
	</footer><!-- #colophon -->
</div><!-- #page -->
<script src="<?php echo get_template_directory_uri(); ?>/js/prefixfree.min.js" type="text/javascript"></script>
<!--[if lt IE 8 ]>
<script defer src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
<script defer>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
<![endif]-->

<?php wp_footer(); ?>

</body>
</html>