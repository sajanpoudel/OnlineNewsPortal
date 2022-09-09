<?php
require "./functions.php";
$frontend=new Frontend;
$totalvisitorcount="";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Hamro News Website </title>

    <!-- Favicon  -->
    <link rel="icon" href="img/favicon.png">

    <!-- Style CSS -->
    <link rel="stylesheet" href="./css/style.css">


</head>

<body>
   
    <!-- Header Area Start -->
    <header class="header-area">

        <!-- Nav Header Area -->
        <div class="nav-header">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12">
                        <div class="main-menu">
                            <nav class="navbar navbar-expand-lg">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainMenu" aria-controls="mainMenu" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i> Menu</button>
                                <div class="collapse navbar-collapse" id="mainMenu">
                                    <ul class="navbar-nav mr-auto">
                                        <li class="nav-item">
                                            <a class="nav-link" href="index.php">Home </a>
                                        </li>
                                        
                                        <?php 
                                        $categories=$frontend->get_header_categories();
                                        foreach ($categories as $category) { ?>
                                            <li class="nav-item">
                                                <a class="nav-link" href="catagory.php?category=<?php echo $category['category_name']; ?>"> <?php echo $category['category_name']; ?> </a>
                                            </li>
                                        <?php } ?>
                                        <li class="nav-item">
                                            <a class="nav-link" href="login.php">Login</a>
                                        </li>

                                    </ul>
                                    <!-- Search Form -->
                                    <div class="header-search-form mr-auto">
                                        <form action="search.php" method="GET">
                                            <input type="search" placeholder="Input your keyword then press enter..." id="search" name="search">
                                            <input class="d-none" type="submit" value="submit">
                                        </form>
                                    </div>
                                    <!-- Search btn -->
                                    <div id="searchbtn">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->

