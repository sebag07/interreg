<!-- .....:::::: Start Blog Feed Display Section :::::.... -->
<div id="events" class="blog-feed-display-section section-top-space section-fluid">
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
                        <h4 class="title-tag text-gradient"><?php echo esc_html($sup_title); ?></h4>
                    <?php endif; ?>

                    <?php if ($title) : ?>
                        <h2 class="title"><?php echo esc_html($title); ?></h2>
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
						<!-- Additional required wrapper -->
						<div class="swiper-wrapper">
							<!-- Slides -->
                            <?php 
                            $args = array(
                                'post_type' => 'event',
                                'posts_per_page' => 3,
                                'orderby' => 'date',
                                'order' => 'DESC'
                            );
                            
                            $events_query = new WP_Query($args);
                            
                            if ($events_query->have_posts()) :
                                while ($events_query->have_posts()) : $events_query->the_post();
                                    $event_date = get_field('event_date'); // Assuming you have an ACF date field
                            ?>
                                <!-- Start Blog Feed Single Item  -->
                                <div class="blog-feed-slider-single-item swiper-slide">
                                    <a href="<?php the_permalink(); ?>" class="image">
                                        <?php 
                                        if (has_post_thumbnail()) {
                                            the_post_thumbnail('full');
                                        }
                                        ?>
                                    </a>

                                    <div class="content">
                                        <ul class="blog-meta meta-box">
                                            <li>
                                                <a href="<?php the_permalink(); ?>" class="date icon-space-right">
                                                    <i class="icofont-ui-calendar"></i>
                                                    <span class="text">
														January 29, 2025
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>

                                        <h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                                        <a href="<?php the_permalink(); ?>" class="btn btn-sm btn-outline-primary text-uppercase">
                                            <span>read more <i class="icofont-double-right icon-space-left"></i></span>
                                        </a>
                                    </div>
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
</div>
<!-- .....:::::: End Blog Feed Display Section :::::.... -->