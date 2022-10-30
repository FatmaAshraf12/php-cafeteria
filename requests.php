<?php
require_once __DIR__ . '/classes/product_order.php';
require_once __DIR__ . '/classes/order.php';
require_once __DIR__ . '/classes/product.php';
require_once __DIR__ . '/views.php';

require_once __DIR__ . '/classes/cart.php';

session_start();

/********************* display orders by users **************************/
if(isset($_GET['user_id'])){
    $id = intval($_GET['user_id']);
    $userOrders = Order::getWhere(["user_id"=> $id ,"status" => "'Delivered'"]);

    $i =1 ;
    foreach($userOrders as $singleOrder):?>
            <tr order_id="<?php echo $singleOrder['id']; ?>">
                <td><?php echo $singleOrder['created_at'];?></td>
                <td><?php echo $singleOrder['total'];?></td>
                <td>
                    <button type='button' class='btn btn-primary btn-custom' onclick="showOrderProducts(<?php echo $singleOrder['id']; ?>)">View</button>
                    <button type='button' class='btn btn-danger' onclick="deleteOrder(<?php echo $singleOrder['id']; ?>)">Delete</button>
                </td>
            </tr>
      <?php endforeach;
}
/********************* display order details **************************/
if(isset($_GET['addToCart'])){
    $id = intval($_GET['id']);
    $order_data = ProductOrder::getByOrderId("product_order.product_id ,product_order.amount , product.name , product.image , product.price", $id);
    $r = Cart::addToCart(["user_id"=>3,"product_id"=>4 , "quantity"=>4]);
}


if(isset($_GET['addToCartPId'])){
    $product_id = intval($_GET['addToCartPId']);
    $user_id = intval($_GET['user_idx']);
    $data = Cart::getByCondOneTable(["user_id"=>$user_id,"product_id"=>$product_id]);
   
    if(count($data)==0){
        Cart::addToCart(["user_id"=>$user_id,"product_id"=>$product_id , "quantity"=>1]);
        $product_data = Product::find($product_id);
       
       echo  '<div class="singleItem d-flex w-100 justify-content-between" p-id="'.$product_data["id"].'">
                    <h5>'. $product_data["name"].'</h5>
                    <button onclick="decrease()">-</button>
                    <p class="quantity">1</p>
                    <button class="increase" onclick="increase()">+</button>
                    <p class="price">'. $product_data["price"].'</p>
                    <button onclick="removeFromCart('.$product_data["id"].')">X</button>
                </div>';
    }
    else{
        $q = $data[0]['quantity']+1;
        $data = Cart::updateCol(["user_id"=>$user_id,"product_id"=>$product_id],["quantity"=>$q]);
       echo '
        <p class="here" style="margin:0">'. ($q++) .'</p>';
    }  
}


if(isset($_GET['increasQuantity'])){
    $q = intval($_GET['increasQuantity']) ;
    $product_id=  intval($_GET['p_id']) ;
    $user_id =  intval($_GET['user_idx']) ;
    $data = Cart::updateCol(["user_id"=>$user_id,"product_id"=>$product_id],["quantity"=>$q]);
}

if(isset($_GET['removeFromCart'])){
    $product_id = intval($_GET['removeFromCart']);
    $user_id = intval($_GET['user_idx']);
    $r = Cart::deleteCartItem(["user_id"=>$user_id,"product_id"=>$product_id]);
}



/********************* display order details **************************/


if(isset($_GET['id'])){
    $id = intval($_GET['id']);
    $order_data = ProductOrder::getByOrderId("product_order.product_id ,product_order.amount , product.name , product.image , product.price", $id);
    
    $i =0 ;
    foreach($order_data as $singleOrder):?>
        <div class="col-md-3 text-center single-order-product">
            <img width="130"  src='<?php echo $singleOrder["image"]; ?>' class="position-relative" alt="">
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill cart-num">
            <span class="visually-hidden"><?php echo $singleOrder["price"];?>.LE</span></span>
            <p><?php echo $singleOrder['name']; ?></p>
            <span class="price"><?php echo $singleOrder['amount'];?></span>
        </div> 
    <?php endforeach;
}

/********************* Delete Single Order **************************/
if(isset($_GET['deleteId'])){
    $id = intval($_GET['deleteId']);
    ProductOrder::deleteOrderProducts(["order_id"=>$id]);
    Order::deleteOrder($id);
}

/********************* UPDATE ORDER STATUS **************************/
if(isset($_GET['status'])){
    $id = intval($_GET['order_id']);
    $status = $_GET['status'];
    Order::updateStatus($id,$status);
    echo $status;
}

/**************************** **************************/
if(isset($_GET['q'])){
    $order_id = intval($_GET['q']);
    $q = "SELECT * FROM order_products WHERE order_id=$order_id";
    $sql = $connect->prepare($q);
    $sql->execute();
    $orderProducts = $sql->fetchAll(PDO::FETCH_ASSOC);
}

/********************* Filter **************************/

if(isset($_GET['from'])){
    $from = date('Y-m-d', strtotime($_GET['from']));
    if(empty($_GET['to'])){
        $_GET['to'] = date('Y-m-d 12:00:00');
    }
    $to = date('Y-m-d 12:00:00', strtotime($_GET['to']));

    if($_GET['users']!= -1){
        $user = $_GET['users'];
        $orders = Order::getWith("orders.user_id , name , total , orders.id as ordID" , "users" , "user_id=users.id AND user_id = $user AND orders.created_at BETWEEN '$from' AND '$to' AND status = 'Delivered' ","orders.user_id");
    }
    else{
        $orders = Order::getWith("orders.user_id , name , total , orders.id as ordID" , "users" , "user_id=users.id  AND status = 'Delivered' AND orders.created_at BETWEEN '$from' AND '$to' ","orders.user_id ");
    }

    $i =1 ;
    foreach($orders as $k):
       echo '<tr>
            <td>'. $k['name'].'</td>
            <td>'.$k['total'].'</td>
            <td><button type="button" class="btn btn-primary btn-custom" onclick="showOrder('. $k['user_id'].')">View</button></td>
        </tr>';
     endforeach;
}


/********************* Filter In Users **************************/

if(isset($_GET['Userfrom'])){

    $from = date('Y-m-d', strtotime($_GET['Userfrom']));
    if(empty($_GET['to']))        $_GET['to'] = date('Y-m-d 12:00:00');
    $user_id = $_SESSION["user_id"] ;
    $to = date('Y-m-d 23:59:59', strtotime($_GET['to']));
    $orders = Order::getWith("orders.created_at,status,total,orders.id" , "users" , "orders.user_id=users.id AND orders.user_id=$user_id AND orders.created_at BETWEEN '$from' AND '$to'",null);
    
    foreach($orders as $singleOrder):
       echo '<tr order_id="'.$singleOrder['id'].'"><td>'. $singleOrder['created_at'].'<button type="button" class="btn btn-warning float-right btn-floating rounded pluse" data-mdb-ripple-color="dark" onclick="showOrderProductss('.$singleOrder['id'].')"> <i class="bi bi-plus" style="font-size: 24px;"></i></button></td>
            <td class="status">'. $singleOrder['status'].'</td>
            <td>'.$singleOrder['total'].'</td>';
             if($singleOrder['status']=="Processing"){
               echo '<td class="text-center btns-del"><button type="button" class="btn btn-danger rounded" onclick="cancelOrder('.$singleOrder['id'].')">Cancel</button></td>';
             }else if($singleOrder['status']=="Canceled"){
               echo  '<td  class="text-center btns-del"> 
                <button type="button" class="btn btn-primary rounded" onclick="reOrder('.$singleOrder['id'].')">Reorder</button>
                <button type="button" class="btn btn-danger rounded" onclick="deleteOrder('.$singleOrder['id'].')">Delete</button>
              </td>';
             }else{
                echo '<td></td>';
             }
             echo '</tr>';
     endforeach;
}


/********************* CANCEL ORDER **************************/

if(isset($_GET['cancelOrder'])){
    $id = intval($_GET['cancelOrder']);
    Order::updateStatus($id,"Canceled");
    echo '<td class="text-center btns-del">    <button type="button" class="btn btn-primary rounded" onclick="reOrder('.$id.')">Reorder</button>
    <button type="button" class="btn btn-danger rounded" onclick="deleteOrder('.$id.')">Delete</button></td>';
}
/********************* Re ORDER **************************/

if(isset($_GET['reOrder'])){
    $id = intval($_GET['reOrder']);
    Order::updateStatus($id,"Processing");
    echo '<td class="text-center btns-del"><button type="button" class="btn btn-danger rounded" onclick="cancelOrder('.$id.')">Cancel</button></td>';
}


/********************* Handle Pagination **************************/

if(isset($_GET['pageoo'])){
    $page =  isset($_GET["pageoo"]) ? $_GET["pageoo"] :  $page=1;   
    $num_of_record = 2; 
 
    $start_from = ($page-1) * $num_of_record;

    $orders = Order::getWithPaginate("orders.created_at,orders.room, status ,ext,name,total,orders.user_id as id1 ,users.id as id2 , orders.id as order_id", "users" , "user_id=users.id AND status != 'Delivered' AND status != 'Canceled'" ,null,$start_from ,$num_of_record );
    returnOrders($orders , $page);
}

/********************* Handle Pagination **************************/

if(isset($_GET['myorders'])){
    $page =  isset($_GET["myorders"]) ? $_GET["myorders"] :  $page=1;   
    $num_of_record = 2; 
 
    $start_from = ($page-1) * $num_of_record;
    $user_id =  $_SESSION["user_id"];
   $orders = Order::getWherePaginate("user_id = $user_id",$start_from,$num_of_record );
    //$orders = Order::customQuery("SELECT * ,orders.id as id1 FROM orders WHERE user_id = $user_id LIMIT $start_from , $num_of_record");

   // $orders = Order::getWithPaginate("orders.created_at,orders.room, status ,ext,name,total,orders.user_id as id1 ,users.id as id2 , orders.id as order_id", "users" , "user_id=users.id AND status != 'Delivered' AND status != 'Canceled'" ,null,$start_from ,$num_of_record );
    returnMyOrders($orders , $page);
}


if(isset($_GET['checks'])){
    $page =  isset($_GET["checks"]) ? $_GET["checks"] :  $page=1;   
    $num_of_record = 2; 
 
    $start_from = ($page-1) * $num_of_record;
    $user_id =  $_SESSION["user_id"];
    //$orders = Order::getWherePaginate("user_id = $user_id",$start_from,$num_of_record );
    $orders = Order::getWithPaginate("orders.user_id ,name, sum(total) as total_amount","users" , "orders.user_id = users.id AND orders.status ='Delivered'" , " orders.user_id" ,$start_from ,$num_of_record );

   // $orders = Order::getWithPaginate("orders.created_at,orders.room, status ,ext,name,total,orders.user_id as id1 ,users.id as id2 , orders.id as order_id", "users" , "user_id=users.id AND status != 'Delivered' AND status != 'Canceled'" ,null,$start_from ,$num_of_record );
   returnMyChecks($orders);
}



?>