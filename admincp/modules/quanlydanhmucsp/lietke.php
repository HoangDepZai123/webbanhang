<?php
    $sql_lietke_danhmucsp="SELECT*FROM tbl_danhmuc";
    $query_lietke_danhmucsp=mysqli_query($mysqli,$sql_lietke_danhmucsp);
?>
<p>Liệt kê danh mục sản phẩm</p>
<table style= "width:50%" border="1" style="border-collapse:collapse;">
  <tr>
    <th>Id</th>
    <th>Tên danh mục</th>
    <th>Quản lý</th>
    
  </tr>

  <?php
  while($row = mysqli_fetch_array($query_lietke_danhmucsp)){
  ?>

  <tr>
    <td>     <?php echo $row['id_danhmuc'] ?>           </td>
    <td><?php echo $row['tendanhmuc'] ?> </td>
    <td><a href ="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $row['id_danhmuc']?>">Xóa</a>|<a href="?action=quanlydanhmucsanpham&query=sua&iddanhmuc=<?php echo $row['id_danhmuc']?>">Sửa</a></td>
   
  </tr>
<?php
}
?>
 
</table>