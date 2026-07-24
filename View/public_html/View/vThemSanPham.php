<?php
include_once("Controller/cThuongHieu.php");
$pThuongHieu = new controlThuongHieu();
$kqThuongHieu = $pThuongHieu->getAllType(); 
?>

<h2>Thêm Sản Phẩm Mới</h2>
<form action="" method="POST" enctype="multipart/form-data">
    <table border="1" cellpadding="8" cellspacing="0" style="width: 500px; border-collapse: collapse;">
        
        <tr>
            <th colspan="2" style="text-align:center; background-color:#f2f2f2;">
                THÊM SẢN PHẨM
            </th>
        </tr>

        <tr>
            <td>Tên sản phẩm</td>
            <td>
                <input type="text" name="txtTenSP" required style="width: 100%;">
            </td>
        </tr>

        <tr>
            <td>Giá bán</td>
            <td>
                <input type="number" name="txtGia" required style="width: 100%;">
            </td>
        </tr>

        <tr>
            <td>Hình ảnh</td>
            <td>
                <input type="file" name="fileHinhAnh" accept="image/*" required style="width: 100%;">
            </td>
        </tr>

        <tr>
            <td>Loại sản phẩm</td>
            <td>
                <select name="cboLoai" required style="width: 100%; padding: 5px;">
                    <option value="">-- Chọn thương hiệu --</option>
                    <?php
                    if ($kqThuongHieu) {
                        while ($r = mysqli_fetch_assoc($kqThuongHieu)) {
                            echo "<option value='".$r['maloai']."'>".$r['tenloai']."</option>";
                        }
                    }
                    ?>
                </select>
            </td>
        </tr>

        <tr>
            <td colspan="2" style="text-align:center;">
                <button type="submit" name="btnThemSP">Lưu Sản Phẩm</button>
                <button type="reset">Nhập Lại</button>
            </td>
        </tr>

    </table>
</form>

<?php
if (isset($_POST['btnThemSP'])) {
    include_once("Controller/cSanPham.php");
    $p = new controlSanPham();
    
    $tensp = $_POST['txtTenSP'];
    $gia = $_POST['txtGia'];
    $maloai = $_POST['cboLoai'];
    $fileHinhAnh = $_FILES['fileHinhAnh']; // Dùng $_FILES để lấy file
    
    $kq = $p->addSanPham($tensp, $gia, $fileHinhAnh, $maloai);
    if ($kq) {
        echo "<script>alert('Thêm sản phẩm thành công!'); window.location.href='admin.php?sanpham';</script>";
    } else {
        echo "<script>alert('Thêm thất bại. Kiểm tra lại thông tin hoặc thư mục uploads!');</script>";
    }
}
?>