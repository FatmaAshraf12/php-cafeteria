


<?php
 require_once __DIR__ . '\..\connection.php';


class User extends DB
{
    public function __construct(){}

    static protected $table = 'users';
    
    static function find($id)
    {
        echo 'dddfrr';
        return User::getOne(User::$table, $id);
        
    }



}