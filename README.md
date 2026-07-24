# 📱 Dự án cá nhân học tập môn Phát triển Ứng dụng Web (PHP)

**Tác giả:** Hồ Minh Trọng

**MSSV:** 23662271

## 📖 Giới thiệu
Đây là dự án Website cửa hàng bán điện thoại được em xây dựng dựa trên kiến trúc **MVC (Model - View - Controller)** sử dụng ngôn ngữ PHP thuần và cơ sở dữ liệu MySQL. 

Dự án bao gồm:
+ **Người dùng** __(User)__ gồm các chức năng: hiển thị sản phẩm, tìm kiếm sản phẩm, lọc theo thương hiệu

+ **Hệ thống quản trị** __(Admin)__ gồm các phân quyền rõ ràng phù hợp cho hệ thống quản lý cửa hàng hiện nay
  
## ✨ Tính năng nổi bật

### 1. Giao diện Người dùng (Frontend - `index.php`)
- Hiển thị danh sách sản phẩm và danh mục thương hiệu.
- Chức năng tìm kiếm sản phẩm.
- Đăng nhập và quản lý phiên làm việc (Session) an toàn.

### 2. Giao diện Quản trị (Backend - `admin.php`)
Tích hợp hệ thống phân quyền (Role-Based Access Control) tự động chặn các truy cập trái phép:
- **Role 1 (Quản lý cấp cao / Sếp):** Toàn quyền kiểm soát hệ thống bao gồm Quản lý Thương hiệu, Quản lý Sản phẩm (Thêm/Sửa) và **Quản lý Tài khoản**.
- **Role 2 (Nhân viên quản lý sản phẩm):** Chỉ được phép truy cập module Quản lý Thương hiệu và Quản lý Sản phẩm.
- **Role 3 (Khách hàng):** Bị chặn hoàn toàn khỏi khu vực quản trị.

## 🛠️ Công nghệ sử dụng
- **Backend:** PHP, PHP Sessions
- **Frontend:** HTML5, CSS3
- **Database:** MySQL (Sử dụng thư viện `mysqli`)
