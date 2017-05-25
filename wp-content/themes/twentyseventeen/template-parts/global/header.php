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
<div class="row" position="0">
    <div class="col-xs-12 top-header">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/front-bg.jpg" class="bg">
        <div class="text row">
            <div class="col-md-3 col-md-offset-7 col-xs-11 col-xs-offset-1">
                <p class="first">Cơ hội<br/>trở thành</p>
                <p class="second">diễn giả trẻ</p>
                <br />
                <p class="third">Vòng Audition</p>
                <div class="clock-wrapper">
                    <div class="clock"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var startDate = new Date();
    var endDate = new Date('30 May 2017 23:59:59');
    var diff = Math.floor((endDate - startDate) / 1000)
    var clock = $(".clock").FlipClock(diff, {
        clockFace: 'DailyCounter',
        countdown: true,
    });
</script>
