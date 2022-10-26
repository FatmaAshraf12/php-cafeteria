<?php
 require_once __DIR__ . '\..\connection.php';


class Order extends DB
{

    
    public function __construct(){}
    static protected $table = 'orders';
    static function get()
    {
        return Order::getAll(Order::$table);
    }
    static function find($id)
    {
        return Order::getOne(Order::$table, $id);
    }

    static function getWith($table2 , $p1 , $p2)
    {
    return Order::getFromTwoTables(Order::$table ,$table2 , $p1 , $p2);
    }

    static function updateStatus($id,$status)
    {
    return Order::update(Order::$table ,["id"=>$id] , ["status"=>$status]);
    }


}


