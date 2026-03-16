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
    public $userID;

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

        // Read all User records
    public function readSingle(){
        $query = "SELECT * 
                    FROM {$this->table} AS {$this->alias} 
                    WHERE {$this->alias}.id = ?
                    ORDER BY {$this->alias}.id DESC;";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row > 0){
            $this->title     =$row["title"];
            $this->content   =$row["content"];
            $this->userID     =$row["userID"];
        }

        return $stmt;
    
    }

    

}

?>