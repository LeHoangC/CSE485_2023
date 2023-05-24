<?php
    require "../classes/database.php";

    $db = new Database();

    $datas = $db->sqlGetPDO("SELECT t1.IDGiangVien, t2.trangthai,t2.KhoangThoiGian,t2.IDLop, t3.TenKhoaHoc, t3.GiaiDoan, t3.HocKy
    FROM giangvien AS t1
    JOIN lop AS t2 ON t1.IDGiangVien = t2.IDGiangVien
    JOIN khoahoc AS t3 ON t2.IDKhoaHoc = t3.IDKhoaHoc
    ");

?>

<head>
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="content">
        <div class="row content_text">
            <div class="box_text col-12">
                <h1>Quản trị viên</h1>
                <hr>
                <div class="new col-12">
                    <h2>Danh sách khóa học</h2>

                    <a href="./themmonhoc.php" class="add_btn btn btn-primary">
                        <i class='bx bx-folder-plus'></i> Thêm môn học
                    </a>
                    
                    <a href="./themlop.php" class="add_btn btn btn-primary">
                        <i class='bx bx-folder-plus'></i> Thêm lớp
                    </a>
                </div>
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
                            <!-- <a class="btn btn-primary text-white text-decoration-none" href="quanlydiemdanh.php?idLop=<?= $data['IDLop']?>">Quản Lý Điểm Danh</a>    -->
                            
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</body>

</html>