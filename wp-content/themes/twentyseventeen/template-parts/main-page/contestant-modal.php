<?php
/**
 * Displays contestant on front page
 *
 * @package WordPress
 * @subpackage myTheme
 * @since 1.0
 * @version 1.0
 */
?>
<div class="row contestant-modal page-modal" position="2">
	<div class="row">
		<div class="col-md-12 title">
			<div class="title-text">Top 16</div>
			<div class="underline"></div>
		</div>
	</div>
	<div class="row">
		<div class="image-container coming-soon"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/comingsoon.png" alt="logo"></div>
	</div>

	<!-- <div class="row">
		<div class="col-md-offset-2 col-md-8">
			<div class="row">
				<?php global $wpdb;
					$args = array('post_type' => 'contestants', 'order' => 'ASC');
					$posts = get_posts($args);

					if ($posts) {
						foreach ($posts as $post) {
							setup_postdata( $post ); ?>
							<div class="col-md-4 contestant-container">
								<a href="<?php the_permalink() ?>">
								    <div class="row">
								        <div class="col-md-12 image-container"><img src="<?php the_field("imageLink")?>" alt="Avatar"> </div>
								        <div class="col-md-12 underline avatar"></div>
								        <div class="col-md-12 contestant-name"><?php strtoupper(the_title()); ?></div>
								    </div>
								</a>
							</div>
						<?php wp_reset_postdata();
						};
					}
				?>
			</div>
		</div>
	</div> -->
</div>
