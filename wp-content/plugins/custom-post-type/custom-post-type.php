<?php
    // Plugin name: Custom Post Type
    // Description: Create contestant post type
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
    		'labels'                  => $labels,
            'supports'                => array('title','thumbnail')
    	);
    	register_post_type('contestants', $args );
    }

    add_action('init','my_contestant_post_type');

    function save_data_to_database($post_id) {
        $id = get_field('id');
        $name = get_the_title($post_id);
        $age = get_field('age');
        $school = get_field('school');
        $class = get_field('class');
        $imageLink = get_field('imageLink');
        $youtubeLink = get_field('youtubeLink');
        $description = get_field('description');
        $vote = get_field('vote');
        global $wpdb;
        if ($wpdb->get_row("SELECT * FROM wp_contestants WHERE contestant_id = '$id'") !== null) {
            $details = array(
                'contestant_id' => $id,
                'contestant_name' => $name,
                'contestant_age' => $age,
                'contestant_school' => $school,
                'contestant_class' => $class,
                'contestant_youtubeLink' => $youtubeLink,
                'contestant_imageLink' => $imageLink,
                'contestant_description' => $description,
            );
            $wpdb->update('wp_contestants', $details, array(
                'contestant_id' => $id
            ));
        } else {
            $details = array(
                'contestant_id' => $id,
                'contestant_name' => $name,
                'contestant_age' => $age,
                'contestant_school' => $school,
                'contestant_class' => $class,
                'contestant_youtubeLink' => $youtubeLink,
                'contestant_imageLink' => $imageLink,
                'contestant_description' => $description,
                'contestant_vote' => $vote
            );
            $wpdb->insert('wp_contestants', $details);
        }
    };

    add_action('acf/save_post','save_data_to_database', 20);
 ?>
