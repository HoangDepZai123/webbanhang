<?php
session_start();
include("../../admincp/config/config.php");
require('../../mail/sendmail.php');
$id_khachhang = $_SESSION['id_khachhang'];
$code_order = rand(0,9999);
$insert_cart="INSERT INTO tbl_cart(id_khachhang,code_cart,cart_status) VALUE('" .$id_khachhang."','".$code_order. "',1)";
$cart_query =mysqli_query($mysqli,$insert_cart);
if($cart_query){
    $total_price = 0; // Khởi tạo biến tổng số tiền
    foreach($_SESSION['cart'] as $key => $value){
        $id_sanpham =$value['id'];
        $soluong = $value['soluong'];
        $insert_order_details = "INSERT INTO tbl_cart_details(id_sanpham,code_cart,soluongmua) VALUE('" .$id_sanpham."','".$code_order. "','".$soluong."')";
        mysqli_query($mysqli,$insert_order_details);
        $total_price += $value['giasp'] * $soluong; // Tính tổng số tiền
    }
    $tieude = "Đặt hàng DREW HOUSE";
    $noidung= "<p>Cảm ơn quý khách đã đặt hàng. Mã đơn hàng của quý khách là: ".$code_order."</p>";
    $noidung .= "<h4>Đơn hàng của bạn bao gồm: </h4>";
    foreach($_SESSION['cart'] as $key => $val){
        $noidung.="<ul style='border:1px solid pink; margin:10px;'>
                         <li>Tên sản phẩm: ".$val['tensanpham']."</li>
                         <li>Mã sản phẩm: ".$val['masp']."</li>
                         <li>Giá sản phẩm: ".number_format($val['giasp'],0,',','.')."</li>
                         <li>Số lượng: ".$val['soluong']."</li>
            </ul>";
    }
    // Thêm dòng tổng số tiền vào nội dung email
    $noidung .= "<p><strong>Tổng số tiền: </strong>".number_format($total_price, 0, ',', '.')." VNĐ</p>";
    
    $maildathang=$_SESSION['email'];
    $mail = new Mailer();
    $mail->dathangmail($tieude,$noidung,$maildathang);

}
unset($_SESSION['cart']);
header('Location:../../index.php?quanly=camon');
?>
