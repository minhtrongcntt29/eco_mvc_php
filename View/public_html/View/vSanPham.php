<?php
include_once("Controller/cSanPham.php");
$p = new controlSanPham();

// 1. Nếu người dùng chọn xem theo loại (thương hiệu)
if (isset($_REQUEST['idloai'])) {
       $maloai = $_REQUEST['idloai'];
       $kq = $p->getProductByType($maloai);
}
// 2. Các trường hợp còn lại (tìm kiếm hoặc hiển thị tất cả mặc định)
else {
       $kq = $p->getDanhSachSanPham();
}

// 3. Hiển thị kết quả
if (!$kq || mysqli_num_rows($kq) == 0) {
       echo "<p>Không tìm thấy sản phẩm nào.</p>";
} else {
       echo "<div class='product-grid'>";
       while ($r = mysqli_fetch_assoc($kq)) {
              echo "<div class='product-item'>";
              echo "<img src='db/uploads/" . $r['hinhanh'] . "' alt='" . $r['tensp'] . "'>";
              echo "<h3>" . $r['tensp'] . "</h3>";
              echo "<p class='price'>" . number_format($r['dongia'], 0, ',', '.') . " VNĐ</p>";
              echo "</div>";
       }
       echo "</div>";
}
?>

<style>
       .product-grid {
              display: flex;
              flex-wrap: wrap;
              gap: 10px;
       }

       .product-item {
              width: calc(25% - 10px);
              border: 1px solid #ddd;
              padding: 10px;
              text-align: center;
              box-sizing: border-box;
       }

       .product-item img {
              width: 100%;
              height: 150px;
              object-fit: contain;
       }
</style>