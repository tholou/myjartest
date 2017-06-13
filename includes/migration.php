<?php

/**
 * Created by PhpStorm.
 * User: tholo
 * Date: 6/13/2017
 * Time: 5:27 PM
 */
class migration
{
    var $resource;

    public function __construct($db)
    {
        //echo "Starting Migration";
        $this->resource = $db;
    }

    public function up()
    {
        if ($this->user_up()) {
            return true;
        } else {
            echo "Queries failed";
            return false;
        }
    }

    public function down()
    {
        if ($this->user_down()) {
            return true;
        } else {
            //return $this->resource->error();
            echo "\n Operation Failed \n";
        }
    }

    private function user_up()
    {
        //create the user entity
        $query = 'CREATE TABLE IF NOT EXISTS users';
        $query .= '(';
        $query .= 'id INT(10) unsigned NOT NULL AUTO_INCREMENT,';
        $query .= 'email varchar(255) NOT NULL,';
        $query .= 'phone varchar(255) NOT NULL,';
        $query .= 'data1 varchar(255) default null,';
        $query .= 'data2 varchar(255) default null,';
        $query .= 'data3 varchar(255) default null,';
        $query .= 'data4 varchar(255) default null,';
        $query .= 'data5 varchar(255) default null,';
        $query .= 'data6 varchar(255) default null,';
        $query .= 'data7 varchar(255) default null,';
        $query .= 'data8 varchar(255) default null,';
        $query .= 'created_at timestamp default null,';
        $query .= 'PRIMARY KEY (id),';
        $query .= 'UNIQUE KEY unique_email (email)';
        $query .= ')';
        //return $this->resource->run($query);
        echo "Creating  [TABLE] users..... \n";
        // prepare query statement
        $stmt = $this->resource->prepare($query);
        // execute query
        if ($stmt->execute()) {
            echo "[TABLE] Users Created \n";
            return True;
        } else {
            return False;
        }
    }

    private function user_down()
    {
        //Drop patient entity
        $query = 'DROP TABLE users';
        // prepare query statement
        $stmt = $this->resource->prepare($query);
        // execute query
        if ($stmt->execute()) {
            echo "[TABLE] Users Dropped \n";
            return True;
        } else {
            return False;
        }
    }
}