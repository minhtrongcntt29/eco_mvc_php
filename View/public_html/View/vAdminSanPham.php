<?php
include_once("Controller/cSanPham.php");
$p = new controlSanPham();
$kq = $p->getAllProductAdmin(); 
// Xử lý yêu cầu xóa
if (isset($_GET['idXoa'])) {
    //Chỉ Admin (Role 1) mới được xóa
    if (isset($_SESSION['role']) && $_SESSION['role'] == 1) {
        $idXoa = $_GET['idXoa'];
        $kqXoa = $p->removeSanPham($idXoa);
        
        if ($kqXoa) {
            echo "<script>alert('Đã xóa sản phẩm thành công!'); window.location.href='admin.php?sanpham';</script>";
        } else {
            echo "<script>alert('Xóa thất bại! Vui lòng thử lại.');</script>";
        }
    } else {
        echo "<script>alert('Bạn không có quyền xóa sản phẩm!'); window.location.href='admin.php?sanpham';</script>";
    }
}
echo "<h2>Quản lý Sản phẩm</h2>";
echo "<a href='?themsanpham' style='display:block; margin-bottom:10px;'> Thêm sản phẩm mới</a>";
if (!$kq || mysqli_num_rows($kq) == 0) {
  echo "Không có dữ liệu";
} else {
  echo "<table>";
  echo "<tr>
            <th>Mã SP</th>
            <th>Tên SP</th>
            <th>Giá Bán</th>
            <th>Hình Ảnh</th>
            <th>Thương Hiệu</th>
            <th>Thao tác</th>
          </tr>";

  while ($r = mysqli_fetch_assoc($kq)) {
    $giaGoc = isset($r['giagoc']) ? number_format($r['giagoc'], 0, ',', '.') : 0;
    $giaBan = isset($r['dongia']) ? number_format($r['dongia'], 0, ',', '.') : 0;

    echo "<tr>";
    echo "<td>" . $r['masp'] . "</td>"; 
    echo "<td>" . $r['tensp'] . "</td>";
    echo "<td>" . $giaBan . "</td>";
    echo "<td><img src='db/uploads/" . $r['hinhanh'] . "'></td>";
    echo "<td>" . $r['tenloai'] . "</td>"; 
    echo "<td>";
    // Chỉ Role 1 (Super Admin) mới thấy nút sửa
    if (isset($_SESSION['role']) && $_SESSION['role'] == 1) {
        echo "<a href='?suasanpham=" . $r['masp'] . "'>Sửa</a> | ";
    }
    echo "<a href='?sanpham&idXoa=" . $r['masp'] . "' onclick='return confirm(\"Bạn có chắc chắn muốn xóa sản phẩm này không?\")' style='color:red;'>Xóa</a>";
    echo "</td>";
  }
  echo "</table>";
}
