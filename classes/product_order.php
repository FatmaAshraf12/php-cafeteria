<?php
 require_once __DIR__ . '\..\connection.php';


class ProductOrder extends DB
{
    public function __construct(){}

    static protected $table = 'product_order';
    
    static function get($id)
    {
        return ProductOrder::getAll(ProductOrder::$table);
    }


    static function getByOrderId($order_id)
    {
        return ProductOrder::getBy(ProductOrder::$table, "order_id",$order_id);
    }
/*
    static function find($id)
    {
        return ProductOrder::getOne(ProductOrder::$table, $id);
    }

    static function getWith($table2 , $p1 , $p2)
    {
    return ProductOrder::getFromTwoTables(ProductOrder::$table ,$table2 , $p1 , $p2);
    }

    static function updateStatus($id,$status)
    {
    return ProductOrder::update(ProductOrder::$table ,["id"=>$id] , ["status"=>$status]);
    }

*/
}


