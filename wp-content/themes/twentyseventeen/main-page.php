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

        $(window).on('wheel', function(event) {
            // Window scroll
            if (event.originalEvent.deltaY < 0) {
                // Scroll up
                if ($(window).scrollTop() == 0) {
                    if ($(".moreNav").innerHeight() != 0) {
                        animateBigNav();
                    } else {
                        event.preventDefault();
                        showOverlay();
                    }
                }
                navCheckScrolling("up");
            } else {
                // Scroll down
                if ($(".top-header").css('opacity') > 0.5 && $(".moreNav").innerHeight() == 0) {
                    // When overlay appears and not on mobile
                    event.preventDefault();
                } else {
                    navCheckScrolling("down");
                }
            }
        });
    </script>
<?php
    get_footer();
?>
