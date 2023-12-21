<?php

class Database {
    private $host;
    private $username;
    private $password;
    private $database;
    private $connection;

    public function __construct($host,$database,$username,$password) {
        $this->host     = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
        $this->connect();
    }

    private function connect() {
        $dsn = "mysql:host={$this->host};dbname={$this->database}";
        try {
            $this->connection = new PDO($dsn, $this->username, $this->password);
            // Set the PDO error mode to exception
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function query($sql, $params = []) {
        try {
            $stmt = $this->connection->prepare($sql);

            if ($stmt === false) {
                throw new Exception("Error preparing query: " . $this->connection->error);
            }
            foreach ($params as $key => &$value) {
                if(!is_int($value)){
                            // Bind parameters as integers
                    $stmt->bindParam($key, $value, PDO::PARAM_STR);
                }else{
                    // Bind parameters as integers
                    $stmt->bindParam($key, $value, PDO::PARAM_INT);
                }

            }
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }
    public function fetch($result) {
        return $result->fetch(PDO::FETCH_ASSOC);
    }
    public function fetchAll($result) {
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function escapeString($string) {
        // PDO does not require manual escaping for query parameters
        return $string;
    }

    public function close() {
        $this->connection = null;
    }
}
?>
