<!-- Start Working-Process Display Section -->
<section class="working-process-display-section section-top-space section-inner-gap section-inner-bg pos-relative overflow-hidden" aria-labelledby="working-process-title">
    <div class="working-process-shape" aria-hidden="true"></div>
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
                        <p class="title-tag text-gradient"><?php echo esc_html($sup_title); ?></p>
                    <?php endif; ?>
                    <?php if ($main_title) : ?>
                        <h2 id="working-process-title" class="title"><?php echo esc_html($main_title); ?></h2>
                    <?php endif; ?>
                </div>
                <!-- End Section Content -->
            </div>
            <div class="working-process-display-wrapper">
                <div class="row">
                    <div class="col-12">
                        <ol class="working-process-list">
                        <?php
                        if (have_rows('working_process_repeater')) :
                            $step_count = 0;
                            while (have_rows('working_process_repeater')) : the_row();
                                $icon = get_sub_field('icon');
                                $title = get_sub_field('title');
                                $step_count++;
                        ?>
                                <!-- Start Working Process Single Item -->
                                <li class="working-process-single-item pos-absolute">
                                    <div class="box">
                                        <div class="icon" aria-hidden="true">
                                            <?php if ($icon) : ?>
                                                <img class="img-fluid" src="<?php echo esc_url($icon['url']); ?>" alt="" width="<?php echo esc_attr($icon['width']); ?>" height="<?php echo esc_attr($icon['height']); ?>">
                                            <?php endif; ?>
                                        </div>
                                        <div class="content">
                                            <?php if ($title) : ?>
                                                <h3 class="title">
                                                    <span class="sr-only">
                                                        <?php
                                                        $current_language = get_locale();
                                                        echo $current_language === 'ro_RO' ? 'Pasul' : 'Step';
                                                        echo $step_count; ?>
                                                    :</span>
                                                    <?php echo esc_html($title); ?>
                                                </h3>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </li>
                                <!-- End Working Process Single Item -->
                        <?php
                            endwhile;
                        endif;
                        ?>
                        </ol>

                        <!-- Work Processing Arrow -->
                        <div class="working-process-display-arrow arrow-1" aria-hidden="true">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/working-process-arrow-1.png" alt="" width="100" height="50">
                        </div>
                        <div class="working-process-display-arrow arrow-2" aria-hidden="true">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/working-process-arrow-2.png" alt="" width="100" height="50">
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
                                <a class="wave-btn video-play-btn" href="<?php echo esc_url($video_url); ?>" data-autoplay="true" data-vbtype="video" aria-label="Play video about how it works">
                                    <span class="icon" aria-hidden="true"><i class="icofont-ui-play text-gradient"></i></span>
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
</section>
<!-- End Working-Process Display Section -->