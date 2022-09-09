<?php

    session_start();

// print_r($_SESSION);
require "./functions.php";
$admin=new AdminFunctions;
$admin->isAdmin();
if(isset($_GET['logout'])){
    $admin->logout();
}
$privilage=1;
// $privilage=$_SESSION['user_privilage'];

?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Title -->
    <title>Admin Panal </title>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/libs/magnific-popup/dist/magnific-popup.css">
    <link rel="stylesheet" href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="dist/css/style.min.css">
    <link rel="stylesheet" href="dist/css/style2.css">
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>

</head>

<body>


    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header  -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <h3 class="logo-icon p-l-10"> Admin Panel </h3>
                        <!--End Logo icon -->
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">

                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <div class="w-100 float-left"></div>

                    <ul class="navbar-nav float-right">

                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span> <?php //echo $_SESSION['login_user']; ?> </span> </a>
                        </li>
                        <li class="  nav-item dropdown ">
                            <a class=" nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <img src="assets/images/1.jpg" alt="" class="rounded-circle" width="31"></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                <a class="dropdown-item" href="./edit-profile.php?user-id=<?php //echo $_SESSION['login_user_id']; ?>"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="?logout=true"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                <div class="dropdown-divider"></div>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- Left Sidebar  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="index.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="posts.php" aria-expanded="false"><i class="mdi mdi-pen"></i><span class="hide-menu">Posts</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="categories.php" aria-expanded="false"><i class="mdi mdi-chart-bar"></i><span class="hide-menu">Categories</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark" href="comments.php" aria-expanded="false"><i class="mdi mdi-note"></i><span class="hide-menu">Comments</span></a></li>
                        <?php if($privilage==1){ ?>
                                <li class="sidebar-item"><a href="users.php" class="sidebar-link"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">Users</span></a></li>
                        <?php } ?>
                        
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->