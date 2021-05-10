<?php
    include '../admin/slider_menu.php';
    
    $sqlselectprod = "SELECT productcomputer.*, categorycomputer.thuonghieu AS 'nha_sx' FROM productcomputer JOIN categorycomputer ON productcomputer.idcatedesk = categorycomputer.idcatedesk";
    $sqlQuery = mysqli_query($conn, $sqlselectprod );
    //$product = mysqli_fetch_array($sqlQuery);



?>

<head>
    
    <link rel="stylesheet" href="../../content/css/productphone.css">
</head>


<div class="container">
    <div class="row" >
     <!---*************-->
        <div class="col-md-12">
            <div class="panel panel-info">

                <div class="panel-heading">
                    <h3 class="panel-title " style="text-align: center; color:brown; font-size: 2rem" >Danh Sách Sản phẩm</h3>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên máy</th>
                                <th>Hãng</th>
                                <th>Hệ điều hành</th>
                                <th>CPU </th>
                                <th>Ram</th>
                                <th>Card đồ họa</th>
                                <th>Màu</th>
                                <th>Số lượng</th>
                                <th>Phần trăm giảm</th>
                                <th>Giá</th>
                                <th>Hình ảnh</th>    
                                <th colspan="2">Chức Năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach($sqlQuery as $key => $value){

                            ?>
                            <tr>
                                <td> <?php echo $key +1; ?></td>
                                <td> <?php echo $value['tenmay']?></td><!--luu y bookname va cateid -->
                                <td> <?php echo $value['nha_sx']?></td>
                                <td> <?php echo $value['hedieuhanh']?></td>
                                <td> <?php echo $value['cpu']?></td>
                                <td> <?php echo $value['ram']?></td>
                                <td> <?php echo $value['carddohoa']?></td>
                                <td> <?php echo $value['mausac']?></td>
                                <td> <?php echo $value['soluong']?></td>
                                <td> <?php echo $value['phantramgiamgia']?></td>
                                <td> <?php echo number_format($value['gia']) ?> VND</td>
                                
                                
                                <td> 
                                    <img src="../uploads/<?php echo $value['hinhanh']?>" alt="" width="100px"/>
                                 </td>
                                 <td> 
                                     <a href="deleteproductcomputer.php?id=<?php echo $value['idsp']?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                 </td>
                                 <td>
                                     <a href="updateleprductcomputer.php?id=<?php echo $value['idsp']?>" class="btn btn-info"><i class="far fa-edit"></i></a>
                                 </td>
                            </tr>
                                <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
