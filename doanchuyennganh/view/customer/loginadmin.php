<?php
 
 include '../share/header.php'; ?>
<head>
    <meta charset="utf-8">
    <title>Login </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<style>

body{
    margin: 0;
    padding: 0;
    font-family: sans-serif;
    
    background: url('../../content/img/headerphone.jpg') no-repeat;
    background-size: cover;  
}
.login-box{
    width: 280px;
    position: absolute;
    top: 50%;
    left: 50%; 
    transform: translate(-50%,-50%);
    color: #ffff;
}
.login-box h1{
    float: left;
    font-size: 40px;
    border-bottom: 6px solid #4caf50;
    margin-bottom: 50px;
    padding: 13px 0;
}
.textbox{
    width: 100%;
    overflow: hidden;
    font-size: 20px;
    padding: 8px 0;
    margin: 8px 0;
    border-bottom: 1px solid #4caf50;
}
.textbox i{
    width: 26px;
    float: left;
    text-align: center;
}
.textbox input{
    border: none;
    outline: none;
    background:none;
    color: #ffff;
    font-size: 18px;
    width: 80%;
    float: left;
    margin: 0 10px;
}
.btn_login{
    width: 100%;
    background: none;
    border: 2px solid #4caf50;
    color: #ffff;
    padding: 5px;
    font-size: 18px;
    cursor: pointer;
    margin: 12px 0;
   
} 
</style>
</head>
<!----------------------------------start code php------------------------------------------------>



<?php 

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        if($username == "" || $password == "" )
        {
            echo '<script>alert("Vui lòng điền đầy đủ thông tin");</script>';
        }else{
            $sqlcustomer ="SELECT * FROM `customer` WHERE  `tendangnhap` = '$username' AND `matkhau` = $password";
            $querycustomer = mysqli_query($conn,$sqlcustomer);
           
            // lấy dữ liệu sô cột trong table về
            //print_r($querycustomer);
            $num_rows = mysqli_num_rows($querycustomer);
            
           //var_dump($num_rows);exit;
            if($num_rows)
            {
                $rows = mysqli_fetch_assoc($querycustomer);
                $_SESSION['is_logined'] = $rows;
                $_SESSION['idcustomer'] = $rows['idcustomer'];
                $_SESSION['usernamecustomer'] = $rows['tendangnhap'];
               // echo  $_SESSION['usernamecustomer'];exit;
               //$url= "informationcustomer.php?id=".$rows['idcustomer'];
                $_SESSION["hinhanh"] = $rows["hinhanh"];
               echo '<script type="text/javascript">window.location.replace("informationcustomer.php?id=1")</script>';

            }
            else{
                echo '<script>alert("Tên đăng nhập hoặc mật khẩu không đúng!");</script>';
            }


        }
    }
?>
<!----------------------------------end code php-------------------------------------------------->

<body>
    <form action=""  method="POST" role="form" autocomplete="off">
        <div class="login-box">
            <h1>Login</h1>
            <div class="textbox">
                <i class="fas fa-user" aria-hidden="true"></i>
                <input type="text" placeholder="Username" name="username">
            </div>

            <div class="textbox">
                <i class="fas fa-lock" aria-hidden="true"></i>
                <input type="password" placeholder="Password" name="password">
            </div>
            <input type="submit" class="btn_login" name="submit" id="" value="Sign in">
        </div>
    </form>
</body>