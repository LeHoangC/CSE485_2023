<?php
class SinhVien
{
    public $ten;
    public $tuoi;
}

class DanhSachSinhVien
{
    public $danh_sach = [];

    public function docDuLieuTuFile($ten_file)
    {
        $file = fopen($ten_file, 'r');
        if ($file) {
            while (($dong = fgets($file)) !== false) {
                $thong_tin = explode(',', $dong);
                $sinh_vien = new SinhVien();
                $sinh_vien->ten = $thong_tin[0];
                $sinh_vien->tuoi = $thong_tin[1];
                $this->danh_sach[] = $sinh_vien;
            }
            fclose($file);
        } else {
            echo 'Khong mo duoc file';
        }
    }

    public function luuDanhSachVaoFile($ten_file)
    {
        $file = fopen($ten_file, 'w');
        foreach ($this->danh_sach as $sinh_vien) {
            $line = $sinh_vien->ten . ',' . $sinh_vien->tuoi . "\n";
            fwrite($file, $line);
        }
        fclose($file);
    }

    public function hienThiDanhSach()
    {
        foreach ($this->danh_sach as $sinh_vien) {
            echo 'Ten: ' . $sinh_vien->ten . ', Tuoi: ' . $sinh_vien->tuoi . '<br>';
        }
    }
}

$danh_sach_sinh_vien = new DanhSachSinhVien();
$danh_sach_sinh_vien->docDuLieuTuFile("listOfStudent.txt");
$danh_sach_sinh_vien->hienThiDanhSach();
