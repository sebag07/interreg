    <!-- Start Service Display Section -->
    <section id="services" class="service-display-section section-top-space" aria-labelledby="services-section-title">
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
                            <p class="title-tag text-gradient"><?php echo esc_html($sup_title); ?></p>
                        <?php endif; ?>
                        <?php if ($main_title) : ?>
                            <h2 id="services-section-title" class="title"><?php echo esc_html($main_title); ?></h2>
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
                                $service_count = 0;
                                while (have_rows('services_repeater')) : the_row();
                                    $icon = get_sub_field('icon');
                                    $title = get_sub_field('title');
                                    $service_count++;
                            ?>
                                    <!-- Start Service Single Item -->
                                    <li class="service-single-item" role="listitem">
                                        <div class="icon">
                                            <?php if ($icon) : ?>
                                                <img class="img-fluid" src="<?php echo esc_url($icon['url']); ?>" alt="" aria-hidden="true">
                                            <?php endif; ?>
                                        </div>
                                        <div class="content">
                                            <?php if ($title) : ?>
                                                <h3 id="service-title-<?php echo $service_count; ?>" class="title"><?php echo esc_html($title); ?></h3>
                                            <?php endif; ?>
                                        </div>
                                    </li>
                            <?php
                                endwhile;
                            endif;
                            ?>
                        <!-- </ul> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Service Display Section -->