<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> style="margin-top: 0 !important">
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php
			if (is_single()) {
				$postId = $post->ID;
			?>
				<meta property="og:url" content="<?php echo get_permalink($postId) ?>">
				<meta property="og:type" content="website">
				<meta property="og:title" content="<?php the_title() ?>">
				<meta property="og:description" content="<?php echo get_field('summary',$postId) ?>">
				<meta property="og:image" content="<?php echo get_the_post_thumbnail_url($postId) ?>">
			<?php }
		 ?>
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-97066743-1', 'auto');
			ga('send', 'pageview');
		</script>
		<?php if (has_nav_menu( 'top' ) ) :
				if (get_current_template() == "main-page.php") {
					$class = "big-nav";
				} else {
					$class = "small-nav";
				}
			?>
			<div class="row nav-menu-top <?php echo $class ?>">
				<?php get_template_part( 'template-parts/navigation/navigation', 'main' ); ?>
			</div>
		<?php endif; ?>
