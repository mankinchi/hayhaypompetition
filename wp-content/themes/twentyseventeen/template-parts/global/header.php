<?php
/**
 * Displays intro top of page
 *
 * @package WordPress
 * @subpackage myTheme
 * @since 1.0
 * @version 1.0
 */

?>
<div class="row top-header hidden-xs hidden-sm">
    <div class="text">
        <p class="first">Are you ready to</p>
        <p class="second">SPEAK YOUR FUTURE?</p>
    </div>
    <div class="more">
        <p>XEM CHI TIẾT</p>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/more.png" alt="rules"/>
    </div>
</div>

<div class="row visible-xs-block top-header-mobile-container visible-sm-block" position="0">
    <div class="col-xs-12 top-header-mobile">
        <div class="text">
            <p class="first">Are you ready to</p>
            <p class="second">SPEAK YOUR FUTURE?</p>
        </div>
    </div>
</div>

<script type="text/javascript">
    function animateSmallNav() {
        $(".head-logo-container img").animate({
            width : '40%'
        }, {
            duration : 1000,
            queue: false
        }, 'linear');
        $(".menu-top-container").animate({
            'padding-top' : '3%'
        }, {
            duration : 1000,
            queue: false
        }, 'linear')
        $(".nav-menu-top").css('background-color', 'black');
        $(".menu-top-container a.active").removeClass('active');
        $(".menu-top-container a").eq(1).addClass('active');
        // animate small menu
        if ($(".nav-menu-top .moreNav").innerHeight() != 0) {
            $(".nav-menu-top .moreNav").animate({
                'padding-top' : '18px'
            }, {
                duration : 1000,
                queue: false
            }, 'linear');
        }
    };

    function animateBigNav() {
        $(".head-logo-container img").animate({
            width : '70%'
        }, {
            duration : 1000,
            queue: false
        }, 'linear');
        $(".menu-top-container").animate({
            'padding-top' : '5%'
        }, {
            duration : 1000,
            queue: false
        }, 'linear');
        $(".nav-menu-top").css('background-color', 'transparent');
        $(".menu-top-container a.active").removeClass('active');
        $(".menu-top-container a").eq(0).addClass('active');
        // animate small menu
        if ($(".nav-menu-top .moreNav").innerHeight() != 0) {
            $(".nav-menu-top .moreNav").animate({
                'padding-top' : '25px'
            }, {
                duration : 1000,
                queue: false
            }, 'linear');
        }
    }

    function hideOverlay() {
        $(".top-header").stop();
        $(".top-header").animate({
            top: -($(".top-header").innerHeight()),
            bottom: '100%',
            opacity : 0.5
        }, {
            duration : 1000,
            queue: false
        }, 'linear', function() {
            $(".top-header").css('z-index', '-1');
        });
        animateSmallNav();
        position = 1;
        $(window).scrollTop(0);
    }

    function showOverlay() {
        $(".top-header").stop();
        $(".top-header").css('z-index', '1');
        $(".top-header").animate({
            'top': 0,
            'bottom': 0,
            'opacity' : 1
        }, 1000, 'linear');
        animateBigNav();
        position = 0;
    }

    if ($(".moreNav").innerHeight() == 0) {
        $(".top-header .more").click(function(event) {
            hideOverlay();
        });
    }
</script>
