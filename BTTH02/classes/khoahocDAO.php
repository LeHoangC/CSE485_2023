<?php 
    class khoahocDAO{
        private $db;

        public function __construct($db) {
            $this->db = $db;
        }

        public function getKH($sql = "SELECT * FROM khoahoc"){
            $result = $this->db->sqlGetPDO($sql);

            return $result;
        }

        public function addKH($IDGiangVien, $tenKH, $giaiDoan, $hocKy){
            $sql = "INSERT INTO khoahoc (IDGiangVien, TenKhoaHoc, GiaiDoan, HocKy) VALUES ('$IDGiangVien', '$tenKH', '$giaiDoan',' $hocKy')" ;
            $check = $this->db->sqlPDO($sql);

            return $check;
        }

        public function updateKH($IDGiangVien, $tenKH, $giaiDoan, $hocKy){
            $sql = "UPDATE khoahoc SET IDGiangVien = '$IDGiangVien', TenKhoaHoc = '$tenKH', GiaiDoan = '$giaiDoan', HocKy = '$hocKy' ";
            $check = $this->db->sqlPDO($sql);

            return $check;
        }
    }
?>