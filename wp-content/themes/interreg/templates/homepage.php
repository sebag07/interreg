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
                    <div class="hero-slider-single-item swiper-slide">
                        <!-- Hero Background -->
                        <div class="hero-bg">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero-slider/hero-slider-1.webp"
                                 alt="">
                        </div>
                        <!-- Hero Content -->
                        <div class="hero-content">
                            <div class="container">
                                <div class="col-xl-8 col-lg-10 offset-lg-1 col-12">
                                    <div class="content-box">
                                        <h4 class="sup-title">RORS00063</h4>
                                        <h2 class="title">ERA-MIN</h2>
                                        <h5 class="sub-title">Environmental risk assessment from mining activities as a
                                            result of tailings storage in the crossborder area Romania – Serbia</h5>

                                        <a href="#events" class="btn btn-lg btn-primary">Events <i
                                                    class="icofont-double-right icon-space-left"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Hero Single ItemSlides -->
                </div>
            </div>
        </div>
    </div>
    <!-- .....:::::: End Hero Section :::::.... -->

    <!-- .....:::::: Start Promo Section :::::.... -->
    <div class="promo-section">
        <div class="promo-wrapper">
            <!-- Start Single Promo Singel Item -->
            <div class="promo-single-item">
                <div class="box">
                    <div class="icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/promo-icon-1.png"
                             alt="">
                    </div>
                    <div class="content">
                        <h4 class="title">Context</h4>
                        <p>The project addresses severe environmental degradation caused by abandoned industrial sites and mining activities in the Moldova Nouă area, posing risks to human health and biodiversity.</p>
                    </div>
                </div>
            </div>
            <!-- End Single Promo Singel Item -->
            <!-- Start Single Promo Singel Item -->
            <div class="promo-single-item">
                <div class="box">
                    <div class="icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/promo-icon-2.png"
                             alt="">
                    </div>
                    <div class="content">
                        <h4 class="title">Challenges</h4>
                        <p>Managing pollution from soil, air, and water contamination, particularly heavy metals and acid mine drainage, while mitigating habitat destruction and long-term ecological damage.</p>
                    </div>
                </div>
            </div>
            <!-- End Single Promo Singel Item -->
            <!-- Start Single Promo Singel Item -->
            <div class="promo-single-item">
                <div class="box">
                    <div class="icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/promo-icon-3.png"
                             alt="">
                    </div>
                    <div class="content">
                        <h4 class="title">Opportunities</h4>
                        <p>Implementing sustainable practices to rehabilitate polluted sites, restore ecosystems, and innovate mining processes to reduce environmental impact and support biodiversity.</p>
                    </div>
                </div>
            </div>
            <!-- End Single Promo Singel Item -->
        </div>
    </div>
    <!-- .....:::::: End Promo Section :::::.... -->

    <!-- .....:::::: Start About-Display Section :::::.... -->
    <div id="about" class="about-display-section section-top-space">
        <div class="about-display-wrapper">
            <div class="container">
                <div class="box">
                    <!-- Start About Display Background -->
                    <div class="image">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/background/about-display-bg.webp"
                             alt="About Us Background">
                    </div>
                    <!-- End About Display Background -->

                    <!-- Start About Display Inner Content -->
                    <div class="content">
                        <div class="left">
                            <h4 class="sup-title text-gradient">ABOUT PROJECT</h4>
                            <h2 class="title"><span class="orange-text-marker-dark">Abandoned</span> Industrial Sites
                                and Ongoing <span class="orange-text-marker-dark">Mining</span> Activities</span>
                            </h2>
                            <h3 class="sub-title">Impacts on <span class="orange-text-marker-light">Biodiversity</span>
                                and
                                <span class="orange-text-marker-light">Soil Microorganisms</span></h3>
                        </div>
                        <div class="right">
                            <p>In Moldova Nouă, abandoned industrial sites pose serious threats to human health and the
                                environment.
                                Demand for copper perpetuates mining, making it hard to reduce pollution.
                                Even closed mines continue to affect the area by leaving exposed soil that can spread
                                contaminants.</p>
                            <p>From the first operations, mining disrupts soil and air, releasing toxins that harm
                                biodiversity.
                                Vegetation removal destroys habitats, affecting everything from microorganisms to larger
                                species.
                                Heavy metals and minor pH changes worsen soil conditions, mobilizing harmful
                                substances.</p>
                            <p>Metalliferous waste in tailings dumps contains sulfides that oxidize on contact with air,
                                forming acid mine drainage (AMD).
                                These acidic waters pollute rivers and endanger aquatic life. Ultimately, the
                                contamination extends beyond mine sites, threatening community health in the region.</p>
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