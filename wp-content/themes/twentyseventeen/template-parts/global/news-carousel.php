<div class="col-xs-12 visible-xs-block visible-sm-block">
    <div id="news-carousel" class="carousel slide" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <?php
                $posts = get_posts(array(
                    'post_type' => 'news'
                ));
                $index = 0;
                foreach ($posts as $post) {
                    setup_postdata($post);
                    if ($index == 0) {
                        $class = "item active";
                    } else {
                        $class = "item";
                    }
                ?>
                <div class="<?php echo $class ?>">
                    <div class="row">
                        <div class="ratiocontainer ratio169">
                            <a href="<?php echo the_permalink() ?>"><img class="content" src="<?php echo get_the_post_thumbnail_url() ?>" alt=""></a>
                        </div>
                        <div class="col-md-12 summary">
                            <a href="<?php echo the_permalink() ?>"><div class="col-md-12"><span class="news-title"><?php echo the_title() ?></span></div></a>
                            <a href="<?php echo the_permalink() ?>"><div class="col-md-12"><span class="short-description"></span></div></a>
                        </div>
                    </div>
                </div>
                <?php
                    $index++;
                    wp_reset_postdata();
                }
             ?>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#news-carousel" data-slide="prev"><span class="icon-prev"></span></a>
        <a class="right carousel-control" href="#news-carousel" data-slide="next"><span class="icon-next"></span></a>
    </div>
</div>
