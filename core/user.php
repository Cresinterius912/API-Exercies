<?php

class User{

    // db related properties
    private $conn;
    private $table = "user";
    private $alias = "u";

    // table fields
    public $id;
    public $username;
    public $firstName;
    public $lastName;
    public $age;

    // constructor with db connection
    // a function that is triggered automatically when an instane of the class is created
    public function __construct($db){
        $this->conn = $db;
    }

    public function read(){
        $query =  " SELECT * 
                    FROM {$this->table} AS {$this->alias}
                    ORDER BY {$this->alias}.username ASC;";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }

}

?>