<!-- Start Client Logo Display Section -->
<section class="client-logo-display-section section-top-space" aria-labelledby="client-logo-section-title">
    <div class="client-logo-display-wrapper">
        <div class="container" style="display: flex; flex-direction: column; gap: 50px; padding-bottom: 50px;">
            <h2 id="client-logo-section-title" class="sr-only">
			<?php
                $current_language = get_locale();
                echo $current_language === 'ro_RO' ? 'Partenerii noștri' : 'Our clients and partners';
            ?>
			</h2>
            <?php
            $first_logo_shown = false;
            $logo_count = 0;
            if (have_rows('clientspartners_repeater', 'options')) :
                while (have_rows('clientspartners_repeater', 'options')) : the_row();
                    $logo_image = get_sub_field('logo_image');
                    $logo_url = get_sub_field('logo_url');
                    $logo_count++;

                    if ($logo_image) :
                        if (!$first_logo_shown) :
                            // First logo - centered
            ?>
                            <div class="row justify-content-center">
                                <div class="clients-logo-single-item col-lg-8 col-md-12 col-sm-12 col-12">
                                    <?php if ($logo_url) : ?>
                                        <a href="<?php echo esc_url($logo_url); ?>" class="image" aria-label="Visit <?php echo esc_attr($logo_image['alt']); ?>'s website">
                                    <?php endif; ?>
                                        <img class="img-fluid" src="<?php echo esc_url($logo_image['url']); ?>" alt="<?php echo esc_attr($logo_image['alt']); ?>" width="<?php echo esc_attr($logo_image['width']); ?>" height="<?php echo esc_attr($logo_image['height']); ?>">
                                    <?php if ($logo_url) : ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row justify-content-center sub-clients-logo-row">
                            <?php
                            $first_logo_shown = true;
                        else :
                            // All other logos
                            ?>
                            <div class="clients-logo-single-item col-lg-3 col-md-6 col-sm-6 col-7">
                                <?php if ($logo_url) : ?>
                                    <a href="<?php echo esc_url($logo_url); ?>" class="image" aria-label="Visit <?php echo esc_attr($logo_image['alt']); ?>'s website">
                                <?php endif; ?>
                                    <img class="img-fluid clients-logo-image" src="<?php echo esc_url($logo_image['url']); ?>" alt="<?php echo esc_attr($logo_image['alt']); ?>" width="<?php echo esc_attr($logo_image['width']); ?>" height="<?php echo esc_attr($logo_image['height']); ?>">
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
</section> <!-- Close client-logo-display-section -->
<!-- End Client Logo Display Section -->