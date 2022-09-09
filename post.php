<?php 
include_once './header.php';
if(!isset($_GET['id'])){
    die("sorry! No content found..");
}
$post_id=$_GET['id'];
$post_title="";
$post_category="";
$post_date="";
$post_visit_counter="";
$post_image="";
$post_body="";
$posts=$frontend->get_post($post_id);
foreach ($posts as $post) {
    $post_title=$post['post_title'];
    $post_category=$post['post_type'];
    $post_date=date("F j, Y",strtotime($post['post_date']));
    $post_image=$post['post_image'];
    $post_body=$post['post_content'];
}
$totalvisitorcount=$frontend->visitorcount($post_title);
$post_visit_counter=$frontend->content_counter($post_title);

?>

    <section class="single-post-area">
        <!-- Single Post Title -->
        <div class="single-post-title bg-img background-overlay" style="background-image: url(./uploads/<?php echo $post_image; ?>);">
            <div class="container h-100">
                <div class="row h-100 align-items-end">
                    <div class="col-12">
                        <div class="single-post-title-content">
                            <!-- Post Tag -->
                            <div class="theme-post-tag">
                                <a href="./catagory.php?catagory=<?php echo $post_category; ?>"><?php echo $post_category; ?></a>
                            </div>
                            <h2 class="font-pt"><?php echo $post_title; ?></h2>
                            <p><?php echo $post_date; ?> <span class="ml-4">[ Post Hits : <?php echo $post_visit_counter; ?> ]</span> </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="single-post-contents">
            <div class="container">
                <div class="row justify-content-center text-justify">
                    <div class="col-12 col-md-8">
                      <p><?php echo $post_body; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="theme-post-discussion-area section_padding_100 bg-gray">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8">
                    <!-- Comment Area Start -->
                    <div class="comment_area section_padding_50 clearfix">
                        <div class="theme-heading">
                            <h4 class="font-bold">Discussion</h4>
                        </div>

                        <ol>
                            <?php 
                            $comments=$frontend->get_comments($post_id);
                            foreach ($comments as $comment) { ?>
                               <!-- Single Comment Area -->
                                <li class="single_comment_area">
                                    <div class="comment-wrapper d-md-flex align-items-start">
                                        <!-- Comment Meta -->
                                        <div class="comment-author">
                                            <img src="img/userIcon.png" alt="">
                                        </div>
                                        <!-- Comment Content -->
                                        <div class="comment-content">
                                            <h5><?php echo $comment['comment_author']; ?></h5>
                                            <span class="comment-date font-pt"><?php echo date("F j, Y",strtotime($comment['comment_date'])); ?></span>
                                            <p><?php echo $comment['comment_body']; ?></p>
                                        </div>
                                    </div>

                                </li>
                            <?php } ?>
                                                        
                        </ol>
                    </div>
                    <!-- Leave A Comment -->
                    <div class="leave-comment-area clearfix">
                        <div class="comment-form">
                            <div class="theme-heading">
                                <h4 class="font-bold">leave a comment</h4>
                            </div>
                            <!-- Comment Form -->
                            <form action="./savecomment.php" method="POST">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="comment_author" placeholder="Enter Your Full Name" name="comment_author">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="comment_email" placeholder="Email" name="comment_email">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="comment_body" id="comment_body" cols="30" rows="10" placeholder="Message"></textarea>
                                </div>
                                <input type="hidden" id="post_id" name="post_id" value="<?php echo $post_id; ?>">
                                <input type="hidden" id="post_title" name="post_title" value="<?php echo $post_title; ?>">
                                <button type="submit" class="btn leave-comment-btn" name="save_comment" value="submit">SUBMIT <i class="fa fa-angle-right ml-2"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  
<?php 
include_once './footer.php';
?>