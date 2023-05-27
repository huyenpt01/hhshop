<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,500;0,900;1,700&display=swap" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" type="text/css" href="../../css/admin.css">
      <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="./plugins/summernote/summernote-bs4.min.css">

    <!-- Thống kê biểu đồ -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
 
</head>

<body>
    <!-- header-start -->

    <nav class="navbar">
        <h4 style="margin-left: 140px;">Home</h4>
        <div class="profile">
            <i class="far fa-user" style="margin-top: -30px;font-size:30px;margin-left:20px"></i>
            <?php
            if (isset($_SESSION['user'])) {
                echo ' <p style="color:white;">' . $_SESSION['user'] . '</p>';
            }
            ?>
        </div>
        <div class="log-out">
            <a href="./dangxuat.php">
                <i class="fas fa-sign-out-alt"></i> Đăng xuất
            </a>
        </div>
    </nav>
    <input type="checkbox" id="toggle">
    <label class="side-toggle" for="toggle">
        <span class="fas fa-bars"></span>
    </label>

    <div class="sidebar">
    
        <div class="sideber-menu" style="margin-top:50px;">
            <span class="fab fa-blackberry" style="margin-top:50px;"></span>
            <a href="./category">
                <p style="margin-top:50px;">Danh mục sản phẩm</p>
            </a>
        </div>
        <div class="sideber-menu">
            <span class="far fa-list-alt"></span>
            <a href="./cate_news">
                <p>Danh mục bài viết</p>
            </a>
        </div>
        <div class="sideber-menu">
            <span class="far fa-newspaper"></span>
            <a href="./news/">
                <p> Bài viết</p>
            </a>
        </div>
        <div class="sideber-menu">
            <span class="fab fa-product-hunt"></span>
            <a href="home.php?page_layout=list_product">
                <p>Sản phẩm</p>
            </a>
        </div>

        <div class="sideber-menu">
            <span class="fas fa-headphones-alt"></span>
            <a href="./contact">
                <p>Liên hệ</p>
            </a>
        </div>
        <div class="sideber-menu">
            <span class="fas fa-shuttle-van"></span>
            <a href="./order">
                <p>Đơn hàng</p>
            </a>
        </div>
        <div class="sideber-menu">
            <span class="far fa-user"></span>
            <a href="./User-admin">
                <p>Thành viên</p>
            </a>
        </div>
    </div>
    <!-- header-end -->
    <main>
    <div class="content-wrapper1">
   

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <?php
                   $sql1 = "SELECT * FROM order_details, orders WHERE id_trangthai='5' AND order_details.order_id = orders.id";
                   $result1 = mysqli_query($conn, $sql1);
                   $sl = 0;
                   $tongtien = 0;
                   while ($row1 = mysqli_fetch_array($result1)) {
                    // echo "<input type = 'hidden'>".$row1['gia_sanpham']." </input>";
                    // echo "<td><h5 >".$row1['gia_sanpham']." </h5></td>";
                      $sl += $row1['num'] ;
                      $tongtien += $row1['price'] ;
                   }
                //  echo  number_format($tongtien);
            ?>
            <div class="small-box bg-info">
              <div class="inner">
                <h3 id="soluongsp"><?php echo $sl ?></h3>

                <p>Sản phẩm đã bán</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo number_format($tongtien); echo " VND"; ?></h3>

                <p>Doanh thu</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
          <?php
                   $sql = "SELECT * FROM userclient ";
                   $result = mysqli_query($conn, $sql);
                   $sl_khach = 0;
                  
                   while ($row = mysqli_fetch_array($result)) {
                    // echo "<input type = 'hidden'>".$row1['gia_sanpham']." </input>";
                    // echo "<td><h5 >".$row1['gia_sanpham']." </h5></td>";
                      $sl_khach = $sl_khach + 1 ;
                   }
                //  echo  number_format($tongtien);
                // echo $sl_khach;
            ?>
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $sl_khach; ?></h3>

                <p>Lượt khách đăng ký</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
          <?php
                   $sql2 = "SELECT * FROM contact ";
                   $result2 = mysqli_query($conn, $sql2);
                   $sl_lhe = 0;
                  
                   while ($row = mysqli_fetch_array($result2)) {
                    // echo "<input type = 'hidden'>".$row1['gia_sanpham']." </input>";
                    // echo "<td><h5 >".$row1['gia_sanpham']." </h5></td>";
                      $sl_lhe = $sl_lhe + 1 ;
                   }
                //  echo  number_format($tongtien);
                // echo $sl_khach;
            ?>
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $sl_lhe; ?></h3>

                <p>Lượt phản hồi của khách</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div style="height: 500px; width: 100%;">
         <h1 style="margin-top: 50px;">Thống kê số sản phẩm đã bán</h1>
            <div id="chart" style="height: 450px;"></div>
         
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- <div id="chart" style="height: 250px;"></div> -->

    <!-- /.content -->
  </div>
  <?php
      $thongke = "SELECT  product_id, title, SUM(num) as Soluong
      from  order_details, product, orders
      WHERE order_details.product_id = product.id_pr AND id_trangthai = '5' AND order_details.order_id = orders.id
      GROUP BY product_id";
      $result1x = mysqli_query($conn, $thongke);         
      
  ?>
    </main>
    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
            
    <script type="text/javascript">
     
        new Morris.Bar({
                // ID of the element in which to draw the chart.
                element: 'chart',
                // Chart data records -- each entry in this array corresponds to a point on
                // the chart.
                
                data: [
                  <?php 
                    while ($row1x = mysqli_fetch_array($result1x)) 
                      {?>
                  {  Ten:'<?php echo '"'.$row1x['title'].' "  ';  ?>'                      
                    , quantity:
                    <?php echo $row1x['Soluong']; ?>
                  }, 
                  <?php }?> 
                  ],  
                
                // The name of the data record attribute that contains x-values.
                xkey: 'Ten',
                // A list of names of data record attributes that contain y-values.
                ykeys: [ 'quantity'],
                // Labels for the ykeys -- will be displayed when you hover over the
                // chart.
                labels: [ 'Số lượng bán ra'] //tên từng key
                
            });
            
    </script>
</body>
    
