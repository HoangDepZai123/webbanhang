<?php
	$sql_bv= "SELECT * FROM tbl_baiviet WHERE tbl_baiviet.id_danhmuc= '$_GET[id]' ORDER BY id DESC";
	$query_bv = mysqli_query($mysqli,$sql_bv);

	$sql_cate= "SELECT * FROM tbl_danhmucbaiviet WHERE tbl_danhmucbaiviet.id_baiviet= '$_GET[id]' LIMIT 1";
	$query_cate = mysqli_query($mysqli,$sql_cate);
	$row_title=mysqli_fetch_array($query_cate);
?>
<h5 style="font-family: cursive;" >Danh Mục Bài Viết: <?php echo  $row_title['tendanhmuc_baiviet']??'Hien tai trong' ?></h5>
	<ul class="product_list">
				<?php
					while($row_bv = mysqli_fetch_array($query_bv)){
				?>
					<li>
						<a href="index.php?quanly=baiviet&id=<?php echo $row_bv['id'] ?>">
						<img src="admincp/modules/quanlybaiviet/uploads/<?php echo $row_bv['hinhanh'] ?>">
						<p class="title_product"><?php echo $row_bv['tenbaiviet']?></p>

						</a>
                        <div style="text-align:center;" class="title_product"><?php echo $row_bv['tomtat'] ?></div>

					</li>
				<?php
					}
				?>
					
	</ul>
