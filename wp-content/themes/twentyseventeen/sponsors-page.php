<?php
/**
 * The page to display all the sponsors
 *
 * Template Name: Sponsors Page
 * @package WordPress
 * @subpackage myTheme
 * @since 1.0
 * @version 1.0
 */

    $id = '1';
    get_header();
    $sponsors = $wpdb->get_results(
        "SELECT * FROM wp_sponsors ORDER BY FIELD(sponsor_level, 'gold','silver','bronze')", ARRAY_A
    );
    get_template_part('./template-parts/header/header','smallintro');
    ?>
    <?php foreach ($sponsors as $sponsor) { ?>
        <div class="row sponsor">
            <div class="col-md-offset-1 col-md-2 image-container sponsor-logo-image"><img src="<?php echo $sponsor["sponsor_imageLink"] ?>" alt="avatar"></div>
            <div class="col-md-8">
                <div class="sponsor-text">
                    <p class="sponsor-name"><?php echo $sponsor["sponsor_name"] ?></p>
                    <p class="sponsor-desc"><?php echo $sponsor["sponsor_longDesc"] ?></p>
                </div>
            </div>
        </div>
    <?php }?>
    <script type="text/javascript">
        $(".sponsor-text").innerHeight($(".sponsor-logo-image").innerHeight());
    </script>


    <?php get_footer(); ?>
