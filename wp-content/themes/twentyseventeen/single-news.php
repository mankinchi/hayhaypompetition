<?php
/**
 * The page to display the information of BAY Competition
 *
 */

    $id = 2;
    get_header();
?>
<div class="row">
    <div class="col-md-6 col-md-offset-2 new-container">
        <?php
            if (have_posts()) : while (have_posts()) : the_post();
            $fields = get_fields();
            $current_id = get_the_ID();
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="title"><?php the_title() ?></div>
                <div class="body">
                    <div class="content"><?php the_content()  ?></div>
                    <div class="author"><?php echo $fields["author"] ?></div>
                </div>
            </div>
        </div>
        <?php
            endwhile;endif;
        ?>
        <div class="row">
            <div class="col-md-12 related-news">
                <?php
                    $posts = get_posts(array(
                        'post_type' => 'news'
                    ));
                    $display_index = array();
                    while (count($display_index) < 2) {
                        $index = mt_rand(0, count($posts) - 1);
                        if ($posts[$index]->ID == $id) {
                            continue;
                        }
                        if (!in_array($index, $display_index)) {
                            $display_index[] = $index;
                        }
                    };
                    foreach ($display_index as $index) {
                        $post = $posts[$index];
                        setup_postdata($post);
                        ?>
                        <a href="<?php echo get_permalink() ?>">
                            <div class="row new">
                                <div class="col-md-6 image"><img src="<?php echo get_the_post_thumbnail_url() ?>" alt=""></div>
                                <div class="col-md-6 summary">
                                    <div class="title"><?php the_title() ?></div>
                                    <div class="content"></div>
                                </div>
                            </div>
                        </a>
                        <?php
                        wp_reset_postdata();
                    }
                 ?>
            </div>
        </div>
    </div>
    <div class="col-md-2 hidden-sm hidden-xs">
    </div>
</div>
<?php
    get_template_part('template-parts/global/footer');
 ?>

<?php get_footer(); ?>
<script type="text/javascript">
</script>
