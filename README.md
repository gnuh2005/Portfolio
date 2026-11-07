# 🌐 Nguyễn Ngọc Hùng – Portfolio

<div align="center">

![Portfolio Banner](https://img.shields.io/badge/Portfolio-Full%20Stack%20Developer-456bb5?style=for-the-badge&logo=wordpress&logoColor=white)
![WordPress](https://img.shields.io/badge/WordPress-Custom%20Theme-21759b?style=for-the-badge&logo=wordpress&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.0+-777bb4?style=for-the-badge&logo=php&logoColor=white)

**🔗 Live Demo: [nguyenngochung.page.gd](https://nguyenngochung.page.gd/)**

</div>

---

## 👤 Giới thiệu

Portfolio cá nhân của **Nguyễn Ngọc Hùng** – Full Stack Developer, sinh viên Công nghệ Thông tin tại Trường Đại học Tây Nguyên. WordPress custom theme được xây dựng từ đầu để giới thiệu kỹ năng, dự án và kinh nghiệm phát triển ứng dụng web từ frontend đến backend.

---

## ✨ Tính năng

- 🗂 **Sidebar điều hướng cố định** với tooltip khi hover
- 🎨 **Hiệu ứng hover nâng cao** – spring bounce, shimmer, scale, glow
- 📱 **Responsive Design** – tương thích mọi thiết bị
- 🖼 **Section Projects** – thumbnail ảnh thực tế với zoom effect
- 📬 **Form liên hệ** tích hợp `wp_nonce` bảo mật
- 🗺 **Google Maps** nhúng trực tiếp
- ✨ **Fade-in animation** khi scroll vào viewport
- 🌙 Màu sắc nhất quán theo hệ thống CSS variables

---

## 🛠 Công nghệ sử dụng

| Công nghệ | Mô tả |
|---|---|
| HTML5 | Cấu trúc semantic |
| CSS3 | Custom properties, Grid, Flexbox, Animation |
| JavaScript | Intersection Observer, smooth scroll |
| PHP | WordPress custom theme |
| WordPress | CMS, Customizer API, wp_nonce |
| Git & GitHub | Version control |

---

## 📁 Cấu trúc thư mục

```
portfolio-theme/
├── style.css          # Stylesheet chính + theme header
├── index.php          # Template trang chủ
├── header.php         # Header & sidebar navigation
├── footer.php         # Footer & scripts
├── functions.php      # Enqueue scripts, Customizer
├── images/            # Ảnh avatar, thumbnail dự án
│   ├── avatar.jpg
│   ├── project1.jpg
│   ├── project2.jpg
│   └── project3.jpg
└── README.md
```

---

## 🚀 Cài đặt

```bash
# 1. Clone repo
git clone https://github.com/gnuh2005/portfolio-theme.git

# 2. Copy vào thư mục themes của WordPress
cp -r portfolio-theme /path/to/wordpress/wp-content/themes/

# 3. Vào WordPress Admin
# Appearance → Themes → Activate "Nguyễn Ngọc Hùng Portfolio"
```

### Cập nhật theme trên website đang chạy

1. Commit và push thay đổi lên GitHub:

   ```bash
   git add index.php header.php style.css README.md
   git commit -m "Update portfolio role to Full Stack Developer"
   git push origin main
   ```

2. Nếu hosting có kết nối GitHub tự deploy, kiểm tra build/deploy hoàn tất. Theme WordPress này không cần bước build riêng.
3. Nếu hosting không tự deploy, dùng File Manager hoặc FTP để cập nhật `index.php` trong `wp-content/themes/portfolio-theme/` (đường dẫn thư mục có thể khác theo hosting). Sao lưu trước khi ghi đè.
4. Mở trang portfolio, xóa cache của plugin/CDN nếu có, rồi tải lại cứng trình duyệt (`Ctrl+F5`) để kiểm tra dự án Smart Campus.

Chỉ cần cập nhật theme portfolio để hiện thẻ dự án và liên kết GitHub. Muốn triển khai chính ứng dụng SmartCampus thì cần deploy riêng frontend Expo và backend API; cấu hình `localhost` trong ứng dụng sẽ không dùng được trên website công khai. Xem hướng dẫn và cấu hình trong [README của SmartCampus](https://github.com/QngDuc/SmartCampus#readme).

---

## 🎮 Dự án nổi bật

| Dự án | Công nghệ | Mô tả |
|---|---|---|
| **Smart Campus** | Expo, React Native, TypeScript, Node.js, Express, MongoDB | Ứng dụng hỗ trợ sinh viên Đại học Tây Nguyên tra cứu học tập, lịch học, thông báo và khám phá khuôn viên |
| **TaskFlow AI** | React, Node.js, MongoDB, AI | Ứng dụng quản lý tác vụ được hỗ trợ bởi AI |
| **Handwritten Character Recognition System** | Python, TensorFlow, OpenCV, CNN | Hệ thống nhận dạng ký tự viết tay sử dụng CNN |

---

## 📬 Liên hệ

<div>

📧 **Email:** [nnh08072005@gmail.com](mailto:nnh08072005@gmail.com)  
🐙 **GitHub:** [github.com/gnuh2005](https://github.com/gnuh2005)  
📘 **Facebook:** [facebook.com/gnuh.2005](https://www.facebook.com/gnuh.2005/)  
📍 **Địa chỉ:** 245 Trần Nhân Tông, TP. Buôn Ma Thuột, Đắk Lắk  

</div>

---

<div align="center">

Made with ❤️ by **Nguyễn Ngọc Hùng** © 2025

</div>
