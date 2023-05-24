<?php
require "../classes/sinhVienDAO.php";
require "../classes/giangVienDAO.php";
require "../classes/adminDAO.php";
require "../classes/database.php";

$ten = "";
$ngaysinhSV = "";
$email = "";
$sdt = "";
$pass = "";
$role = "";

if (isset($_POST['Them'])) {
    $ten = $_POST['Name'];
    $ngaysinhSV = date('Y-m-d', strtotime($_POST['Birthday']));
    $email = $_POST['Email'];
    $sdt = $_POST['Number'];
    $pass = $_POST['Pass'];
    $role =  $_POST['role'];
}

if ($role == "sv") {
    if ($ten != "" && $ngaysinhSV != "" && $email != "" && $sdt != "" && $pass != "") {

        $db = new Database();
        $sinhVienDAO = new sinhVienDAO($db);

        if ($sinhVienDAO->addSV($ten, $ngaysinhSV, $email, $sdt, $pass)) {
            echo "Thêm sinh viên thành công";
        } else {
            echo "Thêm sinh viên thất bại";
        }
    }   
}

if($role == "gv"){
    if($ten != "" && $email != "" && $sdt != "" && $pass != ""){
        $db = new Database();
        $giangVienDAO = new giangVienDAO($db);

        if ($giangVienDAO->addGV($ten, $email, $sdt, $pass)) {
            echo "Thêm giảng viên thành công";
        } else {
            echo "Thêm giảng viên thất bại";
        }
    }
}

if($role == "qtv"){
    if($ten != "" && $email != "" && $pass != ""){
        $db = new Database();
        $adminDAO = new adminDAO($db);

        if ($adminDAO->addAdmin($ten, $email, $pass)) {
            header("Location: dangnhap.php");
            
        } else {
            echo "Thêm sinh viên thất bại";
        }
    }
}

?>


<head>
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../assets/css/main.css">
</head>


<body>
    <h1 class="text">Register</h1>
    <div class="login">
        <div class="content">
            <div class="img">
                <img src="../assets/images/anhLogin.png" alt="">
            </div>
        </div>
        <form class="form" method="POST" action="dangki.php">
            <p class="form-title">Đăng kí tài khoản của bạn</p>
            <div class="input-container">
                <input type="name" name="Name" id="exampleInputName" placeholder="Vui lòng nhập tên">
            </div>
            <div class="input-container">
                <input type="text" name="Number" id="exampleInputNumber" placeholder="Vui lòng nhập số">
            </div>
            <div class="input-container">
                <input type="date" name="Birthday">
            </div>
            <div class="input-container">
                <input type="email" name="Email" id="exampleInputEmail1" placeholder="Nhập email">
                <span>
                </span>
            </div>
            <div class="input-container">
                <select name="role" id="role">
                    <option value="" disabled selected>Vai trò</option>
                    <option value="sv">Sinh Viên</option>
                    <option value="gv">Giảng Viên</option>
                    <option value="qtv">Quản Trị Viên</option>
                </select>
            </div>
            <div class="input-container">
                <input type="password" name="Pass" id="exampleInputPassword" placeholder="Nhập mật khẩu">
            </div>

            <button type="submit" class="submit" name="Them">
                Đăng kí
            </button>

        </form>
    </div>




</body>