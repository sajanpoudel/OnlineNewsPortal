<?php 
include "./admin-header.php"; 

if($privilage!=1){ ?>
    <script>
        window.location.href="./index.php";
    </script>
<?php } ?>

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
                        <h3 class="text-decoration-underline">Add New User</h3>
                    </div>
                    <div class="ml-auto text-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="./settings-users.php">Users</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add New</li>
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
            <?php if(isset($_GET['error']) && $_GET['error']=='password-error') { ?>
                <div class="alert alert-danger h6" role="alert"> Entered Passwords Do Not Match </div>
            <?php } ?>
            <form action="./savedata.php" class="row" method="POST" enctype="multipart/form-data">
                <div class="col-12 form-group my-20">
                    <label class="h4"> Username</label>
                    <input type="text" name="user-name" class="form-control font-weight-normal shadow p-2" id="" placeholder="Enter Your Username Here!" required>
                </div>
                <div class="form-group my-3  p-2 col-12 ">
                    <label class="h4"> Password</label>
                    <input type="password" name="user-password" class="form-control font-weight-normal shadow p-2" id="" placeholder="*****" required>
                </div>
                <div class="form-group my-3  p-2 col-12 ">
                    <label class="h4">Confirm Password</label>
                    <input type="password" name="user-password-confirm" class="form-control font-weight-normal shadow p-2" id="" placeholder="*****" required>
                </div>
                <div class="form-group my-3  p-2 col-12 ">
                    <label class="h4">Full Name</label>
                    <input type="text" name="user-fullname" class="form-control font-weight-normal shadow p-2" id="" placeholder="Full Name" required>
                </div>
                <div class="form-group my-3  p-2 col-12 ">
                    <label class="h4">Email</label>
                    <input type="email" name="user-email" class="form-control font-weight-normal shadow p-2" id="" placeholder="user@gemail.com" required>
                </div>
                <div class="my-3  p-2 col-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="save-user" value="publish">Publish <i class="mdi mdi-telegram"></i></button>
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


<?php
include "./admin-footer.php"; 
?>