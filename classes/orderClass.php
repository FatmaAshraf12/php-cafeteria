<?php
 require_once __DIR__ . '\..\connection.php';


class OrderClass extends order
{



static function createOrder($user_id,$data){
        $order_id =  Order::createOrder( $user_id,$data);
       
        $items = Cart::getCartByUser($user_id);
        for($i=0 ; $i<count($items) ; $i++){
            $product_id = $items[$i]['product_id'] ;
            $quantity = $items[$i]['quantity'] ;
            $price = Product::getProductPrice($product_id);
            $price = $price["price"];
            ProductOrder::insertProduct($price , $product_id ,$quantity , $order_id);
        }
        
        Cart::deleteCartItem(["user_id"=>  $user_id]); 
    }


}