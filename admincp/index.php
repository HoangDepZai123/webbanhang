
<!DOCTYPE html>
<html lang="en">
<head>
<?php
    session_start();
    if(!isset($_SESSION['dangnhap'])){
        header('Location:login.php');
    }
?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
    <link rel="stylesheet" type="text/css" href="css/stylesadmincp.css">
    

</head>
<body>
    <h3 class="tittle_admin"> Xin chào các thần dân của ta ✌🤞</h3>
    <div class="wrapper">
        <?php
            include("config/config.php");
            include("modules/header.php");
            include("modules/menu.php");
            include("modules/main.php");
            include("modules/footer.php");
        ?>
	</div>	
    <script type="text/javascript"  src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
                      CKEDITOR.replace('tomtat');
                      CKEDITOR.replace('noidung');
                </script>
    
</body>
</html>