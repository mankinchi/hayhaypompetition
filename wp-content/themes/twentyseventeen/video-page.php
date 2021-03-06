<?php
/**
 * The page to display the information of BAY Competition
 *
 * Template Name: Video Page
 * @package WordPress
 * @subpackage myTheme
 * @since 1.0
 * @version 1.0
 */

    $id = 3;
    get_header();
?>
<?php
    $top20 = array();
    $others = array();
    $videos = get_posts(array(
        'post_type' => 'videos',
        'numberposts' => -1,
        'meta_key'		=> 'main_page',
        'meta_value'	=> 'false',
        'order' => 'ASC',
        'orderby' => 'title'
    ));
    if ($videos):
        foreach ($videos as $post) :
            setup_postdata($post);
            $pos = get_field("position");
            if ($pos) {
                switch ($pos) {
                    case 'top20':
                        $top20[] = $post;
                        break;
                }
            } else {
                $others[] = $post;
            }
            wp_reset_postdata();
        endforeach;
    endif;
 ?>

<div class="row page-modal">
    <div class="col-md-8 col-md-offset-2">
        <div class="row">
			<div class="col-md-12 modal-header">
				<div class="page-modal-title">TOP 20</div>
				<div class="underline"></div>
			</div>
		</div>
        <div class="row top-group">
            <?php
                $group1 = array();
                $group2 = array();
                foreach ($top20 as $post) {
                    setup_postdata($post);
                    $group = get_field("group");
                    switch ($group) {
                        case '1':
                            $group1[] = $post;
                            break;
                        case '2':
                            $group2[] = $post;
                            break;
                    }
                    wp_reset_postdata();
                }
            ?>
            <div class="col-md-5">
                <div class="row">
        			<div class="col-md-12 modal-header">
        				<div class="page-modal-title">NHÓM 1</div>
        				<div class="underline"></div>
        			</div>
        		</div>
                <div class="row">
                    <?php
                        foreach ($group1 as $post) :
                            setup_postdata($post);
                            $fields = get_fields(); ?>
                                <div class="col-xs-6 video-block">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="cover ratiocontainer ratio11">
                                                <img class="content" src="<?php echo $fields["cover"]; ?>" alt="">
                                                <div class="play-button"><i class="fa fa-play"></i></div>
                                            </div>
                                            <div class="author"><?php the_title(); ?></div>
                                            <div class="name"><?php echo $fields["author"]; ?></div>
                                            <div class="author-image-link hidden"><?php echo $fields["author_image"]; ?></div>
                                            <div class="video-link hidden"><?php echo $fields["link"]; ?></div>
                                            <div class="bio hidden"><?php echo $fields["bio"]; ?></div>
                                            <div class="vote hidden"><?php echo $fields["vote"]; ?></div>
                                            <div class="sbd hidden"><?php echo $fields["sbd"]; ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            <?php wp_reset_postdata();
                        endforeach;
                     ?>
                </div>
            </div>
            <div class="col-md-2 col-xs-0"></div>
            <div class="col-md-5">
                <div class="row">
        			<div class="col-md-12 modal-header">
        				<div class="page-modal-title">NHÓM 2</div>
        				<div class="underline"></div>
        			</div>
        		</div>
                <div class="row">
                    <?php
                        foreach ($group2 as $post) :
                            setup_postdata($post);
                            $fields = get_fields(); ?>
                                <div class="col-xs-6 video-block">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="cover ratiocontainer ratio11">
                                                <img class="content" src="<?php echo $fields["cover"]; ?>" alt="">
                                                <div class="play-button"><i class="fa fa-play"></i></div>
                                            </div>
                                            <div class="author"><?php the_title(); ?></div>
                                            <div class="name"><?php echo $fields["author"]; ?></div>
                                            <div class="author-image-link hidden"><?php echo $fields["author_image"]; ?></div>
                                            <div class="video-link hidden"><?php echo $fields["link"]; ?></div>
                                            <div class="bio hidden"><?php echo $fields["bio"]; ?></div>
                                            <div class="vote hidden"><?php echo $fields["vote"]; ?></div>
                                            <div class="sbd hidden"><?php echo $fields["sbd"]; ?></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            <?php wp_reset_postdata();
                        endforeach;
                     ?>
                </div>
            </div>
        </div>
        <div class="row">
			<div class="col-md-12 modal-header">
				<div class="page-modal-title">THÍ SINH KHÁC</div>
				<div class="underline"></div>
			</div>
		</div>
        <div class="row others">
            <?php
                foreach ($others as $post) :
                    setup_postdata($post);
                    $fields = get_fields(); ?>
                        <div class="col-md-3 col-xs-6 video-block">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="cover ratiocontainer ratio11">
                                        <img class="content" src="<?php echo $fields["cover"]; ?>" alt="">
                                        <div class="play-button"><i class="fa fa-play"></i></div>
                                    </div>
                                    <div class="author"><?php the_title(); ?></div>
                                    <div class="name"><?php echo $fields["author"]; ?></div>
                                    <div class="author-image-link hidden"><?php echo $fields["author_image"]; ?></div>
                                    <div class="video-link hidden"><?php echo $fields["link"]; ?></div>
                                    <div class="bio hidden"><?php echo $fields["bio"]; ?></div>
                                    <div class="vote hidden"><?php echo $fields["vote"]; ?></div>
                                    <div class="sbd hidden"><?php echo $fields["sbd"]; ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="clear"></div>
                    <?php wp_reset_postdata();
                endforeach;
             ?>
        </div>
        <div class="modal animated fadeIn" id="modal" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id=""></h4>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="modal-info success text-success bg-success">Bạn đã bình chọn thành công</p>
                                <p class="modal-info warning text-warning bg-warning">Bạn đã bình chọn cho thí sinh này</p>
                                <p class="modal-info danger text-danger bg-danger">Hệ thống hiện tại đang có lỗi. Vui lòng thử lại sau</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="modal-video">
                                            <div class="ratiocontainer ratio169">
                                                <div class="content"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row voteRow">
                                    <div class="col-xs-4">
                                        <div class="modal-vote-button">VOTE</div>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="modal-vote"></div>
                                    </div>
                                    <div class="col-xs-4">
                                        <div class="fb-share"><i class="fa fa-facebook-official"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12 col-xs-5">
                                                <div class="modal-author-image ratiocontainer ratio11">
                                                    <img class="content" src="" alt=""/>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-xs-7">
                                                <div class="modal-author"></div>
                                            </div>
                                            <div class="col-md-12 col-xs-12">
                                                <div class="modal-bio"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-sbd hidden"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    get_template_part('template-parts/global/footer');
    get_footer();
?>

<script type="text/javascript">
    var fbid = 0;
    var ajaxUrl = '<?php echo admin_url('admin-ajax.php'); ?>';

    // When click on voting button
    $(".modal-vote-button").click(function(event) {
        $(".modal-info").fadeOut();
        if ($(this).hasClass('disabled')) {
            return;
        }
        $(this).addClass('disabled');

        // Use for offline
        // fbid = '123123123';
        // ajaxCall(fbid);
        // Uncomment when upload
        if (fbid == 0) {
            FB.login(function(response) {
                $(".info").text(JSON.stringify(response));
    			if (response.authResponse) {
    				getFbID(ajaxCall);
    			} else {
                    // They didn't log into facebook
                    $(".modal-info.danger").fadeIn();
                }
    		});
        } else {
            ajaxCall(fbid);
        }
    });

    function ajaxCall(fbid) {
        $.ajax({
            url: ajaxUrl,
            type: 'POST',
            data: {
                'action': 'receive_voting',
                'sbd': $(".modal-sbd").text(),
                'fbid': fbid
            }
        })
        .done((msg) => {
            // Return code
            // 0 => all good
            // 1 => already vote
            // 2 => Something went wrong?
            switch (msg) {
                case '0':
                    var vote = parseInt($(".modal-vote").text());
                    $(".modal-vote").text(++vote);
                    $(".video-block.open .vote").text(vote);
                    $(".modal-info.success").fadeIn();
                    break;
                case '1':
                    $(".modal-info.warning").fadeIn();
                    break;
                case '2':
                    $(".modal-info.danger").fadeIn();
                    break;
                default:

            }
            $(".modal-vote-button").removeClass('disabled');
            console.log(msg);
        });
    }

    function getFbID(callbackFunc) {
        FB.api('/me?fields=id', function(response) {
            fbid = response['id'];
            callbackFunc(response['id']);
        })
    };

    // When click on Facebook share
    $(".fb-share").click(function(event) {
        FB.ui({
            method: 'share',
            href: '<?php echo get_permalink(get_page_by_path('videos')) ?>?sbd=' + pageSbd
        })
    });

    if ($(window).width() >= 992) {
        $(".video-block").hover(function() {
            $(this).find('.play-button i').addClass('hover');
        }, function() {
            $(this).find('.play-button i').removeClass('hover');
        });
    }

    $(".video-block").click(function(event) {
        $(this).addClass('open');
        updateModal($(this));
        $(".modal-info").hide();
        $("#modal").modal('show');
    });

    $("#modal").on('hide.bs.modal', function(event) {
        $(".modal-video .ratiocontainer").empty();
        $(".video-block.open").removeClass('open');
    });

    function updateModal(videoToDisplay) {
        var authorImage = videoToDisplay.find('.author-image-link').text();
        var name = videoToDisplay.find('.name').text();
        var author = videoToDisplay.find('.author').text();
        var bio = videoToDisplay.find('.bio').html();
        var vote = videoToDisplay.find('.vote').text();
        var videoLink = videoToDisplay.find('.video-link').text();
        var sbd = videoToDisplay.find(".sbd").text();

        // Update info
        $(".modal-title").text(name);
        $(".modal-author-image img").attr('src', authorImage);
        $(".modal-author").text(author);
        $(".modal-bio").html(bio);
        $(".modal-vote").text(vote);
        $(".modal-sbd").text(sbd);

        // Play Video
        var iframe = $("<iframe>", {
            'src' : 'https://www.youtube.com/embed/' + videoLink + '?autoplay=1&showinfo=0',
            'class': 'content'
        });
        $(".modal-video .ratiocontainer").append(iframe);

        pageSbd = sbd;
    }

    var pageSbd = -1;
    <?php
        if (isset($_GET["sbd"])): ?>
            pageSbd = <?php echo $_GET["sbd"]; ?>;
        <?php endif;
     ?>

    if (pageSbd != -1) {
        var toPopup = $(".sbd").filter(function(){
            return $(this).text() == pageSbd;
        }).parents('.video-block');
        toPopup.trigger('click');
    }
</script>
