<!-- Start Blog Feed Display Section -->
<section id="events" class="blog-feed-display-section section-inner-gap section-fluid">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-xxl-4 col-xl-6">
                <!-- Start Section Content -->
                <div class="section-content section-content-space">
                    <?php
                    $sup_title = get_field('events_sup_title');
                    $title = get_field('events_title');
                    $description = get_field('events_description');
                    $button_url = get_field('events_button_url');
                    $button_text = get_field('events_button_text');
                    ?>

                    <?php if ($sup_title) : ?>
                        <p class="title-tag text-gradient"><?php echo esc_html($sup_title); ?></p>
                    <?php endif; ?>

                    <?php if ($title) : ?>
                        <h2 id="events-section-title" class="title"><?php echo esc_html($title); ?></h2>
                    <?php endif; ?>

                    <?php if ($description) : ?>
                        <p><?php echo esc_html($description); ?></p>
                    <?php endif; ?>

                    <?php if ($button_url && $button_text) : ?>
                        <a href="<?php echo esc_url($button_url); ?>" class="btn btn-lg btn-primary"><?php echo esc_html($button_text); ?></a>
                    <?php endif; ?>
                </div>
                <!-- End Section Content -->
            </div>

            <div class="col-xxl-8 col-xl-6 col-lg-12">
                <div class="blog-feed-slider">
                    <!-- Slider main container -->
                    <div class="swiper-container">
                        <h3 class="visually-hidden">Event Slider</h3>
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            <?php
                            $args = array(
                                'post_type' => 'evenimente',
                                'posts_per_page' => 3,
                                'orderby' => 'date',
                                'order' => 'DESC'
                            );

                            $events_query = new WP_Query($args);

                            if ($events_query->have_posts()) :
                                while ($events_query->have_posts()) : $events_query->the_post();
                                    $event_date = get_field('date', get_the_ID());
                            ?>
                                    <!-- Start Blog Feed Single Item  -->
                                    <div class="blog-feed-slider-single-item swiper-slide">
                                        <article>
                                            <?php if (has_post_thumbnail()) : ?>
                                                <div class="image">
                                                    <?php the_post_thumbnail('full', array('alt' => get_the_title())); ?>
                                                </div>
                                            <?php endif; ?>

                                            <div class="content">
                                                <ul class="blog-meta meta-box">
                                                    <li>
                                                        <span class="date">
                                                            <span class="visually-hidden">Event Date:</span>
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
                                                        </span>
                                                    </li>
                                                </ul>

                                                <h4 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

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
                                                        <i class="icofont-double-right icon-space-left" aria-hidden="true"></i>
                                                    </span>
                                                </a>
                                            </div>
                                        </article>
                                    </div>
                                    <!-- End Blog Feed Single Item  -->
                            <?php
                                endwhile;
                                wp_reset_postdata();
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Blog Feed Display Section -->