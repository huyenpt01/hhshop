<?php
session_start();
require_once '../../config/db.php';
require_once('../../config/sql_cn.php');
$id = $_GET['id'];

$sql_cate = "SELECT * FROM useradmin";
$query_cate = mysqli_query($connect, $sql_cate);

$sql_up = "SELECT * FROM useradmin WHERE id = $id";
$query_up = mysqli_query($connect, $sql_up);
$row_up = mysqli_fetch_assoc($query_up);

if (isset($_POST['sbm'])) {
    $name = $_POST['username'];
    $password = $_POST['password'];
    $_SESSION['pass'] = $password;

    if($name == "" || $password == ""){
        echo '<script language="javascript"> 
            alert("Cập nhật tài khoản không thành công!!! Vui lòng nhập đầy đủ thông tin!");      
        </script>';
    }
    
    else{
        $sql = "UPDATE useradmin SET username = '$name', password= '$password' WHERE id = $id";

        $query = mysqli_query($connect, $sql);
        // header('location: index.php');
        echo '<script language="javascript"> alert("Cập nhật tài khoản thành công!");
        window.location.href="index.php";
        </script>';
    }
    
}
if (!isset($_SESSION['user'] )  ) {
    echo '<script language="javascript">alert("Cập nhật tài khoản không thành công!");
        window.location.href="../login.php";
        </script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Trang quản trị</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../../css/admin.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h2>Sửa tài khoản</h2>
            </div>
            
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>UserName</label>
                        <input type="text" name="username" class="form-control" value="<?php echo $row_up['username']; ?>">
                    </div>
                    <div class="form-group">
                        <label>PassWord</label>
                        <h5 style="color:red">
                            <?php
                            if (isset($_SESSION['alert'])) {
                                // code...
                                echo $_SESSION['alert'];
                                // header('location:home.php?page_layout=them_product');
                                unset($_SESSION['alert']);
                            }
                            ?>
                        </h5>
                        <input type="password" name="password" class="form-control" value="<?php echo $row_up['password']; ?>">
                    </div>
                    
                    <button name="sbm" class="btn btn-success">Sửa</button>
                    <a class="btn btn-warning" href="../User-admin/">Trở về</a>
                </form>
            </div>
        </div>
    </div>
</body>