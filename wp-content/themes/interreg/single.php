<?php
get_header();
?>


        <!-- .....:::::: Start Breadcrumb Section :::::.... -->
        <div class="breadcrumb-section">
            <div class="breadcrumb-wrapper">
                <div class="image"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero-slider/hero-slider-1.webp" alt=""></div>
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="content">
                                <h2 class="title">Event Details</h2>
                                <!-- <ol class="breadcrumb-link">
                                    <li><a href="blog-list.html">Blog</a></li>
                                    <li class="active" aria-current="page">Blog Details</li>
                                </ol> -->
                            </div>
                        </div>
                    </div>
                </div>            
            </div>
        </div>
        <!-- .....:::::: End Breadcrumb Section :::::.... -->

         <!-- .....:::::: Start Blog Details Section :::::.... -->
         <div class="blog-details-section section-inner-gap">
             <div class="blog-details-box-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <!-- Start Section Content -->
                            <div class="section-content section-content-space-small">
                                <h3 class="sub-title"><?php the_title(); ?></h3>
                            </div>
                            <!-- End Section Content -->

                            <!-- Start Meta Group -->
                            <div class="meta-group d-flex justify-content-between flex-wrap mb-6">
                                <!-- Left Side Meta -->
                                <div class="meta-group-left">
                                    <ul class="blog-meta meta-box">
                                        <li><a href="#" class="date icon-space-right"><i  class="icofont-ui-calendar"></i> <span
                                            class="text">29.01.2025</span></a></li>
                                    </ul>
                                </div>
                                <!-- <div class="meta-group-right">
                                    <ul class="meta-box d-flex flex-wrap">
                                        <li class="blog-tag meta-box-content">
                                            <span class="title icon-space-right"><i class="icofont-tag"></i>Tags:</span>
                                            <ul class="list-item">
                                                <li><a href="#">factory ,</a></li>
                                                <li><a href="#">industry ,</a></li>
                                                <li><a href="#">construction</a></li>
                                            </ul>
                                        </li>
                                        <li class="blog-social-link meta-box-content">
                                            <span class="title icon-space-right">Share:</span>
                                            <ul class="list-item">
                                                <li><a href="https://www.example.com" target="_blank"><i class="icofont-facebook"></i></a></li>
                                                <li><a href="https://www.example.com" target="_blank"><i class="icofont-skype"></i></a></li>
                                                <li><a href="https://www.example.com" target="_blank"><i class="icofont-twitter"></i></a></li>
                                                <li><a href="https://www.example.com" target="_blank"><i class="icofont-google-plus"></i></a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div> -->
                            </div>
                            <!-- End Meta Group -->

                            <!-- Start Default Content -->
                            <div class="default-content border-bottom-thik">
                                    <?php the_content(); ?>
                            </div>
                            <!-- <div class="default-content border-bottom-thik">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesettin remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesettin remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                
                                <div class="blog-quote section-inner-bg m-tb-70">
                                <h4 class="blog-quote-text">
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dumm
                                    unknown printer took a galley of type and scrambled it to make a type specmen book It has survived not only five centuries but
                                    remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                                    passages, and more recently including versions.
                                </h4> 
                                </div>

                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesettin remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesettin remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesettin remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>

                                <div class="image img-responsive m-tb-70">
                                    <img src="assets/images/blog/blog-single-1.png" alt="">
                                </div>

                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesettin remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesettin remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesettin remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                            </div> -->
                            <!-- End Default Content -->
                        
                        </div>
                    </div>
                </div>
             </div>
         </div>
         <!-- .....:::::: End Blog Details Section :::::.... -->

<?php
get_footer();
?>