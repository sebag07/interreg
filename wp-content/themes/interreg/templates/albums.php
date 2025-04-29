<?php
/**
 * Template Name: Albume
 */

get_header();
?>

<main id="main-content" class="main-wrapper">
    <!-- Start Breadcrumb Section -->
    <nav class="breadcrumb-section" aria-label="Breadcrumb">
        <div class="breadcrumb-wrapper">
            <div class="image" aria-hidden="true">
                <?php 
                $hero_image = get_field('hero_background_image');
                if ($hero_image): ?>
                    <img src="<?php echo esc_url($hero_image['url']); ?>" alt="" role="presentation">
                <?php else: ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero-slider/hero-slider-1.webp" alt="" role="presentation">
                <?php endif; ?>
                <div class="overlay"></div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="content">
                            <h1 class="title"><?php the_title(); ?></h1>
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
    </nav>
    <!-- End Breadcrumb Section -->

    <!-- Start Blog Feed Display Section -->
    <section class="blog-section section-inner-gap" aria-label="<?php echo esc_attr__('Albums', 'transfrontaliera'); ?>">
        <div class="blog-section-wrapper">
            <div class="container">
                <div class="row">
                    <?php
                    $args = array(
                        'post_type' => 'album',
                        'posts_per_page' => 6
                    );
                    $query = new WP_Query($args);
                    if ($query->have_posts()) :
                        while ($query->have_posts()) : $query->the_post();
                        $event_date = get_field('date', get_the_ID());
                    ?>
                        <div class="col-xxl-4 col-sm-6 col-12">
                            <!-- Start Blog Feed Single Item  -->
                            <article class="blog-feed-slider-single-item">
                                <a href="<?php the_permalink(); ?>" class="image">
                                    <?php the_post_thumbnail('large', array('alt' => get_the_title())); ?>
                                </a>
    
                                <div class="content">
                                    <ul class="blog-meta meta-box">
                                        <li>
                                            <time datetime="<?php echo get_the_date('Y-m-d'); ?>" class="date icon-space-right">
                                                <i class="icofont-ui-calendar" aria-hidden="true"></i>
                                                <span class="text">
                                                    <?php 
                                                    if ($event_date) {
                                                        if (is_numeric($event_date)) {
                                                            $timestamp = $event_date;
                                                        } else {
                                                            $timestamp = strtotime($event_date);
                                                        }
                                                        
                                                        if ($timestamp !== false) {
                                                            echo esc_html(date_i18n('d.m.Y', $timestamp));
                                                        } else {
                                                            echo esc_html($event_date);
                                                        }
                                                    } else {
                                                        echo esc_html(get_the_date('d.m.Y'));
                                                    }
                                                    ?>
                                                </span>
                                            </time>
                                        </li>
                                    </ul>
                                    <h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                                    <a href="<?php the_permalink(); ?>" class="btn btn-sm btn-outline-primary text-uppercase">
                                        <span>
                                            <?php
                                            if (function_exists('icl_object_id')) {
                                                $current_language = apply_filters('wpml_current_language', NULL);
                                                echo $current_language == 'ro' ? 'Descoperă Album' : 'Discover Album';
                                            } else {
                                                echo 'Discover Album';
                                            }
                                            ?>
                                            <i class="icofont-double-right icon-space-left" aria-hidden="true"></i>
                                        </span>                                        
                                    </a>
                                </div>
                            </article>
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
    </section>
    <!-- End Blog Feed Display Section -->
</main>

<?php
get_footer();
?>