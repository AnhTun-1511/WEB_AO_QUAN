<?php
    if(isset($_POST['dangnhap'])) {
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        if($email == "" || $password == "") {
            echo '<script>alert("Vui lòng nhập đầy đủ Email và Mật khẩu!");</script>';
        } else {
            // Mã hóa mật khẩu MD5 để so sánh với CSDL
            $matkhau = md5($password);
            
            // Dùng escape string để tránh lỗi SQL Injection
            $email = mysqli_real_escape_string($mysqli, $email);
            
            $sql = "SELECT * FROM tbl_dangky WHERE email='".$email."' AND matkhau='".$matkhau."' LIMIT 1";
            $row = mysqli_query($mysqli,$sql);
            $count = mysqli_num_rows($row);

            if($count > 0) {
                $row_data = mysqli_fetch_array($row);
                // Lưu tên người dùng vào Session
                $_SESSION['dangky'] = $row_data['tenkhachhang'];
                $_SESSION['id_khachhang'] = $row_data['id_dangky']; 
                echo '<script>alert("Đăng nhập thành công!"); window.location.href="index.php?quanly=giohang";</script>';
            } else {
                echo '<script>alert("Tài khoản hoặc Mật khẩu không chính xác.");</script>';
            }
        }
    }
?>

<div class="auth-container">
    <div class="auth-box">
        <h3 class="auth-title">ĐĂNG NHẬP</h3>
        <form action="" autocomplete="off" method="post">
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" placeholder="Nhập địa chỉ email..." required>
            </div>
            
            <div class="form-group">
                <label>Mật khẩu</label>
                <input type="password" name="password" placeholder="Nhập mật khẩu..." required>
            </div>
            
            <button type="submit" name="dangnhap" class="btn-auth">ĐĂNG NHẬP</button>
            
            <div class="auth-link">
                <p style="margin-bottom: 10px;">Chưa có tài khoản? <a href="index.php?quanly=dangky">Đăng ký ngay</a></p>
                
                <p><a href="index.php?quanly=doimatkhau" style="color: #666; font-size: 13px;">Quên hoặc muốn đổi mật khẩu?</a></p>
            </div>
        </form>
    </div>
</div>