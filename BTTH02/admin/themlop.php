<?php
require "../classes/database.php";
require "../classes/lopDAO.php";
require "../classes/khoahocDAO.php";

$db = new Database();
$khoahocDAO = new khoahocDAO($db);
$data = $khoahocDAO->getKH("SELECT IDKhoaHoc,TenKhoaHoc FROM khoahoc");

$IDGiangVien = "";
$IDKhoaHoc = "";
$thoiGian = "";
$status = "0";

if (isset($_POST['them'])) {
    $IDKhoaHoc = $_POST['kh'];
    $thoiGian = $_POST['thoigian'];

    $db = new Database();
    $khoahocDAO = new khoahocDAO($db);
    $data = $khoahocDAO->getKH("SELECT IDGiangVien FROM khoahoc WHERE IDKhoaHoc = '$IDKhoaHoc'");

    $IDGiangVien = $data[0]["IDGiangVien"];
    print_r($IDGiangVien);
}


if($IDKhoaHoc != "" && $thoiGian != "" && $IDGiangVien != ""){
    $db = new Database();
    $lopDAO = new lopDAO($db);

    if ($lopDAO->addLop($IDGiangVien, $IDKhoaHoc, $thoiGian)) {
        header("Location: admin.php");
    }else{
        echo "Thêm lớp thất bại";
    }
}



?>

<head>
    <title>Thêm lớp mới</title>
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="content_text">
        <div class="container fluid">
            <div class="row content_text">
                <div class="box_text col-12 text-center">
                    <h1 style="color: rgb(56, 236, 236);">Thêm Lớp</h1>
                    <hr>

                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <div class="row box_content mt-5">
                <form class="col-12 col-sm-12" method="POST" action="themlop.php">
                    <div class="input-group">
                        <select name="kh" id="kh">
                            <option value="" disabled selected>Khoá Học</option>
                            <?php
                            foreach ($data as $khoahoc) {
                            ?>
                                <option value="<?= $khoahoc["IDKhoaHoc"] ?>"><?= $khoahoc["TenKhoaHoc"] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="input-group">
                        <span class="input-group-text">Thời Gian</span>
                        <input name="thoigian" type="text" class="form-control">
                    </div>
                    <div><input class="add-btn btn btn-primary" type="submit" name="them" value="Thêm"></div>
                </form>
            </div>
        </div>
    </div>
</body>