<?php
class Database {
    private $host = 'localhost';
    private $dbname = 'Projekti';
    private $username = 'root'; // Change this as per your configuration
    private $password = ''; // Change this as per your configuration
    private $conn;

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, 
            $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->conn;
    }

    function startConnection() {
        try {
         
            $conn = new PDO(
                "mysql:host=$this->server;dbname=$this->database", 
                $this->username, 
                $this->password  
            );

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            
            return $conn;
        } catch (PDOException $e) {
        
            echo "Database Connection Failed: " . $e->getMessage();

            return null;
        }
    }
}
?>