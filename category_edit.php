<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="addProduct.css" />
  </head>
  <body>

  <?php
require_once('Category.php');

$category=Category::get_Category($_REQUEST['id']);
// var_dump($category);

?>

  <?php
session_start();
if (isset($_SESSION['errors'])) {
	echo '<div class="alert alert-danger">';
	foreach ($_SESSION['errors'] as $error) {
		echo "<div>{$error}</div>";
	}
	echo '</div>';
	unset($_SESSION['errors']);
}?>
    <form class="mx-auto mt-4" name="form1" style="width: 350px" method="post" action="category_edit_process.php">
      <h1 class="p-2 mt-5">Add  category</h1>
      
      <label for="id1" class="mt-5">Add New Category</label>
      <input  name="id"  id="id" style="display:none ;" type="text" placeholder=" id" value="<?= $category['id']?>"> 
      <input class="form-control mt-5" id="id1" name="name" value="<?php echo $category['name']?>" type="text" required />

      </div>
      <input type="submit" value="SAVE" class="btn mt-3 btn-success" />

        <input type="reset" value="RESET" class="btn mt-3 btn-success" />
    </form>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
      crossorigin="anonymous"
    ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script src="addproduct.js"></script>
  </body>
</html>