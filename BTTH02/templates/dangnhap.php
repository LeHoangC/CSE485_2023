<?php 
    require "../classes/sinhVienDAO.php";
    require "../classes/giangVienDAO.php";
    require "../classes/adminDAO.php";
    require "../classes/database.php";
    
    $email = "";
    $pass = "";
    $role = "";

    if(isset($_POST['login'])){
        $email = $_POST['Email'];
        $pass = $_POST['Pass'];
        $role =  $_POST['role'];
    }

    if($role = "sv"){
        if($email != "" && $pass != ""){
            $db = new Database();
            $sinhVienDAO = new sinhVienDAO($db);

            $data = $sinhVienDAO->getSV("SELECT * FROM sinhvien WHERE email = '$email'");
            if($pass == $data[0]["MatKhau"]){
                $id = $data[0]["IDSinhVien"];
                header("Location: sinhvien.php?id=$id ");
                exit;
            }
            else{
                echo 
                "
                <h3> Thông tin đăng nhập chưa chính xác </h3>
                ";
            }
        }
    }

    if($role = "gv"){
        if($email != "" && $pass != ""){
            $db1 = new Database();
            $giangVienDAO = new giangVienDAO($db);

            $data = $giangVienDAO->getGV("SELECT * FROM giangvien WHERE email = '$email'");
            if($pass == $data[0]["MatKhau"]){
                $id = $data[0]["IDGiangVien"];
                header("Location: giangvien.php?id=$id ");
                exit;
            }
            else{
                echo 
                "
                <h3> Thông tin đăng nhập chưa chính xác </h3>
                ";
            }
        }
    }

    if($role = "qtv"){
        if($email != "" && $pass != ""){
            $db1 = new Database();
            $adminDAO = new adminDAO($db);

            $data = $adminDAO->getAD("SELECT * FROM quantrivien WHERE email = '$email'");
            if($pass == $data[0]["MatKhau"]){
                header("Location: ../admin/admin.php");
                exit;
            }
            else{
                echo 
                "
                <h3> Thông tin đăng nhập chưa chính xác </h3>
                ";
            }
        }
    }
?>




<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../assets/css/main.css">
</head>


<body>
    <h1 class="text">Login</h1>
    <div class="login">
        <div class="content">
            <div class="img">
                <img src="../assets/images/anhLogin.png" alt="">
            </div>
        </div>
        <form class="form" method="POST" action="">
            <p class="form-title">Đăng nhập tài khoản của bạn</p>
            <div class="input-container">
                <input type="email" name="Email" id="exampleInputEmail" placeholder="Nhập email">
                <span>
                </span>
            </div>
            <div class="input-container">
                <input type="password" name="Pass" id="exampleInputPassword" placeholder="Nhập password">
            </div>
            <div class="input-container">
                <select name="role" id="role">
                    <option value="" disabled selected>Vai trò của bạn</option>
                    <option value="sv">Sinh Viên</option>
                    <option value="gv">Giảng Viên</option>
                    <option value="qtv">Quản Trị Viên</option>
                </select>
            </div>
            <button type="submit" name="login" class="submit">
                Đăng nhập
            </button>

            <p class="signup-link">
                Chưa có tài khoản?
                <a href="dangki.php">Đăng kí</a>
            </p>
        </form>
    </div>




</body>