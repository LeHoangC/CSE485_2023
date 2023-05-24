<?php session_start();
    require "../classes/database.php";

    $IDGiangVien = $_GET['id'];

    $_SESSION['IDGiangVien'] = $IDGiangVien;
    
    $db1 = new Database();
    
    $datas = $db1->sqlGetPDO("SELECT t1.IDGiangVien, t2.trangthai,t2.KhoangThoiGian,t2.IDLop, t3.TenKhoaHoc, t3.GiaiDoan, t3.HocKy
    FROM giangvien AS t1
    JOIN lop AS t2 ON t1.IDGiangVien = t2.IDGiangVien
    JOIN khoahoc AS t3 ON t2.IDKhoaHoc = t3.IDKhoaHoc
    WHERE t1.IDGiangVien = '$IDGiangVien'
    ");


?>

<head>
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="../admin/assets/css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="content">
        <div class="row content_text">
            <div class="box_text col-12">
                <h1 class="">Giảng Viên</h1>
                <button class="btn btn-primary">
                    <a class="text-white text-decoration-none" href="dangxuat.php">Đăng xuất</a>
                </button>
                <hr>
                <h2>Danh sách khóa học</h2>
            </div>
        </div>
    </div>

    <div class="home mt-5">
        <div class="container fluid">
            <div class="row">
                <?php foreach ($datas as $data) { ?>
                    <div class="card me-3" style="width: 18rem;">
                        <img src="../assets/images/anhLogin.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $data['TenKhoaHoc'] ?></h5>
                            <p class="card-text"><?= $data['KhoangThoiGian'] ?></p>
                            <p class="card-text"><?= $data['GiaiDoan'] ?></p>
                            <p class="card-text"><?= $data['HocKy'] ?></p>
                            <?php
                            if ($data['trangthai'] == 0) {
                                echo
                                ' <p class="card-text text-danger">
                                    Đang đóng
                                </p>';
                            } else {
                                echo
                                ' <p class="card-text text-success">
                                    Đang mở
                                </p>';
                            }
                            ?>
                            <a class="btn btn-primary text-white text-decoration-none" href="quanlydiemdanh.php?idLop=<?= $data['IDLop']?>">Quản Lý Điểm Danh</a>   
                            
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</body>

</html>
