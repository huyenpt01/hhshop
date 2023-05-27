<?php

    $id = $_GET['id'];
    $sql = "DELETE FROM product WHERE id_pr = $id";
    $query = mysqli_query($connect, $sql);

    echo '<script language="javascript">alert("Xóa tài khoản thành công!");
        window.location.href="?page_layout=list_product";
        </script>';
	
?>