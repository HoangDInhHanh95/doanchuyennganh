<?php 
    include '../admin/slider_menu.php';// có biên conn
    $sqlcate ="SELECT * FROM `categorycomputer`";
    $catequery = mysqli_query($conn,$sqlcate);
    $classification = "SELECT * FROM classificationtable";
    $classificationtable = mysqli_query($conn,$classification);
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
        $file_name = '';
        if(isset($_FILES['hinhanh']) )
        {
            $file = $_FILES['hinhanh'];
            $file_name = date("Ymd-His").$file['name'];// gan ngày giờ vào ảnh
            //bược 1: chuyên file từ bộ nhớ tmp_name vao thư mục uploads đã tạo
            move_uploaded_file($file['tmp_name'], '../uploads/'.$file_name);
        }
        else{
             echo "Upload file thất bại";
        }

        $sqlprod ="INSERT INTO `productcomputer`( `idcatedesk`, `idclassification`, `tenmay`, `cpu`, `ram`, `ocung`, `manhinh`, `cardmanhinh`, `congketnoi`, `hedieuhanh`, `hinhanh`, `kinhthuocmanhinh`, `carddohoa`, `kinhthuocmay`, `trongluong`, `chatlieu`, `pin`, `khedocthenho`, `thoigianramat`, `soluong`, `mausac`, `phantramgiamgia`, `gia`) VALUES ('$idcatephoneandtablet','$idclassification',' $tenmay ',' $cpu ','$ram','$ocung','$manhinh','$cardmanhinh','$congketnoi',' $hedieuhanh ','$file_name',' $kinhthuocmanhinh',' $carddohoa','$kinhthuocmay','$trongluong',' $chatlieu','$pin',' $khedocthenho','  $thoigianramat','$soluong ','$mausac',' $phantramgiamgia','$gia')";

        $resultprod = mysqli_query($conn,$sqlprod);
        if($resultprod)
        {
            echo "<script type='text/javascript'>alert('bạn đã thêm dữ liệu thành công');</script>";
            //echo "bạn đã thêm dữ liệu thành công";
        }
        else
        {
            //echo "lỗi rồi".mysqli_error($conn);exit();
            echo "<script type='text/javascript'>alert('Bạn đã thê dữ liệu thất bại');</script>";
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
                             <option value="">_________Chọn Loại Sản Phẩm_________</option>
                              <?php foreach($catequery as $cate) {?>
                                <option value="<?php echo $cate['idcatedesk'];?>"><?php echo $cate['thuonghieu'];?></option>
                              <?php }?>
                         </select>
                      </div>
                         <!--*************-->
                      <div class="form-group">
                          <label for="">Chọn loại sản phẩm</label>
                         <select id="input" class="form-control"  name="idclassification">
                             <option value="">_________Chọn Thể loại_________</option>
                              <?php foreach($classificationtable as $cate) {?>
                                <option value="<?php echo $cate['idclassification'];?>"><?php echo $cate['loai'];?></option>
                              <?php }?>
                         </select>
                      </div>
                      <!--*************-->
                     <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Nhập tên sản phẩm" name="tenmay">
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Nhập thông số CPU" name="cpu">
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Nhập thông số hệ ram" name="ram">
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Nhập thông số Ô cứng" name="ocung">
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Nhập thông số màn hình" name="manhinh">
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Nhập thông số card màn hình" name="cardmanhinh">
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Nhập thông số Cổng kết nối" name="congketnoi">
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Nhập thông số hệ điều hành" name="hedieuhanh">
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Nhập kích thước màn hình" name="kinhthuocmanhinh">
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Nhập số card đồ họa" name="carddohoa">
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Nhập thông số kích thước máy" name="kinhthuocmay">
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Nhập trọng lượng của máy" name="trongluong">
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Chất lượng của máy" name="chatlieu">    
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Nhập thông số pin máy" name="pin">    
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="ke cắm thẻ nhớ" name="khedocthenho">    
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Thời gian ra mắt" name="thoigianramat">    
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Số lượng muốn bán" name="soluong">    
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Màu sắc máy" name="mausac">    
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Phân trăm giảm giá" name="phantramgiamgia">    
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Nhập giá bán" name="gia">    
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <label for="">Chọn ảnh sản phẩm</label><br>
                        <input type="file"  id=""  name="hinhanh" accept=".PNG,.GIF,.JPG"/>
                    </div>
                    <button type="submit" class= "btn btn-primary" name="submidprod" >Thêm mới</button>   
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
