<?php
include_once("Model/mSanPham.php");

class controlSanPham
{
       public function getAllProduct()
       {
              $p = new modelSanPham();
              return $p->selectAllProduct();
       }

       public function getProductByType($maloai)
       {
              $p = new modelSanPham();
              return $p->selectProductByType($maloai);
       }
       public function getDanhSachSanPham()
       {
              $p = new modelSanPham();


              if (isset($_GET['txtSearch']) && trim($_GET['txtSearch']) != "") {
                     $tuKhoa = $_GET['txtSearch'];
                     return $p->searchSanPham($tuKhoa);
              } else {
                     return $p->selectAllProduct();
              }
       }

       //-----admin
       public function getAllProductAdmin()
       {
              $p = new modelSanPham();
              return $p->selectAllProductAdmin();
       }
       //Hàm đổi tên ảnh
       public function re_name($tenSP, $tenFileGoc) {
              $ext = pathinfo($tenFileGoc, PATHINFO_EXTENSION);
              //Đổi tên từ iPhone 17 -->iphone-17.ext
              $str = str_replace(["đ", "Đ"], ["d", "d"], $tenSP); 
              $str = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $str);
              $str = strtolower(trim($str));
              $str = preg_replace('/[^a-z0-9-]+/', '-', $str);
              $base_name = trim($str, '-');

              return $base_name . "." . $ext;
       }
       // Hàm Thêm Sản Phẩm 
       public function addSanPham($tensp, $gia, $file, $maloai) {
              // Đổi tên và tạo đường dẫn lưu file
              $new_filename = $this->re_name($tensp, $file["name"]);
              $upload_path = "db/uploads/" . $new_filename;
              
              // Chuyển file thẳng vào thư mục
              if (move_uploaded_file($file["tmp_name"], $upload_path)){
                     $p = new modelSanPham();
                     $p->insertSP($tensp, $gia, $new_filename, $maloai);
                     return $p;
              } else {
                     echo "<script>alert('Lỗi: Upload file ảnh thất bại!');</script>";
                     return false;
              }
       }
       //SỬA SẢN PHẨM
       // Lấy 1 sản phẩm theo ID
       public function getProductById($masp) {
              $p = new modelSanPham();
              return $p->selectProductById($masp);
       }

       // Xử lý chỉnh sửa
       public function editSanPham($masp, $tensp, $gia, $file) {
              $p = new modelSanPham();
              $new_filename = "";

              // Kiểm tra xem người dùng có chọn ảnh mới không
              if (isset($file["name"]) && $file["name"] != "") {
                     $new_filename = $this->re_name($tensp, $file["name"]);
                     $upload_path = "db/uploads/" . $new_filename;
                     
                     if (!move_uploaded_file($file["tmp_name"], $upload_path)) {
                            echo "<script>alert('Lỗi: Upload file ảnh thất bại!');</script>";
                            return false;
                     }
              }

              return $p->updateSP($masp, $tensp, $gia, $new_filename);
       }
       // Xử lý xóa sản phẩm
       public function removeSanPham($masp) {
              $p = new modelSanPham();
              return $p->deleteSP($masp);
       }
}
