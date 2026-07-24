<!DOCTYPE html>
<html>

<body>

  <form action="" method="POST" enctype="multipart/form-data">
    Tên sản phẩm / Product Name: <input type="text" name="tensp" required><br><br>
    Đơn giá / Price: <input type="number" name="dongia" required><br><br>
    Mã loại / Category ID: <input type="number" name="maloai" required><br><br>
    Hình ảnh / Image: <input type="file" name="fileToUpload" required><br><br>
    <input type="submit" name="submit" value="Thêm Sản Phẩm / Add Product">
  </form>

  <?php
  if (isset($_POST["submit"])) {
    // 1. Database Connection / Kết nối Database
    $conn = new mysqli("localhost", "root", "", "ql_banhang");

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $tensp = $_POST["tensp"];
    $dongia = $_POST["dongia"];
    $maloai = $_POST["maloai"];

    // 2. Handle Image Upload / Xử lý Upload Ảnh
    $target_dir = "uploads/"; // Folder to save images / Thư mục lưu ảnh

    // Create folder if it doesn't exist / Tạo thư mục nếu chưa có
    if (!file_exists($target_dir)) {
      mkdir($target_dir, 0777, true);
    }

    $hinhanh = basename($_FILES["fileToUpload"]["name"]);
    $target_file = $target_dir . $hinhanh;

    // Move file from temp folder to uploads folder / Chuyển file từ thư mục tạm sang thư mục uploads
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

      // 3. Insert into Database / Thêm tên ảnh vào Database
      $sql = "INSERT INTO sanpham (tensp, dongia, hinhanh, maloai) VALUES ('$tensp', '$dongia', '$hinhanh', '$maloai')";

      if ($conn->query($sql) === TRUE) {
        echo "<p style='color:green;'>Upload & Thêm dữ liệu thành công! / Success!</p>";
      } else {
        echo "<p style='color:red;'>Lỗi Database / DB Error: " . $conn->error . "</p>";
      }
    } else {
      echo "<p style='color:red;'>Lỗi upload ảnh! / File upload failed!</p>";
    }

    $conn->close();
  }
  ?>

</body>

</html>