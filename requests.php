<?php


$db = "mysql:host=127.0.0.1:4306;dbname=cafeteria";
$connect = new PDO($db, "root2", "");


if(isset($_GET['q'])){
    $order_id = intval($_GET['q']);
    $q = "SELECT * FROM order_products WHERE order_id=$order_id";
    $sql = $connect->prepare($q);
    $sql->execute();
    $orderProducts = $sql->fetchAll(PDO::FETCH_ASSOC);

}


if(isset($_GET['user_id'])){
    $id = intval($_GET['user_id']);
    $q = "SELECT * FROM orders WHERE user_id=$id";
    $sql = $connect->prepare($q);
    $sql->execute();
    $order_ids = $sql->fetchAll(PDO::FETCH_ASSOC);

    echo '<table class="table table2 text-center">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Order Date</th>
        <th scope="col">Total Amount</th>
        <th scope="col">Action</th>

        </tr>
    </thead>
    <tbody>';

    $i =1 ;
    foreach($order_ids as $k):;
        echo "<tr><td>". $i++;"</td>";
        echo "<td>".$k['created_at']."</td>";
        echo "<td>". $k['amount']."</td>";
        echo "<td>
        <button type='button' class='btn btn-primary btn-custom' onclick='showOrderProducts(".$k['id'].")'>View</button>
        <button type='button' class='btn btn-danger' onclick='showOrderProducts(".$k['id'].")'>Delete</button>

        </td>";
        echo  "</tr>";
      endforeach;

      echo '</tbody></table>';

}



if(isset($_GET['id'])){
    $id = intval($_GET['id']);
    $q = "SELECT o.product_id ,o.amount , p.name , p.image , p.price FROM order_products o , products p WHERE o.order_id=$id AND p.id = o.product_id";
    $sql = $connect->prepare($q);
    $sql->execute();
    $order_data = $sql->fetchAll(PDO::FETCH_ASSOC);    

    $i =0 ;
    foreach($order_data as $k):
        echo '<div class="col-md-3 text-center single-order-product">';
        echo '<img width="130"  src='.$k["image"].' class="position-relative" alt="">';
        echo ' <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill cart-num">
            <span class="visually-hidden">'.$k["price"].'.LE</span></span>';
        echo '<p>'.$k['name'].'</p>';
        echo '<span class="price">'.$k['amount'].'</span>';
        echo '</div>';
    endforeach;

}

if(isset($_GET['from'])){
    $from = date('Y-m-d h:i:s', strtotime($_GET['from']));
    if(empty($_GET['to'])){
        $_GET['to'] = date('Y-m-d h:i:s');
    }
    $to = date('Y-m-d h:i:s', strtotime($_GET['to']));
    
    $q = "SELECT orders.user_id , name , amount , orders.id as ordID FROM orders , users WHERE orders.user_id = users.id and orders.created_at BETWEEN '$from' AND '$to' group by orders.user_id" ;

    if($_GET['users']!= -1){
        $user = $_GET['users'];
        $q = "SELECT orders.user_id , name , amount , orders.id as ordID FROM orders , users WHERE orders.user_id = users.id and orders.user_id =$user and orders.created_at BETWEEN '$from' AND '$to' group by orders.user_id" ;
    }

    $sql = $connect->prepare($q);
    $sql->execute();
    $orders = $sql->fetchAll(PDO::FETCH_ASSOC);
    $i =1 ;
    foreach($orders as $k):
       echo '<tr>
            <td>'. $i++ .'</td>
            <td>'. $k['name'].'</td>
            <td>'.$k['amount'].'</td>
            <td><button type="button" class="btn btn-primary btn-custom" onclick="showOrder('. $k['user_id'].')">View</button></td>
        </tr>';
     endforeach;


}




?>