<?php require_once 'isAdmin.php';
$admin = is_admin();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>KOPPEE - Coffee Shop HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free Website Template" name="keywords">
    <meta content="Free Website Template" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <!-- <link href="assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet"> -->
    <link href= "assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- <link href="assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" /> -->
  

    <link href="assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />


    <!-- Customized Bootstrap Stylesheet -->
    <link href="assets/css/style.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <!-- date picker css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link href="assets/css/my_orders.css" rel="stylesheet">

    <link rel="stylesheet" href="assets/css/style2.css" >

</head>

<body>

 <!-- Navbar Start -->
 <div class="container-fluid p-0 nav-bar">
        <nav class="navbar navbar-expand-lg bg-none navbar-dark py-3">
            <a href="index.html" class="navbar-brand px-lg-4 m-0">
                <h1 class="m-0 display-4 text-uppercase text-white">KOPPEE</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav ml-auto p-4">

                <?php echo Auth::id(); if((Auth::check() && Auth::user()['role'] != 'admin')){?>?
=======

                    <a href="index.html" class="nav-item nav-link ">Home</a>
                    <a href="product.php" class="nav-item nav-link">Products</a>
                    <a href="service.html" class="nav-item nav-link">Users</a>
                    <a href="" class="nav-item nav-link">Manual Orders</a>
=======
                <?php if((Auth::check() && Auth::user()['role'] != 'admin')){?>?


                    <a href="index.php" class="nav-item nav-link ">Home</a>
                    <a href="product.php" class="nav-item nav-link">Products</a>
                    <a href="myorders.php" class="nav-item nav-link">My Orders</a>
                   <!-- <a href="logout.php" class="nav-item nav-link">Logout</a>-->

               <?php }
                    else if($admin) {?>?


                    <a href="checks.php" class="nav-item nav-link">Checks</a>
                    <a href="orders.php" class="nav-item nav-link">Orders</a>
                    <a href="users.php" class="nav-item nav-link">Users</a>
                    <a href="admin/products/index.php" class="nav-item nav-link">Products</a>
                    <a href="admin/products/add.php" class="nav-item nav-link">Add Product</a>
                    <a href="manualorders.php" class="nav-item nav-link">Manual Orders</a>
                   <!-- <a href="logout.php" class="nav-item nav-link">Logout</a>-->

            <?php }
           
                    
                if(Auth::check()){
                    
                    ?>
                    <a href="logout.php" class="nav-item nav-link">Logout</a>

                    <?php } else {?>
                        <a href="login.php" class="nav-item nav-link">Login</a>
                        <a href="addUser.php" class="nav-item nav-link">Register</a>

                <?php } ?>

                </div>
            </div>
        </nav>
</div>
    <!-- Navbar End -->

    <!-- require -->
    <?php
 
  


    

