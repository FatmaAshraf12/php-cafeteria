
    
<?php
 require_once __DIR__ . '\connect.php';
    $product_name = $_REQUEST['name'];
    $product_image_name = time().$_FILES['product_image_name']['name'];
    $product_image_path = $_FILES['product_image_name']['tmp_name'];
    $product_price = $_REQUEST['product_price'];
    $product_desc= $_REQUEST['product_desc'];
            
if(!empty($product_name) and !empty($product_image_name) and !empty($product_price) and !empty($product_desc))
{
    $query = "INSERT INTO product(`name`,`image`,`price`,`avilable`) 
    VALUES ('$product_name','$product_image_name','$product_price','$product_desc')";
    $sql = $con->prepare($query);
    $result = $sql->execute();
    if($result)
     {
        if(move_uploaded_file($product_image_path,"assets/$product_image_name"))
            {
                echo 'done';
               
                header('Location:form.html');
              
            }
            else
            {
              
                header('Location:product.php');
            }
        echo 'yes';
     }
     else
     {
       echo 'error';
     }
}
else
{
     
    header('Location:view.php');
    
}
            
?>

</body>
</html>