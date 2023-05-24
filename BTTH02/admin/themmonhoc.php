<?php   
    require "../classes/database.php";
    require "../classes/khoahocDAO.php";
    require "../classes/giangVienDAO.php";
   

    $db = new Database();
    $giangVienDAO = new giangVienDAO($db);
    $data = $giangVienDAO->getGV("SELECT IDGiangVien,Ten FROM giangvien");

    //____________________________________________________________________

    $IDGiangVien="";
    $tenKH="";
    $giaiDoan="";
    $hocKy="";

    if(isset($_POST['them'])){
        $IDGiangVien=$_POST['gv'];
        $tenKH=$_POST['ten'];
        $giaiDoan=$_POST['giaidoan'];
        $hocKy=$_POST['hocky'];
    }

    if ($tenKH != "" && $IDGiangVien != "" && $giaiDoan != "" && $hocKy != "" ) {

        $db = new Database();
        $khoahocDAO = new khoahocDAO($db);

       

        if ($khoahocDAO->addKH($IDGiangVien, $tenKH, $giaiDoan, $hocKy) ) {
            header("Location: admin.php");
        } else {
            echo "Thêm môn học thất bại";
        }
    }   
?>

<head>
    <title>Thêm môn mới</title>
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
<div class="content_text">
        <div class="container fluid">
            <div class="row content_text">
                <div class="box_text col-12 text-center">
                    <h1 style="color: rgb(56, 236, 236);">Thêm môn học</h1>
                    <hr>

                </div>
            </div>
        </div>
    </div>

<div class="content">
        <div class="container">
            <div class="row box_content mt-5">
                <form class="col-12 col-sm-12" method="POST" action="themmonhoc.php">
                    <div class="input-group">
                        <span class="input-group-text">Tên Môn Học</span>
                        <input name="ten" type="text" class="form-control">
                    </div>
                    <div class="input-group">
                        <span class="input-group-text">Giai Đoạn</span>
                        <input name="giaidoan" type="text" class="form-control">
                    </div>
                    <div class="input-group">
                        <span class="input-group-text">Học Kỳ</span>
                        <input name="hocky" type="number" class="form-control">
                    </div>
                    <div class="input-group">
                        <select name="gv" id="gv">
                            <option value="" disabled selected>Giảng Viên</option>
                            <?php 
                                foreach ($data as $giangvien){
                            ?>
                             <option value="<?= $giangvien["IDGiangVien"] ?>"><?= $giangvien["Ten"] ?></option>
                            <?php } ?>
                            
                        </select>
                    </div>
                    <div><input class="add-btn btn btn-primary" type="submit" name="them" value="Thêm"></div>
                </form>
            </div>
        </div>
    </div>
</body>