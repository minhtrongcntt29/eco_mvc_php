<?php
include("Model/ketnoi.php");

class modelThuongHieu{

    public function selectAllType(){

        $p = new clsKetnoi();
        $conn = $p->moketnoi();

        $sql = "SELECT * FROM loaisanpham";
        $tbl = mysqli_query($conn,$sql);
        // $p ->dongKetNoi();
        return $tbl;
    }

}
?>