<?php
// 1. Kết nối cơ sở dữ liệu / Database connection
$conn = new mysqli("localhost", "root", "", "ql_banhang");

if ($conn->connect_error) {
  die("Lỗi kết nối / Connection failed: " . $conn->connect_error);
}

// 2. Truy vấn lấy dữ liệu / Query to fetch data
// Dùng LEFT JOIN để lấy tên loại sản phẩm / Use LEFT JOIN to get category name
$sql = "SELECT s.masp, s.tensp, s.dongia, s.hinhanh, l.tenloai 
        FROM sanpham s 
        LEFT JOIN loaisanpham l ON s.maloai = l.maloai";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
  <title>Danh Sách Sản Phẩm</title>
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th,
    td {
      border: 1px solid #ddd;
      padding: 10px;
      text-align: center;
    }

    th {
      background-color: #f2f2f2;
    }

    img {
      width: 100px;
      height: auto;
      border-radius: 5px;
    }
  </style>
</head>

<body>

  <h2>Danh Sách Sản Phẩm / Product List</h2>

  <table>
    <tr>
      <th>Mã SP / ID</th>
      <th>Tên sản phẩm / Name</th>
      <th>Loại / Category</th>
      <th>Đơn giá / Price</th>
      <th>Hình ảnh / Image</th>
    </tr>

    <?php
    // 3. Hiển thị dữ liệu / Display data
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["masp"] . "</td>";
        echo "<td>" . htmlspecialchars($row["tensp"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["tenloai"]) . "</td>";
        echo "<td>" . number_format($row["dongia"], 0, ',', '.') . " VNĐ</td>";

        // Hiển thị ảnh từ thư mục uploads / Display image from uploads folder
        echo "<td><img src='uploads/" . htmlspecialchars($row["hinhanh"]) . "' alt='Lỗi ảnh'></td>";

        echo "</tr>";
      }
    } else {
      echo "<tr><td colspan='5'>Chưa có sản phẩm nào / No products found</td></tr>";
    }
    $conn->close();
    ?>
  </table>

</body>

</html>