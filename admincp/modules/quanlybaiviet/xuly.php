<?php
include('../../config/config.php');

$tenbaiviet = $_POST['tenbaiviet'];

// Kiểm tra xem có hình ảnh mới được tải lên không
if(isset($_FILES['hinhanh']) && $_FILES['hinhanh']['error'] == 0) {
    $hinhanh = $_FILES['hinhanh']['name'];
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    $hinhanh_time = time() . '_' . $hinhanh;
} else {
    // Giữ nguyên hình ảnh cũ nếu không có hình mới được tải lên
    $sql_select = "SELECT hinhanh FROM tbl_baiviet WHERE id = '$_GET[idbaiviet]' LIMIT 1";
    $query_select = mysqli_query($mysqli, $sql_select);
    $row = mysqli_fetch_array($query_select);
    $hinhanh_time = $row['hinhanh'];
}

$tomtat = $_POST['tomtat'];
$noidung = $_POST['noidung'];
$tinhtrang = $_POST['tinhtrang'];
$danhmuc = $_POST['danhmuc'];

if (isset($_POST['thembaiviet'])) {
    // Thêm bài viết
    $sql_them = "INSERT INTO tbl_baiviet(tenbaiviet, hinhanh, tomtat, noidung, tinhtrang, id_danhmuc) VALUE ('" . $tenbaiviet . "' , '" . $hinhanh_time . "','" . $tomtat . "','" . $noidung. "','" . $tinhtrang . "','" . $danhmuc . "')";
    mysqli_query($mysqli, $sql_them);
    move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh_time);
    header('Location:../../index.php?action=quanlybaiviet&query=them');
} elseif (isset($_POST['suabaiviet'])) {
    // Sửa bài viết
    $sql_update = "UPDATE tbl_baiviet SET tenbaiviet='" . $tenbaiviet . "',hinhanh='".$hinhanh_time ."',tomtat='".$tomtat."',noidung='".$noidung."', tinhtrang='" . $tinhtrang . "', id_danhmuc='" . $danhmuc . "' WHERE id= '$_GET[idbaiviet]'";
    mysqli_query($mysqli, $sql_update);
    
    // Chỉ xóa hình ảnh cũ nếu hình mới được tải lên
    if(isset($_FILES['hinhanh']) && $_FILES['hinhanh']['error'] == 0) {
        $sql_select = "SELECT hinhanh FROM tbl_baiviet WHERE id= '$_GET[idbaiviet]' LIMIT 1";
        $query_select = mysqli_query($mysqli, $sql_select);
        $row = mysqli_fetch_array($query_select);
        unlink('uploads/' . $row['hinhanh']);
    }
    
    // Di chuyển hình mới vào thư mục uploads
    move_uploaded_file($hinhanh_tmp, 'uploads/' . $hinhanh_time);
    header('Location:../../index.php?action=quanlybaiviet&query=them');
} else {
    // Xóa bài viết
    $id = $_GET['idbaiviet'];
    $sql = "SELECT * FROM tbl_baiviet WHERE id = '$id' LIMIT 1";
    $query = mysqli_query($mysqli, $sql);
    while ($row = mysqli_fetch_array($query)) {
        unlink('uploads/' . $row['hinhanh']);
    }

    $sql_xoa = "DELETE FROM tbl_baiviet WHERE id='" . $id . "'";
    mysqli_query($mysqli, $sql_xoa);
    header('Location:../../index.php?action=quanlybaiviet&query=them');
}
?>
