<?php 
    include '../share/header.php';

    $cate_id = isset($_GET["idcate"])?$_GET["idcate"]: "";
    $idclass = isset($_GET["listcate"])?$_GET["listcate"]: "";
    /////
    $listcate = $idclass;
    switch($listcate)
    {
        case "1":
            $sqlphone = "SELECT * FROM `productphoneandtablet` WHERE idcatephoneandtablet = $cate_id ORDER by idsp DESC LIMIT 0,12";
            $strSQLproduct = mysqli_query($conn, $sqlphone);
            ////////////////////////////////////////////////////
            $sqlcategory = "SELECT * FROM `categoryphoneandtablet`";
            $strQuerycat = mysqli_query($conn,$sqlcategory);
            break;
        case "2":
            $sqlphone = "SELECT * FROM `productcomputer` WHERE idcatedesk = $cate_id ORDER by idsp DESC LIMIT 0,12";
            $strSQLproduct = mysqli_query($conn, $sqlphone);
            //////////////////////////////////////////////////
            $sqlcategory = "SELECT * FROM `categorycomputer`";
            $strQuerycat = mysqli_query($conn,$sqlcategory);
            break;

    }
?>
<head>   
    <link rel="stylesheet" href="../../content/css/categorylistproduct.css">
</head>

<div class="container">
    <div class="row">
        <?php if($idclass == 1){ ?>
            <?php while($cate = mysqli_fetch_array($strQuerycat)){  ?>
                <div class="col-lg-2">
                    <div class="menu_cate">
                        <a href="categorylistproduct.php?idcate=<?=$cate["idcatephoneandtablet"]?>&listcate=1"><?=$cate["thuonghieu"]?></a>
                    </div>
                </div>
            <?php } ?>
        <?php }else{ ?>
            <?php while ($cate = mysqli_fetch_array($strQuerycat)) {  ?>
                <div class="col-lg-2">
                    <div class="menu_cate">
                        <a href="categorylistproduct.php?idcate=<?=$cate["idcatedesk"]?>&listcate=2"><?=$cate["thuonghieu"]?></a>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
    <div class="row">
        <?php while($row = mysqli_fetch_array($strSQLproduct)){  ?>
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
             <!------>
        <?php  } ?>
    </div>
</div>
<div>
    <?php
       include '../share/footer.php';
    ?>
</div>