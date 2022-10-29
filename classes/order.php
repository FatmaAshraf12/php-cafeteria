<?php
 require_once __DIR__ . '\..\connection.php';


class Order extends DB
{
    public function __construct(){}

    static protected $table = 'orders';

    /********************* get **************************/  
    static function get()
    {
        return Order::getAll(Order::$table);
    }

    /********************* find **************************/
    static function find($id)
    {
        return Order::getOne(Order::$table, $id);
    }

    /********************* getWhere **************************/
    static function getWhere($cond)
    {
        return Order::getCondOneTable(Order::$table, $cond );
    }
 /********************* getWhere **************************/
 static function getWherePaginate($cond,$from,$num)
 {
     return Order::getByPaginate(Order::$table, $cond , $from,$num );
 }


  /********************* CREATE **************************/

static function createOrder($data){
    return Order::create(Order::$table, $data);
}

    /********************* getWith **************************/
    static function getWith($cols,$table2 , $cond ,$group_by)
    {
    return Order::getFromTwoTables($cols,Order::$table ,$table2 , $cond ,$group_by);
    }

/********************* getWithPaginate **************************/
static function getWithPaginate($cols,$table2 , $cond ,$group_by,$start,$num)
{
return Order::getFromTwoTablesPaginate($cols,Order::$table ,$table2 , $cond ,$group_by,$start,$num);
}
    

    /********************* updateStatus **************************/
    static function updateStatus($id,$status)
    {
        return Order::update(Order::$table ,["id"=>$id] , ["status"=>$status]);
    }

    /********************* deleteOrder **************************/
    static function deleteOrder($id)
    {
        return Order::delete(Order::$table, $id);
    }

    /********************* getEnumVal **************************/

    static function getEnumVal()
    {
        $enum = Order::getColValues(Order::$table, "status");
        $enumAll = ($enum[1]['COLUMN_TYPE']);
        $valArr = explode(",",$enumAll);

        $values = array();
        $val = explode("'",$valArr[0]);
        array_push($values,$val[1]);
        
        for($i=1 ; $i<count($valArr) ;$i++){
            $val = explode("'", $valArr[$i]);
            array_push($values,$val[1]);
        }
        return  $values;
    }

  /********************* CANCEL ORDER **************************/

}