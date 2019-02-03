<?php
class Picture{
 
    // database connection and table name
    private $conn;
    private $table_name = "picture";
 
    // object properties
    public $id;
    public $task_id;
    public $word;
    public $url;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    // read pictures for task, same as before, lack of an idea for a better name
    function readPicturesByTask(){
    
        // select all query
        $query = "SELECT
                    id, word, url
                FROM
                    $this->table_name
                WHERE
                    task_id=$this->task_id
                ORDER BY
                    id ASC";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }    
}