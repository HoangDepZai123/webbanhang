<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Website</title>
    <style>
        /* CSS Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body Styles */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: white;
        }

        /* Container Styles */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }



        /* Article Styles */
        article {
            margin-top: 20px;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        article img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }

        article h4 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        article p.title_product {
            font-style: italic;
            margin-bottom: 15px;
        }

        article div.title_product {
            text-align: center; /* Đổi thành center để căn giữa */
        }

        
    </style>
</head>
<body>



<div class="container">
    <?php
        $sql_bv= "SELECT * FROM tbl_baiviet WHERE tbl_baiviet.id= '$_GET[id]' LIMIT 1 ";
        $query_bv = mysqli_query($mysqli,$sql_bv);
        $query_bv_all = mysqli_query($mysqli,$sql_bv);
        $row_bv_title=mysqli_fetch_array($query_bv);
    ?>
    <h3 style="font-family: cursive;" >Bài Viết:<span style="text-align:center;text-transform:uppercase;"> <?php echo  $row_bv_title['tenbaiviet'] ?></span></h3>
    <ul class="baiviet">
        <?php
            while($row_bv= mysqli_fetch_array($query_bv_all)){
        ?>
            <li>
                <h4><?php echo $row_bv['tenbaiviet']?></h4>
                <img src="admincp/modules/quanlybaiviet/uploads/<?php echo $row_bv['hinhanh'] ?>">
                <p class="title_product"><?php echo $row_bv['tomtat']?></p>
                <div class="title_product"><?php echo $row_bv['noidung'] ?></div>
            </li>
        <?php
            }
        ?>
    </ul>
</div>



</body>
</html>
