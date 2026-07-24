<?php
// Chặn nếu không phải admin role=1
if (!isset($_SESSION['role']) || $_SESSION['role'] != 1) {
    echo "<script>alert('Bạn không có quyền chỉnh sửa sản phẩm!'); window.location.href='admin.php?sanpham';</script>";
    exit();
}

include_once("Controller/cSanPham.php");
$p = new controlSanPham();

// Lấy thông tin sản phẩm cũ để hiển thị lên form
$masp = $_GET['suasanpham'];
$kq = $p->getProductById($masp);
if (!$kq || mysqli_num_rows($kq) == 0) {
    echo "Không tìm thấy sản phẩm!";
    exit();
}
$row = mysqli_fetch_assoc($kq);
?>

<h2>Chỉnh Sửa Sản Phẩm</h2>
<form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="txtMaSP" value="<?php echo $row['masp']; ?>">
    
    <table border="1" cellpadding="8" cellspacing="0" style="width: 600px; border-collapse: collapse;">
        <tr>
            <th colspan="2" style="text-align:center; background-color:#f2f2f2;">THÔNG TIN SẢN PHẨM</th>
        </tr>
        <tr>
            <td style="width: 30%;">Tên sản phẩm</td>
            <td>
                <input type="text" name="txtTenSP" required style="width: 100%;" value="<?php echo $row['tensp']; ?>">
            </td>
        </tr>
        <tr>
            <td>Giá bán</td>
            <td>
                <input type="number" name="txtGia" required style="width: 100%;" value="<?php echo $row['dongia']; ?>">
            </td>
        </tr>
        <tr>
            <td>Thương hiệu (Loại)</td>
            <td>
                <input type="text" style="width: 100%; background: #e9ecef; color: #666;" 
                       value="<?php echo $row['maloai'] . ' - ' . $row['tenloai']; ?>" readonly disabled>
            </td>
        </tr>
        <tr>
            <td>Hình ảnh hiện tại</td>
            <td>
                <img src="db/uploads/<?php echo $row['hinhanh']; ?>" style="width: 100px; height: 100px; object-fit: contain;">
                <p style="font-size: 12px; color: gray;">(Để trống nếu không muốn đổi ảnh)</p>
                <input type="file" name="fileHinhAnh" accept="image/*" style="width: 100%;">
            </td>
        </tr>
        <tr>
            <td colspan="2" style="text-align:center;">
                <button type="submit" name="btnSuaSP">Cập Nhật</button>
                <button type="button" onclick="window.location.href='admin.php?sanpham'">Hủy bỏ</button>
            </td>
        </tr>
    </table>
</form>

<?php
// Xử lý khi bấm nút Cập Nhật
if (isset($_POST['btnSuaSP'])) {
    $ma = $_POST['txtMaSP'];
    $ten = $_POST['txtTenSP'];
    $gia = $_POST['txtGia'];
    $file = $_FILES['fileHinhAnh'];
    
    $kqSua = $p->editSanPham($ma, $ten, $gia, $file);
    if ($kqSua) {
        echo "<script>alert('Cập nhật sản phẩm thành công!'); window.location.href='admin.php?sanpham';</script>";
    } else {
        echo "<script>alert('Cập nhật thất bại. Vui lòng kiểm tra lại!');</script>";
    }
}
?>