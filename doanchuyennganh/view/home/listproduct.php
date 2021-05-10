<?php 
    include '../share/header.php';// co bien connect
    $cate_id = isset($_GET["id"])?$_GET["id"]: "";
    // lấy giá trị name khi search
    $search = isset($_GET['name']) ? $_GET['name'] : "";
    //SELECT *  FROM `productphoneandtablet` WHERE `tenmay` LIKE '%iphone%' AND idclassification = '1' // 
    
    $caseprod = $cate_id;

    switch($caseprod)
    {
        case "1":
            if($search){
                $sql = "SELECT *  FROM `productphoneandtablet` WHERE `tenmay` LIKE '%".$search."%' ORDER by idsp DESC";
                $sqlproduct = mysqli_query($conn, $sql);  
            }else{
                $sql = "SELECT * FROM `productphoneandtablet` WHERE idclassification = '1' ORDER by idsp DESC";
                $sqlproduct = mysqli_query($conn, $sql);   
            }
             //
            $sqlcategory = "SELECT * FROM `categoryphoneandtablet`";
            $strQuerycat = mysqli_query($conn, $sqlcategory);
            break;
        case "2":
            $sql = "SELECT * FROM `productphoneandtablet` WHERE idclassification = '2' ORDER by idsp DESC";
            $sqlproduct = mysqli_query($conn,$sql);
            //
            $sqlcategory = "SELECT * FROM `categoryphoneandtablet`";
            $strQuerycat = mysqli_query($conn,$sqlcategory);
            break;
        case "3":
            if($search){
                $sql = "SELECT *  FROM `productcomputer` WHERE `tenmay` LIKE '%".$search."%'  ORDER by idsp DESC";
                $sqlproduct = mysqli_query($conn, $sql);  
            }else{
                $sql = "SELECT * FROM `productcomputer` WHERE idclassification = '3' ORDER by idsp DESC";
                $sqlproduct = mysqli_query($conn,$sql); 
            }            
            //
            $sqlcategory = "SELECT * FROM `categorycomputer`";
            $strQuerycat = mysqli_query($conn,$sqlcategory);
            break;
        case "4":
            $sql = "SELECT * FROM `productcomputer` WHERE idclassification = '4' ORDER by idsp DESC ";
            $sqlproduct = mysqli_query($conn,$sql);
            $sqlcategory = "SELECT * FROM `categorycomputer`";
            $strQuerycat = mysqli_query($conn,$sqlcategory);
            break;
    }
?>
<head>
    <style>
        .row .col-lg-2 .menu_cate a{
            text-decoration: none;
            font-size: 20px;
            padding: 10px;
            font-weight: 500;

        }
        .row .col-lg-2 .menu_cate{
            width: 100%;
            height: 44px;
            text-align: center;
            line-height: 44px;
            background: rgb(255 255 255 / 50%);
            margin-top: 6px;
            border-radius: 10px;
            border: 1px solid rgb(228 228 228 / 50%);
        }
        .row .col-lg-2 .menu_cate a:hover
        {
            color: white;
        }
        .row .col-lg-2 .menu_cate:hover{
            background: #4b8fe2;
            color: white;
        }
    
    </style>
    <link rel="stylesheet" href="../../content/css/index.css">
</head>
<div class="container">
    <div class="row">
        <?php if($cate_id == 1 || $cate_id == 2){ ?>
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
        <?php while($row = mysqli_fetch_array($sqlproduct)){  ?>
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
