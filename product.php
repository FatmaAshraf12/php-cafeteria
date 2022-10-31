<?php
require __DIR__ . '/layout/header.php';
require_once __DIR__ . '/classes/cart.php';

$user_id = $_SESSION["user_id"] ;

?>
    <!-- Navbar End -->
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 position-relative overlay-bottom">
        <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px">
            <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">Products</h1>
            <div class="d-inline-flex mb-lg-5">
                <p class="m-0 text-white"><a class="text-white" href="">Home</a></p>
                <p class="m-0 text-white px-2">/</p>
                <p class="m-0 text-white">Products</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->
    <!--<div class="container-fluid py-5">
        <div class="container">
            <div class="section-title">
                <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">About Us</h4>
                <h1 class="display-4">Serving Since 1950</h1>
            </div>
        </div>
    </div>  -->  
    <!-- page Header End -->  
 
    <!-- Service Start --> 
    <div class="container-fluid ">
        <div class="row pl-5 pr-5">
            <!--the Bill-->
             <div class="col-lg-4">
                                <!---->
                <?php 
                    $order_product = Cart::getByCondd("product",["user_id"=>$user_id,"product.id"=>"product_id"]); 
                    if(count($order_product)==0){?>
                    <div class="row align-items-center mb-3 col-sm-12 mt-2" style="background-color:#da9f5b1f;height: 100%;text-align: center;">
                        <p class="w-100">Your cart is empty</p>
                    </div>
                      <?php } else{
                         foreach ($order_product as $val): ?>   
                        <div id="myDIV">  
 
                       <div class="row align-items-center mb-3 col-sm-12 mt-2"id="showproduct">

                                <div class="col-2 col-sm-2 ">
                                    <img style="width: 50px;"   src="<?php echo $val['image'] ?>"alt="">           

                                </div>
                                <div class="col-4 col-sm-3">
                                     <h6><?php echo $val['name'] ?></h6>
                                </div>
                                   
                                <div class="col-sm-1 offset-1 ">
                                    <input type='button' style="width: 30px;" value='-' field='quantity' onclick="decrementValue()"  class='qtyminus' data-product-id="<?php echo $val['id']; ?>" />
                                </div> 
                                <div class="col-4 col-sm-1">
                                    <input type='text' style="width: 30px; text-align:center;border:0px ; background-color:transparent" readonly class="input-number" name='quantity' value="<?php echo $val['quantity']; ?>" class='qty' />      
                                </div>
                                <div class="col-4 col-sm-1">
                                    <input type='button' style="width: 30px;" onclick="incrementValue()" value='+' class='qtyplus' field='quantity' data-product-id="<?php echo $val['id']; ?>" />
                                </div> 
                                   
                                <div class="col-4 col-sm-1 mb-1">
                                   <!-- <button class="btn btn-primary" >-->

                                   <span id="product-total-price"
                                        data-price ="<?php echo $val['price'] ?>">
                                        <?php echo $val['price'] ?>
                                        </span>
                                   <!-- </button>-->
                                </div>
                                <div class="col-sm-1">
                                        <button class="btn btn-danger"
                                        id="delete-product" onclick="deleteItem(<?php echo $val['id']; ?>)" >
                                        x
                                        </button>
                                </div>
                
                        </div>    <?php endforeach; ?>
                        <div class="row align-items-center col-sm-12">
                                    
                                <form action="" class="w-100">
                                        <textarea name="message" style="height: 100px; " class="form-control" id="message" placeholder="Your message..." required></textarea>
                                </form>
                        </div>
                        <div class="row align-items-center col-sm-12 mt-2">      
                            <span>Room : <?php echo User::get_user($user_id)["room"];?></span>
                        </div>
                            <hr>
                        <div class="row align-items-center col-sm-12 mt-2">
                                <div class="col-sm-2 ">
                                    <h3>Total</h3>
                                </div>
                                <div class="col-sm-3"> 
                                  <?php  $totals = Cart::getTotal($user_id); $total = $totals[0]["total"];?>
                                    <span class="product-maxtotal-price" data-price="<?php echo $total;?>">
                                        <?php echo $total;?>
                                    </span>
                                </div>

                                <div class="col-sm-7 mr-0">
                                    <input type="submit" class="btn btn-primary btn-lg btn-block w-50" style="float:right" onclick="mFunction()">
                                </div>
                        </div>
                </div>    
                   

               <?php } ?>
            </div> 
            <!---->
            <!--products-->
            <div class="col-lg-8">
                <div class="row align-items-center mb-5 ml-2">
                    <?php      
                    $products = DB::getAll('product');
                       
                    foreach ($products as $single): ?> 
                    <div class="row align-items-center mt-5 col-sm-4 mr-1" >
                        <div class="col-4 col-sm-4">
                        <img style="width: 100px;"  class="rounded-pill m-md-n4" src="<?php echo $single['image'] ?>"alt="">                     
                        <h5 class="menu-price m-lg-n4">$<?php  echo $single['price'] ?></h5>
                        </div>
                        <div class="col-8 col-sm-8">
                            <h4 class="ml-1"><?php echo $single['name'] ?></h4>
                            <span><?php if($single['avilable'])
                             echo "available";
                             else 
                             echo "not available"; ?> </span>    
                                <div>
                                        <input type="hidden" name="product_id" 
                                          value="<?php echo $single["id"]; ?>">
                                          <?php if($single['avilable']){?>
                                        <button class="btn btn-primary m-2 single">
                                        Order
                                        </button>
                                        <?php }?>

                                </div>  
                        </div>
                    </div>  <?php  endforeach; ?>
                <!---->   
            </div>        
        </div>
 </div>
                                          </div>
    <script src="assets/js/checks.js"></script>

    <!-- Footer Start -->
   <?php

require __DIR__ . '/layout/footer.php';
   ?>