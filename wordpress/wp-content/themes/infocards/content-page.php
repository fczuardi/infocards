<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>
<?php
if ($post->post_name){
 $extraclasses = 'slug-'.$post->post_name;
}
$args = array( 'post_type' => 'attachment', 'numberposts' => -1, 'post_status' => null, 'post_parent' => $post->ID ); 
$attachments = get_posts($args);
if ($attachments) { 
  $extraclasses .= ' has-attachments';
  ?>
  <ul class="post-attachments">
  <?php
  foreach ( $attachments as $attachment ) { ?>
    <li><?php echo wp_get_attachment_image( $attachment->ID , 'full' ); ?></li>
  <?php
  } ?>
  </ul>
<?php
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($extraclasses); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'infocards' ) . '</span>', 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	<footer class="entry-meta">
		<?php edit_post_link( __( 'Edit', 'infocards' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
