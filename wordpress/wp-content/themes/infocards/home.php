<?php
/**
 * Template Name: Infocards Home
 */
get_header();
?>
<?php
$args = array(
  'tax_query' => array( array(
      'taxonomy' => 'post_format',
      'field' => 'slug',
      'terms' => 'post-format-link'
    ))
);
$destaques = query_posts( $args );
foreach ($destaques as $destaque){
  $args = array( 'post_type' => 'attachment', 'numberposts' => 2, 'post_status' => null, 'post_parent' => $destaque->ID ); 
  $attachments = get_posts($args);
  foreach ($attachments as $attachment){
    if (($attachment->post_excerpt == 'reflexo') || (strrpos($attachment->post_name, '_reflexo') !== FALSE)){
      $destaque->reflection = $attachment;
    }else {
      $destaque->picture = $attachment;
    }
  }
}

function getPageId($slug){
  $args=array(
    'name' => $slug,
    'post_type' => 'page',
    'post_status' => 'publish',
    'showposts' => 1,
    'caller_get_posts'=> 1
  );
  $my_posts = get_posts($args);
  if( $my_posts ) { $result = $my_posts[0]->ID; }
  return $result;
}
$secoes = array(); 
$secoes_IDs = array(getPageId('produtos'), getPageId('servicos'), getPageId('clientes'));
foreach ($secoes_IDs as $parentID){
  $args = array(
    'child_of'     => $parentID,
    'title_li'     => '',
    'echo'         => 0,
    'sort_column'  => 'menu_order, post_title',
  );
  $secoes[] = wp_list_pages( $args );
}
?>
<div id="primary">
  <div id="content" role="main">
    <div id="destaques">
      <ul><?php
      $is_first = TRUE;
      foreach ($destaques as $destaque){?>
        <li <?php if ($is_first){ echo 'class="active"';}?>>
          <?php if(isset($destaque->picture) && isset($destaque->reflection)){ 
          echo wp_get_attachment_image( $destaque->picture->ID , 'full', 0, array('class'=>"") );
          echo wp_get_attachment_image( $destaque->reflection->ID , 'full', 0, array('class'=>"reflection") ); ?>
          <div class="with-picture">
          <?php }else{?>
          <div>
          <?php }?>
            <?php echo $destaque->post_content; ?>
          </div>
          <div class="more-btn-reflection with-picture"></div>
        </li>
      <?php
        $is_first = FALSE;
      }
      ?>
      </ul>
      <div id="base-cover"></div>
    </div>
    <div class="box" id="produtos">
      <h3>conheça nossos</h3>
      <h2><a href="<?php echo esc_url( home_url( '/produtos' ) ); ?>">Produtos</a></h2>
      <ul>
        <?php echo $secoes[0]; ?>
      </ul>
    </div>
    <div class="box" id="servicos">
      <h3>conheça nossos</h3>
      <h2><a href="<?php echo esc_url( home_url( '/servicos' ) ); ?>">Serviços</a></h2>
      <ul>
        <?php echo $secoes[1]; ?>
      </ul>
    </div>
    <div class="box" id="clientes">
      <h3>conheça nossos</h3>
      <h2><a href="<?php echo esc_url( home_url( '/clientes' ) ); ?>">Clientes</a></h2>
      <ul>
        <?php echo $secoes[2]; ?>
      </ul>
    </div>
  </div><!-- #content -->
</div><!-- #primary -->
<?php get_footer(); ?>