<?php
require_once("../../config/db.php");
session_start();
if (isset($_POST['sbm']) && !empty($_POST['search'])) {
    $search = $_POST['search'];
    $sql = "SELECT * FROM categroy  WHERE name LIKE '%$search%'";
    $query = mysqli_query($connect, $sql);
    $total_prd = mysqli_num_rows($query);
} else {
    $sql = "SELECT * FROM categroy";
    $query = mysqli_query($connect, $sql);
}
if (isset($_POST['all_prd'])) {
    unset($_POST['sbm']);
}
if (!isset($_SESSION['user'])) {
    header('location:../dangnhap.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Đơn Hàng</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" type="text/css" href="../../css/admin.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <!-- header-start -->
    <?php include '../header.php' ?>
    <!-- header-end -->
    <main>
        <div class="card-body">
            <?php
            if (isset($total_prd)) {
                if ($total_prd !== 0) {
                    echo "<p class='text-success'>Tìm thấy $total_prd sản phẩm</p>";
                } else {
                    echo "<p class='text-danger'> Không tìm thấy sản phẩm nào! </p>";
                }
            }
            ?>
            <table class="table table-hover table-bordered">
                <thead style="background-color: #272c4a;">
                    <tr>
                        <th>STT</th>
                        <th>Họ và tên</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Địa chỉ giao hàng</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Ngày đặt</th>
                        <th>Trạng thái đơn hàng</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * from order_details, orders, trangthaii, product WHERE order_details.order_id = orders.id AND orders.id_trangthai = trangthaii.id_trangthai AND order_details.product_id = product.id_pr";

                    $result = executeResult($sql);
                    $index = 1;
                    foreach ($result as $item) {
                        if ($item['id_trangthai'] == 1) {
                            $hey =  'btn btn-success';
                        } else if ($item['id_trangthai'] == 5) {
                            $hey =  'btn btn-warning';
                        } else if ($item['id_trangthai'] == 6) {
                            $hey =  'btn btn-danger';
                        } else if ($item['id_trangthai'] == 7) {
                            $hey =  'btn btn-info';
                        };
                        echo '
                    <tr>
                    <td>' . $index++ . '</th>
                    <td>' . $item['fullname'] . '</td>
                    <td>' . $item['phone_number'] . '</td>
                    <td>' . $item['email'] . '</td>
                    <td>' . $item['address'] . '</td>
                    <td>' . $item['title'] . '</td>
                    <td>' . $item['num'] . '</td>
                    <td>' . number_format($item['price'], 0, ",", ".") . ' VND</td>
                    <td>' . $item['order_date'] . '</td>
                    <td>
                        <button class=" ';?> <?php $hey  ?> <?php echo ' ">' . $item['name_trangthai'] . '</button>
                    <td>
                    <a class="btn btn-primary" id="change" href="update.php?id=' . $item['id'] . '">Cập nhật</a>
                    </td>
                    </tr>
                    ';
                    }



                    ?>
                </tbody>
            </table>
        </div>
        <div class="container" style="margin-bottom: 340px; margin-top:100px">
        <!-- slide banner -->
        <h1>Tìm kiếm đơn hàng</h1>

        <form class="form-inline" method="POST" name="myForm" onsubmit="return validateForm()">
        <h3>Chọn thời gian đặt hàng</h3>
            
        <div class="form-group mx-sm-3 mb-2">
                <input type="datetime-local" class="form-control" name="Date" id="date">  
                <p style="margin-left : 5px;margin-right : 5px;">  _  </p> 
                <input type="datetime-local" class="form-control" name="Date1" id="date1">
            </div>
            <button name="hihi" type="submit" class="btn btn-primary mb-2">Tìm kiếm</button>
        </form>
        <p>hoặc </p>
        <form class="form-inline a" method="POST" name="myForm" onsubmit="return validateForm()">
        <h3>Chọn trạng thái đơn hàng</h3>
            
        <div class="form-group mx-sm-3 mb-2">
                <select class="form-control" aria-label="Default select example" name="id-trangthai">
                    <?php
                        $sql = "SELECT * FROM trangthaii";

                        $result = executeResult($sql);

                        foreach ($result as $item) {
                            echo '
                                    
                                <option value="' . $item['id_trangthai'] . '">' . $item['name_trangthai'] . '</option>
                                    
                                ';
                                }
                    ?>
                </select>
            </div>
            <button name="huhu" type="submit" class="btn btn-primary mb-2">Tìm kiếm</button>
        </form>
        <div class="main">
            <table class="table">


                <?php
                $STT = 1;
                $sql = '';
                if (isset($_POST['hihi'])) {
                    if (isset($_POST['Date'])) {
                        $Date = $_POST['Date'];
                        $Date1 = $_POST['Date1'];
                    }
                    $sql = "SELECT * FROM orders, trangthaii, order_details, product 
                    where order_date   BETWEEN '$Date' AND '$Date1' 
                    and orders.id_trangthai = trangthaii.id_trangthai and order_details.product_id = product.id_pr and order_details.order_id = orders.id ";
                    $result = executeResult($sql);

                    if (empty($result)) {
                        echo '<button type="button" class="btn btn-primary" style="margin-top: 20px; display:flex">
                           Không tìm thấy đơn hàng
                            <span class="badge badge-light" style="display:flex; justify-content: center; align-item:center;">!</span>
                            <span class="sr-only">unread messages</span>
                        </button>';
                    } else {
                        echo '
                    <thead style="width: 100%">
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Họ và tên</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Email</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Ngày đặt</th>
                            <th scope="col">Tình trạng</th>
                        </tr>
                    </thead>
                    <tbody>';
                    }


                    foreach ($result as $row) {
                        echo '
                                <tr>
                                    <th scope="row">' . $STT++ . '</th>
                                    <th scope="row">' . $row['fullname'] . '</th>
                                    <td> ' . $row['phone_number'] . '</td>
                                    <td> ' . $row['email'] . '</td>
                                    <td> ' . $row['title'] . '</td>
                                    <td> ' . $row['num'] . '</td>
                                    <td> ' . number_format($row['price'], 0, ",", ".") . 'đ</td>
                                    <td> ' . $row['order_date'] . '</td>
                                    <td> ' . $row['name_trangthai'] . '</td>   
                                </tr>
                            ';
                    }
                }

                ?>
                <?php
                $STT = 1;
                $sql = '';
                if (isset($_POST['huhu'])) {
                    if (isset($_POST['id-trangthai'])) {
                        $id_trangthai = $_POST['id-trangthai'];
                        
                    }
                    $sql = "SELECT * FROM orders, trangthaii, order_details, product 
                    where trangthaii.id_trangthai = ' $id_trangthai'
                    and orders.id_trangthai = trangthaii.id_trangthai and order_details.product_id = product.id_pr and order_details.order_id = orders.id ";
                    $result = executeResult($sql);

                    if (empty($result)) {
                        echo '<button type="button" class="btn btn-primary" style="margin-top: 20px; display:flex">
                           Không tìm thấy đơn hàng
                            <span class="badge badge-light" style="display:flex; justify-content: center; align-item:center;">!</span>
                            <span class="sr-only">unread messages</span>
                        </button>';
                    } else {
                        echo '
                    <thead style="width: 100%">
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Họ và tên</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Email</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Ngày đặt</th>
                            <th scope="col">Tình trạng</th>
                        </tr>
                    </thead>
                    <tbody>';
                    }


                    foreach ($result as $row) {
                        echo '
                                <tr>
                                    <th scope="row">' . $STT++ . '</th>
                                    <th scope="row">' . $row['fullname'] . '</th>
                                    <td> ' . $row['phone_number'] . '</td>
                                    <td> ' . $row['email'] . '</td>
                                    <td> ' . $row['title'] . '</td>
                                    <td> ' . $row['num'] . '</td>
                                    <td> ' . number_format($row['price'], 0, ",", ".") . 'đ</td>
                                    <td> ' . $row['order_date'] . '</td>
                                    <td> ' . $row['name_trangthai'] . '</td>   
                                </tr>
                            ';
                    }
                }

                ?>
                </tbody>
            </table>

        </div>

    </div>

    </main>
</body>