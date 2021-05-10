<?php 
include '../share/header.php';
?>
<?php 

    $strSQLphone ="SELECT * FROM `productphoneandtablet` WHERE idclassification = '1' ORDER by idsp DESC LIMIT 0,12";
    $strSQLqueryphone = mysqli_query($conn,$strSQLphone);
    //Load product table
    $strSQL ="SELECT * FROM `productphoneandtablet` WHERE idclassification = '2' ORDER by idsp DESC LIMIT 0,12";
    $strSQLquery = mysqli_query($conn,$strSQL);
    // load product laptop
    $strSQLlap ="SELECT * FROM `productcomputer` WHERE idclassification = '3' ORDER by idsp DESC LIMIT 0,12";
    $strSQLquerylap = mysqli_query($conn,$strSQLlap);
    //load product desktop
    $strSQLDesktop ="SELECT * FROM `productcomputer` WHERE idclassification = '4' ORDER by idsp DESC LIMIT 0,12";
    $strSQLquerydesktop = mysqli_query($conn,$strSQLDesktop);


?>

<head>
 
<style>
   

</style>
<link rel="stylesheet" href="../../content/css/index.css">

</head>
<!---slider---->
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <!---slider---->
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                <div class="item active">
                    <img src="../../content//img/800-300-800x300-17.png" alt="Los Angeles" style="width:100%;">
                </div>

                <div class="item">
                    <img src="../../content//img/800-300-800x300-19.png" alt="Chicago" style="width:100%;">
                </div>
                
                <div class="item">
                    <img src="../../content//img/800-300-800x300-20.png" alt="New york" style="width:100%;">
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
            <!---slider---->
        </div>
        <div class="col-lg-4">
            <img src="../../content/img/398-110-398x110-3.png" alt="" style="width: 100%;">
            <img src="../../content/img/398-110-398x110-4.png" alt="" style="width: 100%;">
        </div>
    </div>
    <div class="row">
        <div class="box_slse">
            <?php include 'slider_swiper.php'; ?>
        </div>
    </div>
    <!-------------load PHONE-------------------->
    <div class="row">
            <div class="box_lable">
                 <h3 id="title_prod_phone">SẢN PHẨM BÁN CHẠY</h3>
           </div>
           <?php while($row = mysqli_fetch_array($strSQLqueryphone)){  ?>
                <div class="col-lg-3">
                    <div class="acritle_item">
                        <div class="item_img">
                            <a href="detailproduct.php?id=<?=$row["idsp"]?>&idclass=<?=$row["idclassification"]?>&idsp=<?=$row["idsp"]?>">
                                <img src="../uploads/<?=$row["hinhanh"] ?>" alt="" id="url_img">
                            </a>
                        </div>
                        <div class="title_commnet">
                            <a href="detailproduct.php?id=<?=$row["idsp"]?>&idclass=<?=$row["idclassification"]?>&idsp=<?=$row["idsp"]?>" style="text-align: center;">
                                <h3><?= $row["tenmay"]?></h3>
                            </a>
                        </div>
                        <div class="acritle_price_prod" >
                           <?=number_format($row["gia"])?> VND
                        </div>
                    </div>
                </div>
            <?php  } ?>
    </div>
     <!------------------------>
    <div class="row">
           <div class="box_lable">
                 <h3 id="title_prod_phone">TABLET NỔI BẬT NHẤT</h3>
           </div>
        <!------------------------>
            <?php while($row = mysqli_fetch_array($strSQLquery)){  ?>
                <div class="col-lg-3">
                    <div class="acritle_item">
                        <div class="item_img">
                            <a href="detailproduct.php?id=<?=$row["idsp"]?>&idclass=<?=$row["idclassification"]?>&idsp=<?=$row["idsp"]?>">
                                <img src="../uploads/<?=$row["hinhanh"] ?>" alt="" id="url_img">
                            </a>
                        </div>
                        <div class="title_commnet">
                            <a href="detailproduct.php?id=<?=$row["idsp"]?>&idclass=<?=$row["idclassification"]?>&idsp=<?=$row["idsp"]?>" style="text-align: center;">
                                <h3><?= $row["tenmay"]?></h3>
                            </a>
                        </div>
                        <div class="acritle_price_prod" >
                           <?=number_format($row["gia"])?> VND
                        </div>
                    </div>
                </div>
            <?php  } ?>
            <!------>
     </div>
</div>
<!-------------load laptop-------------------->
<div class="container">
    <div class="row">
            <div class="box_lable">
                 <h3 id="title_prod_phone">SẢN PHẨM LAPTOP NỔI BẬT</h3>
           </div>
           <?php while($row = mysqli_fetch_array($strSQLquerylap)){  ?>
                <div class="col-lg-3">
                    <div class="acritle_item">
                        <div class="item_img">
                            <a href="detailproduct.php?id=<?=$row["idsp"]?>&idclass=<?=$row["idclassification"]?>&idsp=<?=$row["idsp"]?>">
                                <img src="../uploads/<?=$row["hinhanh"] ?>" alt="" id="url_img">
                            </a>
                        </div>
                        <div class="title_commnet">
                            <a href="detailproduct.php?id=<?=$row["idsp"]?>&idclass=<?=$row["idclassification"]?>&idsp=<?=$row["idsp"]?>" style="text-align: center;">
                                <h3><?= $row["tenmay"]?></h3>
                            </a>
                        </div>
                        <div class="acritle_price_prod" >
                           <?=number_format($row["gia"])?> VND
                        </div>
                    </div>
                </div>
            <?php  } ?>
    </div>
</div>
<!-------------load product desktop---------------------->
<div class="container">
    <div class="row">
            <div class="box_lable">
                 <h3 id="title_prod_phone">SẢN PHẨM BÁN CHẠY</h3>
           </div>
           <?php while($row = mysqli_fetch_array($strSQLquerydesktop)){  ?>
                <div class="col-lg-3">
                    <div class="acritle_item">
                        <div class="item_img">
                            <a href="detailproduct.php?id=<?=$row["idsp"]?>&idclass=<?=$row["idclassification"]?>&idsp=<?=$row["idsp"]?>">
                                <img src="../uploads/<?=$row["hinhanh"] ?>" alt="" id="url_img">
                            </a>
                        </div>
                        <div class="title_commnet">
                            <a href="detailproduct.php?id=<?=$row["idsp"]?>&idclass=<?=$row["idclassification"]?>&idsp=<?=$row["idsp"]?>" style="text-align: center;">
                                <h3><?= $row["tenmay"]?></h3>
                            </a>
                        </div>
                        <div class="acritle_price_prod" >
                           <?=number_format($row["gia"])?> VND
                        </div>
                    </div>
                </div>
            <?php  } ?>
    </div>
</div>








<!------footer-------->
<?php
    include '../share/footer.php';
?>
