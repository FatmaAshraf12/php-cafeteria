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

    static function getByCondOneTable($cond)
    {
        return Cart::getCondOneTable(Cart::$table , $cond);
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


    

    static function deleteCart($id)
    {
        return Cart::delete(Cart::$table, $id);
    }

    static function deleteCartItem($cond)
    {
        return Cart::deleteCond(Cart::$table,$cond);
    }



  
}


