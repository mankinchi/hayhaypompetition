<?php
/**
 * The page to display top 16
 *
 * Template Name: Top 16
 * @package WordPress
 * @subpackage myTheme
 * @since 1.0
 * @version 1.0
 */
?>
<?php
    $id = '2';
    get_header();
    get_template_part('template-parts/front-page/contestant');
    get_template_part('template-parts/front-page/news');
    get_template_part('template-parts/front-page/videos');
    get_template_part('template-parts/front-page/sponsor');
?>
