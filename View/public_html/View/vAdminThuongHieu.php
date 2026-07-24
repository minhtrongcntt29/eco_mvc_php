<?php
include_once("Controller/cThuongHieu.php");
$p = new controlThuongHieu();
$kq = $p->getAllType();

echo "<h2>Quản lý Thương hiệu</h2>";

if (!$kq) {
  echo "Không có dữ liệu";
} else {
  echo "<table>";
  echo "<tr>
            <th>Mã Loại</th>
            <th>Tên Loại</th>
            <th>Thao tác</th>
          </tr>";

  while ($r = mysqli_fetch_assoc($kq)) {
    echo "<tr>";
    echo "<td>" . $r['maloai'] . "</td>";
    echo "<td>" . $r['tenloai'] . "</td>";
    echo "<td><a href='#'>Sửa</a> | <a href='#'>Xóa</a></td>";
    echo "</tr>";
  }
  echo "</table>";
}
