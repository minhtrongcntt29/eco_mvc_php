<?php
class clsKetNoi
{

    public function moketnoi()
    {
        $conn = mysqli_connect("localhost", "hominhtr_admin_mt", "Trong123@", "hominhtr_minhtrongql_banhang");
        if (!$conn) {
            echo "Không kết nối database";
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
