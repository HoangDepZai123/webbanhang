<?php
    session_start();
    include('config/config.php');
    if(isset($_POST['dangnhap'])){
        $taikhoan = $_POST['username'];
        $matkhau = md5($_POST['password']);
        $sql="SELECT * FROM tbl_admin WHERE username='".$taikhoan."' AND password='".$matkhau."' LIMIT 1  ";
        $row = mysqli_query($mysqli,$sql);
        $count = mysqli_num_rows($row);
        if($count>0){
            $_SESSION['dangnhap']=$taikhoan;
            header("Location:index.php");

        }else{
            echo '<script> alert("Tài khoản hoặc mật khẩu không chính xác nhe")   </script>';
            header("Location:login.php");
        }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Login</title>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: pink;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-image: url("../images/background.jpg");
    }
    .login-container {
        width: 300px;
        background-color: pink;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0px 0px 5px 5px black;
    }
    .login-container h2 {
        text-align: center;
        margin-bottom: 20px;
    }
    .login-container input[type="text"],
    .login-container input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
    .login-container input[type="submit"] {
        width: 100%;
        background-color: black;
        color: #fff;
        padding: 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    .login-container input[type="submit"]:hover {
        background-color: #ffc001;
        color:black;
    }
</style>
</head>
<body>

<div class="login-container">
    
    <h2>Admin nè con</h2>
    <form action="" method="POST">
        <input type="text" name="username" placeholder="Tài Khoản" required>
        <input type="password" name="password" placehoLder="Mật Khẩu" required>
        <input type="submit" name="dangnhap" value="DÔ">
    </form>
</div>

</body>
</html>
