<?php

/** Template Name: Project Template */

get_header();

?>

    <body>

<main class="main-wrapper">
    <!-- .....:::::: Start Breadcrumb Section :::::.... -->
    <div class="breadcrumb-section">
        <div class="breadcrumb-wrapper">
            <div class="image">
				<?php
				if ( has_post_thumbnail() ) {
					the_post_thumbnail( 'full', array( 'alt' => get_the_title() ) );
				} else {
					echo '<img src="' . get_template_directory_uri() . '/assets/images/background/breadcrumb.webp" alt="' . get_the_title() . '">';
				}
				?>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="content">
                            <h2 class="title"><?php echo get_the_title(); ?></h2>
                            <ol class="breadcrumb-link">
                                <li><a href="<?php echo home_url(); ?>"><?php _e( 'Home', 'interreg' ); ?></a></li>
                                <li class="active" aria-current="page">
									<?php
									if ( function_exists( 'icl_object_id' ) ) {
										$current_language = apply_filters( 'wpml_current_language', null );
										echo $current_language == 'ro' ? 'Detaliile proiectului' : 'Project Details';
									} else {
										echo 'Project Details';
									}
									?>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .....:::::: End Breadcrumb Section :::::.... -->

    <!-- .....:::::: Start Project Section :::::.... -->
    <div class="project-section section-inner-gap">
        <div class="project-box-wrapper">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-xl-6 col-lg-6">
                        <div class="image">
							<?php
							if ( function_exists( 'get_field' ) ) {
								$project_image = get_field( 'project_first_image' );
								if ( $project_image ) {
									echo wp_get_attachment_image( $project_image['ID'], 'full', false, array( 'alt' => get_the_title() ) );
								} else {
									echo '<img src="' . get_template_directory_uri() . '/assets/images/project/project-1.webp" alt="' . get_the_title() . '">';
								}
							} else {
								echo '<img src="' . get_template_directory_uri() . '/assets/images/project/project-1.webp" alt="' . get_the_title() . '">';
							}
							?>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-xl-6 col-lg-6">
                        <div class="project-content-box">
                            <div class="section-content">
                                <h4 class="title-tag text-gradient">
									<?php
									if ( function_exists( 'icl_object_id' ) ) {
										$current_language = apply_filters( 'wpml_current_language', null );
										echo $current_language == 'ro' ? 'DESPRE PROIECT' : 'ABOUT PROJECT';
									} else {
										echo 'DESPRE PROIECT';
									}
									?>
                                </h4>
                                <!-- <h3 class="sub-title">Energy & Utilities</h3> -->
                            </div>

                            <div class="content">
								<?php
								if ( function_exists( 'get_field' ) ) {
									$first_card_info = get_field( 'first_card_info' );
									if ( $first_card_info ) {
										echo $first_card_info;
									} else {
										_e( 'No information available.', 'interreg' );
									}
								} else {
									_e( 'ACF plugin is not active.', 'interreg' );
								}
								?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="project-box-wrapper">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-xxl-12 col-xl-12 col-lg-12">
                        <div class="project-content-box">
                            <div class="section-content">
                                <h3 class="sub-title">
	                                <?php
	                                if ( function_exists( 'icl_object_id' ) ) {
		                                $current_language = apply_filters( 'wpml_current_language', null );
		                                echo $current_language == 'ro' ? 'Informații' : 'Information';
	                                } else {
		                                echo 'Informații';
	                                }
	                                ?>
                                </h3></div>

                            <ul class="project-info">
								<?php
								if ( function_exists( 'have_rows' ) && have_rows( 'second_card_repeater' ) ) :
									while ( have_rows( 'second_card_repeater' ) ) : the_row();
										$title_info   = get_sub_field( 'title_info' );
										$info_details = get_sub_field( 'info_details' );
										?>
                                        <li>
                                            <span class="title-info"><?php echo esc_html( $title_info ); ?></span>
                                            <div class="info-details"><?php echo esc_html( $info_details ); ?></div>
                                        </li>
									<?php
									endwhile;
								else :
									// Fallback if no repeater fields are found
									_e( 'No project information available.', 'interreg' );
								endif;
								?>
                            </ul>

                            <!-- <div class="content">
								<p>Lorem Ipsum is simply dumm text of the printing and
									typesetting industry. Lorem Ipsum has been the indust
									make a type specimen book.</p>
							</div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="default-content">
			<div class="container">
				<div class="row">
					<div class="col-12">
					   <div class="section-content">
						   <h3 class="sub-title">PROJECT DESCRIPTION & RESULTS</h3>
					   </div>
					   <div class="content">
						   <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when anunknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesettin remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>

						   <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesettin remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
					   </div>
					</div>
				</div>
			</div>
		</div> -->
    </div>
    <!-- .....:::::: End Project Section :::::.... -->



<?php

get_footer();

?>