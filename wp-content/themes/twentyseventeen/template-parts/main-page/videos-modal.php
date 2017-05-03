<?php
/**
 * Displays news on front page
 *
 * @package WordPress
 * @subpackage myTheme
 * @since 1.0
 * @version 1.0
 */
?>
<div class="row videos-modal page-modal" positionName="#video">
    <div class="col-md-12 hidden-xs hidden-sm">
        <div class="row">
    		<div class="col-md-12 modal-header">
    			<div class="page-modal-title">Video</div>
    			<div class="underline"></div>
    		</div>
    	</div>
    	<div class="row">
    		<div class="col-md-offset-2 col-md-8">
                <div class="row">
                    <div class="col-md-12 main-video">
                        <div class="row">
                            <div class="col-md-12" >
                                <div class="video-container">
                                    <div class="video" link="oNkW9oaCOKM">
                                        <div class="play-button">
                                            <i class="fa fa-play"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p class="video-text"><span class="video-title">Teaser Video - </span><span class="video-author">BAY Competition</span></p>
                            </div>
                        </div>
                    </div>
                    <?php
                        $posts = get_posts(array(
                            'post_type' => 'videos'
                        ));
                        foreach ($posts as $post) {
                            setup_postdata($post);
                            ?>
                            <div class="col-md-4 sub-video">
                                <div class="video" link="<?php echo get_field('link') ?>">
                                    <div class="play-button">
                                        <i class="fa fa-play"></i>
                                    </div>
                                </div>
                                <p class="video-text"><span class="video-title"><?php the_title() ?> - </span><span class="video-author"><?php echo get_field('author') ?></span></p>
                            </div>
                            <?php
                            wp_reset_postdata();
                        }
                     ?>
                </div>
    		</div>
    	</div>
    </div>
    <div class="col-xs-12 visible-xs-block visible-sm-block">
        <div id="video-carousel" class="carousel slide" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <?php
                    $posts = get_posts(array(
                        'post_type' => 'videos'
                    ));
                    $i = 0;
                    foreach ($posts as $post) {
                        setup_postdata($post);
                        if ($i == 0) {
                            $class = "item active";
                        } else {
                            $class = "item ";
                        }
                        ?>
                        <div class="<?php echo $class ?>">
                            <div class="video-container">
                                <div class="video" link="<?php echo get_field('link') ?>">
                                    <div class="play-button">
                                        <i class="fa fa-play"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="video-text"><span class="video-title"><?php the_title() ?> - </span><span class="video-author"><?php echo get_field('author') ?></span></p>
                                </div>
                            </div>
                        </div>
                        <?php
                        $i++;
                        wp_reset_postdata();
                    }
                 ?>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#video-carousel" data-slide="prev"><span class="icon-prev"></span></a>
            <a class="right carousel-control" href="#video-carousel" data-slide="next"><span class="icon-next"></span></a>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(".video").hover(function() {
        $(this).find('i').addClass('hover');
    }, function() {
        $(this).find('i').removeClass('hover');
    });

    $(".video").each(function(index, el) {
        setBackground($(this));
    });

    $(".video-carousel .item.active").click(function(event) {
        playVideo($(this).find('.video'));
        stopCarousel();

    });

    $(".main-video .video").click(function() {
        playVideo($(this));
    });

    $(".sub-video").click(function() {
        var clickedVideo = $(this).find(".video");
        $(".main-video").fadeOut('400', function() {

            // Set up new video
            $(".main-video").find('iframe').remove();
            $(".main-video .video").css('display', 'inherit');
            $(".main-video .video").attr('link', $(clickedVideo).attr('link'));
            setBackground($(".main-video .video"));

            // Set up new info
            $(".main-video .video-title").text($(clickedVideo).parent().find('.video-title').text());
            $(".main-video .video-author").text($(clickedVideo).parent().find('.video-author').text());

            $(".main-video").fadeIn('400');
        });
    });

    function stopCarousel() {
        $("#video-carousel").carousel('pause');
        $(".carousel-control").hide();
    }

    function startCarousel() {
        $("#video-carousel").carousel('next');
        $("#video-carousel").carousel('cycle');
        $(".carousel-control").show();
    }

    function restoreCarouselItem() {
        var item = $(".item.active");
        $(item).find('iframe').remove();
        $(item).find('.video').show();
    }

    function playVideo(el) {
        var iframe = $("<iframe>", {
            'src' : 'https://www.youtube.com/embed/' + $(el).attr('link') + '?enablejsapi=1',
            'id' : 'video'
        });
        $(el).parent().append(iframe);
        $(el).hide();

        var player = new YT.Player('video', {
            events: {
                'onStateChange' : function(event) {
                    if (event.data == 0) {
                        setTimeout(function() {
                            restoreCarouselItem();
                            startCarousel();
                        }, 5000);
                    }
                }
            }
        })
    }

    function setBackground(element) {
        var link = 'http://img.youtube.com/vi/' + $(element).attr('link') +'/maxresdefault.jpg';
        $(element).css({
            'background': "url('"+ link +"')",
            'background-size': 'cover',
            'background-position': 'center'
        });
    }

    $(".sub-video").eq(0).trigger('click');
</script>
