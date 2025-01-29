<?php
/**
 * Template Name: Evenimente
 */

get_header();
?>

<main class="main-wrapper">
    <!-- .....:::::: Start Breadcrumb Section :::::.... -->
    <div class="breadcrumb-section">
        <div class="breadcrumb-wrapper">
            <div class="image">
                <?php 
                $hero_image = get_field('hero_background_image');
                if ($hero_image): ?>
                    <img src="<?php echo esc_url($hero_image['url']); ?>" alt="<?php echo esc_attr($hero_image['alt']); ?>">
                <?php else: ?>
                    <div class="image"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero-slider/hero-slider-1.webp" alt="Default Hero Image"></div>
                <?php endif; ?>
                <div class="overlay"></div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="content">
                            <h2 class="title"><?php the_title(); ?></h2>
                            <ol class="breadcrumb-link">
                            <li>
                                    <?php
                                        $current_language = apply_filters('wpml_current_language', NULL);
                                        if ($current_language === 'ro') {
                                            $home_url = apply_filters('wpml_home_url', get_home_url());
                                            echo '<a href="' . esc_url($home_url) . '">Acasă</a>';
                                        } else {
                                            $home_url = apply_filters('wpml_home_url', get_home_url(), 'en');
                                            echo '<a href="' . esc_url($home_url) . '">Home</a>';
                                        }
                                    ?>
                                </li>
                                <li class="active" aria-current="page"><?php the_title(); ?></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </div>
    <!-- .....:::::: End Breadcrumb Section :::::.... -->

    <!-- .....:::::: Start Blog Feed Display Section :::::.... -->
    <div class="blog-section section-inner-gap section-fluid">
        <div class="blog-section-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <?php
                    $args = array(
                        'post_type' => 'evenimente',
                        'posts_per_page' => 6
                    );
                    $query = new WP_Query($args);
                    if ($query->have_posts()) :
                        while ($query->have_posts()) : $query->the_post();
                        $event_date = get_field('date', get_the_ID());

                    ?>
                        <div class="col-xxl-4 col-sm-6 col-12">
                            <!-- Start Blog Feed Single Item  -->
                            <div class="blog-feed-slider-single-item swiper-slide">
                                <a href="<?php the_permalink(); ?>" class="image">
                                    <?php the_post_thumbnail('large'); ?>
                                </a>
    
                                <div class="content">
                                <ul class="blog-meta meta-box">
                                            <li>
                                                <a href="<?php the_permalink(); ?>" class="date icon-space-right">
                                                    <i class="icofont-ui-calendar"></i>
                                                    <span class="text">
														<?php 
															if ($event_date) {
																// Check if $event_date is already a timestamp
																if (is_numeric($event_date)) {
																	$timestamp = $event_date;
																} else {
																	// If it's not a timestamp, try to convert it
																	$timestamp = strtotime($event_date);
																}
																
																if ($timestamp !== false) {
																	echo esc_html(date_i18n('d.m.Y', $timestamp));
																} else {
																	// If conversion fails, output the raw date
																	echo esc_html($event_date);
																}
															} else {
																echo esc_html(get_the_date('d.m.Y'));
															}
														?>
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                        <h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                                        <a href="<?php the_permalink(); ?>" class="btn btn-sm btn-outline-primary text-uppercase">
											<span>
                                                <?php
                                                if (function_exists('icl_object_id')) {
                                                    $current_language = apply_filters('wpml_current_language', NULL);
                                                    echo $current_language == 'ro' ? 'citește mai mult' : 'read more';
                                                } else {
                                                    echo 'read more';
                                                }
                                                ?>
                                                <i class="icofont-double-right icon-space-left"></i>
                                            </span>                                        
										</a>
                                </div>
                            </div>
                            <!-- End Blog Feed Single Item  -->
                        </div>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- .....:::::: End Blog Feed Display Section :::::.... -->
</main>

<?php
get_footer();
?>