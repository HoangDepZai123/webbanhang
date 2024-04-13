<?php
$products_per_page = 8; // Số sản phẩm trên mỗi trang

if(isset($_GET['trang'])){
    $page = $_GET['trang'];
}else{
    $page = 1;
}

$begin = ($page - 1) * $products_per_page;

$sql_pro= "SELECT * FROM tbl_sanpham, tbl_danhmuc WHERE tbl_sanpham.id_danhmuc= tbl_danhmuc.id_danhmuc ORDER BY tbl_sanpham.id_sanpham DESC LIMIT $begin,$products_per_page";
$query_pro = mysqli_query($mysqli, $sql_pro);
?>

<h5 style="font-family: cursive;">Sản phẩm mới</h5>
<ul class="product_list">
    <?php while($row = mysqli_fetch_array($query_pro)){ ?>
        <li>
            <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
                <img src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>">
                <p class="title_product"><?php echo $row['tensanpham']?></p>
                <p class="text-muted text-center"><?php echo $row['tendanhmuc']?> </p>

                <p class="price_product"><?php echo number_format($row['giasp']).'VND' ?></p>
            </a>
        </li>
    <?php } ?>
</ul>
<div style="clear:both;"></div>

<style type="text/css">
    ul.list_trang{
        padding:0;
        margin:0;
        list-style:none;
    }   
    ul.list_trang li{
        float:left;
        padding:5px 13px;
        margin:5px;
        background:burlywood;
        display:block;
    }
    ul.list_trang li a{
        color: #000;
        text-align:center;
        text-decoration:none;
    }
</style>

<p>=======================================================================================================================</p>
<?php
    $sql_trang = mysqli_query($mysqli, "SELECT COUNT(*) as total FROM tbl_sanpham");
    $row_count = mysqli_fetch_assoc($sql_trang)['total'];
    $total_pages = ceil($row_count / $products_per_page);
?>
<ul class="list_trang">
    <?php for($i = 1; $i <= $total_pages; $i++){ ?>
        <li <?php if($i==$page){echo 'style="background:brown;"';}else{echo '';}?>><a href="index.php?trang=<?php echo $i ?>" ><?php echo $i ?></a></li>
    <?php } ?>
</ul>
