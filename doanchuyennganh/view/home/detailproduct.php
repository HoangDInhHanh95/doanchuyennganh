<?php 
include '../share/header.php';
 $cate_id = isset($_GET["idsp"])?$_GET["idsp"]: "";

 $idclass = isset($_GET["idclass"])?$_GET["idclass"]: "";
 $case_id = $idclass;

 switch($case_id)
 {
    case "1":
        $detailprod = mysqli_query($conn,"SELECT * FROM `productphoneandtablet` WHERE idsp = $cate_id");
        $result = mysqli_fetch_array($detailprod);
        //
        $sqlcategory = "SELECT * FROM `categoryphoneandtablet`";
        $strQuerycat = mysqli_query($conn,$sqlcategory);
        break;
    case "2":
        $detailprod = mysqli_query($conn,"SELECT * FROM `productphoneandtablet` WHERE idsp = $cate_id");
        $result = mysqli_fetch_array($detailprod);
        //
        $sqlcategory = "SELECT * FROM `categoryphoneandtablet`";
        $strQuerycat = mysqli_query($conn,$sqlcategory);
        break;
    case "3":
        $detailprod = mysqli_query($conn,"SELECT * FROM `productcomputer` WHERE idsp = $cate_id");
        $result = mysqli_fetch_array($detailprod);
        //
        $sqlcategory = "SELECT * FROM `categorycomputer`";
        $strQuerycat = mysqli_query($conn,$sqlcategory);
        break;
    case "4":
        $detailprod = mysqli_query($conn,"SELECT * FROM `productcomputer` WHERE idsp = $cate_id");
        $result = mysqli_fetch_array($detailprod);
        //
        $sqlcategory = "SELECT * FROM `categorycomputer`";
        $strQuerycat = mysqli_query($conn,$sqlcategory);
        break;
 }

?>
<head>
    <link rel="stylesheet" href="../../content/css/detailproduct.css">
    <style>
        .row .col-lg-2 .menu_cate a:hover
        {
            color: white;
        }
        .row .col-lg-2 .menu_cate:hover{
            background: #4b8fe2;
            color: white;
        }
    </style>
</head>

<div class="container">
    <!---->
    <div class="row">
        <?php if( $idclass== 1 || $idclass == 2){ ?>
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
    <!---->
    <div class="row">
        <div class="col-lg-12">
            <div class="box_name">
                <div class="name_product"><?=$result["tenmay"]?></div>
            </div>
        </div>
        <div class="col-lg-5"> 
            <img src="../uploads/<?=$result["hinhanh"]?>" alt="anh san pham" style="width:100%;">
        </div>
        <div class="col-lg-7"> 
            <div class="title_thongso">Thông số kỹ thuật</div>
           <?php if($case_id== 2 || $case_id == 1) { ?>
            <ul class="info_prode">
                <li class="box_info_prod">
                    <div class="name_info_prod">Màn hình:</div>
                    <div class="value_in"><?= $result["manhinh"]?></div>
                </li>
                <li class="box_info_prod">
                    <div class="name_info_prod">Hệ điều hành:</div>
                    <div class="value_in"><?= $result["hedieuhanh"]?></div>
                </li>
                <li class="box_info_prod">
                    <div class="name_info_prod">Camera sau:</div>
                    <div class="value_in"><?= $result["camerasau"]?></div>
                </li>
                <li class="box_info_prod">
                    <div class="name_info_prod">Camera trước:</div>
                    <div class="value_in"><?= $result["cameratruoc"]?></div>
                </li>
                <li class="box_info_prod">
                    <div class="name_info_prod">Chịp:</div>
                    <div class="value_in"><?= $result["chip"]?></div>
                </li>
                <li class="box_info_prod">
                    <div class="name_info_prod">Ram:</div>
                    <div class="value_in"><?= $result["ram"]?></div>
                </li>
                <li class="box_info_prod">
                    <div class="name_info_prod">Bộ nhớ trong:</div>
                    <div class="value_in"><?= $result["bonhotrong"]?></div>
                </li>
                <button type="button" data-toggle="modal" data-target="#myModal1"  class="btn btn-primary btn_show">Xem thêm cấu hình chi tiết</button>
                <button type="button" class="btn btn-success btn_show">Mua hàng</button>
            </ul>
            <!--------form add product phone-------> 
                <div class="container">
                    <!-- The Modal -->
                    <div class="modal fade" id="myModal1">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                            
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Chi tiết sản phẩm</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <ul class="info_prode">
                                            <li class="box_info_prod">
                                                <img src="../uploads/<?=$result["hinhanh"]?>" alt="anh san pham" style="width:500px;">
                                            </li>
                                            <li class="box_info_prod">
                                                <div class="name_info_prod">Màn hình:</div>
                                                <div class="value_in"><?= $result["manhinh"]?></div>
                                            </li>
                                            <li class="box_info_prod">
                                                <div class="name_info_prod">Hệ điều hành:</div>
                                                <div class="value_in"><?= $result["hedieuhanh"]?></div>
                                            </li>
                                            <li class="box_info_prod">
                                                <div class="name_info_prod">Camera sau:</div>
                                                <div class="value_in"><?= $result["camerasau"]?></div>
                                            </li>
                                            <li class="box_info_prod">
                                                <div class="name_info_prod">Camera trước:</div>
                                                <div class="value_in"><?= $result["cameratruoc"]?></div>
                                            </li>
                                            <li class="box_info_prod">
                                                <div class="name_info_prod">Chịp:</div>
                                                <div class="value_in"><?= $result["chip"]?></div>
                                            </li>
                                            <li class="box_info_prod">
                                                <div class="name_info_prod">Ram:</div>
                                                <div class="value_in"><?= $result["ram"]?></div>
                                            </li>
                                            <li class="box_info_prod">
                                                <div class="name_info_prod">Bộ nhớ trong:</div>
                                                <div class="value_in"><?= $result["bonhotrong"]?></div>
                                            </li>
                                            <li class="box_info_prod">
                                                <div class="name_info_prod">Cổng kết nối:</div>
                                                <div class="value_in"><?= $result["ketnoi"]?></div>
                                            </li>
                                            <li class="box_info_prod">
                                                <div class="name_info_prod">Sim:</div>
                                                <div class="value_in"><?= $result["sim"]?></div>
                                            </li>
                                            <li class="box_info_prod">
                                                <div class="name_info_prod">Màu sắc:</div>
                                                <div class="value_in"><?= $result["mausac"]?></div>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                    
                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            
            <!--------form add product phone-------> 

           <?php }else {?>
                <ul class="info_prode">
                    <li class="box_info_prod">
                        <div class="name_info_prod">Màn hình:</div>
                        <div class="value_in"><?= $result["manhinh"]?></div>
                    </li>
                    <li class="box_info_prod">
                        <div class="name_info_prod">Hệ điều hành:</div>
                        <div class="value_in"><?= $result["hedieuhanh"]?></div>
                    </li>
                    <li class="box_info_prod">
                        <div class="name_info_prod">CPU:</div>
                        <div class="value_in"><?= $result["cpu"]?></div>
                    </li>
                    <li class="box_info_prod">
                        <div class="name_info_prod">Ram:</div>
                        <div class="value_in"><?= $result["ram"]?></div>
                    </li>
                    <li class="box_info_prod">
                        <div class="name_info_prod">Card màn hình:</div>
                        <div class="value_in"><?= $result["cardmanhinh"]?></div>
                    </li>
                    <li class="box_info_prod">
                        <div class="name_info_prod">Kích thước:</div>
                        <div class="value_in"><?= $result["kinhthuocmay"]?></div>
                    </li>
                    <li class="box_info_prod">
                        <div class="name_info_prod">Pin:</div>
                        <div class="value_in"><?= $result["pin"]?></div>
                    </li>
                    <li class="box_info_prod">
                        <div class="name_info_prod">Thời điểm ra mắt:</div>
                        <div class="value_in"><?= $result["thoigianramat"]?></div>
                    </li>
                    <button type="button" data-toggle="modal" data-target="#myModal"  class="btn btn-primary btn_show">Xem thêm cấu hình chi tiết</button>
                    <button type="button" class="btn btn-success btn_show ">Mua hàng</button>
                    
                </ul>


                <!--------form add product phone-------> 
                <div class="container">
                    <!-- The Modal -->
                    <div class="modal fade" id="myModal">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                            
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Chi tiết sản phẩm</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                    <!-- Modal body -->
                                <div class="modal-body">
                                    <ul class="info_prode">
                                            <li class="box_info_prod">
                                                <img src="../uploads/<?=$result["hinhanh"]?>" alt="anh san pham" style="width:500px;">
                                            </li>
                                            <li class="box_info_prod">
                                                <div class="name_info_prod">Màn hình:</div>
                                                <div class="value_in"><?= $result["manhinh"]?></div>
                                            </li>
                                            <li class="box_info_prod">
                                                <div class="name_info_prod">Hệ điều hành:</div>
                                                <div class="value_in"><?= $result["hedieuhanh"]?></div>
                                            </li>
                                            <li class="box_info_prod">
                                                <div class="name_info_prod">CPU:</div>
                                                <div class="value_in"><?= $result["cpu"]?></div>
                                            </li>
                                            <li class="box_info_prod">
                                                <div class="name_info_prod">Ram:</div>
                                                <div class="value_in"><?= $result["ram"]?></div>
                                            </li>
                                            <li class="box_info_prod">
                                                <div class="name_info_prod">Card màn hình:</div>
                                                <div class="value_in"><?= $result["cardmanhinh"]?></div>
                                            </li>
                                            <li class="box_info_prod">
                                                <div class="name_info_prod">Kích thước:</div>
                                                <div class="value_in"><?= $result["kinhthuocmay"]?></div>
                                            </li>
                                            <li class="box_info_prod">
                                                <div class="name_info_prod">Pin:</div>
                                                <div class="value_in"><?= $result["pin"]?></div>
                                            </li>
                                            <li class="box_info_prod">
                                                <div class="name_info_prod">ổ cứng:</div>
                                                <div class="value_in"><?= $result["ocung"]?></div>
                                            </li>
                                            <li class="box_info_prod">
                                                <div class="name_info_prod">Màn hình:</div>
                                                <div class="value_in"><?= $result["manhinh"]?></div>
                                            </li>
                                            <li class="box_info_prod">
                                                <div class="name_info_prod">Cổng kết nối:</div>
                                                <div class="value_in"><?= $result["congketnoi"]?></div>
                                            </li>
                                            <li class="box_info_prod">
                                                <div class="name_info_prod">Kích thước màn hình :</div>
                                                <div class="value_in"><?= $result["kinhthuocmanhinh"]?></div>
                                            </li>
                                            <li class="box_info_prod">
                                                <div class="name_info_prod">Card đồ họa :</div>
                                                <div class="value_in"><?= $result["carddohoa"]?></div>
                                            </li>
                                            <li class="box_info_prod">
                                                <div class="name_info_prod">Trong lượng máy:</div>
                                                <div class="value_in"><?= $result["trongluong"]?></div>
                                            </li>
                                            <li class="box_info_prod">
                                                <div class="name_info_prod">Chất liệu:</div>
                                                <div class="value_in"><?= $result["chatlieu"]?></div>
                                            </li>
                                            <li class="box_info_prod">
                                                <div class="name_info_prod">Khe đọc thẻ nhớ:</div>
                                                <div class="value_in"><?= $result["khedocthenho"]?></div>
                                            </li>
                                            <li class="box_info_prod">
                                                <div class="name_info_prod">Thời điểm ra mắt:</div>
                                                <div class="value_in"><?= $result["thoigianramat"]?></div>
                                            </li>
                                            <li class="box_info_prod">
                                                <div class="name_info_prod">Giá:</div>
                                                <div class="value_in"><?= number_format($result["gia"])?>  VNĐ</div>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                    
                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            
            <!--------form add product phone-------> 
            <?php }?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="nominated_products">
                <h3>Sản phẩm đề cử</h3>
            </div>
        </div>
        <div class="row">
            <?php 
                include 'relateproduct.php';
            ?>
        </div>
    </div>
</div>
<div>
    <?php
       include '../share/footer.php';
    ?>
</div>