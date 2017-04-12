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
<div class="row news-modal page-modal" position="2">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-12 title">
				<div class="title-text">Tin tức</div>
				<div class="underline"></div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
			    <div class="row">
			        <div class="col-md-8 main-news-container">
			            <div class="row">
	                        <div class="col-md-12 image-container">
	                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/news.png" alt="intro1">
	                        </div>
	                        <div class="col-md-12 news-title">
								Ra mắt trang Facebook chính thức của BAY Competition
	                        </div>
	                        <div class="col-md-12 short-description">
								Những thông tin mới nhất về cuộc thi, cách thức đăng kí và cơ cấu giải thưởng sẽ được cập nhật liên tục trên trang Facebook chính thức của chương trình tại địa chỉ <a href="https://www.facebook.com/baycompetitionvn">https://www.facebook.com/baycompetitionvn</a>.
	                        </div>
	                        <!-- <div class="col-md-12 more">
	                            <a href="#">Read more </a>
	                        </div> -->
			            </div>
			        </div>
			        <div class="col-md-4 hidden-xs hidden-sm sub-news-container">
			            <div class="row">
			                <div class="col-md-12 sub-news selected">Ra mắt trang Facebook chính thức của BAY Competition</div>
			                <!-- <div class="col-md-12 sub-news">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tristique at quam eu tincidunt. Suspendisse feugiat pulvinar tellus vel pharetra.</div>
			                <div class="col-md-12 sub-news">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tristique at quam eu tincidunt. Suspendisse feugiat pulvinar tellus vel pharetra.</div>
			                <div class="col-md-12 sub-news">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tristique at quam eu tincidunt. Suspendisse feugiat pulvinar tellus vel pharetra.</div>
			                <div class="col-md-12 sub-news">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tristique at quam eu tincidunt. Suspendisse feugiat pulvinar tellus vel pharetra.</div>
	                        <div class="col-md-12 sub-news">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tristique at quam eu tincidunt. Suspendisse feugiat pulvinar tellus vel pharetra.</div>
	                        <div class="col-md-12 sub-news">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tristique at quam eu tincidunt. Suspendisse feugiat pulvinar tellus vel pharetra.</div>
	                        <div class="col-md-12 sub-news">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tristique at quam eu tincidunt. Suspendisse feugiat pulvinar tellus vel pharetra.</div>
	                        <div class="col-md-12 sub-news">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas tristique at quam eu tincidunt. Suspendisse feugiat pulvinar tellus vel pharetra.</div> -->
			            </div>
			        </div>
			    </div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(".sub-news").click(function(event) {
		if ($(this).hasClass('selected') == false) {
			$(".sub-news.selected").removeClass('selected');
			$(this).addClass('selected');
			$(".main-news-container").fadeOut('slow', function() {
				// Change data
				$(".main-news-container").fadeIn('slow');
			});
		}
	});
</script>
