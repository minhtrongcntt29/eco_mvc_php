<?php
class clsKetNoi
{
    public function moketnoi()
    {
        $conn = mysqli_connect("localhost", "hominhtr_admin_mt", "Trong123@", "hominhtr_minhtrongql_banhang");
        if (!$conn) {
            echo "Không kết nối database";
        } else {
            // Thêm dòng này để sửa lỗi font tiếng Việt
            mysqli_set_charset($conn, "utf8mb4");
        }
        return $conn;
    }
    
    public function dongketnoi($conn)
    {
        if ($conn) {
            mysqli_close($conn);
        }
    }
}
?>