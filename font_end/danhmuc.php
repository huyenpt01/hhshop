<?php
session_start();
require_once '../config/db.php';
$id = $_GET['id'];

?>!
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Danh mục sản phẩm</title>
  <link rel="stylesheet" href="../css/base.css">
  <link rel="stylesheet" href="../css/category.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
  <!-- header--start -->
  <?php
  include('header.php');
  ?>
  <!-- header--end -->
  <!-- main -->
  <div class="container">
    <!-- slide banner -->

    <div id="myCarousel" class="carousel slide" data-ride="carousel" style="margin-bottom:100px">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
      </ol>
      <!-- Wrapper for slides -->
      <div class="carousel-inner">
        <div class="item active">
            <img src="../img1/bnn5.jfif" alt="" style="width:100%;">
          
        </div>
        <div class="item">
           <img src="../img1/bnn4.jfif" alt="" style="width:100%;">
        </div>
        <div class="item">
            <img src="../img1/bnn2.jfif" alt="" style="width:100%;">
        </div>
        <div class="item">
            <img src="../img1/bnn3.jfif" alt="" style="width:100%;">
        </div>
      </div>

      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <!-- box-filter -->

    <div class="main">
      <aside class="col-sm-4">
        <div class="card">
          <article class="card-group-item">
            <header class="card-header" style="background-color: #000000;">
              <h5 class="title">Theo danh mục </h5>
            </header>
            <div class="filter-content">
              <div class="card-body">
                <form>
                  <label class="form-check">
                    <input class="form-check-input" type="checkbox" value="">
                    <span class="form-check-label">
                      Thời trang nam
                    </span>
                  </label> <!-- form-check.// -->
                  <label class="form-check">
                    <input class="form-check-input" type="checkbox" value="">
                    <span class="form-check-label">
                    Thời trang nữ
                    </span>
                  </label> <!-- form-check.// -->
                  <label class="form-check">
                    <input class="form-check-input" type="checkbox" value="">
                    <span class="form-check-label">
                      Phụ kiện
                    </span>
                  </label>
                  
                </form>

              </div> <!-- card-body.// -->
            </div>
          </article> <!-- card-group-item.// -->

          <article class="card-group-item">
          <header class="card-header" style="background-color: #000000;">
              <h5 class="title">Cơ sở</h5>
            </header>
            <div class="filter-content">
              <div class="card-body">
                <label class="form-check">
                  <input class="form-check-input" type="radio" name="exampleRadio" value="">
                  <span class="form-check-label">
                    234 Hoàng Quốc Việt, Hà Nội
                  </span>
                </label>
                <label class="form-check">
                  <input class="form-check-input" type="radio" name="exampleRadio" value="">
                  <span class="form-check-label">
                    54 Nam Hồng, Đông Anh, Hà Nội
                  </span>
                </label>
                <label class="form-check">
                  <input class="form-check-input" type="radio" name="exampleRadio" value="">
                  <span class="form-check-label">
                  66 Kim Nỗ, Đông Anh, Hà Nội

                  </span>
                </label>
              </div> <!-- card-body.// -->
            </div>
          </article> <!-- card-group-item.// -->
        </div> <!-- card.// -->

        <div class="card">
          <article class="card-group-item">
          <header class="card-header" style="background-color: #000000;">
              <h5 class="title">Giá </h5>
            </header>
            <div class="filter-content">
              <div class="card-body">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label>Min</label>
                    <input type="number" class="form-control" id="inputEmail4" placeholder="0đ">
                  </div>
                  <div class="form-group col-md-6 text-right">
                    <label>Max</label>
                    <input type="number" class="form-control" placeholder="50.000.000đ">
                  </div>
                </div>
              </div> <!-- card-body.// -->
            </div>
          </article> <!-- card-group-item.// -->
          <article class="card-group-item">
          <header class="card-header" style="background-color: #000000;">
              <h5 class="title">Đơn vị vận chuyển </h5>
            </header>
            <div class="filter-content">
              <div class="card-body">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="Check1">
                  <label class="custom-control-label" for="Check1">G&T</label>
                </div> <!-- form-check.// -->

                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="Check2">
                  <label class="custom-control-label" for="Check2">GHTK</label>
                </div> <!-- form-check.// -->

                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="Check3">
                  <label class="custom-control-label" for="Check3">NinjaVan</label>
                </div> <!-- form-check.// -->

                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="Check4">
                  <label class="custom-control-label" for="Check4">Hãng khác</label>
                </div> <!-- form-check.// -->
              </div> <!-- card-body.// -->
            </div>
          </article> <!-- card-group-item.// -->
        </div>
      </aside>
      <div class="box-common_main">
        <div class="listproduct" data-size="10">
          <?php
          $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 6;
          $current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
          $offset = ($current_page - 1) * $item_per_page;
          $sql = "select product.id_pr,product.title,product.thumbnail,product.price_old,product.price from product INNER JOIN categroy on product.id_category=categroy.id_cate where categroy.id_cate='" . $id . "' ORDER BY id_pr DESC limit " . $item_per_page . " offset  " . $offset . "";
          // var_dump($sql); exit();
          $totalRecords = mysqli_query($connect, "select product.id_pr,product.title,product.thumbnail,product.price_old,product.price from product INNER JOIN categroy on product.id_category=categroy.id_cate where categroy.id_cate='" . $id . "' ORDER BY id_pr DESC");
          $totalRecords = $totalRecords->num_rows;
          $totalPages = ceil($totalRecords / $item_per_page);
          $no = 1;
          $query = mysqli_query($connect, $sql);
          while ($row = mysqli_fetch_assoc($query)) { 
            ?>
            
            <div class="item_sp">
              <a style="text-decoration: none;" href="ctsanpham.php?id=<?= $row['id_pr'] ?>">
                <div class="item_img">
                  <i> <img class="" src="../uploads/<?= $row['thumbnail']; ?>" alt="" srcset=""></i>
                </div>
                <h3 class="ten"><?= $row['title'] ?></h3>
                <div class="box-p">
                  <p class="price-old"><?= number_format($row['price'], 0, ",", "."); ?> đ</p>
                  <span class="percent">-15%</span>
                </div>
                <strong class="price"><?= number_format($row['price'], 0, ",", "."); ?> đ</strong>
                <ul class="rating">
                  <li class="fa fa-star"></li>
                  <li class="fa fa-star"></li>
                  <li class="fa fa-star"></li>
                  <li class="fa fa-star"></li>
                  <li class="fa fa-star disable"></li>
                </ul>
                <!--  -->
              </a>
            </div>
          <?php } ?>
         
        </div>
      </div>
      <nav aria-label="Page navigation example" style="margin-left:35%;">
                <ul class="pagination justify-content-end" style="margin:20px 0">
                    <?php
                    include '../config/pagination.php';
                    ?>
                </ul>
            </nav>
    </div>

  </div>

  <!-- Footer -->
  <?php
  include 'footer.php';
  ?>