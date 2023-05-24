<?php
    class giangVienDAO {
        private $db;

        public function __construct($db) {
            $this->db = $db;
        }

        public function getGV($sql = "SELECT * FROM giangvien"){
            $result = $this->db->sqlGetPDO($sql);
            return $result;
        }

        public function addGV($tenGV , $emailGV, $sdtGV, $passGV){
            $sql = "INSERT INTO giangvien (Ten, Email, SDT, MatKhau) VALUES ('$tenGV' , '$emailGV', '$sdtGV', '$passGV')" ;
            $check = $this->db->sqlPDO($sql);

            return $check;
        }

        public function updateGV($maGV, $tenGV , $emailGV, $sdtGV, $passGV){
            $sql = "UPDATE giangvien SET Ten='$tenGV', Email='$emailGV', SDT='$sdtGV', MatKhau ='$passGV' WHERE IDSinhVien='$maGV'";
            $check = $this->db->sqlPDO($sql);

            return $check;
        }
    }
?>