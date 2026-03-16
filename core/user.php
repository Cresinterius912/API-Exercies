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
    public function readSingle(){
        $query = "  SELECT *
                    FROM {$this->table} AS {$this->alias}
                    WHERE {$this->alias}. id = ?
                    LIMIT 1;";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row > 0){
            $this->username     =$row["username"];
            $this->firstName    =$row["firstName"];
            $this->lastName     =$row["lastName"];
            $this->age          =$row["age"];
        }

        return $stmt;
    }

    public function create(){
        $query = "INSERT INTO {$this->table}
        (username, firstName, lastName, age)
        VALUES (:username,:firstName,:lastName,:age)";
    
    $stmt = $this->conn->prepare($query);

    $this->username = htmlspecialchars(strip_tags($this->username));
    $this->firstName = htmlspecialchars(strip_tags($this->firstName));
    $this->lastName = htmlspecialchars(strip_tags($this->lastName));
    $this->age = htmlspecialchars(strip_tags($this->age));

    $stmt->bindParam(":username", $this->username);
    $stmt->bindParam(":firstName", $this->firstName);
    $stmt->bindParam(":lastName", $this->lastName);
    $stmt->bindParam(":age", $this->age);

    if($stmt->execute())
        {
            return true;
        }

        printf("Error %s. \n",$stmt->error);
        return false;
    }

}

?>