<?php
include('header.php');
include('navbar.php');
?>
    <h1> All Products </h1>
    <!-- table Start -->
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Index</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Action</th>        
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>coffee</td>
                    <td>8</td>
                    <td><img src="../img/menu-1.jpg" alt="image" width="50px" height="50px"></td>
                    <td>
                    	<a class="btn btn-primary" href="http://"> Available</a> 
                    	<a class="btn btn-primary" href="http://"> Edite</a> 
                    	<a class="btn btn-primary" href="http://"> Delete</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- table end -->
<?php
include('footer.php');
?>

                                  
