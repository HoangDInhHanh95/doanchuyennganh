<head>
    <style>
    body{
        margin: 0;
        padding: 0;
        font-family: sans-serif;
    }
    th{
        font-size: 20px;
        background:  rgb(60, 179, 113);
        text-align: center;
        font-weight: bold;
        color: #ffff;
    }
   tr td{
        font-size: 17px;
        font-weight: bold;
        font-family: sans-serif;
        text-align: center;
    }
    </style>
</head>
<?php
    include '../admin/slider_menu.php';
    $query = mysqli_query($conn,"SELECT * FROM `customer`");
    //var_dump($query);exit();
    
?>

<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Họ và tên</th>
                        <th>Tên đang nhập</th>
                        <th>Mật khẩu</th>
                        <th>E-mail</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Phím chức năng</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($query as $key => $valua){ ?>
                    <tr>
                        <td><?=$key+1 ?></td>
                        <td><?=$valua['hovaten']?></td>
                        <td><?=$valua['tendangnhap']?></td>
                        <td><?=$valua['matkhau']?></td>
                        <td><?=$valua['email']?></td>
                        <td><?=$valua['diachi']?></td>
                        <td><?=$valua['sdt']?></td>
                        <td>
                             <a href="deletecustomer.php?id=<?=$valua["idcustomer"];?>" class="btn btn-success"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>