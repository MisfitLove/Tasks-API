<?php
class Database{
 
    // specify your own database credentials
    private $host = "sql7.freemysqlhosting.net";
    private $db_name = "sql7277236";
    private $username = "sql7277236";
    private $password = "Wy8qmysj6l";
    public $conn;
 
    // get the database connection
    public function getConnection(){
 
        $this->conn = null;
 
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
 
        return $this->conn;
    }
}
?>