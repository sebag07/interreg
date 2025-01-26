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