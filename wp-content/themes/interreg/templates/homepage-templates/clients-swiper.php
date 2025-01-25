<!-- .....:::::: Start Client Logo Display Section :::::.... -->
<div class="client-logo-display-section section-top-space">
	<div class="client-logo-display-wrapper ">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="client-logo-slider border-bottom-thick p-b-160">
						<!-- Slider main container -->
						<div class="swiper-container">
							<!-- Additional required wrapper -->
							<div class="swiper-wrapper">
							<?php
                                if (have_rows('clientspartners_repeater', 'options')) :
                                    while (have_rows('clientspartners_repeater', 'options')) : the_row();
                                        $logo_image = get_sub_field('logo_image');
                                        $logo_url = get_sub_field('logo_url');
                                        if ($logo_image) :
                                ?>
                                            <!-- Start Client Logo Single Item  -->
                                            <div class="client-logo-display-single-item swiper-slide">
                                                <?php if ($logo_url) : ?>
                                                    <a href="<?php echo esc_url($logo_url); ?>" class="image">
                                                <?php endif; ?>
                                                    <img class="img-fluid"
                                                        src="<?php echo esc_url($logo_image['url']); ?>"
                                                        alt="<?php echo esc_attr($logo_image['alt']); ?>">
                                                <?php if ($logo_url) : ?>
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                            <!-- End Client Logo Single Item  -->
                                <?php
                                        endif;
                                    endwhile;
                                endif;
                                ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- .....:::::: End Client Logo Display Section :::::.... -->