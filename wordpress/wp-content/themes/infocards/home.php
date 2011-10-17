<?php
/**
 * Template Name: Infocards Home
 */
get_header();
?>
<?php
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