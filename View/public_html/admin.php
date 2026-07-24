<?php
session_start();

// 1. Xử lý Đăng xuất
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit();
}

// 2. Chặn role 3
if (!isset($_SESSION['login']) || $_SESSION['role'] == 3) {
    echo "<script>
            alert('Bạn không có quyền truy cập trang quản trị này!');
            window.location.href = 'index.php';
          </script>";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
       <meta charset="UTF-8">
       <title>Trang Quản Trị Admin</title>
       <link rel="stylesheet" href="./style/style.css">
       <style>
       /* Bổ sung một chút layout để chia cột Trái/Phải */
       .main {
              display: flex;
              min-height: 500px;
       }

       .left {
              width: 20%;
              background-color: #f4f4f4;
              border-right: 1px solid #ccc;
       }

       .right {
              width: 80%;
              padding: 20px;
       }

       .left-menu a {
              display: block;
              padding: 15px;
              border-bottom: 1px solid #ccc;
              text-decoration: none;
              color: #333;
              font-weight: bold;
       }

       .left-menu a:hover {
              background-color: #ddd;
       }

       table {
              width: 100%;
              border-collapse: collapse;
              margin-top: 10px;
       }

       table,
       th,
       td {
              border: 1px solid black;
       }

       th {
              background-color: #f2f2f2;
              padding: 10px;
       }

       td {
              padding: 8px;
              text-align: center;
       }

       td img {
              width: 50px;
              height: 50px;
              object-fit: contain;
       }
       </style>
</head>

<body>
       <div class="container">
              <div class="nav-img">
                     <img src="db/uploads/banner-top.PNG" alt="Banner" style="width: 100%;">
              </div>

              <div class="nav-top">
                     <ul>
                            <li><a href="admin.php">Trang chủ Quản trị</a></li>
                            <li><a href="index.php">Trang chủ Web</a></li>
                            <li><a href="?logout">Đăng xuất</a></li>
                     </ul>
              </div>

              <div class="main">
                     <div class="left">
                            <div class="left-menu">
                                   <a href="?thuonghieu">Quản lý Thương hiệu</a>
                                   <a href="?sanpham">Quản lý Sản phẩm</a>

                                   <?php if ($_SESSION['role'] == 1): ?>
                                   <a href="?taikhoan">Quản lý Tài khoản</a>
                                   <?php endif; ?>
                            </div>
                     </div>

                     <div class="right">
                            <?php
              if (isset($_GET['sanpham'])) {
                     include("View/vAdminSanPham.php");
              } elseif (isset($_GET['thuonghieu'])) {
                     include("View/vAdminThuongHieu.php");
              } elseif (isset($_GET['themsanpham'])) {
                     include("View/vThemSanPham.php");
              } elseif (isset($_GET['suasanpham'])) { 
                     include("View/vSuaSanPham.php"); 
              } elseif (isset($_GET['taikhoan'])) {
                    if ($_SESSION['role'] == 1) {
                        include("View/vAdminTaiKhoan.php");
                    } else {
                        echo "<h3 style='color:red;'>Lỗi: Bạn không có quyền truy cập chức năng Quản lý tài khoản!</h3>";
                    }
                } else {
                    // Trang chào mừng mặc định
                    $tenVaiTro = ($_SESSION['role'] == 1) ? "Sếp" : "Nhân viên quản lý sản phẩm";
                    echo "<h3>Chào mừng $tenVaiTro (" . $_SESSION['user_name'] . ") quay trở lại!</h3>";
                    echo "<p>Vui lòng chọn chức năng bên menu trái để làm việc.</p>";
                }
                ?>
                     </div>
              </div>

              <div class="footer" style="text-align: center; padding: 20px; background: #eee; margin-top: 10px;">
                     Hồ Minh Trọng - 23662271
              </div>
       </div>
</body>

</html>