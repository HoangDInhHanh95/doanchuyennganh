<?php 
    include '../admin/slider_menu.php';// có biên conn
    $sqlcate ="SELECT * FROM `categoryphoneandtablet`";
    $catequery = mysqli_query($conn,$sqlcate);
    $classification = "SELECT * FROM classificationtable";
    $classificationtable = mysqli_query($conn,$classification);


    if(isset($_GET['id']))
    {
        $id = $_GET['id'];
        $produc = mysqli_query($conn,"SELECT * FROM productphoneandtablet  WHERE idsp = $id");
        $pro = mysqli_fetch_array($produc);

    }
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

        $sqlprod = "UPDATE `productphoneandtablet` SET `idcatephoneandtablet`=' $idcatephoneandtablet',`idclassification`=' $idclassification',`tenmay`='$tenmay',`manhinh`='$manhinh',`hedieuhanh`='$hedieuhanh',`cameratruoc`='$cameratruoc',`camerasau`='$camerasau',`chip`='$chip',`ram`=' $ram',`bonhotrong`='$bonhotrong',`ketnoi`='$ketnoi',`sim`='$sim',`hinhanh`='$image',`soluong`='$soluong',`mausac`='$mausac',`phantramgiamgia`='$phantramgiamgia',`gia`='$gia' WHERE idsp = '$id'";
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
                         <select id="input" class="form-control"  name="idcatephoneandtablet">
                             <option value="">_________Chọn Loại Sản Phẩm_________</option>
                              <?php foreach($catequery as $cate) {?>
                                <option value="<?php echo $cate['idcatephoneandtablet'];?>"  <?php echo ($cate['idcatephoneandtablet'] == $pro['idcatephoneandtablet']) ? ' selected' : '' ?> >
                                
                                <?php echo $cate['thuonghieu'];?></option>
                              <?php }?>
                         </select>
                      </div>
                         <!--*************-->
                      <div class="form-group">
                          <label for="">Chọn loại sản phẩm</label>
                         <select id="input" class="form-control"  name="idclassification">
                             <option value="">_________Chọn Thể loại_________</option>
                              <?php foreach($classificationtable as $cate) {?>
                                <option value="<?php echo $cate['idclassification'];?>"  <?php echo ($cate['idclassification'] == $pro['idclassification']) ? ' selected' : '' ?> >
                                <?php echo $cate['loai'];?></option>
                              <?php }?>
                         </select>
                      </div>
                      <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Nhập tên sản phẩm" name="tenmay" value="<?php echo $pro['tenmay'] ?>">
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Nhập thông số màn hình" name="manhinh" value="<?php echo $pro['manhinh'] ?>">
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Nhập thông số hệ điều hành" name="hedieuhanh" value="<?php echo $pro['hedieuhanh'] ?>">
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Nhập thông số camare trước" name="cameratruoc" value="<?php echo $pro['cameratruoc'] ?>">
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Nhập thông số camare sau" name="camerasau" value="<?php echo $pro['camerasau'] ?>">
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Nhập thông số chip" name="chip" value="<?php echo $pro['chip'] ?>">
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Nhập thông số ram" name="ram" value="<?php echo $pro['ram'] ?>">
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Nhập thông số bố nhớ trong" name="bonhotrong" value="<?php echo $pro['bonhotrong'] ?>">
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Nhập kiểu kết nối" name="ketnoi" value="<?php echo $pro['ketnoi'] ?>">
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Nhập lắp một hay hai sim" name="sim" value="<?php echo $pro['sim'] ?>">
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Nhập số lượng muốn bán" name="soluong" value="<?php echo $pro['soluong'] ?>">
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Nhập màu săc sản phẩm" name="mausac" value="<?php echo $pro['mausac'] ?>">
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Nhập mức phần trăm giảm giá" name="phantramgiamgia" value="<?php echo $pro['phantramgiamgia'] ?>">
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <input type="text" class="form-control" id="" placeholder="Nhập giá bán" name="gia" value="<?php echo number_format($pro['gia']) ?>" >    
                    </div>
                    <!--*************-->
                    <div class="form-group">
                        <label for="">Chọn ảnh sản phẩm</label><br>
                        <img src="../uploads/<?php echo $pro['hinhanh'] ?>" alt="" width="80px">
                        <input type="file"  id=""  name="hinhanh" accept=".PNG,.GIF,.JPG"/>
                    </div>
                    <button type="submit" class= "btn btn-primary" name="submidprod" >Chỉnh sửa</button>   
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
