<?php 
    class lopDAO{
        private $db;

        public function __construct($db) {
            $this->db = $db;
        }

        public function getKH($sql = "SELECT * FROM lop"){
            $result = $this->db->sqlGetPDO($sql);
            return $result;
        }

        public function addLop($IDGiangVien, $IDKhoaHoc, $thoiGian, $Status = '0'){
            $sql = "INSERT INTO lop (IDKhoaHoc, IDGiangVien, KhoangThoiGian, trangthai) VALUES ('$IDKhoaHoc', '$IDGiangVien', '$thoiGian',' $Status')" ;
            $check = $this->db->sqlPDO($sql);

            return $check;
        }

        public function updateLop($IDGiangVien, $IDKhoaHoc, $thoiGian, $Status){
            $sql = "UPDATE lop SET IDGiangVien = '$IDGiangVien', IDKhoaHoc = '$IDKhoaHoc', KhoangThoiGian = '$thoiGian', trangthai = '$Status' ";
            $check = $this->db->sqlPDO($sql);

            return $check;
        }

        public function updateStatusLop($IDLop, $Status){
            $sql = "UPDATE lop SET trangthai = '$Status' WHERE IDLop = '$IDLop' ";
            $check = $this->db->sqlPDO($sql);

            return $check;
        }
    }
?>