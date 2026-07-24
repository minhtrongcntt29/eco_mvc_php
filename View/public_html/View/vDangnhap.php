<form action="" method="POST" style="margin: 20px; padding: 20px; border: 1px solid #ccc; width: 300px;">
     <h3>Đăng nhập Admin</h3>
     <input type="text" name="txtUser" placeholder="Tên đăng nhập" required style="margin-bottom: 10px; width: 100%;"><br>
     <input type="password" name="txtPass" placeholder="Mật khẩu" required style="margin-bottom: 10px; width: 100%;"><br>
     <button type="submit" name="btnLogin">Đăng nhập</button>
</form>

<?php
if (isset($_POST['btnLogin'])) {
     include_once("Controller/cTaiKhoan.php");
     $p = new controlTaiKhoan();
     $kq = $p->login($_POST['txtUser'], $_POST['txtPass']); // Gọi hàm login mới
     
     if ($kq) {
          if ($_SESSION['role'] == 1 || $_SESSION['role'] == 2) {
               header("Location: admin.php");
          } else {
               header("Location: index.php");
          }
          exit();
     } else {
          echo "<script>alert('Sai tài khoản hoặc mật khẩu!');</script>";
     }
}
?>
