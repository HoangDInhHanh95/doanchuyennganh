<?php
 include '../share/header.php';
 
?>  
<style>
.dathang{
    width: 100px;
    border-radius: 100px;
}
</style>
<!-----------------------------------code trang giỏ hàng--------------------------------------------->

<!-----------------------------------end shopping_cart--------------------------------------------->

<div class="container">
    <div class="row">
     <!---*************-->
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading" style="background-color: #fcc2d7;">
                    <h3 class="panel-title " style="text-align: center; color:brown; font-size: 3rem" >Thông tin giỏ hàng </h3>
                </div>
            



            <form action="cart.php?action=submit" method="POST">        
                <div class="panel-body">
                   
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr style="background-color: #ccff00;">
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th>Dòng sản phẩm</th>
                                
                                <th>Số lượng </th>
                                <th>Giá sản phẩm</th>
                                <th>Ảnh sản phẩm</th>
                                <th>Mô tả sản phẩm</th>
                                <th>Thời gian bảo hành</th>
                                <th>Thành Tiền</th>
                                <th>Chức Năng</th>
                            </tr>
                        </thead>
                
                        <tbody>
                            <tr>
                                <td style="background-color: #e8d9c3;"> </td>
                                <td> </td><!--luu y bookname va cateid -->
                                <td> </td>

                                <td> 
                                    <input type="number"  value="" id="soluong" min="1"  style="width:40px;"/>
                                </td>
                                
                                <td style="color: red;"> đ</td>
                                <td> 
                                    <img src="../uploads/20210430-200545GS.006049_FEATURE_70846.jpg" alt="" width="100px"/>
                                 </td>
                                 <td> </td>
                                 <td> </td>
                                 <td id="thanhtien<?php echo $value ?>"> </td>
                                 <td> 
                                     <a href="" class="btn btn-warning"> Xóa</a>
                                     <a class="btn btn-info update_quantity" rel="">Cập nhật</a>
                                 </td>
                            </tr>
                           
    
                        </tbody>
                      
                        <thead style="background-color: #d1d1d1;">
                                <th></th>
                                <th>Tông tiền</th>
                                <th></th>
                                <th></th>
                                <th> </th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th style="color: red;" id="tongtien"></th>
                                <th></th>
                        </thead>
                    </table>
                    <a href="#" class="btn btn-danger dathang" >Đặt hàng</a>
                </div>
                
            </form>
            </div>
        </div>
    </div>
</div>

