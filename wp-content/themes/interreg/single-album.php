<?php
/**
 * The template for displaying single Album posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Interreg
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

    <?php $album_photos = get_field('album_photos'); ?>

        <!-- .....:::::: Start Project Section :::::.... -->
        <div class="project-section section-inner-gap">
            <div class="container">
                <div class="row">
                    <div class="col-12 p-0">
                        <div class="projects-wrapper mb-n5">
                            <div class="row">
                                <?php foreach ($album_photos as $photo): ?>
                                <div class="col-lg-4 col-md-6 mb-5 filtr-item mining photo-album-item">
                                    <!-- Start Project Display Single Item  -->
                                    <div class="default-slider-item project-display-single-item">
                                        <div class="image">
                                            <img src="<?php echo $photo; ?>" alt="Album Photo">
                                        </div>
                                    </div>
                                    <!-- End Project Display Single Item  -->
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- .....:::::: End Project Section :::::.... -->
</main><!-- #main -->

<?php
get_footer();
?>
