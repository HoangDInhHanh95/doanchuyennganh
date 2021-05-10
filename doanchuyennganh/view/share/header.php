<?php 
session_start();
//error_reporting(E_ALL & ~E_NOTICE);
 include '../../models/connectDB.php';
  $sqlmenu ="SELECT * FROM `classificationtable`";
  $strQuery = mysqli_query($conn, $sqlmenu);

 $get_idclass = isset($_GET["id"])?$_GET["id"]:"";
 
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Thế Giới Công Nghệ Số</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <!------->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
  <link rel="stylesheet" href="../../content/css/header.css">
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="../home/index.php">
          <img src="../../content/img/dh.png" alt="logo" id="logo_web">
      </a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="../home/index.php">Trang chủ</a></li>
      <?php while($selectmenu = mysqli_fetch_array($strQuery)){ 

        ?>
      <li><a href="../home/listproduct.php?id=<?=$selectmenu["idclassification"]?>"><?=$selectmenu["loai"]?></a></li>
      <?php  }?>
      <li>
      		<form class="navbar-form navbar-left" action="../home/listproduct.php" method="GET">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Search" name="name"  value="<?=isset($_GET['name'])?$_GET['name']:"";?>" >
              </div>
              <?php if($get_idclass == 1 || $get_idclass == 2){?>
                <button type="submit" value="1"  class="btn btn-default"  name="id" >Tìm Kiếm</button>
              <?php }else{ ?>
                <button type="submit" value="3"  class="btn btn-default"  name="id" >Tìm Kiếm</button>
                <?php } ?>
          </form>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li><a href="../shoppingcart/cart.php"><span class="fas fa-cart-arrow-down"></span>Giỏ hàng</a></li>
        <li><a href="../customer/registercustomer.php"><span class="glyphicon glyphicon-user"></span> Đăng ký</a></li>
        <li><a href="../customer/loginadmin.php"><span class="glyphicon glyphicon-log-in"></span>  Đăng nhập</a></li>
    </ul>
  </div>
</nav>


</body>
</html>