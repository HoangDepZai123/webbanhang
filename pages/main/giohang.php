
        <h5 style="font-family: cursive;"> Giỏ Hàng 
                <?php
            if(isset($_SESSION['dangky'])){
                echo 'của '.'<span style="color:red">'.$_SESSION['dangky'].'</span>';
               
            }

        ?>
        </h5>

        <?php
            if(isset($_SESSION['cart'])){

            }

        ?>

            <div class="container">
            <!-- Responsive Arrow Progress Bar -->
            <div class="arrow-steps clearfix">
                <div class="step current"> <span> <a href="index.php?quanly=giohang" >Giỏ hàng</a></span> </div>
                <div class="step "> <span><a href="index.php?quanly=vanchuyen" >Vận chuyển</a></span> </div>
                <div class="step "> <span><a href="index.php?quanly=thongtinthanhtoan" >Thanh toán</a><span> </div>
                <div class="step "> <span><a href="index.php?quanly=donhangdadat" >Lịch sử đơn hàng</a><span> </div>
                
            </div>
            <!-- end Responsive Arrow Progress Bar -->
            <!-- <div class="nav clearfix">
                <a href="#" class="prev">Quay lại</a> |
                <a href="#" class="next pull-right">Tiếp theo</a>
            </div> -->
            </div>




        <table class="table" style="width:100%; text-align:center;border-collapse:collapse;" border="1 ">
        <tr>
            <th>STT</th>
            <th>Mã</th>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Số lượng</th>
            <th>Giá sản phẩm</th>
            <th>Thành tiền</th>
            <th>Quản lý</th>
            
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
            <td><a class="btn btn-danger" href="pages/main/themgiohang.php?xoa=<?php echo $cart_item['id'] ?>">Xóa</a> </td>
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
                        <p><a class="btn btn-danger" href="pages/main/themgiohang.php?xoatatca=1">Xóa tất cả </a> </p><br/>

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