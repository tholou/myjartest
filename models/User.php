<?php
/**
 * Created by PhpStorm.
 * User: tholo
 * Date: 6/13/2017
 * Time: 5:12 PM
 */

class Product{

    // database connection and table name
    private $conn;
    private $table_name = "users";

    // object properties
    public $id;
    public $phone;
    public $email;
    public $data1;
    public $data2;
    public $data3;
    public $data4;
    public $data5;
    public $data6;
    public $data7;
    public $data8;
    public $created_at;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
}