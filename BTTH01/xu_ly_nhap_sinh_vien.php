<?php
require_once('student.php');
// require_once('DanhSachSinhVien.php');

$ten_file = 'listOfStudent.txt';
$sinh_vien = new SinhVien();
$sinh_vien->ten = $_POST['ten'];
$sinh_vien->tuoi = $_POST['tuoi'];
$danh_sach_sinh_vien = new DanhSachSinhVien();
$danh_sach_sinh_vien->docDuLieuTuFile($ten_file);
$danh_sach_sinh_vien->danh_sach[] = $sinh_vien;
$danh_sach_sinh_vien->luuDanhSachVaoFile($ten_file);
echo "Luu thanh cong";
