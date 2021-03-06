<?php
/**
 * Displays top navigation
 *
 * @package WordPress
 * @subpackage myTheme
 * @since 1.0
 * @version 1.0
 */

?>
<div class="col-md-offset-2 col-md-1 col-xs-3 head-logo-container">
    <a href="<?php echo home_url(); ?>"><img class="head-logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/bay-logo.png" alt="intro1"></a>
</div>
<?php
	$menu_name = 'top';
	// TODO: add in "Dang Nhap" button
	if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name])) {
		$menu = wp_get_nav_menu_object($locations[$menu_name]);
		$menu_items = wp_get_nav_menu_items($menu);
		$menu_array =  array();
		foreach ((array)$menu_items as $key => $menu_item) {
			$title = $menu_item->title;
			$url = $menu_item->url;
			$menu_array[] = "<a href=\"". $url . "\">". $title ."</a>";
		};
		?>
        <div class="col-md-7 col-xs-9">
            <div class="row">
                <div class="visible-xs-block visible-sm-block col-xs-3 col-xs-offset-9 moreNav" state="close">
                    <i class="fa fa-bars"></i>
                </div>
                <div class="col-md-12 col-xs-12 menu-top-container">
        			<div class="row">
                        <div class="col-md-2 hidden-xs hidden-sm"></div>
        				<?php
        					for ($i=0; $i <= count($menu_array); $i++) {
        						echo "<div class='col-md-2 logo-item'>" . $menu_array[$i] . "</div>";
        					}
        				?>
                        <div class="col-md-2 col-md-offset-0 col-xs-5 col-xs-offset-7 logo-item registerBtnNav">
        					<a href="http://bit.ly/registerbaycompetition2017" target="_blank"><button type="button" class="btn btn-block">ĐĂNG KÝ</button></a>
        				</div>
        		    </div>
        		</div>
            </div>
        </div>
<?php } ?>
</div>
<script>
    var mobile;
    if ($(".moreNav").innerHeight() != 0) {
        mobile = true;
    } else {
        mobile = false;
    }
    // More button on phone
    if (mobile) {
        $(".menu-top-container").hide();
        $(".moreNav").click(function(event) {
            if ($(this).attr('state') == 'close') {
                $(this).attr('state', 'open');
                $(".menu-top-container").fadeIn();
            } else {
                $(this).attr('state', 'close');
                $(".menu-top-container").fadeOut();
            };
            $(this).find('i').toggleClass('fa-times fa-bars');
        });
    };

    // Highlight the current page
    $(".nav-menu-top .logo-item").eq(<?php echo $id ?>).find("a").addClass('active');
    
	window.fbAsyncInit = function() {
		FB.init({
			appId      : '378664565849556',
			cookie     : true,
			xfbml      : true,
			version    : 'v2.8'
		});
	};

	(function(d, s, id){
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) {return;}
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_US/sdk.js";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
</script>
