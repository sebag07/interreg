<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Interreg - Environmental risk assessment from mining activities</title>
    <meta name="description" content="Environmental risk assessment from mining activities as a result of tailings storage in the crossborder area Romania – Serbia"/>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!-- <header>
	<h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
	<p><?php bloginfo('description'); ?></p>
	<?php wp_nav_menu(array('theme_location' => 'primary')); ?>
</header> -->

<!-- .....:::::: Start Header Section :::::.... -->
<header class="header-section d-none d-lg-block">

    <!-- Start Header Bottom -->
    <div class="header-bottom sticky-header">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-auto">
                    <!-- Start Header Logo -->
                    <div class="logo">
                    <a href="<?php echo esc_url(apply_filters('wpml_home_url', get_home_url())); ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo/logo.svg" alt="Transfrontaliera Logo">
                        </a>                    
                    </div>
                    <!-- End Header Logo -->
                </div>
                <!-- For desktop menu -->
                <div class="col-auto">
		            <?php
		            add_filter('wp_nav_menu_args', function($args) {
			            if($args['theme_location'] == 'primary-menu') {
				            $args['menu_class'] = 'header-nav';
				            $args['container'] = false;
				            $args['items_wrap'] = '<ul class="%2$s">%3$s</ul>';
				            $args['walker'] = new Walker_Nav_Menu();
			            }
			            return $args;
		            });

		            wp_nav_menu(array(
			            'theme_location' => 'primary-menu'
		            ));
		            ?>
                </div>
                <div class="col-auto">
                    <!-- Start Header Social Link -->
                    <?php if (have_rows('socials_repeater', 'option')) : ?>
                        <ul class="social-link social-link-white">
                            <?php while (have_rows('socials_repeater', 'option')) : the_row(); 
                                $icon = get_sub_field('icon');
                                $url = get_sub_field('url');
                                $custom_icon = get_sub_field('custom_icon');
                            ?>
                                <li>
                                    <a target="_blank" href="<?php echo esc_url($url); ?>">
                                        <?php if ($custom_icon) : ?>
                                            <img src="<?php echo esc_url($custom_icon['url']); ?>" alt="<?php echo esc_attr($custom_icon['alt']); ?>" width="15" height="15">
                                        <?php else : ?>
                                            <i class="icofont-<?php echo esc_attr($icon); ?>"></i>
                                        <?php endif; ?>
                                    </a>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
                    <!-- End Header Social Link -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Bottom -->
</header>
<!-- .....:::::: End Header Section :::::.... -->

<!-- .....:::::: Start Mobile Header Section :::::.... -->
<div class="mobile-header d-block d-lg-none">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col">
                <div class="mobile-logo">
                    <a href="<?php echo home_url(); ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo/logo.png" alt="">
                    </a>
                </div>
            </div>
            <div class="col">
                <div class="mobile-action-link text-end">
                <a href="#mobile-menu-offcanvas" class="offcanvas-toggle offside-menu"><i class="icofont-navigation-menu"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- .....:::::: Start MobileHeader Section :::::.... -->

<!-- Script for mobile menu to close when a link is clicked: -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    var mobileMenu = document.getElementById('mobile-menu-wrapper');
    if (mobileMenu) {
        mobileMenu.addEventListener('click', function(e) {
            if (e.target.tagName === 'A') {
                // Close the mobile menu
                var offcanvasMenu = document.getElementById('mobile-menu-offcanvas');
                if (offcanvasMenu && offcanvasMenu.classList.contains('offcanvas-open')) {
                    offcanvasMenu.classList.remove('offcanvas-open');
                }
                
                // Remove the overlay
                var overlay = document.querySelector('.offcanvas-overlay');
                if (overlay) {
                    overlay.style.display = 'none';
                }

                // Remove 'active' class from body if it exists
                document.body.classList.remove('mobile-menu-active');
            }
        });
    }
});
</script>
<!--  Start Offcanvas Mobile Menu Section -->
<div id="mobile-menu-offcanvas" class="offcanvas offcanvas-rightside offcanvas-mobile-menu-section">
    <!-- Start Offcanvas Header -->
    <div class="offcanvas-header text-end">
        <button class="offcanvas-close"><i class="icofont-close-line"></i></button>
    </div> <!-- End Offcanvas Header -->
    <!-- Start Offcanvas Mobile Menu Wrapper -->
    <div id="mobile-menu-wrapper" class="offcanvas-mobile-menu-wrapper">        
        <!-- Start Mobile Menu  -->
        <div class="mobile-menu-bottom">
            <!-- Start Mobile Menu Nav -->
            <div class="offcanvas-menu">
            <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary-menu',
                    'menu_class'     => 'mobile-menu',
                    'container'      => false,
                    'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
                    'walker'         => new Walker_Nav_Menu()
                ));
                ?>
            </div> <!-- End Mobile Menu Nav -->
        </div> <!-- End Mobile Menu -->

        <!-- Start Mobile contact Info -->
        <div class="mobile-contact-info text-center">
            <ul class="social-link social-link-white">
            <?php 
                if (have_rows('socials_repeater', 'option')) : 
                    while (have_rows('socials_repeater', 'option')) : the_row();
                        $icon = get_sub_field('icon');
                        $url = get_sub_field('url');
                        $custom_icon = get_sub_field('custom_icon');
                ?>
                    <li>
                        <a target="_blank" href="<?php echo esc_url($url); ?>">
                            <?php if ($custom_icon) : ?>
                                <img src="<?php echo esc_url($custom_icon['url']); ?>" alt="<?php echo esc_attr($custom_icon['alt']); ?>" width="15" height="15">
                            <?php else : ?>
                                <i class="icofont-<?php echo esc_attr($icon); ?>"></i>
                            <?php endif; ?>
                        </a>
                    </li>
                <?php 
                    endwhile;
                endif; 
                ?>
            </ul>
        </div>
        <!-- End Mobile contact Info -->

    </div> <!-- End Offcanvas Mobile Menu Wrapper -->
</div>
<!-- ...:::: End Offcanvas Mobile Menu Section:::... -->

<!-- Offcanvas Overlay -->
<div class="offcanvas-overlay"></div>

<main class="main-wrapper">

