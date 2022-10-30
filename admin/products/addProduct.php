<?php
require("../helpers/functions.php");
require_once "product.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){
       
    // LOGIC ... 

      $name        = CleanInputs($_POST['name']);
      $category_id = Sanitize($_POST['category_id'],1);
      $price       = $_POST['price'];

      $Message = [];
      # Check Validation ... 
      if(!Validator($name,1)){
      
        $Message['Name'] = "name Field Required";

      }
      
      if(!Validator($name,2)){
      
        $Message['NameLength'] = "Name length must be > 2";

      }
      if(!Validator($name,7)){
      
        $Message['Name'] = "name must be string";

      }

      if(!Validator($category_id,3)){

        $Message['Category'] = "Invalid Category ";
      }

      if(!Validator($price,1)){
      
        $Message['Price'] = "price Field Required";

      }

      
// image 
      $imageName     = $_FILES['image']['name'];

      $nameArray = explode('.',$imageName);
      $FileExtension = strtolower($nameArray[1]);
      if(!Validator($imageName,1)){
      $Message['image'] = "image Field Required";

    }


    if(!Validator($FileExtension,5)){
      
      $Message['imageExtension'] = "Invalid Image Extension";

    }

     if(count($Message) > 0){
       $_SESSION['messages'] = $Message;
       header('Location: add.php');
    }else{

        $tmp_path = $_FILES['image']['tmp_name'];
        // $size     = $_FILES['uploadedFile']['size'];
        // $type     = $_FILES['uploadedFile']['type'];
           
         $FinalName = rand().time().'.'.$FileExtension;
   
         $disFolder = '../../assets/img/';
           
         $disPath  = $disFolder.$FinalName;
   
       if(move_uploaded_file($tmp_path,$disPath)){

        $inputData = ["name"=>$name ,"price"=>$price ,"image"=>$FinalName ,"category_id"=>$category_id];
        $result = DB::create("product",$inputData);
        header("Location: index.php");
       };
    }}
             