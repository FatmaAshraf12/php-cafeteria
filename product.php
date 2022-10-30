<?php

use function Composer\Autoload\includeFile;
require __DIR__ . '/layout/header.php';
require './DB.php';
 DB::connect('mysql','localhost','cafe project','root','');


//use function Composer\Autoload\includeFile;
//require __DIR__ . '/layout/header.php';
//require './DB.php';
//require './models/product.php';
//require_once __DIR__ . '\connection.php';
// DB::connect('mysql','localhost','cafe project','root','');

 include __DIR__ . '/layout/header.php';
require_once __DIR__ . '/classes/Product.php';
require_once __DIR__ . '/classes/product_order.php';


// $id =$_REQUEST['product_id'];
// $orderprduct = product::find($id);
// var_dump($orderprduct);


?>
    <!-- Navbar End -->
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 position-relative overlay-bottom">
        <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px">
            <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">Services</h1>
            <div class="d-inline-flex mb-lg-5">
                <p class="m-0 text-white"><a class="text-white" href="">Home</a></p>
                <p class="m-0 text-white px-2">/</p>
                <p class="m-0 text-white">Services</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="section-title">
                <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">About Us</h4>
                <h1 class="display-4">Serving Since 1950</h1>
            </div>
        </div>
    </div>    
    <!-- page Header End -->  
 
    <!-- Service Start --> 
    <div class="container-fluid">
        <div class="row">
            <!--the Bill-->

             <div class="col-lg-5">
                                <!---->
                <div id="myDIV">  
                    <?php 
                    $order_product = DB::getFromTwoTables('cart','product','product_id','id'); 
                       foreach ($order_product as $val): ?>    
                       <div class="row align-items-center mb-3 col-sm-12 mt-2"id="showproduct">
                                <div class="col-4 col-sm-3 ">
                                    <img style="width: 100%;"   src="assets/<?php echo $val['image'] ?>"alt="">           

                                </div>
                                <div class="col-4 col-sm-2">
                                     <h4><?php echo $val['name'] ?></h4>
                                </div>
                                   
                                <div class="col-sm-1 offset-1 ">
                                    <input type='button' style="width: 30px;" value='-' field='quantity'  class='qtyminus' />
                                </div> 
                                <div class="col-4 col-sm-1">
                                    <input type='text' style="width: 30px; text-align:center;" class="input-number" name='quantity' value='1' class='qty' />      
                                </div>
                                <div class="col-4 col-sm-1">
                                    <input type='button' style="width: 30px;" value='+' class='qtyplus' field='quantity' />
                                </div> 
                                   
                                <div class="col-4 col-sm-2 mb-1">
                                    <button class="btn btn-primary" >
                                        <span id="product-total-price"
                                        data-price =  <?php echo $val['price']  ?>>
                                            <?php echo $val['price']  ?>
                                        </span>
                                    </button>
                                </div>
                                <div class="col-sm-1">
                                        <button class="btn btn-danger"
                                        id="delete-product" data-product-id=<?php echo $val['id']; ?>>
                                        x
                                        </button>
                                </div>
                
                        </div>    <?php endforeach; ?>
                        <div class="row align-items-center col-sm-12">
                                    
                                <form action="">
                                        <textarea name="message" style="width: 300; height: 100px; margin-left:85px;" class="form-control" id="message" placeholder="Your message..." required></textarea>
                                </form>
                        </div>
                        <div class="row align-items-center col-sm-12 mt-2">      
                            <div class="form-group">
                                    <select class="custom-select bg-transparent border-primary" style="height: 49px; width: 300px; margin-left: 100px;">
                                        <option selected>Room</option>
                                        <option value="1">Room 1</option>
                                        <option value="2">Room 2</option>
                                        <option value="3">Room 3</option>
                                        <option value="3">Room 4</option>
                                    </select>
                            </div>
                        </div>
                            <hr>
                        <div class="row align-items-center col-sm-12 mt-2">
                                <div class="col-sm-4">
                                    <input type="submit" class="btn btn-primary btn-lg btn-block" onclick="mFunction()">
                                </div>

                            
                                <div class="col-sm-2 offset-3">
                                    <h3>Total</h3>
                                </div>
                                <div class="col-sm-3"> 
                                    <button class="btn btn-primary">
                                   <?php foreach ($order_product as $val): ?>   
                                        <span class="product-maxtotal-price" data-price=<?php echo $val['price']?>><?php echo $val['price']?>
                                    <?php endforeach; ?>
                                        </span>
                                        </button>
                                </div>
                        </div>
                </div>    
            </div> 

                            <div class="col-lg-5">
                                <!---->
                            <div id="myDIV">     
                                <div class="row align-items-center mb-3 col-sm-12 mt-2"id="showproduct">
                                    <div class="col-4 col-sm-3 ">
                                        <img style="width: 100%;" class="rounded-pill " src="" alt="" srcset="">
                                    </div>
                                    <div class="col-4 col-sm-2">
                                        <h4><?php ?></h4>
                                    </div>
                                    <div class="col-sm-1 offset-1">
                                        <input type='button' style="width: 30px;" value='-' field='quantity' onclick="decrementValue()" />
                                    </div> 
                                    <div class="col-4 col-sm-1">
                                        <input type='text' style="width: 30px; text-align:center;" name='quantity' value='1' maxlength="2" max="10" size="1" id="number" />      
                                    </div>
                                    <div class="col-4 col-sm-1">
                                        <input type='button' style="width: 30px;" value='+' field='quantity' onclick="incrementValue()" />
                                    </div> 
                                    <div class="col-4 col-sm-2 mb-1">
                                        <button class="btn btn-primary">
                                            <span class="product-total-price" ><?php  ?></span>
                                        </button>
                                    </div>
                
                                </div> <?php ?>
                                <div class="row align-items-center col-sm-12">
                                    
                                        <form action="">
                                            <textarea name="message" style="width: 300; height: 100px; margin-left:85px;" class="form-control" id="message" placeholder="Your message..." required></textarea>
                                        </form>
                                </div>
                                <div class="row align-items-center col-sm-12 mt-2">      
                                    <div class="form-group">
                                        <select class="custom-select bg-transparent border-primary" style="height: 49px; width: 300px; margin-left: 100px;">
                                            <option selected>Room</option>
                                            <option value="1">Room 1</option>
                                            <option value="2">Room 2</option>
                                            <option value="3">Room 3</option>
                                            <option value="3">Room 4</option>
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                <div class="row align-items-center col-sm-12 mt-2">
                                    <div class="col-sm-4">
                                        <input type="submit" class="btn btn-primary btn-lg btn-block" onclick="mFunction()">
                                    </div>

                            
                                    <div class="col-sm-2 offset-3">
                                        <h3>Total</h3>
                                    </div>
                                    <div class="col-sm-3"> 
                                        <button class="btn btn-primary">
                                            <span class="product-maxtotal-price" data-price="24.99"></span>
                                        </button>
                                    
                                    </div>
                                </div>
                            </div>    
                            </div> 

            <!---->
            <!--products-->
            <div class="col-lg-7">
                <div class="row align-items-center mb-5 ml-2">
                    <?php      

                    $products = DB::getAll('product');
                       
                    foreach ($products as $single): ?> 
                    <div class="row align-items-center mt-5 col-sm-6 mr-1" >
                        <div class="col-4 col-sm-4">
                        <img style="width: 130px;"  class="rounded-pill m-md-n4" src="assets/<?php echo $single['image'] ?>"alt="">                     
                        <h5 class="menu-price m-lg-n4">$<?php  echo $single['price'] ?></h5>

                    $products = Product::get();          
                    foreach ($products as $single): ?> 
                    <div class="row align-items-center mt-5 col-sm-6 mr-1" >
                        <div class="col-4 col-sm-4">
                            <img style="width: 130px;"  class="rounded-pill m-md-n4" src="<?php echo $single['image'] ?>"alt="">
                            <h5 class="menu-price m-lg-n4"><?php echo $single['price'] ?></h5>

                        </div>
                        <div class="col-8 col-sm-8">
                            <h4 class="ml-1"><?php echo $single['name'] ?></h4>
                            <span><?php echo $single['avilable'] ?> </span>    
                                <div>

                                    <form action="./cart.php">
                                        <input type="hidden" name="product_id" 
                                          value="<?php echo $single["id"]; ?>">
                                        <button class="btn btn-primary m-2 single">
                                        Order
                                        </button>
                                    </form>

                                </div>  
                        </div>
                    </div>  <?php  endforeach; ?>
                <!---->   
            </div>        
    </div>
    
    <!-- Footer Start -->
   <?php
require __DIR__ . '/layout/footer.php';
   ?>

                                    <button class="btn btn-primary m-2 single" onclick="addToCart(<?php echo $single['id']; ?> )" >
                                    Order
                                    </button>
                                </div>  
                        </div>
                    </div> 
                     <?php  endforeach; ?>
                <!---->   
            </div>        
    </div>

    <!-- Footer Start -->
   <?php
   
require __DIR__ . '/layout/footer.php';
   ?>
    <script src="assets/js/checks.js"></script>

