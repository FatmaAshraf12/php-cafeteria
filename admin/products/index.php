<?php
require_once "product.php";
$data = DB::getAll("product");
include('header.php');
?>

<title>All products</title>
<link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
      crossorigin="anonymous"
    />
<link rel="stylesheet" href="../../assets/css/products.css" />

<?PHP 
include('navbar.php');
?>
    <h1> All Products </h1>
    <!-- table Start -->
    <div class="container">
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
                <?php
                    $index = 1;
                    foreach($data as $key => $value):
                ?>
                <tr>
                    <td><?php echo $index++ ?></td>
                    <td><?php echo $value["name"];?></td>
                    <td><?php echo $value["price"];?></td>
                    <td><img src="../../assets/img/<?php echo $value["image"];?>" alt="image" width="50px" height="50px"></td>
                    <td>
                    	<button class="btn btn-primary"> <?php echo $value["avilable"] ? "Available" : "Unavilable"?></button>
                    	<a class="btn btn-secondary" href="edit.php?id=<?php echo $value["id"];?>"> Edite</a>
                    	<button type="button"class="btn btn-danger delete" id="deleteButton" data-id="<?php echo $value['id'] ?>" > Delete </button>                    
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    </div>
    <!-- table end -->
    <?php
include('footer.php');
?>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
      crossorigin="anonymous"
    ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script src="addproduct.js"></script>
    <script src="delete.js"></script>

</body>
</html>