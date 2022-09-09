<?php 
include "./admin-header.php"; 
$title="";
$body="";
$author="";
$thumbnail="";
$category="";
$posts=$admin->get_post($_GET['post-id']);
foreach ($posts as $post) {
    $title=$post['post_title'];
    $body=$post['post_content'];
    $author=$post['post_author'];
    $thumbnail=$post['post_image'];
    $category=$post['post_type'];
}

?>

<!--************************************************************************************************************************************************-->
<!--************************************************************************************************************************************************-->

    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <div>
                        <h4 class="text-decoration-underline">Update Post </h4>
                    </div>
                    <div class="ml-auto text-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                                
                                <li class="breadcrumb-item"><a href="./posts.php">Posts</a></li>
                               
                                <li class="breadcrumb-item active" aria-current="page">Update</li>
                            </ol>
                        </nav>
                    </div>
                </div>

            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <form action="./savedata.php" class="row" method="POST"enctype="multipart/form-data">
                    
                <div class="col-12 form-group my-20">
                   
                    <label> <h3>Post Title</h3> </label>
                    
                    <input type="text" value="<?php echo $title; ?>" name="post-title" class="form-control font-weight-normal shadow p-2" id="" placeholder="Enter Topic Here!">
                </div>
                
                <div class="form-group my-3  p-2 col-12 col-md-8">
                    <div class="form-group col-12">
                       
                        <label> <h3> Body Content</h3> </label>
                        <div class="w-100">
                            <textarea id="editor" value="" name="post-body">
                                <?php echo $body; ?>
                            </textarea>
                        </div>
                    </div>
                   
                </div>
                <div class="my-3  p-2 col-12 col-md-4">
                    <div class="form-group">
                        <label class="h5">Category</label>
                        <input type="text" class="form-control  p-2 mb-1" value="<?php echo $category; ?>" id="" name="post-type-old" placeholder="Category Name">
                        <select class="form-control" size="4" id="cat_title" name="post-type">
                            <option class="form-control">Others</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="h5" for="isbreaking">Include in Breaking News</label>
                        <input type="checkbox" name="isbreaking" id="isbreaking">
                    </div>
                    <div class="form-group">
                        <label class="h5">Author</label>
                        <input type="text" class="form-control  p-2" value="<?php echo $author; ?>" id="" name="post-author" placeholder="Author Name">
                    </div>
                                 
                    <div class="form-group">
                        <label class="h5">Thumbnail Image</label>
                        <input type="file" class="form-control p-2" name="thumbnail" id="thumbnail">
                        <input type="hidden" value="<?php echo $thumbnail; ?>" name="old-thumbnail">
                        <img src="../uploads/<?php echo $thumbnail; ?>" id="thumbnail-image" width="75px" height="75px" />
                    </div>
                    <div class="form-group">
                        <input type="hidden" value="<?php echo $_GET['post-id']; ?>" name="post-id">
                        <button type="submit" class="btn btn-primary" name="update-post" value="publish">Update <i class="mdi mdi-telegram"></i></button>
                    </div>
                </div>
                
            </form>
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Right sidebar -->
            <!-- ============================================================== -->
            <!-- .right-sidebar -->
            <!-- ============================================================== -->
            <!-- End Right sidebar -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->

    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->


<!--************************************************************************************************************************************************-->
<!--************************************************************************************************************************************************-->

<script type="text/javascript">
        function getcattitles() {
          $("#cat_title").html('<option class="form-control">Others</option>');
          $.ajax({
            url:'ajaxphp.php',
            type:'POST',
            data:{getcategory:true},
            success:function(data){
                $("#cat_title").html(data);
            }
        });
        }
        
        getcattitles();
        
   </script>


<?php
include "./admin-footer.php"; 
?>