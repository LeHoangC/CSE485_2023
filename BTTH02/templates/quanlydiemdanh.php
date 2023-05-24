<?php
session_start();
require "../classes/database.php";
require "../classes/lopDAO.php";

$IDGiangVien = $_SESSION['IDGiangVien'];

if (isset($_POST['open'])) {
    echo "hi";
    $IDLop = $_GET['idLop'];
    $db2 = new Database();
    $lopDAO = new lopDAO($db2);

    if ($lopDAO->updateStatusLop($IDLop, "1")) {
        echo '<h2> Bật điểm danh thành công </h2>';
        header("Location: giangvien.php?id=$IDGiangVien");
    } else {
        echo '<h2> Bật điểm danh thất bại </h2>';
    }
} elseif (isset($_POST['close'])) {
    $IDLop = $_GET['idLop'];
    $db3 = new Database();
    $lopDAO = new lopDAO($db3);

    if ($lopDAO->updateStatusLop($IDLop, "0")) {
        echo '<h2> Tắt điểm danh thành công </h2>';
        header("Location: giangvien.php?id=$IDGiangVien");
    } else {
        echo '<h2> Tắt điểm danh thất bại </h2>';
    }
}
?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td colspan="2">Larry the Bird</td>
                <td>@twitter</td>
            </tr>
        </tbody>
    </table>


    <form method="POST" action="">
        <input type="submit" class="btn btn-primary" name="open" value="Mở Điểm Danh">
        <input type="submit" class="btn btn-danger" name="close" value="Đóng Điểm Danh">
    </form>
</body>