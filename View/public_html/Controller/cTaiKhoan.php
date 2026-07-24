<?php
include_once("Model/mTaikhoan.php");

class controlTaiKhoan {
    public function login($user, $pass) {
        $p = new modelTaiKhoan();
        $kq = $p->checkLogin($user, $pass);
        
        if ($kq && mysqli_num_rows($kq) > 0) {
            $row = mysqli_fetch_assoc($kq);
            
            $_SESSION['login'] = true;
            $_SESSION['user_name'] = $row['user_name'];
            $_SESSION['role'] = $row['role']; 
            return true;
        }
        return false;
    }

    public function getAllUser() {
        $p = new modelTaiKhoan();
        return $p->selectAllUser();
    }

    // 3. Xử lý xóa tài khoản (Cho Role 1)
    public function removeUser($id) {
        $p = new modelTaiKhoan();
        return $p->deleteUser($id);
    }

    public function addUser($user, $pass, $role) {
        $p = new modelTaiKhoan();
        return $p->insertUser($user, $pass, $role);
    }
}
?>