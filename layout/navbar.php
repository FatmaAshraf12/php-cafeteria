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
    <!--