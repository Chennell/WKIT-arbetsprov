<?php
/*
* Plugin Name: Book Taxonomy
*/
 
function genre_taxonomy()
{
    $labels = [
        'name'              => _x('genre', 'taxonomy general name'),
		'singular_name'     => _x('genre', 'taxonomy singular name'),
		'search_items'      => __('Search genres'),
		'all_items'         => __('All genres'),
		'parent_item'       => __('Parent genre'),
		'parent_item_colon' => __('Parent genre:'),
		'edit_item'         => __('Edit genre'),
		'update_item'       => __('Update genre'),
		'add_new_item'      => __('Add New genre'),
		'new_item_name'     => __('New Course genre'),
		'menu_name'         => __('Genre'),
	];
	$args = [
		'hierarchical'      => true, // make it hierarchical (like categories)
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => ['slug' => 'genre'],
	];
	register_taxonomy('genre', ['bok'], $args);
}
add_action('init', 'genre_taxonomy')
?>