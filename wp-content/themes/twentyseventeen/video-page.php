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

    $id = 1;
    get_header();
?>
<div class="row page-modal">
    <div class="col-md-8 col-md-offset-2">
        <div class="row">
			<div class="col-md-12 modal-header">
				<div class="page-modal-title">Video</div>
				<div class="underline"></div>
			</div>
		</div>
        <div class="row">
            <?php
                $videos = get_posts(array(
                    'post_type' => 'videos',
                    'numberposts' => -1
                ));
                if ($videos):
                    foreach ($videos as $post) :
                        setup_postdata($post);
                        $fields = get_fields(); ?>
                            <div class="col-md-3 col-xs-6 video-block">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="cover ratiocontainer ratio11">
                                            <img class="content" src="<?php echo $fields["cover"]; ?>" alt="">
                                            <div class="play-button"><i class="fa fa-play"></i></div>
                                        </div>
                                        <div class="name"><?php the_title() ?></div>
                                        <div class="author"><?php echo $fields["author"]; ?></div>
                                        <div class="author-image-link hidden"><?php echo $fields["author_image"]; ?></div>
                                        <div class="video-link hidden"><?php echo $fields["link"]; ?></div>
                                        <div class="bio hidden"><?php echo $fields["bio"]; ?></div>
                                        <div class="vote hidden"><?php echo $fields["vote"]; ?></div>
                                    </div>
                                </div>
                            </div>
                        <?php wp_reset_postdata();
                    endforeach;
                endif;
             ?>
        </div>
        <div class="modal animated rubberBand" id="modal" role="dialog">
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
                                    <div class="col-md-6 col-xs-6">
                                        <div class="modal-vote-button">VOTE</div>
                                    </div>
                                    <div class="col-md-6 col-xs-6">
                                        <div class="modal-vote"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12 col-xs-4">
                                                <div class="modal-author-image">
                                                    <img src="" alt=""/>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-xs-8">
                                                <div class="modal-author"></div>
                                            </div>
                                            <div class="col-md-12 col-xs-8">
                                                <div class="modal-bio"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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

        ajaxCall(fbid);
        // Uncomment when upload
        // if (fbid == 0) {
        //     FB.getLoginStatus(function(response) {
    	// 		if (response["status"] == "connected") {
    	// 	        fbid = getFbID(ajaxCall);
    	// 		} else {
    	// 			event.preventDefault();
    	// 			FB.login(function(response) {
    	// 				if (response["status"] == "connected") {
    	// 					fbid = getFbID(ajaxCall);
    	// 				}
    	// 			});
    	// 		}
    	// 	});
        // } else {
        //     ajaxCall(fbid);
        // };
    });

    function ajaxCall(fbid) {
        $.ajax({
            url: ajaxUrl,
            type: 'POST',
            data: {
                'action': 'receive_voting',
                'name': $(".modal-author").text(),
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
            callbackFunc(response['id']);
        })
    };

    $(".video-block").click(function(event) {
        updateModal($(this));
        $(".modal-info").hide();
        $("#modal").modal('show');
    });

    $("#modal").on('hide.bs.modal', function(event) {
        $(".modal-video .ratiocontainer").empty();
    });

    function updateModal(videoToDisplay) {
        var authorImage = videoToDisplay.find('.author-image-link').text();
        var name = videoToDisplay.find('.name').text();
        var author = videoToDisplay.find('.author').text();
        var bio = videoToDisplay.find('.bio').html();
        var vote = videoToDisplay.find('.vote').text();
        var videoLink = videoToDisplay.find('.video-link').text();

        // Update info
        $(".modal-title").text(name);
        $(".modal-author-image img").attr('src', authorImage);
        $(".modal-author").text(author);
        $(".modal-bio").html(bio);
        $(".modal-vote").text(vote);

        // Play Video
        var iframe = $("<iframe>", {
            'src' : 'https://www.youtube.com/embed/' + videoLink + '?autoplay=1',
            'class': 'content'
        });
        $(".modal-video .ratiocontainer").append(iframe);
    }
</script>
