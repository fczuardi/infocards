<?php
/*
Plugin Name: Hofire Post Order For Wordpress
Plugin URI: http://www.hofire.com/wordpress-plugins/hofire-post-order-plugins-wordpress/
Description: Hofire Post Order Plugin For WordPress is a simple plugin that enables administrator to modify the default order of posts or pages are displayd on your wordpress website.It is very useful when you want to custom your posts or plages order on the posts or pages list page.
Version: 1.0
Author: Mike Zhang
Author URI: http://www.hofire.com
License: GPL2
*/
?>
<?php
add_filter('manage_posts_columns', 'hofire_post_order_columns');
add_action('manage_posts_custom_column', 'hofire_post_order_data', 10, 2);
add_filter('manage_pages_columns', 'hofire_post_order_columns');
add_action('manage_pages_custom_column', 'hofire_post_order_data', 10, 2);
add_action('admin_head', 'hofire_post_order_css');
add_action('admin_init', 'hofire_post_order_save');

/**
*	@param: $default;
*/
if (!function_exists('hofire_post_order_columns')) {
	function hofire_post_order_columns($defaults) {
		$defaults['order'] = __('Order').'<input type="submit" id="save_order" value="" class="save_order" /> ';
		return $defaults;
	}
}

/**
*	@param: $column_name, $post_id;
*/
if (!function_exists('hofire_post_order_data')) {
	function hofire_post_order_data($column_name, $post_id) {
		global $wpdb;
		if( $column_name == 'order' ) {
			$result = $wpdb->get_results("SELECT menu_order FROM $wpdb->posts WHERE ID = $post_id");
			print '<input type="text" name="order[]" size="4" value="'.$result[0]->menu_order.'" /><input type="hidden" name="postid[]" value="'.$post_id.'" />';
		}
	}
}

/**
*	Add custom post order stylesheet;
*/
if (!function_exists('hofire_post_order_css')) {
	function hofire_post_order_css() {
		$styleSheet = get_bloginfo('wpurl') . '/wp-content/plugins/hofire-post-order-plugins-for-wordpress/css/style.css';
		print '<link rel="stylesheet" type="text/css" media="all" href="'.$styleSheet.'" />';
	}
}

/**
*   Save menu_order value for per post;
*   @param $post_id, $order[]; 
*/
if (!function_exists('hofire_post_order_save')) {
    function hofire_post_order_save(){
        global $wpdb;
        if (isset($_GET['postid']) || isset($_GET['order'])) {
            $order = array_combine($_GET['postid'], $_GET['order']);
            foreach ($order as $post_id => $order) {
                $wpdb->query("UPDATE $wpdb->posts SET menu_order = $order WHERE ID = $post_id");
            }
        }
    }
}
?>