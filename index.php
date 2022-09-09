<?php 
include_once './header.php';
?>
<?php $totalvisitorcount=$frontend->visitorcount('Homepage'); ?>
    <!-- Main Content Area Start -->
    <section class="main-content-wrapper section_padding_100">
        <div class="container ">
            <div class="row">
                <div class="col-12 col-lg-9">
                    <?php
                    $welposts=$frontend->get_posts('','DESC',1); 
                    foreach ($welposts as $welpost) { ?>
                        <!--  Welcome Post -->
                        <div class="theme-welcome-post">
                            <!-- Post Tag -->
                            <div class="theme-post-tag">
                                <a href="./catagory.php?category=<?php echo $welpost['post_type']; ?>"><?php echo $welpost['post_type']; ?></a>
                            </div>
                            <h2 class="font-pt"><?php echo $welpost['post_title']; ?></h2>
                            <p class="theme-post-date"><?php echo date("F j, Y",strtotime($welpost['post_date'])); ?></p>
                            <!-- Post Thumbnail -->
                            <div class="blog-post-thumbnail my-5">
                                <img src="./uploads/<?php echo $welpost['post_image']; ?>" alt="post-thumb">
                            </div>
                            <!-- Post Excerpt -->
                            <p> <?php echo $frontend->get_excerpt($welpost['post_content'],35); ?> </p>
                            <!-- Reading More -->
                            <div class="post-continue-reading-share d-sm-flex align-items-center justify-content-between mt-30">
                                <div class="post-continue-btn">
                                    <a href="./post.php?id=<?php echo $welpost['post_id']; ?>" class="font-pt">Continue Reading <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                                </div>
                                <div class="post-share-btn-group">
                                    <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    
                   
                </div>

                <div class="col-12 col-lg-3 col-md-6">
                    <div class="sidebar-area">
                        <!-- Breaking News Widget -->
                        <div class="breaking-news-widget">
                            <div class="widget-title">
                                <h5>breaking news</h5>
                            </div>
                            <?php
                            $brnewss=$frontend->get_breaking_news();
                            foreach ($brnewss as $brnews) { ?>
                                <!-- Single Breaking News Widget -->
                                <div class="single-breaking-news-widget">
                                    <img src="./uploads/<?php echo $brnews['post_image']; ?>" alt="" style="">
                                    <div class="breakingnews-title">
                                        <p>breaking news</p>
                                    </div>
                                    <div class="breaking-news-heading gradient-background-overlay">
                                        <h5 class="font-pt"><a href="./post.php?id=<?php echo $brnews['post_id']; ?>" style="color:inherit;font:inherit;"><?php echo $brnews['post_title']; ?></a></h5>
                                    </div>
                                </div>
                            <?php } ?>
                                                       
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Content Area End -->

        <!-- Catagory Posts Area Start -->
        <div class="theme-catagory-posts-area section_padding_100_70 bg-gray mt-4">

            <div class="container">

                <div class="row">
                    <?php 
                    $lposts=$frontend->get_posts('','DESC',8);
                    foreach ($lposts as $lpost) { ?>
                        <div class="col-12 col-md-3 col-sm-6">
                            <!-- Single Catagory Post -->
                            <div class="theme-single-catagory-post">
                                <div class="single-catagory-post-thumb mb-15">
                                    <img src="./uploads/<?php echo $lpost['post_image']; ?>" alt="">
                                </div>
                                <!-- Post Tag -->
                                <div class="theme-post-tag">
                                    <a href="./catagory.php?category=<?php echo $lpost['post_type']; ?>"><?php echo $lpost['post_type']; ?></a>
                                </div>
                                <h5><a href="./post.php?id=<?php echo $lpost['post_id']; ?>" class="font-pt"><?php echo $lpost['post_title']; ?></a></h5>
                                <span><?php echo date("M j, Y",strtotime($lpost['post_date'])); ?></span>
                            </div>
                        </div>
                    <?php } ?>
                    
                 
                </div>
            </div>
        </div>
    </section>
    <!-- Catagory Posts Area End -->



<?php 
include_once './footer.php';
?>