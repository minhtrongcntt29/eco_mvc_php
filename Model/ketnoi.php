<?php
class clsKetNoi
{

    public function moketnoi()
    {
        $conn = mysqli_connect("localhost", "root", "", "ql_banhang");
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
