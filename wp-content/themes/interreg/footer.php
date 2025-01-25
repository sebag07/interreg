
<!-- .....:::::: Start Footer Section :::::.... -->
<footer class="footer-section footer-bg">

    <!-- Start Footer Center -->
    <div class="footer-center section-top-space">
        <div class="container">
            <div class="row justify-content-xl-between">
                <div class="col-xl-auto col-md-6 col-12">
                    <div class="footer-widget-single-item">
                        <h3 class="title">CONTACT US</h3>

                        <ul class="footer-about">
                            <li>
                                <div class="text"><span class="text-marker">Location:</span>Piața Victoriei nr. 2, et. 1.</div>
                            </li>
                            <li>
                                <div class="text"><span class="text-marker">Phone:</span><a href="tel:+40256404509">0256 404 509</a></div>
                            </li>
                            <li>
                                <div class="text"><span class="text-marker">Web:</span><a href="https://www.transfrontaliera.upt.ro">www.transfrontaliera.upt.ro</a></div>
                            </li>
                            <li>
                                <div class="text"><span class="text-marker">Email:</span> <a href="mailto:nicoleta.nemes@upt.ro">nicoleta.nemes@upt.ro</a> </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-auto col-md-6 col-12">
                    <div class="footer-widget-single-item">
                        <h3 class="title">RECENT EVENTS</h3>

                        <ul class="footer-blog">
            <?php 
            $args = array(
                'post_type' => 'event',
                'posts_per_page' => 2,
                'orderby' => 'date',
                'order' => 'DESC'
            );
            
            $recent_events = new WP_Query($args);
            
            if ($recent_events->have_posts()) :
                while ($recent_events->have_posts()) : $recent_events->the_post();
                    $event_date = get_field('event_date');
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
                            29 January, 2025
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
                        <h3 class="title">OUR SERVICES</h3>
                        <ul class="footer-nav">
                            <li><a href="#">Home</a></li>
                            <li><a href="#about">About Us</a></li>
                            <li><a href="#services">Our Services</a></li>
                            <li><a href="#events">Events</a></li>
                        </ul>
                    </div>
                </div>
                <!-- <div class="col-xl-auto col-md-6 col-12">
                    <div class="footer-widget-single-item">
                        <h3 class="title">QUICK LINKS</h3>
                        <ul class="footer-nav">
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Cookie Policy</a></li>
                        </ul>
                    </div>
                </div> -->
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
                            <p class="copyright-text">&copy; 2025 <a href="index.html">Interreg</a> Made with <i class="icofont-heart"></i> by <a href="https://ghem.app/" target="_blank">Ghem</a> </p>
                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="footer-bottom-right">
                        <ul class="footer-soacial">
                            <li><a href="https://www.example.com" target="_blank">Facebook</a></li>
                            <li><a href="https://www.example.com" target="_blank">Twitter</a></li>
                            <li><a href="https://www.example.com" target="_blank">Instagram</a></li>
                            <li><a href="https://www.example.com" target="_blank">Youtube</a></li>
                        </ul>
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