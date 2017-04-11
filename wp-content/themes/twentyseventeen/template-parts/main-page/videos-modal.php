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
<div class="row videos-modal page-modal" position="4">
    <div class="row">
		<div class="col-md-12 title">
			<div class="title-text">Video</div>
			<div class="underline"></div>
		</div>
	</div>
    <!-- <div class="row">
		<div class="image-container coming-soon"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/comingsoon.png" alt="logo"></div>
	</div> -->
	<div class="row">
		<div class="col-md-offset-2 col-md-8">
            <div class="row">
                <div class="col-md-12 main-video">
                    <div class="video" link="oNkW9oaCOKM">
                        <div class="play-button">
                            <i class="fa fa-play"></i>
                        </div>
                    </div>
                    <p class="video-text"><span class="video-title">Teaser Video - </span><span class="video-author">BAY Competition</span></p>
                </div>
                <!-- <div class="col-md-4 sub-video">
                    <div class="video" link="Xhj5LkjKWb0">
                        <div class="play-button">
                            <i class="fa fa-play"></i>
                        </div>
                    </div>
                    <p class="video-text"><span class="video-title">Video 1 - </span><span class="video-author">Nguyễn Văn A</span></p>
                </div>
                <div class="col-md-4 sub-video">
                    <div class="video" link="ghccfubaQ3E">
                        <div class="play-button">
                            <i class="fa fa-play"></i>
                        </div>
                    </div>
                    <p class="video-text"><span class="video-title">Video 1 - </span><span class="video-author">Nguyễn Văn A</span></p>
                </div>
                <div class="col-md-4 sub-video">
                    <div class="video" link="czbIeS3R7Ig">
                        <div class="play-button">
                            <i class="fa fa-play"></i>
                        </div>
                    </div>
                    <p class="video-text"><span class="video-title">Video 1 - </span><span class="video-author">Nguyễn Văn A</span></p>
                </div> -->
            </div>
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

    $(".main-video .video").click(function() {
        var iframe = $("<iframe>", {
            'frameborder': '0',
            'width': '100%',
            'height': '500px',
            'allowfullscreen' : '',
            'src' : 'https://www.youtube.com/embed/' + $(this).attr('link') + '?autoplay=1'
        });
        $(this).append(iframe);
    });

    $(".sub-video").click(function() {
        var clickedVideo = $(this).find(".video");
        $(".main-video").fadeOut('400', function() {
            $(".main-video").find('iframe').remove();
            $(".main-video .video").attr('link', $(clickedVideo).attr('link'));
            setBackground($(".main-video .video"));
            $(".main-video").fadeIn('400');
        });
    });

    function setBackground(element) {
        var link = 'http://img.youtube.com/vi/' + $(element).attr('link') +'/maxresdefault.jpg';
        $(element).css({
            'background': "url('"+ link +"')",
            'background-size': 'cover',
            'background-position': 'center'
        });
    }
</script>
