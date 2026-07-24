<?php
session_start();

if (isset($_GET['logout'])) {
       session_destroy();
       header("Location: index.php");
       exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Eco - Smartphone</title>
       <link rel="stylesheet" href="./style/style.css">
       <style>
       .search-item {
              margin: 7px;
              margin-left: 620px;
       }
       </style>
</head>

<body>
       <div class="container">
              <div class="nav-img">
                     <img src="db/uploads/banner-top.PNG" alt="Banner">
              </div>

              <div class="nav-top">
                     <ul>
                            <li><a href="index.php">Trang chủ</a></li>

                            <?php if (isset($_SESSION['login'])): ?>
                            <?php if (isset($_SESSION['role']) && ($_SESSION['role'] == 1 || $_SESSION['role'] == 2)): ?>
                            <li><a href="admin.php">Quản trị</a></li>
                            <?php endif; ?>

                            <li><a href="?logout">Đăng xuất</a></li>
                            <?php else: ?>
                            <li><a href="index.php?login">Đăng nhập</a></li>
                            <?php endif; ?>

                            <li class="search-item">
                                   <form action="index.php" method="GET">
                                          <input type="text" name="txtSearch" placeholder="Tìm kiếm...">
                                          <button type="submit">Tìm</button>
                                   </form>
                            </li>
                     </ul>
              </div>

              <div class="main">
                     <div class="left">
                            <?php
                            if (isset($_GET['login'])) {
                                   include("View/vDangnhap.php");
                            } else {
                                   include("View/vThuongHieu.php");
                            }
                            ?>
                     </div>
                     <div class="right">
                            <?php
                            if (!isset($_GET['login'])) {
                                   include("View/vSanPham.php");
                            }
                            ?>
                     </div>
              </div>

              <div class="footer">Hồ Minh Trọng - 23662271</div>
       </div>
</body>

</html>