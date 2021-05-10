<?php
    session_start();
     include '../../models/connectDB.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thế Giới Công Nghệ Số</title>

   
   

 
     <!-----bootsrap--------->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!--------link icon----->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

    <!------link css-------->
    <link rel="stylesheet" href="../../content/css/slider_menu.css">


  
</head>
<body>
<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
  <button class="w3-bar-item w3-button w3-large"
  onclick="w3_close()"><i class="fas fa-home"></i></button>
  <a href="../productphone/productphone.php" class="w3-bar-item w3-button">Quản lý điện thoại máy tính bảng</a>
  <a href="../productphone/add_categoryphone.php" class="w3-bar-item w3-button">Thêm thương hiệu điện thoại và máy tính bảng</a>
  <a href="../productphone/add_productphone.php" class="w3-bar-item w3-button">Thêm sản phẩm điện thoại và máy tính bảng</a>
  <a href="../productcomputer/productcomputer.php" class="w3-bar-item w3-button">Quản lý phẩm quản lý máy tính</a>
  <a href="../productcomputer/add_categorycoputer.php" class="w3-bar-item w3-button">Thêm nhà sản xuất máy tính</a>
  <a href="../productcomputer/add_product.php" class="w3-bar-item w3-button">Thêm sản phẩm máy tính</a>
  <a href="../customer/listcustomer.php" class="w3-bar-item w3-button">Quản lý quản lý khách hàng</a>
  <a href="#" class="w3-bar-item w3-button">Quản lý giỏ hàng</a>
  <a href="#" class="w3-bar-item w3-button">Quản lý đơn hàng</a>
</div>



<div id="main">

  <div class="w3-teal">
    <button id="openNav" class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>
    <div class="w3-container">
      <h1> <img src="../../content/img/dh.png" alt="image admin">Shop điện tử</h1>
    </div>
  </div>
  <!----
  <div class="w3-container"> 
    <p> viet noi dun trong nay</p>
  </div>
  ---->
</div>

<script>
function w3_open() {
  document.getElementById("main").style.marginLeft = "25%";
  document.getElementById("mySidebar").style.width = "25%";
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("openNav").style.display = 'none';
}
function w3_close() {
  document.getElementById("main").style.marginLeft = "0%";
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("openNav").style.display = "inline-block";
}
</script>



    
</body>
</html>