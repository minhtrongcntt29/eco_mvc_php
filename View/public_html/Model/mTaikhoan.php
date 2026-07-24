<?php
include_once("Model/ketnoi.php");

class modelTaiKhoan {    public function checkLogin($user, $pass) {
        $p = new clsKetNoi();
        $conn = $p->moketnoi();
        $pass_md5 = md5($pass);

        $sql = "SELECT * FROM user WHERE user_name = '$user' AND password = '$pass_md5'";

        $kq = mysqli_query($conn, $sql);
        $p->dongketnoi($conn);
        return $kq;
    }

    // Lấy danh sách tài khoản
    public function selectAllUser() {
    $p = new clsKetNoi();
    $conn = $p->moketnoi();
    if ($conn) {
        $sql = "SELECT u.id, u.user_name, v.tenVT 
                FROM user u 
                LEFT JOIN vaitro v ON u.role = v.role";
        
        $tbl = mysqli_query($conn, $sql);
        $p->dongketnoi($conn);
        return $tbl;
    }
    return false;
}

    // Xóa tài khoản theo ID
    public function deleteUser($id) {
        $p = new clsKetNoi();
        $conn = $p->moketnoi();
        if ($conn) {
            $sql = "DELETE FROM user WHERE id = '$id'";
            $kq = mysqli_query($conn, $sql);
            $p->dongketnoi($conn);
            return $kq;
        }
        return false;
    }

    public function insertUser($user, $pass, $role) {
        $p = new clsKetNoi();
        $conn = $p->moketnoi();
        if ($conn) {
            $pass_md5 = md5($pass);
            $sql = "INSERT INTO user(user_name, password, role) VALUES ('$user', '$pass_md5', '$role')";
            $kq = mysqli_query($conn, $sql);
            $p->dongketnoi($conn);
            return $kq;
        }
        return false;
    }
}
?>