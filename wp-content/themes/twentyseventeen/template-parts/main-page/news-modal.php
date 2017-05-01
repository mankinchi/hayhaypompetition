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
			<div class="col-md-12 modal-header">
				<div class="page-modal-title">Tin tức</div>
				<div class="underline"></div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8 col-md-offset-2 hidden-xs hidden-sm">
			    <div class="row">
			        <div class="col-md-8 main-news-container">
			            <div class="row">
	                        <div class="col-md-12">
	                            <a href="#"><img alt=""></a>
	                        </div>
	                        <a href=""><div class="col-md-12"><span class="news-title"></span></div></a>
	                        <a href=""><div class="col-md-12"><span class="short-description"></span></div></a>
	                        <a href="#"><div class="col-md-12 read-more">Read more <i class="fa fa-plus"></i></div></a>
			            </div>
			        </div>
			        <div class="col-md-4 hidden-xs hidden-sm sub-news-container">
			            <div class="row">
							<?php
								$posts = get_posts(array(
									'post_type' => 'news'
								));
								foreach ($posts as $post) {
									setup_postdata($post);
								?>
									<div class="col-md-12">
										<div class="row">
											<div class="sub-news">
												<div class="row">
													<div class="col-md-12 thumbnail-photo">
														<img src="<?php echo get_the_post_thumbnail_url() ?>" alt="">
													</div>
													<div class="col-md-12 summary">
														<div class="news-title"><?php echo the_title() ?></div>
														<div class="content hide"><?php echo the_content() ?></div>
														<div class="link hide"><?php echo the_permalink() ?></div>
													</div>
												</div>
											</div>
										</div>
									</div>
								<?php
									wp_reset_postdata();
								}
							 ?>
			            </div>
			        </div>
			    </div>
			</div>
			<?php
				get_template_part("template-parts/global/news","carousel");
			 ?>
		</div>
		<?php
			$page = 'tin-tuc';
			include(locate_template('template-parts/global/docthem-button.php'));
		 ?>
	</div>
</div>
<script type="text/javascript">
	$(".sub-news").click(function(event) {
		if ($(this).hasClass('selected') == false) {
			var toDisplayNew = $(this);
			$(".sub-news.selected").removeClass('selected');
			$(this).addClass('selected');
			$(".main-news-container").fadeOut('slow', function() {
				// Change data
				var src = $(toDisplayNew).find('.thumbnail-photo img').attr('src');
				var title = $(toDisplayNew).find('.news-title').text();
				var link = $(toDisplayNew).find('.link').text();
				// var content = $(toDisplayNew).find('.content').text();
				$(".main-news-container img").attr('src', src);
				$(".main-news-container .news-title").text(title);
				$(".main-news-container a").attr('href', link);
				// $(".main-news-container .short-description").text(content);
				$(".main-news-container").fadeIn('slow');
			});
		}
	});

	$(".sub-news").eq(0).trigger('click');
</script>
