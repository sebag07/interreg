<!-- .....:::::: Start Blog Feed Display Section :::::.... -->
<div class="blog-feed-display-section section-top-space section-fluid">
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

			<div class="col-xxl-8 col-xl-6">
				<div class="blog-feed-slider">
					<!-- Slider main container -->
					<div class="swiper-container">
						<!-- Additional required wrapper -->
						<div class="swiper-wrapper">
							<!-- Slides -->
							<!-- Start Blog Feed Single Item  -->
							<div class="blog-feed-slider-single-item swiper-slide">
								<a href="blog-details.html" class="image">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog/blog-list-img-1.png" alt="">
								</a>

								<div class="content">
									<ul class="blog-meta meta-box">
										<li><a href="#" class="date icon-space-right"><i  class="icofont-ui-calendar"></i> <span
													class="text">03.02.2021</span></a></li>
									</ul>

									<h3 class="title"><a href="blog-details.html">Business plan will help you figure out
											how much money you'll need to start.</a></h3>

									<a href="blog-details.html" class="btn btn-sm btn-outline-primary text-uppercase">
                                        <span>read more <i
		                                        class="icofont-double-right icon-space-left"></i></span> </a>
								</div>
							</div>
							<!-- End Blog Feed Single Item  -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- .....:::::: End Blog Feed Display Section :::::.... -->