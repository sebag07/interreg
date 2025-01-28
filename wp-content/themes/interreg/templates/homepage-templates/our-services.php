    <!-- .....:::::: Start Service Display Section :::::.... -->
    <div id="services" class="service-display-section section-top-space">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Start Section Content -->
                    <div class="section-content section-content-space text-center">
                        <?php 
                        $sup_title = get_field('services_sup_title');
                        $main_title = get_field('services_title');
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
            </div>
            <div class="service-display-wrapper">
                <div class="row">
                <div class="col-12 service-plus-icon-seperator">
                        <?php
                        if (have_rows('services_repeater')) :
                            while (have_rows('services_repeater')) : the_row();
                                $icon = get_sub_field('icon');
                                $title = get_sub_field('title');
                        ?>
                                <!-- Start Service Single Item -->
                                <div class="service-single-item">
                                    <div class="icon">
                                        <?php if ($icon) : ?>
                                            <img class="img-fluid" src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>">
                                        <?php endif; ?>
                                    </div>
                                    <div class="content">
                                        <?php if ($title) : ?>
                                            <h4 class="title"><?php echo esc_html($title); ?></h4>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <!-- End Service Single Item -->
                        <?php
                            endwhile;
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .....:::::: End Service Display Section :::::.... -->