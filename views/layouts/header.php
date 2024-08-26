<?php
if (isset($_SESSION['CustomerID'])) {
    $customerId = $_SESSION['CustomerID'];
} else {
    false;
}
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Shop PHP2</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="..\mvc\assets\img\favicon.png">

    <!-- all css here -->
    <link rel="stylesheet" href="..\mvc\assets\css\bootstrap.min.css">
    <link rel="stylesheet" href="..\mvc\assets\css\plugin.css">
    <link rel="stylesheet" href="..\mvc\assets\css\bundle.css">
    <link rel="stylesheet" href="..\mvc\assets\css\style.css">
    <link rel="stylesheet" href="..\mvc\assets\css\responsive.css">
    <script src="..\mvc\assets\js\vendor\modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!-- Add your site or application content here -->

    <!--pos page start-->
    <div class="pos_page">
        <div class="container">
            <!--pos page inner-->
            <div class="pos_page_inner">
                <!--header area -->
                <div class="header_area">
                    <!--header top-->
                    <div class="header_top">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-6">
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="header_links">
                                    <?php
                                    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
                                        echo '<ul>
                                                <li><a href="index.php?controller=contact&action=index" title="Contact">Contact</a></li>
                                                <li><a href="admin/index.php?controller=home&action=index" title="Admin">Admin</a></li>
                                                <li><a href="index.php?controller=account&action=index" title="My account">My account</a></li>
                                                <li><a href="index.php?controller=cart&action=index" title="My cart">My cart</a></li>
                                                <li><a href="index.php?controller=auth&action=logout" title="Logout">Logout</a></li>
                                            </ul>';
                                    } else {
                                        echo '<ul>
                                                <li><a href="index.php?controller=contact&action=index" title="Contact">Contact</a></li>
                                                <li><a href="admin/index.php?controller=home&action=index" title="Admin">Admin</a></li>
                                                <li><a href="index.php?controller=account&action=index" title="My account">My account</a></li>
                                                <li><a href="index.php?controller=cart&action=index" title="My cart">My cart</a></li>
                                                <li><a href="index.php?controller=auth&action=login" title="Login">Login</a></li>
                                            </ul>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--header top end-->

                    <!--header middel-->
                    <div class="header_middel">
                        <div class="row align-items-center">
                            <!--logo start-->
                            <div class="col-lg-3 col-md-3">
                                <div class="logo">
                                    <a href="index.php?controller=home&action=index"><img
                                            src="..\mvc\assets\img\logo\logo.jpg.png" alt=""></a>
                                </div>
                            </div>
                            <!--logo end-->
                            <div class="col-lg-9 col-md-9">
                                <div class="header_right_info">
                                    <div class="search_bar">
                                        <form action="#">
                                            <input placeholder="Search..." type="text">
                                            <button type="submit"><i class="fa fa-search"></i></button>
                                        </form>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    <!--header middel end-->
                    <div class="header_bottom">
                        <div class="row">
                            <div class="col-12">
                                <div class="main_menu_inner">
                                    <div class="main_menu d-none d-lg-block">
                                        <nav>
                                            <ul>
                                                <li><a href="index.php?controller=home&action=index">Home</a>
                                                </li>
                                                <li><a href="index.php?controller=product&action=index">Product</a>
                                                </li>
                                                <li><a href="index.php?controller=about&action=index">About Us</a>
                                                </li>
                                                <li><a href="index.php?controller=cart&action=index">Cart</a>
                                                </li>
                                                <li><a href="index.php?controller=contact&action=index">Contact</a>
                                                </li>
                                                <li><a href="index.php?controller=order&action=index">Order</a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <div class="mobile-menu d-lg-none">
                                        <nav>
                                            <ul>
                                                <li><a href="index.php?controller=home&action=index">Home</a>
                                                </li>
                                                <li><a href="index.php?controller=product&action=index">Product</a>
                                                </li>
                                                <li><a href="index.php?controller=about&action=index">About Us</a>
                                                </li>
                                                <li><a href="index.php?controller=cart&action=index">Cart</a>
                                                </li>
                                                <li><a href="index.php?controller=contact&action=index">Contact</a>
                                                </li>
                                                <li><a href="index.php?controller=order&action=index">Order</a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--header end -->