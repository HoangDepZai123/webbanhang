<p>Thông tin vận chuyển</p>
<div class="container">
            <!-- Responsive Arrow Progress Bar -->
            <div class="arrow-steps clearfix">
            <div class="step done "> <span> <a href="index.php?quanly=giohang" >Giỏ hàng</a></span> </div>
                <div class="step current"> <span><a href="index.php?quanly=vanchuyen" >Vận chuyển</a></span> </div>
                <div class="step "> <span><a href="index.php?quanly=thongtinthanhtoan" >Thanh toán</a><span> </div>
                <div class="step "> <span><a href="index.php?quanly=donhangdadat" >Lịch sử đơn hàng</a><span> </div>
                
            </div>
            <div class="row">
                <h4>Thông tin vận chuyển</h4>
                <?php
                    if(isset($_POST['vanchuyen'])){
                        $name= $_POST['name'];
                        $phone=$_POST['phone'];
                        $address=$_POST['address'];
                        $note=$_POST['note'];
                        $id_dangky=$_SESSION['id_khachhang'];
                        $sql_vanchuyen = mysqli_query($mysqli,"INSERT INTO tbl_shiping(name,phone,address,note,id_dangky)VALUE('$name', '$phone', '$address','$note','$id_dangky' )");
                        if($sql_vanchuyen){
                            echo '<script>alert("Cập nhật vận chuyển thành công")</script>';
                        }
                    }
                ?>
                    <div class="col-md-4">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="email">Họ và tên</label>
                                <input type="text" name="name" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="email">Số điện thoại</label>
                                <input type="text" name="phone" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Địa chỉ</label>
                                <input type="text" name="address" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="email">Ghi chú</label>
                                <input type="text" name="note" class="form-control" >
                            </div>
                            <button type="submit" name="vanchuyen" class="btn btn-primary">Cập nhật vận chuyển</button>
                            </form>
                    </div>
                    <!-- Giỏ hàng -->
                    <table class="table" style="width:100%; text-align:center;border-collapse:collapse;" border="1 ">
        <tr>
            <th>STT</th>
            <th>Mã</th>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Số lượng</th>
            <th>Giá sản phẩm</th>
            <th>Thành tiền</th>
          
            
        </tr>

        <?php
            if(isset($_SESSION['cart'])){

                $i=0;
            $tongtien = 0;
                foreach($_SESSION['cart'] as $cart_item){
                    $thanhtien = $cart_item['soluong'] * $cart_item['giasp'];
                    $tongtien+=$thanhtien;
                    $i++;
        ?>
        
        <tr>
        
            <td><?php echo $i; ?></td>
            <td><?php echo $cart_item['masp']; ?></td>
            <td><?php echo $cart_item['tensanpham']; ?></td>
            <td><img class="rounded-circle" src="admincp/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh']; ?>" border-radius="50%" width="100px"></td>
            <td>
            <a class="btn btn-link px-2"href="pages/main/themgiohang.php?tru=<?php echo $cart_item['id'] ?>"><i class="fas fa-minus"></i></i></a>
                
            <?php echo $cart_item['soluong']; ?>

                
                <a class="btn btn-link px-2" href="pages/main/themgiohang.php?cong=<?php echo $cart_item['id'] ?>"><i class="fas fa-plus"></i></a>
                
        
        
            </td>
            <td><?php echo number_format($cart_item['giasp']).'VND'; ?></td>
            <td><?php echo number_format($thanhtien).'VND'?></td>
        
        </tr>
        <?php
                }
        ?>
        <tr>

        <td  colspan="8">
            <h3 class="fw-bold text-center float-end">Tổng tiền <?php echo number_format($tongtien).'VND' ?> </h3>
            <div style="clear:both"></div>

            <?php
                if(isset($_SESSION['dangky'])){
                    ?> 
                    <div class="d-flex flex-row gap-3">
                    <p><a class="btn btn-primary" href="index.php?quanly=vanchuyen">Hình thức vận chuyển</a></p>
  

                    </div>
                        
                    <?php
                }else {
                    ?>
                        <p><a class="btn btn-success" href="index.php?quanly=dangky">Đăng ký để đặt hàng</a></p>
                    <?php
                }
            ?>
            
            
           
        </td>


        </tr>

        <?php

            }else{
        ?>
        <tr>

        <td colspan="8"><p>Hiện tại giỏ hàng trống </p></td>

        </tr>
        <?php
            }
        ?>     

        </table>
            </div>
</div>