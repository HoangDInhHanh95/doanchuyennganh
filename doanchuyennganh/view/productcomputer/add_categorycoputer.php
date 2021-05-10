<?php
    include '../admin/slider_menu.php';// có biên conn


       
        if(isset($_POST['submidcatecomputer']))
        {
            $thuonghieu = $_POST['thuonghieu']; 
            $sql = "INSERT INTO `categorycomputer`(`thuonghieu`) VALUES ('$thuonghieu')";
            $query = mysqli_query($conn,$sql);
            if($query)
            {
                echo "<script type='text/javascript'>alert('bạn đã thêm dữ liệu thành công');</script>";
                //echo "bạn đã thêm dữ liệu thành công";
            }
            else
            {
                echo "<script type='text/javascript'>alert('Bạn đã thê dữ liệu thất bại'.mysqli_errno($conn));</script>";
                //echo "Bạn đã thê dữ liệu thất bại".mysqli_errno($conn);
            }
        }   
?>

<head>
    <link rel="stylesheet" href="../../content/css/add_categoryphone.css">
</head>

<div class="form_cate">
    <form method="POST">
        <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Thêm mới sản phẩm
                    </h3> 
                </div>
                <div class="panel-body">
                <div class="form-group">
                    <input type="text" class="form-control" id="" placeholder="Nhập tên thương hiệu" name="thuonghieu">
                </div>
                <button type="submit" class= "btn btn-primary" name="submidcatecomputer" >Thêm mới</button>
                </div>
        </div>  
    </form>
</div>

