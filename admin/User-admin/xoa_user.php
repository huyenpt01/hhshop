<?php
    session_start();
    require_once '../../config/db.php';
    require_once('../../config/sql_cn.php');
    $id = $_GET['id'];
    $sql = "DELETE FROM useradmin WHERE id = $id";
    $query = mysqli_query($connect, $sql);

    echo '<script language="javascript">alert("Xóa tài khoản thành công!");
        window.location.href="../dangnhap.php";
        </script>';

    if (!isset($_SESSION['user'])) {
        header('location:../dangnhap.php');
        
    }
?>