<!-- .....:::::: Start Working-Process Display Section :::::.... -->
<div class="working-process-display-section section-top-space section-inner-gap section-inner-bg pos-relative overflow-hidden">
	<div class="working-process-shape"></div>
	<div class="container">
		<div class="row">
			<div class="col-12">
                <!-- Start Section Content -->
                <div class="section-content mb-0 mb-md-6">
                    <?php 
                    $sup_title = get_field('how_it_works_sup_title');
                    $main_title = get_field('how_it_works_title');
                    ?>
                    <?php if ($sup_title) : ?>
                        <h4 class="title-tag text-gradient"><?php echo esc_html($sup_title); ?></h4>
                    <?php endif; ?>
                    <?php if ($main_title) : ?>
                        <h2 class="title"><?php echo esc_html($main_title); ?></h2>
                    <?php endif; ?>
                </div>
                <!-- End Section Content -->
			</div>
			<div class="working-process-display-wrapper">
				<div class="row">
					<div class="col-12">
					<?php
                        if (have_rows('working_process_repeater')) :
                            while (have_rows('working_process_repeater')) : the_row();
                                $icon = get_sub_field('icon');
                                $title = get_sub_field('title');
                        ?>
                                <!-- Start Working Process Single Item -->
                                <div class="working-process-single-item pos-absolute">
                                    <div class="box">
                                        <div class="icon">
                                            <?php if ($icon) : ?>
                                                <img class="img-fluid" src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>">
                                            <?php endif; ?>
                                        </div>
                                        <div class="content">
                                            <?php if ($title) : ?>
                                                <h3 class="title"><?php echo esc_html($title); ?></h3>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Working Process Single Item -->
                        <?php
                            endwhile;
                        endif;
                        ?>

						<!-- Work Processing Arrow -->
						<div class="working-process-display-arrow arrow-1">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/working-process-arrow-1.png" alt="">
						</div>
						<div class="working-process-display-arrow arrow-2">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/working-process-arrow-2.png" alt="">
						</div>

					</div>
				</div>
			</div>
			<div class="video-wrapper">
				<div class="row">
					<div class="col-12 text-end">
					<div class="video-btn">
                            <?php 
                            $video_url = get_field('how_it_works_video_url');
                            $video_text = get_field('how_it_works_video_text');
                            ?>
                            <?php if ($video_url) : ?>
                                <a class="wave-btn video-play-btn" href="<?php echo esc_url($video_url); ?>" data-autoplay="true" data-vbtype="video">
                                    <span class="icon"><i class="icofont-ui-play text-gradient"></i></span>
                                </a>
                            <?php endif; ?>
                            <?php if ($video_text) : ?>
                                <div class="text">
                                    <?php echo wp_kses_post($video_text); ?>
                                </div>
                            <?php endif; ?>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- .....:::::: End Working-Process Display Section :::::.... -->