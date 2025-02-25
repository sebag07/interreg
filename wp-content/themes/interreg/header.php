<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <!-- .....:::::: Start Header Section :::::.... -->
    <header class="header-section d-none d-lg-block" role="banner">
        <!-- Start Header Bottom -->
        <div class="header-bottom sticky-header">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-auto">
                        <!-- Start Header Logo -->
                        <div class="logo">
                            <a href="<?php echo esc_url(apply_filters('wpml_home_url', get_home_url())); ?>" aria-label="<?php bloginfo('name'); ?>">
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo/logo.svg" alt="<?php bloginfo('name'); ?> Logo">
                            </a>                    
                        </div>
                        <!-- End Header Logo -->
                    </div>
                    <!-- For desktop menu -->
                    <div class="col-auto">
                        <nav role="navigation" aria-label="<?php esc_attr_e( 'Main Navigation', 'interreg' ); ?>">
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
                        </nav>
                    </div>
                    <div class="col-auto">
                        <!-- Start Header Social Link -->
                        <?php if (have_rows('socials_repeater', 'option')) : ?>
                            <ul class="social-link social-link-white" aria-label="<?php esc_attr_e( 'Social Media Links', 'interreg' ); ?>">
                                <?php while (have_rows('socials_repeater', 'option')) : the_row(); 
                                    $icon = get_sub_field('icon');
                                    $url = get_sub_field('url');
                                    $custom_icon = get_sub_field('custom_icon');
                                    $social_name = get_sub_field('social_name'); // Add this field in ACF
                                ?>
                                    <li>
                                        <a target="_blank" href="<?php echo esc_url($url); ?>" aria-label="<?php echo esc_attr($social_name); ?>">
                                            <?php if ($custom_icon) : ?>
                                                <img src="<?php echo esc_url($custom_icon['url']); ?>" alt="" width="15" height="15">
                                            <?php else : ?>
                                                <i class="icofont-<?php echo esc_attr($icon); ?>" aria-hidden="true"></i>
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
    <div class="mobile-header d-block d-lg-none" role="banner">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col">
                    <div class="mobile-logo">
                        <a href="<?php echo esc_url(apply_filters('wpml_home_url', get_home_url())); ?>" aria-label="<?php bloginfo('name'); ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo/logo.svg" alt="">
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="mobile-action-link text-end">
                        <button id="mobile-menu-toggle" class="offcanvas-toggle offside-menu" aria-expanded="false" aria-controls="mobile-menu-offcanvas">
                            <i class="icofont-navigation-menu" aria-hidden="true"></i>
                            <span class="screen-reader-text"><?php esc_html_e( 'Toggle mobile menu', 'interreg' ); ?></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .....:::::: End Mobile Header Section :::::.... -->

    <!-- Start Offcanvas Mobile Menu Section -->
    <div id="mobile-menu-offcanvas" class="offcanvas offcanvas-rightside offcanvas-mobile-menu-section" aria-labelledby="mobile-menu-title">
        <!-- Start Offcanvas Header -->
        <div class="offcanvas-header text-end">
            <h2 id="mobile-menu-title" class="screen-reader-text"><?php esc_html_e( 'Mobile Menu', 'interreg' ); ?></h2>
            <button class="offcanvas-close" aria-label="<?php esc_attr_e( 'Close mobile menu', 'interreg' ); ?>">
                <i class="icofont-close-line" aria-hidden="true"></i>
            </button>
        </div>
        <!-- End Offcanvas Header -->
        <!-- Start Offcanvas Mobile Menu Wrapper -->
        <div id="mobile-menu-wrapper" class="offcanvas-mobile-menu-wrapper">        
            <!-- Start Mobile Menu  -->
            <div class="mobile-menu-bottom">
                <!-- Start Mobile Menu Nav -->
                <nav class="offcanvas-menu" role="navigation" aria-label="<?php esc_attr_e( 'Mobile Navigation', 'interreg' ); ?>">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary-menu',
                        'menu_class'     => 'mobile-menu',
                        'container'      => false,
                        'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
                        'walker'         => new Walker_Nav_Menu()
                    ));
                    ?>
                </nav>
                <!-- End Mobile Menu Nav -->
            </div>
            <!-- End Mobile Menu -->

            <!-- Start Mobile contact Info -->
            <div class="mobile-contact-info text-center">
                <ul class="social-link social-link-white" aria-label="<?php esc_attr_e( 'Social Media Links', 'interreg' ); ?>">
                <?php 
                    if (have_rows('socials_repeater', 'option')) : 
                        while (have_rows('socials_repeater', 'option')) : the_row();
                            $icon = get_sub_field('icon');
                            $url = get_sub_field('url');
                            $custom_icon = get_sub_field('custom_icon');
                            $social_name = get_sub_field('social_name'); // Add this field in ACF
                    ?>
                        <li>
                            <a target="_blank" href="<?php echo esc_url($url); ?>" aria-label="<?php echo esc_attr($social_name); ?>">
                                <?php if ($custom_icon) : ?>
                                    <img src="<?php echo esc_url($custom_icon['url']); ?>" alt="" width="15" height="15">
                                <?php else : ?>
                                    <i class="icofont-<?php echo esc_attr($icon); ?>" aria-hidden="true"></i>
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
        </div>
        <!-- End Offcanvas Mobile Menu Wrapper -->
    </div>
    <!-- End Offcanvas Mobile Menu Section -->

    <!-- Offcanvas Overlay -->
    <div class="offcanvas-overlay"></div>

    <main id="main-content" class="main-wrapper">

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var mobileMenu = document.getElementById('mobile-menu-wrapper');
        var mobileMenuToggle = document.getElementById('mobile-menu-toggle');
        var offcanvasMenu = document.getElementById('mobile-menu-offcanvas');
        var overlay = document.querySelector('.offcanvas-overlay');
        var offcanvasClose = document.querySelector('.offcanvas-close');
    
        function closeMobileMenu() {
            if (offcanvasMenu && offcanvasMenu.classList.contains('offcanvas-open')) {
                offcanvasMenu.classList.remove('offcanvas-open');
                offcanvasMenu.classList.remove('is-active');
            }
            
            if (overlay) {
                overlay.style.display = 'none';
            }
    
            document.body.classList.remove('mobile-menu-active');
            mobileMenuToggle.setAttribute('aria-expanded', 'false');
            
            // Remove all focusable elements from the tab order
            var focusableElements = offcanvasMenu.querySelectorAll('button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])');
            focusableElements.forEach(function(el) {
                el.setAttribute('tabindex', '-1');
            });
        }
    
        function openMobileMenu() {
            offcanvasMenu.classList.add('offcanvas-open');
            offcanvasMenu.classList.add('is-active');
            overlay.style.display = 'block';
            document.body.classList.add('mobile-menu-active');
            mobileMenuToggle.setAttribute('aria-expanded', 'true');
            
            // Add all focusable elements back to the tab order
            var focusableElements = offcanvasMenu.querySelectorAll('button, [href], input, select, textarea, [tabindex="-1"]');
            focusableElements.forEach(function(el) {
                el.removeAttribute('tabindex');
            });
            
            // Focus on the first focusable element in the mobile menu
            focusableElements[0].focus();
        }
    
        if (mobileMenu) {
            mobileMenu.addEventListener('click', function(e) {
                if (e.target.tagName === 'A') {
                    closeMobileMenu();
                }
            });
        }
    
        if (mobileMenuToggle) {
            mobileMenuToggle.addEventListener('click', function(e) {
                e.preventDefault(); // Prevent any default action
                var isExpanded = this.getAttribute('aria-expanded') === 'true';
                if (isExpanded) {
                    closeMobileMenu();
                } else {
                    openMobileMenu();
                }
            });
        }
    
        if (offcanvasClose) {
            offcanvasClose.addEventListener('click', closeMobileMenu);
        }
    
        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            if (offcanvasMenu.classList.contains('offcanvas-open') && !offcanvasMenu.contains(event.target) && !mobileMenuToggle.contains(event.target)) {
                closeMobileMenu();
            }
        });
    
        // Handle ESC key to close the mobile menu
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape' && offcanvasMenu.classList.contains('offcanvas-open')) {
                closeMobileMenu();
                mobileMenuToggle.focus(); // Return focus to the toggle button
            }
        });
    
        // Trap focus within the mobile menu when it's open
        offcanvasMenu.addEventListener('keydown', function(event) {
            if (event.key === 'Tab') {
                var focusableElements = offcanvasMenu.querySelectorAll('button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])');
                var firstFocusableElement = focusableElements[0];
                var lastFocusableElement = focusableElements[focusableElements.length - 1];
    
                if (event.shiftKey) {
                    if (document.activeElement === firstFocusableElement) {
                        lastFocusableElement.focus();
                        event.preventDefault();
                    }
                } else {
                    if (document.activeElement === lastFocusableElement) {
                        firstFocusableElement.focus();
                        event.preventDefault();
                    }
                }
            }
        });
    
        // Initial setup
        closeMobileMenu();
    });
    </script>