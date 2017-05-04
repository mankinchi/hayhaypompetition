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
        					for ($i=0; $i <= 3; $i++) {
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
    // XS menu
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
    }

    function hideMenu() {
        if (mobile) {
            $(".moreNav").trigger('click');
        }
    }

	$(".menu-top-container a").eq(<?php echo $id ?>).addClass('active');
	function switchMenuOption() {
		$(".menu-top-container a.active").removeClass('active');
        var pos = positionNameArray.indexOf(positionName);
		$(".menu-top-container a").eq(pos).addClass('active');
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

    function navCheckScrolling(direction) {
        switch (direction) {
            case "up":
                var currentPos = positionNameArray.indexOf(positionName);
                if (currentPos > 1) {
                    var checkedPos = positionNameArray[currentPos - 1];
                    var checkedEl = $("div[positionName='" + checkedPos + "']");

                    var limit = checkedEl.offset().top + checkedEl.innerHeight()/2;
                    var windowPos = $(window).scrollTop();
                    if (windowPos <= limit) {
                        positionName = checkedPos;
                        switchMenuOption();
                    }
                };
                break;
            case "down":
                var currentPos = positionNameArray.indexOf(positionName);
                if (positionName == "#trang-chu") {
                    animateSmallNav();
                    positionName = positionNameArray[currentPos + 1];
                } else {
                    if (currentPos <= positionNameArray.length - 2) {
                        var checkedPos = positionNameArray[currentPos + 1];
                        var checkedEl = $("div[positionName='" + checkedPos + "']");
                        var limit = checkedEl.offset().top + checkedEl.innerHeight()/2;
                        var windowPos = $(window).scrollTop() + $(window).innerHeight();
                        if (windowPos >= limit) {
                            positionName = checkedPos;
                        }
                    };
                }
                switchMenuOption();
                break;
            default:
                break;
        }
    }

    var positionName = "#trang-chu";
    var positionNameArray = new Array();
    $(".menu-top-container a").each(function(index, el) {
        var location = $(el).attr('href');
        if (location[0] == "#") {
            positionNameArray.push($(el).attr('href'));
        }
    });

	$(".menu-top-container a").click(function(event) {
		var location = $(this).attr('href');
        if (location != positionName) {
            hideMenu();
            if (location[0] != "#") {
                // Nut Dang ky => link bitly
                return true;
            } else {
                if (location == "#trang-chu" && positionName != "#trang-chu") {
                    $('html, body').animate({
    					scrollTop : 0
    				}, 400).promise().then(function() {
    					showOverlay();
    				});
                } else {
                    if (location != "#trang-chu" && positionName == "#trang-chu") {
                        hideOverlay();
                    };
    				var element = $("div[positionName='"+ location +"']");
    				$('html, body').animate({
    					scrollTop : $(element).offset().top
    				}, 400);
                }
                positionName = location;
                switchMenuOption();
                return false;
            }
        } else {
            return false;
        }
	});
</script>
