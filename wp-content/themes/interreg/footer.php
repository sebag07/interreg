
<!-- .....:::::: Start Footer Section :::::.... -->
<footer class="footer-section footer-bg">

    <!-- Start Footer Center -->
    <div class="footer-center section-top-space">
        <div class="container">
            <div class="row justify-content-xl-between">
                <div class="col-xl-auto col-md-6 col-12">
                    <div class="footer-widget-single-item">
                        <h3 class="title">
                            <?php
                                if (function_exists('icl_object_id')) {
                                    $current_language = apply_filters('wpml_current_language', NULL);
                                    echo $current_language == 'ro' ? 'CONTACTEAZĂ-NE' : 'CONTACT US';
                                } else {
                                    echo 'CONTACT US';
                                }
                            ?>
                        </h3>

                        <ul class="footer-about">
                        <?php
                            $location = get_field('location', 'option');
                            $phone = get_field('phone', 'option');
                            $web = get_field('web', 'option');
                            $email = get_field('email', 'option');

                            if ($location) : ?>
                            <li>
                                <div class="text"><span class="text-marker"><?php echo $current_language == 'ro' ? 'Locație:' : 'Location:'; ?></span><?php echo esc_html($location); ?></div>
                            </li>
                            <?php endif;

                            if ($phone) : ?>
                            <li>
                                <div class="text"><span class="text-marker"><?php echo $current_language == 'ro' ? 'Telefon:' : 'Phone:'; ?></span><a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone)); ?>"><?php echo esc_html($phone); ?></a></div>
                            </li>
                            <?php endif;

                            if ($web) : ?>
                            <li>
                                <div class="text"><span class="text-marker">Web:</span><a href="<?php echo esc_url($web); ?>"><?php echo esc_html($web); ?></a></div>
                            </li>
                            <?php endif;

                            if ($email) : ?>
                            <li>
                                <div class="text"><span class="text-marker">Email:</span><a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a></div>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-auto col-md-6 col-12">
                    <div class="footer-widget-single-item">
                    <h3 class="title">
                            <?php
                            if (function_exists('icl_object_id')) {
                                $current_language = apply_filters('wpml_current_language', NULL);
                                echo $current_language == 'ro' ? 'EVENIMENTE RECENTE' : 'RECENT EVENTS';
                            } else {
                                echo 'RECENT EVENTS';
                            }
                            ?>
                        </h3>
                        <ul class="footer-blog">
            <?php 
            $args = array(
                'post_type' => 'evenimente',
                'posts_per_page' => 2,
                'orderby' => 'date',
                'order' => 'DESC'
            );
            
            $recent_events = new WP_Query($args);
            
            if ($recent_events->have_posts()) :
                while ($recent_events->have_posts()) : $recent_events->the_post();
                $event_date = get_field('date', get_the_ID());
                ?>
                <li>
                    <a href="<?php the_permalink(); ?>" class="image">
                        <?php 
                        if (has_post_thumbnail()) {
                            the_post_thumbnail('thumbnail');
                        } else {
                            echo '<img src="' . get_template_directory_uri() . '/assets/images/blog/blog-list-img-1.png" alt="">';
                        }
                        ?>
                    </a>
                    <div class="content">
                        <a class="title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        <span class="date">
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
                    </div>
                </li>
            <?php 
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </ul>
                    </div>
                </div>
                <div class="col-xl-auto col-md-6 col-12">
                <div class="footer-widget-single-item">
                        <h3 class="title">
                            <?php
                            $current_language = apply_filters('wpml_current_language', NULL);
                            echo $current_language == 'ro' ? 'NAVIGAȚIE' : 'NAVIGATION';
                            ?>
                        </h3>
                        <ul class="footer-nav">
                        <?php
                            wp_nav_menu(array(
                                'theme_location' => 'primary-menu',
                                'menu_class'     => 'mobile-menu',
                                'container'      => false,
                                'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
                                'walker'         => new Walker_Nav_Menu()
                            ));
                        ?>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-auto col-md-6 col-12">
                    <div class="footer-widget-single-item">
                        <h3 class="title">QUICK LINKS</h3>
                        <ul class="footer-nav">
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Cookie Policy</a></li>
                            <li><a href="#">Terms & Conditions</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Footer Center -->

    <!-- Start Footer Bottom -->
    <div class="footer-bottom ">
        <div class="container">
            <div class="row justify-content-md-between justify-content-center align-items-center flex-column-reverse flex-md-row">
                <div class="col-auto">
                    <div class="footer-bottom-left">
                        <div class="footer-copyright">
                        <p class="copyright-text">
                            &copy; <?php echo date('Y'); ?> 
                            <a href="<?php echo esc_url(apply_filters('wpml_home_url', get_home_url())); ?>">Transfrtrontaliera</a> Made with <i class="icofont-heart"></i> by <a href="https://ghem.app/" target="_blank">Ghem</a>
                        </p>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="footer-bottom-right">
                        <?php if (have_rows('socials_repeater', 'option')) : ?>
                            <ul class="footer-soacial">
                                <?php while (have_rows('socials_repeater', 'option')) : the_row(); 
                                    $text = get_sub_field('name');
                                    $url = get_sub_field('url');
                                ?>
                                    <li>
                                        <a href="<?php echo esc_url($url); ?>" target="_blank">
                                            <?php echo esc_html($text); ?>
                                        </a>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Footer Bottom -->
</footer>
<!-- .....:::::: End Footer Section :::::.... -->

<!-- material-scrolltop button -->
<button class="material-scrolltop" type="button"></button>

</main>
<?php wp_footer(); ?>
</body>
</html>