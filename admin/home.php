<?php
session_start();
require_once '../config/db.php';
require_once('../config/sql_cn.php');
if (!isset($_SESSION['user'])) {
    // code...
    header('location:dangnhap.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    
    <style>
        label {
            font-weight: 500;
        }

        .card input[type="search"] {
            margin-right: -6px;
        }

        .card input[type="search"]:focus,
        .card-header button:focus {
            box-shadow: none !important;
        }

        .card-header button {
            width: 140px;
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }
    </style>
    
</head>

<body>
    <?php
    if (isset($_GET['page_layout'])) {
        switch ($_GET['page_layout']) {
            case 'list_product':
                require_once 'product/index.php';
                break;
            case 'list_product1':
                    require_once 'product/index.php';
                    break;    
            case 'them_product':
                require_once 'product/them_product.php';
                break;

            case 'sua_product':
                require_once 'product/sua_product.php';
                break;

            case 'xoa_product':
                require_once 'product/xoa_product.php';
                break;

             

            case 'list_cy':
                require_once 'category/index.php';
                break;

            default:
                require_once 'category/index.php';
                break;
        }
    } else {
        require_once './index1.php';
    }
    ?>

</body>

</html>