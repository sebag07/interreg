<!-- .....:::::: Start Client Logo Display Section :::::.... -->
<div class="client-logo-display-section section-top-space">
	<div class="client-logo-display-wrapper ">
		<!--   TODO: Add inline style to custom class -->
		<div class="container border-bottom-thick" style="display: flex; flex-direction: column; gap: 50px; padding-bottom: 50px;">
			<?php
			$first_logo_shown = false;
			if (have_rows('clientspartners_repeater', 'options')) :
				while (have_rows('clientspartners_repeater', 'options')) : the_row();
					$logo_image = get_sub_field('logo_image');
					$logo_url = get_sub_field('logo_url');

					if ($logo_image) :
						if (!$first_logo_shown) :
							// First logo - centered in col-6
			?>
							<div class="row justify-content-center">
								<div class="clients-logo-single-item col-lg-6 col-md-12 col-sm-12 col-12">
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
							</div>
							<div class="row justify-content-center sub-clients-logo-row">
							<?php
							$first_logo_shown = true;
						else :
							// All other logos - col-3
							?>
								<div class="clients-logo-single-item col-lg-3 col-md-6 col-sm-6 col-7">
									<?php if ($logo_url) : ?>
										<a href="<?php echo esc_url($logo_url); ?>" class="image">
										<?php endif; ?>
										<img class="img-fluid clients-logo-image"
											src="<?php echo esc_url($logo_image['url']); ?>"
											alt="<?php echo esc_attr($logo_image['alt']); ?>">
										<?php if ($logo_url) : ?>
										</a>
									<?php endif; ?>
								</div>
				<?php
						endif;
					endif;
				endwhile;
			endif;
				?>
							</div> <!-- Close the second row -->
		</div> <!-- Close container -->
	</div> <!-- Close client-logo-display-wrapper -->
</div> <!-- Close client-logo-display-section -->
<!-- .....:::::: End Client Logo Display Section :::::.... -->