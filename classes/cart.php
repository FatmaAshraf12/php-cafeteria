<?php
 require_once __DIR__ . '\..\connection.php';


class Cart extends DB
{
    public function __construct(){}

    static protected $table = 'cart';
    
    static function get()
    {
        return Cart::getAll(Cart::$table);
    }

    static function getByCondd($table2,$cond)
    {
        return Cart::getCond(Cart::$table, $table2 , $cond);
    }

    /*********************************************** */ 
    // get cart by user
    static function getCartByUser($user_id)
    {
        return Cart::getCondOneTable(Cart::$table , ["user_id"=>$user_id]);
    }

    
    static function addToCart($data){
        return Cart::create(Cart::$table, $data);
    }

    static function find($id)
    {
        return Cart::getOne(Cart::$table, $id);
    }

    static function updateCol($cond,$data)
    {
        return Cart::update(Cart::$table, $cond,$data);
    }


    /********************** DELETE CART ************************/

    static function deleteCartItem($cond)
    {
        /// delete from cart where x =y and f =u
        return Cart::deleteCond(Cart::$table,$cond);
    }

    static function getTotal($user_id){
       return Cart::getColByCond(Cart::$table, "product" , "SUM(price*cart.quantity) as total" , ["user_id"=>$user_id ,"product_id"=>"product.id"]);
    }

  
}


