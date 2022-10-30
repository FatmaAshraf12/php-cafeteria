<?php
require_once "product.php";
$data = DB::getAll("categories");
include('header.php');
?>
<title>Add New Product</title>
<link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
      crossorigin="anonymous"
    />
<link rel="stylesheet" href="../../assets/css/products.css" /><?php 
include('navbar.php');
?>


<form method="POST" action = "addProduct.php" enctype ="multipart/form-data" class="mx-auto mt-4" name="form1" style="width: 350px">
      <h1 class="p-2">Add New Product</h1>
      <ol class="breadcrumb mb-4">
    <?php 
                        
    if(isset($_SESSION['messages'])){

          foreach($_SESSION['messages'] as $key =>  $errorrs){

        echo '* '.$key.' : '.$errorrs.'<br>';
        }

          unset($_SESSION['messages']);
    }else{
?>
<?php } ?>
                  
</ol>

      <label for="id1">PRODUCT</label>
      <input class="form-control" id="id1" type="text" name="name" required />

      <label for="id3">PRICE</label>
      <input class="form-control" id="id3" min="1" type="number" name="price" required />

      <div class="form-group">
        <label for="inputState">CATEGORY</label>         <a id="replyb" class="category btn btn-primary"> ADD CATEGORY </a>
        <select id="inputState" class="form-control" name ="category_id" required>
          <?php foreach($data as $key => $value):?> 
          <option value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option>
          <?php endforeach ?>
        </select>
      </div>

      <div class="mb-3">
        <label for="formFile" class="form-label">PRODUCT PICTURE</label>
        <input class="form-control p-3" name="image" type="file" id="formFile" accept="image/png ,image/jpg" required />
      </div>
      <div >
        <input name="submit" type="submit" value="Add" class="btn btn-success"> 
      </div>
    </form>
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
</body>
</html>