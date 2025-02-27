<?php

/** Template Name: Home */

get_header();

?>

<!-- .....:::::: Start Hero Section :::::.... -->
<section class="hero-section" aria-label="Hero">
    <div class="hero-wrapper">
        <!-- Slider main container -->
        <div class="hero-slider-active swiper-container" role="region" aria-roledescription="carousel">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Start Hero Single ItemSlides -->
                <?php
                if (have_rows('hero_repeater')) :
                    $slide_count = 0;
                    while (have_rows('hero_repeater')) : the_row();
                        $slide_count++;
                        $sup_title = get_sub_field('sup_title');
                        $title = get_sub_field('title');
                        $sub_title = get_sub_field('sub_title');
                        $button_text = get_sub_field('button_text');
                        $button_url = get_sub_field('button_url');
                        $background_image = get_sub_field('background_image');
                ?>
                <!-- Start Hero Single ItemSlides -->
                <div class="hero-slider-single-item swiper-slide" role="group" aria-roledescription="slide" aria-label="<?php echo esc_attr($slide_count); ?> of <?php echo esc_attr($slide_count); ?>">
                    <!-- Hero Background -->
                    <div class="hero-bg">
                        <img src="<?php echo esc_url($background_image['url']); ?>" alt="" aria-hidden="true">
                    </div>
                    <!-- Hero Content -->
                    <div class="hero-content">
                        <div class="container">
                            <div class="col-xl-8 col-lg-10 offset-lg-1 col-12">
                                <div class="content-box">
                                    <?php if (!empty($sup_title)) : ?>
                                        <h2 class="sup-title"><?php echo esc_html($sup_title); ?></h2>
                                    <?php endif; ?>
                                    
                                    <img class="interreg-main-logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/company-logo/interreg.png" alt="Interreg logo">
                                    
                                    <?php if (!empty($title)) : ?>
                                        <h1 class="title" id="slide-title-<?php echo esc_attr($slide_count); ?>"><?php echo esc_html($title); ?></h1>
                                    <?php endif; ?>
                                    
                                    <?php if (!empty($sub_title)) : ?>
                                        <p class="sub-title" id="slide-subtitle-<?php echo esc_attr($slide_count); ?>"><?php echo esc_html($sub_title); ?></p>
                                    <?php endif; ?>
                                    
                                    <?php if (!empty($button_url) && !empty($button_text)) : ?>
                                        <a href="<?php echo esc_url($button_url); ?>" class="btn btn-lg btn-primary">
                                            <?php echo esc_html($button_text); ?>
                                            <span class="sr-only">
                                            <?php
                                                $current_language = get_locale();
                                                echo $current_language === 'ro_RO' ? '(se deschide într-o fereastră nouă)' : '(opens in a new window)';
                                                ?>
                                            </span>
                                            <i class="icofont-double-right icon-space-left" aria-hidden="true"></i>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Hero Single ItemSlides -->
                <?php
                    endwhile;
                endif;
                ?>
            </div>
        </div>
    </div>
</section>
<!-- .....:::::: End Hero Section :::::.... -->

<!-- .....:::::: Start Promo Section :::::.... -->
<section class="promo-section" aria-labelledby="promo-section-title">
    <!-- <h2 id="promo-section-title" class="sr-only">Promotional Features</h2> -->
    <div class="promo-wrapper">
        <?php
        if (have_rows('promo_repeater')) :
            $item_count = 0;
            while (have_rows('promo_repeater')) : the_row();
                $item_count++;
                $icon = get_sub_field('icon');
                $title = get_sub_field('title');
                $description = get_sub_field('description');
        ?>
            <!-- Start Single Promo Item -->
            <article class="promo-single-item" aria-labelledby="promo-title-<?php echo $item_count; ?>">
                <div class="box">
                    <?php if ($icon) : ?>
                        <div class="icon" aria-hidden="true">
                            <img src="<?php echo esc_url($icon['url']); ?>" alt="" role="presentation">
                        </div>
                    <?php endif; ?>
                    <div class="content">
                        <h3 id="promo-title-<?php echo $item_count; ?>" class="title"><?php echo esc_html($title); ?></h3>
                        <p><?php echo esc_html($description); ?></p>
                    </div>
                </div>
            </article>
            <!-- End Single Promo Item -->
        <?php
            endwhile;
        endif;
        ?>
    </div>
</section>
<!-- .....:::::: End Promo Section :::::.... -->


    <!-- .....:::::: Start About-Display Section :::::.... -->
    <section id="about" class="about-display-section section-top-space" aria-labelledby="about-section-title">
        <div class="about-display-wrapper">
            <div class="container">
                <div class="box">
                    <h2 id="about-section-title" class="sr-only">
                        <?php
                        $current_language = get_locale();
                        echo $current_language === 'ro_RO' ? 'Despre proiect' : 'About project';
                        ?>
                    </h2>
                    <!-- Start About Display Background -->
                    <?php
                    $about_image = get_field('about_background_image');
                    $left_content = get_field('about_left_content');
                    $right_content = get_field('about_right_content');
                    $about_button_text = get_field('about_button_text');
                    $about_button_url = get_field('about_button_url');
                    ?>
                    <?php if ($about_image) : ?>
                        <div class="image">
                            <img src="<?php echo esc_url($about_image['url']); ?>" alt="<?php echo esc_attr($about_image['alt']); ?>" <?php echo empty($about_image['alt']) ? 'role="presentation" aria-hidden="true"' : ''; ?>>
                        </div>
                    <?php endif; ?>
                    <!-- End About Display Background -->
    
                    <!-- Start About Display Inner Content -->
                    <div class="content">
                        <div class="left" role="complementary">
                            <?php echo wp_kses_post($left_content); ?>
                            <?php if (!empty($about_button_url) && !empty($about_button_text)) : ?>
                            <a href="<?php echo esc_url($about_button_url); ?>" class="btn btn-lg btn-primary">
                                <?php echo esc_html($about_button_text); ?>
                                <i class="icofont-double-right icon-space-left" aria-hidden="true"></i>
                            </a>
                            <?php endif; ?>
                        </div>
                        <div class="right" role="main">
                            <?php echo wp_kses_post($right_content); ?>
                        </div>
                    </div>
                    <!-- End About Display Inner Content -->
    
                </div>
            </div>
        </div>
    </section>
    <!-- .....:::::: End About-Display Section :::::.... -->

<?php get_template_part( '/templates/homepage-templates/clients-swiper' ); ?>

<?php get_template_part( '/templates/homepage-templates/how-it-works' ); ?>

<?php get_template_part( '/templates/homepage-templates/our-services' ); ?>

<?php get_template_part( '/templates/homepage-templates/testimonials' ); ?>

<?php get_template_part( '/templates/homepage-templates/latest-events' ); ?>

<?php
get_footer();
?>