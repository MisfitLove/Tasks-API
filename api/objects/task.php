<?php
class Task{
 
    // database connection and table name
    private $conn;
    private $table_name = "task";
 
    // object properties
    public $id;
    public $unit_id;
    public $name;
    public $description;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    // read tasks for unit, idk how to name this function better readTasksByUnit seems too long?
    function readTasksByUnit(){
    
        // select all query
        $query = "SELECT
                    id, name, description
                FROM
                    $this->table_name
                WHERE
                    unit_id=$this->unit_id
                ORDER BY
                    id ASC";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }    
}