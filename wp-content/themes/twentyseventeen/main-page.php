<?php
/**
 * The page to display main
 *
 * Template Name: Main Page
 * @package WordPress
 * @subpackage myTheme
 * @since 1.0
 * @version 1.0
 */
?>
<?php
    $id = 0;
    get_header();
?>
<script type="text/javascript">
    $("body").css('opacity', 0);
</script>
<?php
    get_template_part('template-parts/global/header');
    get_template_part('template-parts/main-page/intro','modal');
    // get_template_part('template-parts/main-page/contestant','modal');
    get_template_part('template-parts/main-page/news','modal');
    get_template_part('template-parts/main-page/videos','modal');
    get_template_part('template-parts/main-page/register','modal');
    get_template_part('template-parts/main-page/sponsor','modal');
    get_template_part('template-parts/global/footer');
?>
    <script type="text/javascript">
        $("body").animate({
            'opacity' : 1
        }, 2000);
    </script>
<?php
    get_footer();
?>
