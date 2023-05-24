<?php 
    class Database{
        private $host = "localhost";
        private $username = "root";
        private $password = "";
        private $database = "btth2";
        private $conn ;

        public function __construct()
        {
            // phần lệnh kết nối database 
            try {
                $dsn = "mysql:host=$this->host;dbname=$this->database";
                $this->conn = new PDO($dsn, $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            }
        }

        public function sqlGetPDO($sql, $conditions = null){
            // $sql = "SELECT * FROM $table";
            // kiểm tra xem có câu lệnh điều kiện không, $conditions là biến chứa điều kiện
            if($conditions !== null){
                $sql .= $conditions;
            }

            // phần lệnh truy vấn
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        }

        public function sqlPDO($sql){
    
            // phần lệnh truy vấn
            $stmt = $this->conn->prepare($sql);
            $check = $stmt->execute();
            return $check;
        }

    }
?>