<?php

class Post{

    // db related properties
    private $conn;
    private $table = "post";
    private $alias = "p";

    // table fields 
    public $id;
    public $title;
    public $content;
    public $userId;

    // constructor with db connection
    // a function that is triggered automatically when an instance of the class is created
    public function __construct($db){
        $this->conn = $db;
    }

    // Read all User records
    public function read(){
        $query = "SELECT * 
                    FROM {$this->table} AS {$this->alias} 
                    ORDER BY {$this->alias}.id DESC;";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }

}

?>