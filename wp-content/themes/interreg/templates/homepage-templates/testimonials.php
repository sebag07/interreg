<!-- .....:::::: Start Testimonial Display Section :::::.... -->
<div class="testimonial-display-section section-top-space section-inner-gap section-inner-bg section-fluid pos-relative">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<!-- Start Section Content -->
				<div class="section-content section-content-space text-center">
					<h4 class="title-tag text-gradient">
						<?php
							if (function_exists('icl_object_id')) {
								$current_language = apply_filters('wpml_current_language', NULL);
								echo $current_language == 'ro' ? 'Despre Echipa' : 'About Our Team';
							} else {
								echo 'About Our Team';
							}
						?>
					</h4>
					<h2 class="title title-dash">
						<?php
							if (function_exists('icl_object_id')) {
								$current_language = apply_filters('wpml_current_language', NULL);
								echo $current_language == 'ro' ? 'ECHIPA NOASTRĂ' : 'THE TEAM';
							} else {
								echo 'THE TEAM';
							}
						?>
					</h2>
				</div>
				<!-- End Section Content -->

				<div class="tab-content">
					<?php
					// Check if the team_members repeater field exists
					if (have_rows('team_members')) :
						$counter = 0;
						// Loop through each team member
						while (have_rows('team_members')) : the_row();
							$counter++;
							// Get the ACF fields for each team member
							$member_description = get_sub_field('member_description');
							$member_name = get_sub_field('member_name');
							$member_position = get_sub_field('member_position');
							
							// Determine if this is the first item (active)
							$active_class = ($counter === 1) ? 'show active' : '';
					?>
						<div class="testimonial-single-item tab-pane fade <?php echo $active_class; ?>" id="testimonial-<?php echo $counter; ?>" role="tabpanel">
							<div class="content">
								<?php if ($member_description) : ?>
									<p class="text"><?php echo esc_html($member_description); ?></p>
								<?php endif; ?>

								<?php if ($member_name) : ?>
									<h2 class="name"><?php echo esc_html($member_name); ?></h2>
								<?php endif; ?>
								
								<?php if ($member_position) : ?>
									<span class="designation"><?php echo esc_html($member_position); ?></span>
								<?php endif; ?>
							</div>
						</div>
					<?php
						endwhile;
					else :
						// Fallback if no team members are found
					?>
						<div class="testimonial-single-item tab-pane fade show active" id="testimonial-1" role="tabpanel">
							<div class="content">
								<p class="text">No team members found.</p>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
			<div class="col-12">
				<ul class="testimonial-tab nav nav-tabs" role="tablist">
					<?php
					// Reset the repeater query to start from the beginning
					if (have_rows('team_members')) :
						$counter = 0;
						
						// Loop through each team member again for the navigation
						while (have_rows('team_members')) : the_row();
							$counter++;
							$member_image = get_sub_field('member_image');
							$member_name = get_sub_field('member_name');
							$active_class = ($counter === 1) ? 'active' : '';
							
							// Determine border class based on position
							$border_class = ($counter % 2 === 0) ? 'textimonial-curve-border-center' : 'textimonial-curve-border-outside';
					?>
						<li class="nav-item textimonial-curve-border <?php echo $border_class; ?>">
							<button class="nav-link <?php echo $active_class; ?>" data-bs-toggle="tab" data-bs-target="#testimonial-<?php echo $counter; ?>">
								<?php if ($member_image) : ?>
									<img src="<?php echo esc_url($member_image['url']); ?>" alt="<?php echo esc_attr($member_name); ?>">
								<?php else : ?>
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/testimonial/testimonial-person-<?php echo min($counter, 7); ?>.png" alt="<?php echo esc_attr($member_name); ?>">
								<?php endif; ?>
							</button>
						</li>
					<?php
						endwhile;
					else :
						// Fallback if no team members are found
					?>
						<li class="nav-item textimonial-curve-border textimonial-curve-border-outside">
							<button class="nav-link active" data-bs-toggle="tab" data-bs-target="#testimonial-1">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/images/testimonial/testimonial-person-1.png" alt="">
							</button>
						</li>
					<?php endif; ?>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- .....:::::: End Testimonial Display Section :::::.... -->