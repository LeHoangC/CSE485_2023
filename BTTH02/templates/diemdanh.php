<?php
require "../classes/database.php";

$currentDateTime = date("Y-m-d H:i:s");

$IDLop = $_GET['idLop'];
$IDKhoaHoc = $_GET['idKhoahoc'];
$IDSinhVien = $_GET['idSinhvien'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['co'])) {
        $trangthai = "0";
    } elseif (isset($_POST['muon'])) {
        $trangthai = "1";
    } elseif (isset($_POST['vang'])) {
        $trangthai = "2";
    }

    $db = new Database();
    if($db->sqlPDO("INSERT INTO suthamdu (NgayThamDu, IDKhoaHoc, IDSinhVien, IDLop, TrangThaiThamDu) VALUES ('$currentDateTime' , '$IDKhoaHoc', '$IDSinhVien', '$IDLop', '$trangthai')")){
        header("Location: sinhvien.php?id=$IDSinhVien");
    }
}





?>


<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="container">
    <div class="content">
        <h1>Khu vực điểm danh</h1>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Ngày</th>
                <th scope="col">Trạng thái</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <p><?= $currentDateTime ?></p>
                </td>
                <td>
                    <form method="POST" action="">
                        <input class="btn btn-success" type="submit" name="co" value="Có Mặt">
                        <input class="btn btn-warning" type="submit" name="muon" value="Muộn">
                        <input class="btn btn-danger" type="submit" name="vang" value="Vắng">

                    </form>
                </td>
            </tr>
        </tbody>
    </table>

    <a href="./trangthai.php" class="btn btn-primary">Bảng điểm danh</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>