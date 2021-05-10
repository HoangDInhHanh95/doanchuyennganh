<?php
    include '../../models/connectDB.php';
    if(isset($_GET['id']))
    {
        $id =  $_GET['id'];// gtri id tren url
        $sql= "DELETE FROM productphoneandtablet WHERE idsp = $id";
        $query = mysqli_query($conn,$sql);

        // kiem tra
        if($query)
        {
            header('location: productphone.php');
        }
        else{
            echo "Lỗi rồi".mysqli_error($conn);
        }
    }

?>