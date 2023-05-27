<?php
    session_start();
    require_once '../../config/db.php';
    require_once('../../config/sql_cn.php');
    $id = $_GET['id'];
    $sql = "DELETE FROM post WHERE id_p = $id";
    $query = mysqli_query($connect, $sql);

    echo '<script language="javascript">alert("Xóa bài viết thành công!");
    window.location.href="../news";
    </script>';
    
?>