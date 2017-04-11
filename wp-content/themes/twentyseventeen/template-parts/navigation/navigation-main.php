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
<div class="col-md-offset-2 col-md-1 head-logo-container">
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
	function switchMenuOption(newPos) {
		if ($(".menu-top-container a").eq(newPos).hasClass('active') == false) {
			$(".menu-top-container a.active").removeClass('active');
			$(".menu-top-container a").eq(newPos).addClass('active');
		}
	};

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

		// TODO: move this to when people click "Dang Nhap"
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

	$(".menu-top-container a").click(function(event) {
		var index = $(".menu-top-container a").index($(this));
		if (index != 6) {
			var index = $(".menu-top-container a").index($(this));
			if (index == 0 && position != 0) {
				$('html, body').animate({
					scrollTop : 0
				}, 400, function() {
					showOverlay();
				});
			} else if (index != 5) {
				if (position == 0) {
					hideOverlay();
				}
				position = index;
				switchMenuOption(position);
				var element = $("div[position='"+ index +"']");
				$('html, body').animate({
					scrollTop : $(element).offset().top - $(".nav-menu-top").innerHeight()
				}, 400);
			} else {
				return true;
			}
			return false;
		} else {
			return true;
		}
	});
</script>
