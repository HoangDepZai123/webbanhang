<?php
	$sql_pro= "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_danhmuc= '$_GET[id]' ORDER BY id_sanpham DESC";
	$query_pro = mysqli_query($mysqli,$sql_pro);

	$sql_cate= "SELECT * FROM tbl_danhmuc WHERE tbl_danhmuc.id_danhmuc= '$_GET[id]' LIMIT 1";
	$query_cate = mysqli_query($mysqli,$sql_cate);
	$row_title=mysqli_fetch_array($query_cate);
?>
<h5 style="font-family: cursive;" >Danh Mục: <?php echo  $row_title['tendanhmuc']??'Hien tai trong' ?></h5>
	<ul class="product_list">
				<?php
					while($row_pro = mysqli_fetch_array($query_pro)){
				?>
					<li>
						<a href="index.php?quanly=sanpham&id=<?php echo $row_pro['id_sanpham'] ?>">
						<img src="admincp/modules/quanlysp/uploads/<?php echo $row_pro['hinhanh'] ?>">
						<p class="title_product"><?php echo $row_pro['tensanpham']?></p>
						<p class="price_product"><?php echo number_format($row_pro['giasp']).'VND' ?></p>
						</a>
					</li>
				<?php
					}
				?>
					
	</ul>
