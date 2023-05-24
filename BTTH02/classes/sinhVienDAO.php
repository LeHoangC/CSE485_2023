<?php
    class sinhVienDAO {
        private $db;

        public function __construct($db) {
            $this->db = $db;
        }

        public function getSV($sql = "SELECT * FROM sinhvien"){
            $result = $this->db->sqlGetPDO($sql);

            return $result;
        }

        public function addSV($tenSV , $ngaysinhSV, $emailSV, $sdtSV, $passSV){
            $sql = "INSERT INTO sinhvien (Ten, NgaySinh, Email, SDT, MatKhau) VALUES ('$tenSV' , '$ngaysinhSV', '$emailSV', '$sdtSV', '$passSV')" ;
            $check = $this->db->sqlPDO($sql);

            return $check;
        }

        public function updateSV($maSV, $tenSV , $ngaysinhSV, $emailSV, $sdtSV, $passSV){
            $sql = "UPDATE sinhvien SET Ten='$tenSV', NgaySinh='$ngaysinhSV', Email='$emailSV', SDT='$sdtSV', MatKhau ='$passSV' WHERE IDSinhVien='$maSV'";
            $check = $this->db->sqlPDO($sql);

            return $check;
        }
    }
?>