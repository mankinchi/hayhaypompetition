<?php
    $args = array(
        'post_type' => 'contestants',
        'posts_per_page' => '50'
    );

    $query = new WP_Query($args);
    if ($query->have_posts()) { ?>
        <div class="row vote-area">
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <div class="col-md-3 cst-area">
                    <article id="post-<?php the_ID() ?>">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                            <img class="cst-thumbnail" src="<?php the_field(photo); ?>">
                        </a>
                        <div class="cst-divider"></div>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                            <?php the_title(); ?>
                        </a>
                        <img class="vote-icon vote"src="<?php echo wp_get_attachment_url('69') ?>">
                        <img class="vote-icon unvote"src="<?php echo wp_get_attachment_url('68') ?>">
                        <p><?php the_field('vote'); the_field('lop'); the_field('truong');  ?></p>
                    </article>
                </div>
            <?php endwhile; ?>
        </div>
    <?php
    }
 ?>
