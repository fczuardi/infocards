<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

		<div id="primary">
			<div id="content" role="main">

				<?php the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php 
				//comments_template( '', true ); 
				?>

			</div><!-- #content -->
		</div><!-- #primary -->
<?php 
// Child pages
$pageid = get_the_ID(); 
$my_query = new WP_Query( "post_parent=$pageid&post_type='page'&orderby=menu_order&order=ASC" );
if ( $my_query->have_posts() ) { 
   while ( $my_query->have_posts() ) { 
       $my_query->the_post(); ?>
<div>
  <?php get_template_part( 'content', 'page' ); ?>
</div>
<?php
   }
}
wp_reset_postdata();
?>

<?php get_footer(); ?>