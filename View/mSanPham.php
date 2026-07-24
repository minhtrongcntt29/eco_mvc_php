<?php
include_once("Model/ketnoi.php");

class modelSanPham
{
       public function selectAllProduct() //lấy tât cả sanpham
       {
              $p = new clsKetnoi();
              $conn = $p->moketnoi();
              $sql = "SELECT * FROM sanpham";
              $tbl = mysqli_query($conn, $sql);
              return $tbl;
       }

       public function selectProductByType($maloai) //lấy sản phẩm theo loại
       {
              $p = new clsKetnoi();
              $conn = $p->moketnoi();
              $sql = "SELECT * FROM sanpham WHERE maloai = '$maloai'";
              $tbl = mysqli_query($conn, $sql);
              return $tbl;
       }
       public function searchSanPham($tuKhoa) //tìm sản phẩm
       {
              $p = new clsKetnoi();
              $conn = $p->moketnoi();

              if ($conn) {
                     $sql = "SELECT * FROM sanpham WHERE tensp LIKE '%$tuKhoa%'";
                     $tbl = mysqli_query($conn, $sql);
                     return $tbl;
              }
              return false;
       }


       //-----admin
       public function selectAllProductAdmin()
       {
              $p = new clsKetNoi();
              $conn = $p->moketnoi();
              $sql = "SELECT s.*, l.tenloai FROM sanpham s JOIN loaisanpham l ON s.maloai = l.maloai";
              return mysqli_query($conn, $sql);
       }
       public function insertSP($tensp, $dongia, $hinhanh, $maloai) //hàm thêm SP (1)
       {
              $p = new clsKetNoi();
              $conn = $p->moketnoi();

              $sql = "INSERT INTO sanpham (tensp, dongia, hinhanh, maloai) 
                     VALUES ('$tensp', '$dongia', '$hinhanh', '$maloai')";
              return mysqli_query($conn, $sql);
       }

       //SỬA SẢN PHẨM
       // Lấy 1 sản phẩm theo ID kèm theo Tên loại để hiển thị
       public function selectProductById($masp) {
              $p = new clsKetNoi();
              $conn = $p->moketnoi();
              $sql = "SELECT s.*, l.tenloai FROM sanpham s JOIN loaisanpham l ON s.maloai = l.maloai WHERE s.masp = '$masp'";
              $kq = mysqli_query($conn, $sql);
              $p->dongketnoi($conn);
              return $kq;
       }

       // Cập nhật sản phẩm (có kiểm tra nếu không đổi ảnh thì giữ ảnh cũ)
       public function updateSP($masp, $tensp, $dongia, $hinhanh) {
              $p = new clsKetNoi();
              $conn = $p->moketnoi();
              
              if ($hinhanh != "") {
                     // Nếu có up ảnh mới
                     $sql = "UPDATE sanpham SET tensp = '$tensp', dongia = '$dongia', hinhanh = '$hinhanh' WHERE masp = '$masp'";
              } else {
                     // Nếu không up ảnh mới, chỉ đổi tên và giá
                     $sql = "UPDATE sanpham SET tensp = '$tensp', dongia = '$dongia' WHERE masp = '$masp'";
              }
              
              $kq = mysqli_query($conn, $sql);
              $p->dongketnoi($conn);
              return $kq;
       }
       // Hàm xóa sản phẩm
       public function deleteSP($masp) {
              $p = new clsKetNoi();
              $conn = $p->moketnoi();
              if ($conn) {
                     $sql = "DELETE FROM sanpham WHERE masp = '$masp'";
                     $kq = mysqli_query($conn, $sql);
                     $p->dongketnoi($conn);
                     return $kq;
              }
              return false;
       }
}
