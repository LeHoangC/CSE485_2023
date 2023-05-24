<?php
    class adminDAO {
        private $db;

        public function __construct($db) {
            $this->db = $db;
        }

        public function getAD($sql = "SELECT * FROM quantrivien"){
            $result = $this->db->sqlGetPDO($sql);
            return $result;
        }

        public function addAdmin($ten , $email, $pass){
            $sql = "INSERT INTO quantrivien (Ten, Email,  MatKhau) VALUES ('$ten' ,'$email', '$pass')" ;
            $check = $this->db->sqlPDO($sql);

            return $check;
        }
    }
?>