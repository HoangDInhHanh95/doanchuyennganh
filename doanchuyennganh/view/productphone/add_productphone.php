<?php 
    include '../admin/slider_menu.php';// có biên conn
    $sqlcate ="SELECT * FROM `categoryphoneandtablet`";
    $catequery = mysqli_query($conn,$sqlcate);
    $classification = "SELECT * FROM classificationtable";
    $classificationtable = mysqli_query($conn,$classification);
?>

<?php 
    if (isset($_POST["submidprod"]))
    {
        $idcatephoneandtablet = $_POST["idcatephoneandtablet"];
        $idclassification = $_POST["idclassification"];
        $tenmay = $_POST["tenmay"];
        $manhinh = $_POST["manhinh"];
        $hedieuhanh = $_POST["hedieuhanh"];
        $cameratruoc = $_POST["cameratruoc"];
        $camerasau = $_POST["camerasau"];
        $chip = $_POST["chip"];
        $ram = $_POST["ram"];
        $bonhotrong = $_POST["bonhotrong"];
        $ketnoi = $_POST["ketnoi"];
        $sim = $_POST["sim"];
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

        $sqlprod ="INSERT INTO `productphoneandtablet`(`idcatephoneandtablet`, `idclassification`, `tenmay`, `manhinh`, `hedieuhanh`, `cameratruoc`, `camerasau`, `chip`, `ram`, `bonhotrong`, `ketnoi`, `sim`, `hinhanh`, `soluong`, `mausac`, `phantramgiamgia`, `gia`)  VALUES ('$idcatephoneandtablet','$idclassification', '$tenmay','$manhinh','$hedieuhanh','$cameratruoc',' $camerasau','$chip','$ram','$bonhotrong','$ketnoi','$sim','$file_name','$soluong','$mausac','$phantramgiamgia','$gia')";

        $resultprod = mysqli_query($conn,$sqlprod);
        if($resultprod)
        {
            echo "<script type='text/javascript'>alert('bạn đã thêm dữ liệu thành công');</script>";
            //echo "bạn đã thêm dữ liệu thành công";
        }
        else
        {
            echo "lỗi rồi".mysqli_error($conn);exit();
            echo "<script type='text/javascript'>alert('Bạn đã thê dữ liệu thất bại');</script>";
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
                         <select id="input" class="form-control"  name="idcatephoneandtablet">
                             <option value="">_________Chọn Loại Sản Phẩm_________</option>
                              <?php foreach($catequery as $cate) {?>
                                <option value="<?php echo $cate['idcatephoneandtablet'];?>"><?php echo $cate['thuonghieu'];?></option>
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
                        <input type="text" class="form-control" id="" placeholder="Nhập thông số màn hình" name="manhinh">
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Nhập thông số hệ điều hành" name="hedieuhanh">
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Nhập thông số camare trước" name="cameratruoc">
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Nhập thông số camare sau" name="camerasau">
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Nhập thông số chip" name="chip">
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Nhập thông số ram" name="ram">
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Nhập thông số bố nhớ trong" name="bonhotrong">
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Nhập kiểu kết nối" name="ketnoi">
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Nhập lắp một hay hai sim" name="sim">
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Nhập số lượng muốn bán" name="soluong">
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Nhập màu săc sản phẩm" name="mausac">
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Nhập mức phần trăm giảm giá" name="phantramgiamgia">
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
