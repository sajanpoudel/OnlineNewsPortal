<?php 
include_once './header.php';
?>
<?php $totalvisitorcount=$frontend->visitorcount('Category: '.$_GET['category']); ?>
    <div class="breadcumb-area section_padding_100 bg-img background-overlay" style="background-image: url(./img/bg1.jpg);">
        <div class="container">
            <div class="single-post-title-content">
                <h2 class="font-pt">Category: <?php if(isset($_GET['category']))  echo $_GET['category']; ?></h2>
            </div>
        </div>
    </div>


    <section class="catagory-welcome-post-area section_padding_100">
        <div class="container">
            <div class="row">
                <?php 
                $posts=$frontend->get_posts($_GET['category']);
                foreach ($posts as $post) { ?>
                     <div class="col-12 col-md-4">
                        <div class="theme-welcome-post">
                            <!-- Post Tag -->
                            <div class="theme-post-tag">
                                <a href="#"><?php echo $post['post_type']; ?></a>
                            </div>
                            <h2 class="font-pt"><?php echo $post['post_title']; ?></h2>
                            <p class="theme-post-date"><?php echo date("F j, Y", strtotime($post['post_date'])); ?></p>
                            <!-- Post Thumbnail -->
                            <div class="blog-post-thumbnail my-5">
                                <img src="./uploads/<?php echo $post['post_image']; ?>" alt="post-thumb">
                            </div>
                            <!-- Post Excerpt -->
                            <p> <?php echo $frontend->get_excerpt($post['post_content'],20); ?></p>
                            <!-- Reading More -->
                            <div class="post-continue-reading-share mt-30">
                                <div class="post-continue-btn">
                                    <a href="./post.php?id=<?php echo $post['post_id']; ?>" class="font-pt">Continue Reading <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

               
            

            </div>

           
        </div>
    </section>

<?php 
include_once './footer.php';
?>