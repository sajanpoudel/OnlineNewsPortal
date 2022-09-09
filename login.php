<?php 
include_once './header.php';
if(isset($_POST['login'])){
    $obj=new Frontend;
    $obj->admin_login();
}

?>

    <section class="theme-post-discussion-area section_padding_100 bg-gray">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8">

                    <!-- Leave A Comment -->
                    <div class="leave-comment-area clearfix">
                        <p class="alert alert-danger <?php if(!$_GET['lerror']){echo 'd-none'; } ?>" id="return-message">Invalid Login Details</p>
                        <div class="comment-form">
                            <div class="theme-heading">
                                <h4 class="font-bold">Login to manage website</h4>
                            </div>
                            <!-- Comment Form -->
                            <form action="" method="POST">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="username" name="user_name" placeholder="Enter Your UserName">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="password" name="user_pass" placeholder="*********">
                                </div>

                                <button type="submit" name="login" class="btn leave-comment-btn">SUBMIT <i class="fa fa-angle-right ml-2"></i></button>
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