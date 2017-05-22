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
        <div class="text row">
            <p class="first">Are you ready to</p>
            <p class="second">SPEAK YOUR FUTURE?</p>
            <br />
            <p class="third">Vòng Audition</p>
            <p class="fourth">17/4 - 30/5</p>
            <div class="clock-wrapper">
                <div class="clock"></div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var startDate = new Date();
    var endDate = new Date('30 May 2017 23:59');
    var diff = Math.floor((endDate - startDate) / 1000)
    var clock = $(".clock").FlipClock(diff, {
        clockFace: 'DailyCounter',
        showSeconds: false,
        countdown: true,
    });
</script>
