<?php 
    include '../admin/slider_menu.php';// có biên conn
    $sqlcate ="SELECT * FROM `categorycomputer`";
    $catequery = mysqli_query($conn,$sqlcate);
    $classification = "SELECT * FROM classificationtable";
    $classificationtable = mysqli_query($conn,$classification);



    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        $produc = mysqli_query($conn,"SELECT * FROM productcomputer  WHERE idsp = $id");
        $pro = mysqli_fetch_array($produc);

    }
?>


<?php 
    if (isset($_POST["submidprod"]))
    {
        $idcatephoneandtablet = $_POST["idcatedesk"];
        $idclassification = $_POST["idclassification"];
        $tenmay = $_POST["tenmay"];
        $cpu = $_POST["cpu"];
        $ram = $_POST["ram"];
        $ocung = $_POST["ocung"];
        $manhinh = $_POST["manhinh"];
        $cardmanhinh = $_POST["cardmanhinh"];
        $congketnoi = $_POST["congketnoi"];
        $hedieuhanh = $_POST["hedieuhanh"];
        $kinhthuocmanhinh = $_POST["kinhthuocmanhinh"];
        $carddohoa = $_POST["carddohoa"];
        $kinhthuocmay = $_POST["kinhthuocmay"];
        $trongluong = $_POST["trongluong"];
        $chatlieu = $_POST["chatlieu"];
        $pin = $_POST["pin"];
        $khedocthenho = $_POST["khedocthenho"];
        $thoigianramat = $_POST["thoigianramat"];
        $soluong = $_POST["soluong"];
        $mausac = $_POST["mausac"];
        $phantramgiamgia = $_POST["phantramgiamgia"];
        $gia = $_POST["gia"];
       

        //thiết lập cài đặt upfile
        if(empty($_FILES['hinhanh']['name']))
        {
            $image = $pro['hinhanh'];
        }
        else{
            //bược 1: chuyên file từ bộ nhớ tmp_name vao thư mục uploads đã tạo
            $file = $_FILES['hinhanh'];
            $file_name = date("Ymd-His").$file['name'];
            move_uploaded_file($file['tmp_name'], '../uploads/'.$file_name);
            $image = $file_name;    
        }

        $sqlprod = "UPDATE `productcomputer` SET `idcatedesk`=' $idcatephoneandtablet',`idclassification`='$idclassification',`tenmay`='$tenmay',`cpu`=' $cpu',`ram`='$ram',`ocung`='$ocung',`manhinh`='$manhinh',`cardmanhinh`='$cardmanhinh',`congketnoi`='$congketnoi',`hedieuhanh`='$hedieuhanh',`hinhanh`='$image',`kinhthuocmanhinh`='$kinhthuocmanhinh',`carddohoa`='$carddohoa',`kinhthuocmay`='$kinhthuocmay',`trongluong`='$trongluong',`chatlieu`='$chatlieu',`pin`='$pin',`khedocthenho`='$khedocthenho',`thoigianramat`='$thoigianramat',`soluong`='$soluong',`mausac`='$mausac',`phantramgiamgia`='$phantramgiamgia',`gia`='$gia' WHERE idsp = '$id'";

        $resultprod = mysqli_query($conn,$sqlprod);
        if($resultprod)
        {
            echo "<script type='text/javascript'>alert('bạn đã sửa dữ liệu thành công');</script>";
            //echo "bạn đã thêm dữ liệu thành công";
        }
        else
        {
            echo "lỗi rồi".mysqli_error($conn);exit();
            echo "<script type='text/javascript'>alert('Bạn đã sửa thê dữ liệu thất bại');</script>";
            //echo "Bạn đã thê dữ liệu thất bại".mysqli_errno($conn);
        }
    }


?>



<head>
    <link rel="stylesheet" href="../../content/css/add_productphone.css">

</head>
<!---->
<div class="container">
    <div class="row container_form">
        <div class="col-md-9">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title " id="panel_title">
                        Thêm mới sản phẩm
                    </h3>
                </div>
                <div class="panel-body">
                  <form action="" method="POST" role="form" enctype="multipart/form-data">
                        <!--*************-->
                      <div class="form-group">
                          <label for="">Chọn Thương hiệu sản phẩm</label>
                         <select id="input" class="form-control"  name="idcatedesk">
                             <option value="">_________Chọn Loại Sản Phẩm_________</option >
                              <?php foreach($catequery as $cate) {?>
                                <option value="<?php echo $cate['idcatedesk'];?>"  <?php echo ($cate['idcatedesk'] == $pro['idcatedesk']) ? ' selected' : '' ?>   ><?php echo $cate['thuonghieu'];?></option>
                              <?php }?>
                         </select>
                      </div>
                         <!--*************-->
                      <div class="form-group">
                          <label for="">Chọn loại sản phẩm</label>
                         <select id="input" class="form-control"  name="idclassification">
                             <option value="">_________Chọn Thể loại_________</option>
                              <?php foreach($classificationtable as $cate) {?>
                                <option value="<?php echo $cate['idclassification'];?>" <?php echo ($cate['idclassification'] == $pro['idclassification']) ? ' selected' : '' ?>  ><?php echo $cate['loai'];?></option>
                              <?php }?>
                         </select>
                      </div>
                      <!--*************-->
                     <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Nhập tên sản phẩm" name="tenmay" value="<?php echo $pro['tenmay'] ?>">
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Nhập thông số CPU" name="cpu" value="<?php echo $pro['cpu'] ?>">
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Nhập thông số hệ ram" name="ram" value="<?php echo $pro['ram'] ?>">
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Nhập thông số Ô cứng" name="ocung" value="<?php echo $pro['ocung'] ?>">
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Nhập thông số màn hình" name="manhinh" value="<?php echo $pro['manhinh'] ?>">
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Nhập thông số card màn hình" name="cardmanhinh" value="<?php echo $pro['cardmanhinh'] ?>">
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Nhập thông số Cổng kết nối" name="congketnoi" value="<?php echo $pro['congketnoi'] ?>">
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Nhập thông số hệ điều hành" name="hedieuhanh" value="<?php echo $pro['hedieuhanh'] ?>">
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Nhập kích thước màn hình" name="kinhthuocmanhinh" value="<?php echo $pro['kinhthuocmanhinh'] ?>">
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Nhập số card đồ họa" name="carddohoa" value="<?php echo $pro['carddohoa'] ?>">
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Nhập thông số kích thước máy" name="kinhthuocmay" value="<?php echo $pro['kinhthuocmay'] ?>">
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Nhập trọng lượng của máy" name="trongluong" value="<?php echo $pro['trongluong'] ?>">
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Chất lượng của máy" name="chatlieu" value="<?php echo $pro['chatlieu'] ?>">    
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Nhập thông số pin máy" name="pin" value="<?php echo $pro['pin'] ?>">    
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="ke cắm thẻ nhớ" name="khedocthenho" value="<?php echo $pro['khedocthenho'] ?>">    
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Thời gian ra mắt" name="thoigianramat" value="<?php echo $pro['thoigianramat'] ?>">    
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Số lượng muốn bán" name="soluong" value="<?php echo $pro['soluong'] ?>">    
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Màu sắc máy" name="mausac" value="<?php echo $pro['mausac'] ?>">    
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Phân trăm giảm giá" name="phantramgiamgia" value="<?php echo $pro['phantramgiamgia'] ?>">    
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Nhập giá bán" name="gia" value="<?php echo $pro['gia'] ?>">    
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <label for="">Chọn ảnh sản phẩm</label><br>
                        <img src="../uploads/<?php echo $pro['hinhanh'] ?>" alt="" width="80px">sss
                        <input type="file"  id=""  name="hinhanh" accept=".PNG,.GIF,.JPG"/>
                    </div>
                    <button type="submit" class= "btn btn-primary" name="submidprod" >Thêm mới</button>   
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
