<?php
    // Plugin name: Voting Plugin
    // Description: Create action hook for front end to handle voting
    // Version: 1.0
    // Creator: Tri Nguyen

    add_action('wp_ajax_receive_voting', 'receive_voting');

    // Return code
    // 0 => all good
    // 1 => already vote
    // 2 => Something went wrong?

    function receive_voting() {
        $author = $_POST["name"];
        $fbid = $_POST["fbid"];

        $posts = get_posts(array(
            'post_type' => 'videos',
            'meta_key' => 'author',
            'meta_value' => $author
        ));
        if ($posts):
            foreach ($posts as $post) {
                setup_postdata($post);
                $fields = get_fields($post);

                // Check voter
                $voter = $fields["voters"];
                if ($voter == ""):
                    $voter .= $fbid;
                    update_field('voters', $voter, $post->ID);

                    // Update vote
                    $vote = $fields["vote"];
                    $vote++;
                    update_field('vote', $vote, $post->ID);
                    echo "0";
                else:
                    $voter_array = explode('|', $voter);
                    // echo json_encode($voter_array);
                    if (!in_array($fbid, $voter_array)):
                        $voter .= '|' . $fbid;
                        update_field('voters', $voter, $post->ID);

                        // Update vote
                        $vote = $fields["vote"];
                        $vote++;
                        update_field('vote', $vote, $post->ID);
                        echo "0";
                    else:
                        echo "1";
                    endif;
                endif;
                wp_reset_postdata();
            };
        else:
            echo "2";
        endif;
        wp_die();
    }
 ?>
