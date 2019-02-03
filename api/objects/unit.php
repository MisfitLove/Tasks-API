<?php
class Unit{
 
    // database connection and table name
    private $conn;
    private $table_name = "unit";
 
    // object properties
    public $id;
    public $name;
    public $description;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    // read products
    function read(){
    
        // select all query
        $query = "SELECT
                    id, name, description
                FROM
                    " . $this->table_name . "
                ORDER BY
                    id ASC";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }    
}