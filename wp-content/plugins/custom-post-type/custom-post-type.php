<?php
    // Plugin name: Custom Post Type
    // Description: Create custom post type for: Contestant, News, Sponsor
    // Version: 1.0
    // Creator: Tri Nguyen

    function my_contestant_post_type() {
        $labels = array(
    		'name'               => 'Contestants',
    		'singular_name'      => 'contestant',
    		'menu_name'          => 'Contestants',
    		'name_admin_bar'     => 'Contestant',
    	);

    	$args = array(
    		'public'                  => true,
            'show_ui'                 => true,
            'show_in_admin_bar'       => true,
            'menu_icon'               => 'dashicons-businessman',
    		'labels'                  => $labels
    	);
    	register_post_type('contestants', $args );
    }

    add_action('init','my_contestant_post_type');

    function news_post_type() {
        $labels = array(
    		'name'               => 'News',
    		'singular_name'      => 'new',
    		'menu_name'          => 'News',
    		'name_admin_bar'     => 'New',
    	);

    	$args = array(
    		'public'                  => true,
            'show_ui'                 => true,
            'show_in_admin_bar'       => true,
            'menu_icon'               => 'dashicons-format-aside',
    		'labels'                  => $labels,
            'supports'                => array('title','editor','thumbnail')
    	);
    	register_post_type('news', $args );
        // flush_rewrite_rules();
    }

    add_action('init','news_post_type');

    function video_post_type() {
        $labels = array(
    		'name'               => 'Videos',
    		'singular_name'      => 'video',
    		'menu_name'          => 'Videos',
    		'name_admin_bar'     => 'Video',
    	);

    	$args = array(
    		'public'                  => true,
            'show_ui'                 => true,
            'show_in_admin_bar'       => true,
            'menu_icon'               => 'dashicons-format-video',
    		'labels'                  => $labels,
            'supports'                => array('title')
    	);
    	register_post_type('videos', $args );
        flush_rewrite_rules();
    }

    add_action('init','video_post_type');

    // add header
    add_filter('manage_videos_posts_columns', 'edit_videos_table_head');
    function edit_videos_table_head($defaults) {
        $defaults["vote"] = "No of Votes";
        return $defaults;
    }

    // fill column
    add_action('manage_videos_posts_custom_column', 'fill_videos_table_column', 10, 2);
    function fill_videos_table_column($column_name, $post_id) {
        if ($column_name == "vote") {
            echo get_field("vote", $post_id);
        }
    }

    // add sortable column
    add_filter('manage_edit-videos_sortable_columns','sortable_videos_table');
    function sortable_videos_table($columns) {
        $columns["vote"] = "vote";
        return $columns;
    }

    add_filter('request', 'vote_column_orderby');
    function vote_column_orderby($vars) {
        if (isset($vars['orderby']) && $vars['orderby'] == 'vote') {
            $vars = array_merge($vars, array(
                'meta_key' => 'vote',
                'orderby' => 'meta_value'
            ));
        }
        return $vars;
    }

    function sponsor_post_type() {
        $labels = array(
    		'name'               => 'Sponsors',
    		'singular_name'      => 'sponsor',
    		'menu_name'          => 'Sponsors',
    		'name_admin_bar'     => 'Sponsor',
    	);

    	$args = array(
    		'public'                  => true,
            'show_ui'                 => true,
            'show_in_admin_bar'       => true,
            'menu_icon'               => 'dashicons-groups',
    		'labels'                  => $labels,
            'supports'                => array('title')
    	);
    	register_post_type('sponsors', $args );
        flush_rewrite_rules();
    }

    add_action('init','sponsor_post_type');
 ?>
