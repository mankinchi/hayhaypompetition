<?php
/**
 * The page to display the news page of BAY Competition
 *
 * Template Name: News Page
 * @package WordPress
 * @subpackage myTheme
 * @since 1.0
 * @version 1.0
 */

    $id = 2;
    get_header();
?>
<?php
    get_template_part('./template-parts/main-page/news','modal');
    get_template_part('./template-parts/global/footer');
 ?>
