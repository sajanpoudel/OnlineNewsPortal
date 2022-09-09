<?php 
include "./admin-header.php"; 
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
                        <h3 class="text-decoration-underline">Edit User</h3>
                    </div>
                    <div class="ml-auto text-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                                <?php if ($privilage==1) { ?>
                                    <li class="breadcrumb-item"><a href="./users.php">Users</a></li>
                                <?php } else {?>
                                    <li class="breadcrumb-item">Profile</li>
                                <?php } ?>
                                <li class="breadcrumb-item active" aria-current="page">Edit</li>
                            </ol>
                        </nav>
                    </div>
                </div>

            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <hr>
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <?php if(isset($_GET['error'])) { ?>
                <div class="alert alert-danger h6" role="alert"> Error Occurred While Updating. Please Try Again Later. </div>
            <?php } ?>
            <form action="./savedata.php" class="row" method="POST" enctype="multipart/form-data">
            <?php 
                $users=$admin->get_user($_GET['user-id']);
                foreach ($users as $user) { ?>
                    <div class="col-12 form-group my-20">
                        <label class="h4"> Username <sub> (Username can't be Changed.)<sub></label>
                        <input type="text" name="user-name" class="form-control font-weight-normal shadow p-2" id="" value=" <?php echo $user['user_name']; ?>" disabled>
                    </div>
                    <div class="form-group my-3  p-2 col-12 ">
                        <label class="h4"> Password</label>
                        <input type="password" name="user-password" class="form-control font-weight-normal shadow p-2" id="" value="<?php echo $user['user_password']; ?>" required>
                    </div>
                    <div class="form-group my-3  p-2 col-12 ">
                        <label class="h4">Full Name</label>
                        <input type="text" name="user-fullname" class="form-control font-weight-normal shadow p-2" id="" value="<?php echo $user['user_fullname']; ?>"  required>
                    </div>
                    <div class="form-group my-3  p-2 col-12 ">
                        <label class="h4">Email</label>
                        <input type="email" name="user-email" class="form-control font-weight-normal shadow p-2" id="" value="<?php echo $user['user_email']; ?>" required>
                    </div>
                    <div class="my-3  p-2 col-12">
                        <div class="form-group">
                            <input type="hidden" name="old_password" value="<?php echo $user['user_password']; ?>">
                            <input type="hidden" name="user-id" value="<?php echo $user['user_id']; ?>">
                            <button type="submit" class="btn btn-primary" name="update-user" value="publish">Update <i class="mdi mdi-telegram"></i></button>
                        </div>
                    </div>
                <?php }
            
            ?>

                
                
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


<?php
include "./admin-footer.php"; 
?>