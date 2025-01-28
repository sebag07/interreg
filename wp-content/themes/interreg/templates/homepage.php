<?php

/** Template Name: Home */

get_header();

?>

    <!-- .....:::::: Start Hero Section :::::.... -->
    <div class="hero-section ">
        <div class="hero-wrapper">
            <!-- Slider main container -->
            <div class="hero-slider-active swiper-container">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Start Hero Single ItemSlides -->
        <?php
        if (have_rows('hero_repeater')) :
            while (have_rows('hero_repeater')) : the_row();
                $sup_title = get_sub_field('sup_title');
                $title = get_sub_field('title');
                $sub_title = get_sub_field('sub_title');
                $button_text = get_sub_field('button_text');
                $button_url = get_sub_field('button_url');
                $background_image = get_sub_field('background_image');
        ?>
                <!-- Start Hero Single ItemSlides -->
                <div class="hero-slider-single-item swiper-slide">
                    <!-- Hero Background -->
                    <div class="hero-bg">
                        <img src="<?php echo esc_url($background_image['url']); ?>" alt="<?php echo esc_attr($background_image['alt']); ?>">
                    </div>
                    <!-- Hero Content -->
                    <div class="hero-content">
                        <div class="container">
                            <div class="col-xl-8 col-lg-10 offset-lg-1 col-12">
                                <div class="content-box">
                                    <h4 class="sup-title"><?php echo esc_html($sup_title); ?></h4>
                                    <h2 class="title"><?php echo esc_html($title); ?></h2>
                                    <h5 class="sub-title"><?php echo esc_html($sub_title); ?></h5>

                                    <a href="<?php echo esc_url($button_url); ?>" class="btn btn-lg btn-primary"><?php echo esc_html($button_text); ?> <i class="icofont-double-right icon-space-left"></i></a>
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
    <!-- .....:::::: End Hero Section :::::.... -->

<!-- .....:::::: Start Promo Section :::::.... -->
<div class="promo-section">
    <div class="promo-wrapper">
        <?php
        if (have_rows('promo_repeater')) :
            while (have_rows('promo_repeater')) : the_row();
                $icon = get_sub_field('icon');
                $title = get_sub_field('title');
                $description = get_sub_field('description');
        ?>
            <!-- Start Single Promo Single Item -->
            <div class="promo-single-item">
                <div class="box">
                    <div class="icon">
                        <?php if ($icon) : ?>
                            <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>">
                        <?php endif; ?>
                    </div>
                    <div class="content">
                        <h4 class="title"><?php echo esc_html($title); ?></h4>
                        <p><?php echo esc_html($description); ?></p>
                    </div>
                </div>
            </div>
            <!-- End Single Promo Single Item -->
        <?php
            endwhile;
        endif;
        ?>
    </div>
</div>
<!-- .....:::::: End Promo Section :::::.... -->


    <!-- .....:::::: Start About-Display Section :::::.... -->
    <div id="about" class="about-display-section section-top-space">
        <div class="about-display-wrapper">
            <div class="container">
                <div class="box">

                    <!-- Start About Display Background -->
                    <?php
                    $about_image = get_field('about_background_image');
                    $left_content = get_field('about_left_content');
                    $right_content = get_field('about_right_content');
                    ?>
                    <div class="image">
                        <?php if ($about_image) : ?>
                            <img src="<?php echo esc_url($about_image['url']); ?>" alt="<?php echo esc_attr($about_image['alt']); ?>">
                        <?php endif; ?>
                    </div>
                    <!-- End About Display Background -->

                    <!-- Start About Display Inner Content -->
                    <div class="content">
                        <div class="left">
                            <?php echo wp_kses_post($left_content); ?>
                        </div>
                        <div class="right">
                            <?php echo wp_kses_post($right_content); ?>
                        </div>
                    </div>
                    <!-- End About Display Inner Content -->

                </div>
            </div>
        </div>
    </div>
    <!-- .....:::::: End About-Display Section :::::.... -->

<?php get_template_part( '/templates/homepage-templates/clients-swiper' ); ?>

<?php get_template_part( '/templates/homepage-templates/our-services' ); ?>

<?php get_template_part( '/templates/homepage-templates/how-it-works' ); ?>

<?php get_template_part( '/templates/homepage-templates/testimonials' ); ?>

<?php get_template_part( '/templates/homepage-templates/latest-events' ); ?>

<?php
get_footer();
?>