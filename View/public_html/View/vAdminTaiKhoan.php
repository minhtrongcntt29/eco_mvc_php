<?php
include_once("Controller/cTaiKhoan.php");
$p = new controlTaiKhoan();


if (isset($_GET['idDel'])) {
    $idXoa = $_GET['idDel'];
    $kqXoa = $p->removeUser($idXoa);
    
    if ($kqXoa) {
        echo "<script>alert('Xóa tài khoản thành công!');</script>";
    } else {
        echo "<script>alert('Xóa thất bại! Vui lòng kiểm tra lại.');</script>";
    }

    echo "<script>window.location.href='admin.php?taikhoan';</script>";
}


$kq = $p->getAllUser();

echo "<h2>Quản lý tài khoản Admin</h2>";

if (!$kq || mysqli_num_rows($kq) == 0) {
    echo "Không có dữ liệu tài khoản.";
} else {
    echo "<table>";
    echo "<tr>
            <th>ID</th>
            <th>Tên đăng nhập</th>
            <th>Vai trò</th>
            <th>Thao tác</th>
          </tr>";

    while ($r = mysqli_fetch_assoc($kq)) {
        echo "<tr>";
        echo "<td>" . $r['id'] . "</td>";
        echo "<td>" . $r['user_name'] . "</td>"; 
        echo "<td>" . $r['tenVT'] . "</td>";
        echo "<td>
                <a href='#'>Sửa</a> | 
                <a href='?taikhoan&idDel=" . $r['id'] . "' 
                   onclick='return confirm(\"Bạn có chắc muốn xóa tài khoản này không?\")' 
                   style='color:red; font-weight:bold;'>Xóa</a>
              </td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>