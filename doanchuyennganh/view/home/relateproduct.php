<?php
    include '../../models/connectDB.php';

    //////////////////////////////////////
    $get_idcate = isset($_GET["id"])? $_GET["id"]: "";
    $get_idsp = isset($_GET["idsp"])? $_GET["idsp"]: "";
    $get_idclass = isset($_GET["idclass"])? $_GET["idclass"]: "";
    $selection = $get_idclass;

    switch($selection)
    {
        case "1":
            $strQuert = "SELECT * FROM `productphoneandtablet` WHERE idclassification = '1' AND idsp != $get_idsp ORDER by idsp DESC LIMIT 0,4";
            $sqlproduct = mysqli_query($conn,$strQuert);
            break;
        case "2":
            $strQuert = "SELECT * FROM `productphoneandtablet` WHERE idclassification = '2' AND idsp !=$get_idsp ORDER by idsp DESC LIMIT 0,4";
            $sqlproduct = mysqli_query($conn,$strQuert);
            break;
        case "3":
            $strQuert = "SELECT * FROM `productcomputer` WHERE idclassification = '3' AND idsp !=$get_idsp ORDER by idsp DESC LIMIT 0,4";
            $sqlproduct = mysqli_query($conn,$strQuert);
            break;
        case "4":
            $strQuert = "SELECT * FROM `productcomputer` WHERE idclassification = '4' AND idsp !=$get_idsp ORDER by idsp DESC LIMIT 0,4";
            $sqlproduct = mysqli_query($conn,$strQuert);
            break;
    }

?>
<head>
    <link rel="stylesheet" href="../../content/css/relateproduct.css">
</head>

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
