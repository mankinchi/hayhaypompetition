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
<?php
	// TODO: Switch navigation bar to page link
	// TODO: Set another new menu in wordpress backend
	// TODO: Check if user has already login (using sessionStorage)
 ?>
<div class="col-md-offset-2 col-md-1 head-logo-container">
    <a href="<?php echo home_url(); ?>"><img class="head-logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/bay-logo.png" alt="intro1"></a>
</div>
<?php
	$menu_name = 'social';
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
        <div class="col-md-3 col-md-offset-1 menu-top-container">
			<div class="row">
				<?php
					for ($i=0; $i <= 2; $i++) {
						echo "<div class='col-md-4'>" . $menu_array[$i] . "</div>";
					}
				?>
		    </div>
		</div>
		<div class="col-md-3 menu-top-container">
			<div class="row">
				<?php
					for ($i=3; $i <= 5; $i++) {
						echo "<div class='col-md-4'>" . $menu_array[$i] . "</div>";
					}
				?>
				<div class="col-md-4 registerBtnNav">
					<a href="https://goo.gl/forms/6pcmSsKmDjmE6uAK2" target="_blank"><button type="button" class="btn btn-block">ĐĂNG KÝ</button></a>
				</div>
		    </div>
		</div>
<?php } ?>
</div>
<script>
    $(".menu-top-container a").eq(<?php echo $id ?>).addClass('active');

	function getDetails() {
		FB.api('/me?fields=id,name', function(response) {
			$(".menu-top-container a").last().text('HI ' + response["name"].toUpperCase());
			sessionStorage.setItem('id',response['id']);
			console.log(response);
		})
	};

	window.fbAsyncInit = function() {
		FB.init({
			appId      : '378664565849556',
			cookie     : true,
			xfbml      : true,
			version    : 'v2.8'
		});

		// FB.getLoginStatus(function(response) {
		// 	if (response["status"] == "connected") {
		// 		getDetails();
		// 	} else {
		// 		$(".menu-top-container a").eq(5).click(function(event) {
		// 			event.preventDefault();
		// 			FB.login(function(response) {
		// 				if (response["status"] == "connected") {
		// 					getDetails();
		// 				}
		// 			});
		// 		});
		// 	}
		// });
	};

	(function(d, s, id){
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) {return;}
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_US/sdk.js";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
</script>
