<?php
include("Controller/cThuongHieu.php");
$p = new controlThuongHieu();
$kq = $p->getAllType();
if (!$kq) {
       echo "Không có dữ liệu";
} else {
       echo "<ul class='brand-list'>";
       while ($r = mysqli_fetch_assoc($kq)) {
              echo "<li><a href='index.php?idloai=" . $r['maloai'] . "'>" . $r['tenloai'] . "</a></li>";
       }
       echo "</ul>";
}
?>

<style>
       .left {
              background-color: #49ad9d;
              padding-top: 20px;
       }

       .brand-list {
              padding: 0;
              margin: 0;
       }

       .brand-list li {
              list-style: none;
              border-bottom: 1px solid rgba(255, 255, 255, 0.2);
       }

       .brand-list a {
              text-decoration: none;
              color: white;
              font-size: 20px;
              display: block;
              padding: 15px 20px;
       }

       .brand-list a:hover {
              background-color: #388e81;
       }
</style>