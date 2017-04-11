<?php
    // Plugin name: Sponsor Post Type
    // Description: Create sponsor post type
    // Version: 1.0
    // Creator: Tri Nguyen

    function my_sponsor_post_type() {
        $labels = array(
    		'name'               => 'Sponsors',
    		'singular_name'      => 'Sponsor',
    		'menu_name'          => 'Sponsors',
    		'name_admin_bar'     => 'Sponsors',
    	);

    	$args = array(
    		'public'                  => true,
            'show_ui'                 => true,
            'show_in_admin_bar'       => true,
            'menu_icon'               => 'dashicons-awards',
    		'labels'                  => $labels,
            'supports'                => array('title','thumbnail')
    	);
    	register_post_type('sponsors', $args );
    }

    add_action('init','my_sponsor_post_type');

    function save_sponsor_data_to_database($post_id) {
        $name = get_the_title($post_id);
        $image = get_field('image');
        $shortDescription = get_field('short_description');
        $longDescription = get_field('long_description');
        $level = get_field('level');
        $details = array(
            'sponsor_name' => $name,
            'sponsor_imageLink' => $image,
            'sponsor_shortDesc' => $shortDescription,
            'sponsor_longDesc' => $longDescription,
            'sponsor_level' => $level
        );
        global $wpdb;
        if ($wpdb->get_row("SELECT * FROM wp_sponsors WHERE sponsor_name = '$name'") !== null) {
            $wpdb->update('wp_sponsors', $details, array(
                'sponsor_name' => $name
            ));
        } else {
            $wpdb->insert('wp_sponsors', $details);
        }
    };

    add_action('acf/save_post','save_sponsor_data_to_database', 20);
 ?>
