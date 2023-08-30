jQuery(document).ready(function($){
	//if you change this breakpoint in the style.css file (or _layout.scss if you use SASS), don't forget to update this value as well
	var $L = 1200,
		$menu_navigation = $('#main-nav'),
		$cart_trigger = $('#cd-cart-trigger'),
		$hamburger_icon = $('#cd-hamburger-menu'),
		$lateral_cart = $('#cd-cart'),
		$shadow_layer = $('#cd-shadow-layer'),
		$close_button = $('#cd-close-btn');

	//open lateral menu on mobile
	$hamburger_icon.on('click', function(event){
		event.preventDefault();
		//close cart panel (if it's open)
		$lateral_cart.removeClass('speed-in');
		toggle_panel_visibility($menu_navigation, $shadow_layer, $('body'));
	});
	
	var isCartOpen = false; // Flag to track cart state

    // Open cart
    $cart_trigger.on('click', function(event){
        event.preventDefault();
        // Close lateral menu (if it's open)
        $menu_navigation.removeClass('speed-in');
        // Toggle visibility of cart and shadow layer
        toggle_panel_visibility($lateral_cart, $shadow_layer, $('body'));
        // Toggle class to hide/show cart trigger
        $cart_trigger.toggleClass('is-not-visible');
        // Update cart state flag
        isCartOpen = !isCartOpen;
    });

    // Close cart on clicking close button or shadow layer
    $shadow_layer.on('click', closeCart);
    $close_button.on('click', closeCart);

    function closeCart() {
        $shadow_layer.removeClass('is-visible');
        // Wait for the end of the transition to give the body an overflow hidden
        if ($lateral_cart.hasClass('speed-in')) {
            $lateral_cart.removeClass('speed-in').on('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
                $('body').removeClass('overflow-hidden');
                // Toggle class to hide/show cart trigger only if the cart is closed
                if (!isCartOpen) {
                    $cart_trigger.removeClass('is-not-visible');
                }
            });
            $menu_navigation.removeClass('speed-in');
        } else {
            $menu_navigation.removeClass('speed-in').on('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
                $('body').removeClass('overflow-hidden');
                // Toggle class to hide/show cart trigger only if the cart is closed
                if (!isCartOpen) {
                    $cart_trigger.removeClass('is-not-visible');
                }
            });
            $lateral_cart.removeClass('speed-in');
        }
        // Update cart state flag
        isCartOpen = !isCartOpen;
    }

	//move #main-navigation inside header on laptop
	//insert #main-navigation after header on mobile
	move_navigation( $menu_navigation, $L);
	$(window).on('resize', function(){
		move_navigation( $menu_navigation, $L);
		
		if( $(window).width() >= $L && $menu_navigation.hasClass('speed-in')) {
			$menu_navigation.removeClass('speed-in');
			$shadow_layer.removeClass('is-visible');
			$('body').removeClass('overflow-hidden');
		}

	});
});

function toggle_panel_visibility ($lateral_panel, $background_layer, $body) {
	if( $lateral_panel.hasClass('speed-in') ) {
		// firefox transitions break when parent overflow is changed, so we need to wait for the end of the trasition to give the body an overflow hidden
		$lateral_panel.removeClass('speed-in').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
			$body.removeClass('overflow-hidden');
		});
		$background_layer.removeClass('is-visible');

	} else {
		$lateral_panel.addClass('speed-in').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
			$body.addClass('overflow-hidden');
		});
		$background_layer.addClass('is-visible');
	}
}

function move_navigation( $navigation, $MQ) {
	if ( $(window).width() >= $MQ ) {
		$navigation.detach();
		$navigation.appendTo('header');
	} else {
		$navigation.detach();
		$navigation.insertAfter('header');
	}
}
