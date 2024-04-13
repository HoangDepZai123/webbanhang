<?php
    
    if(isset($_POST['dangky'])){
        $tenkhachhang = $_POST['hovaten'];
        $email = $_POST['email'];
        $dienthoai = $_POST['dienthoai'];
        $matkhau = md5($_POST['matkhau']);
        $diachi = $_POST['diachi'];
       $sql_dangky=mysqli_query($mysqli,"INSERT INTO tbl_dangky(tenkhachhang,email,diachi,matkhau,dienthoai) VALUE('".$tenkhachhang."','".$email."','".$diachi."','".$matkhau."','".$dienthoai."')");
        if($sql_dangky){
            echo'<p style="color:green">Bạn đã đăng ký thành công</p>';
          
            $_SESSION['dangky']=$tenkhachhang;
            $_SESSION['email']=$email;
            
            $_SESSION['id_khachhang']=mysqli_insert_id($mysqli);

            header('Location:index.php?quanly=giohang');
        }


    }
?>
<style>
    form table {
        width: 40%;
        border-collapse: collapse;
    }

    form table tr td {
        padding: 10px;
    }

    form table tr td:first-child {
        text-align: right;
        font-weight: bold;
        width: 30%;
    }

    form table tr td input[type="text"],
    form table tr td input[type="password"],
    form table tr td input[type="submit"] {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 14px;
    }

    form table tr td input[type="submit"] {
        background-color: #007bff;
        color: #fff;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    form table tr td input[type="submit"]:hover {
        background-color: #0056b3;
    }

    form table tr td a {
        text-decoration: none;
        color: #007bff;
        transition: color 0.3s ease;
    }

    form table tr td a:hover {
        color: #0056b3;
    }

    p.message {
        color: green;
        font-weight: bold;
        text-align: center;
    }
</style>

<p>Đăng ký i</p>
<style type="text/css">
    table.dangky tr td{
        padding:5px;
    }
</style>
<form action="" method="POST">
<table border="1" width="50%" style="border-collapse:collapse";>
    <tr>
        <td>Họ và tên</td>
        <td><input type="text" size="50" name ="hovaten"></td>
    </tr>
    <tr>
        <td>Email</td>
        <td><input type="text" size="50" name ="email"></td>
    </tr>
    <tr>
        <td>Điện thoại</td>
        <td><input type="text" size="50" name ="dienthoai"></td>
    </tr>
    <tr>
        <td>Địa chỉ</td>
        <td><input type="text" size="50" name ="diachi"></td>
    </tr>
    <tr>
        <td>Mật khẩu</td>
        <td><input type="text" size="50" name ="matkhau"></td>
    </tr>
    <tr>
       
        <td><input type="submit"  name ="dangky" value="Đăng ký"></td>
        <td><a href="index.php?quanly=dangnhap">Đăng nhập</a></td>
    </tr>
</table>
</form>