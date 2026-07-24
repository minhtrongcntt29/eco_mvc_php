<?php
include("Model/mThuongHieu.php");

class controlThuongHieu
{
    public function getAllType()
    {
        $p = new modelThuongHieu();
        $tbl = $p->selectAllType();
        if ($tbl->num_rows > 0) {
            return $tbl;
        } else {
            return false;
        }
    }
}
