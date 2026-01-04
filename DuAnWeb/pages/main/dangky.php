<?php
    if (isset($_POST['dangky'])) {
        $tenkhachhang = trim($_POST['tenkhachhang']);
        $email        = trim($_POST['email']);
        $password     = trim($_POST['matkhau']);
        $dienthoai    = trim($_POST['dienthoai']);
        
        if ($tenkhachhang === "" || $email === "" || $password === "" || $dienthoai === "") {
            echo '<script>alert("Vui lòng nhập đầy đủ thông tin!");</script>';
        } else {
            $matkhau = md5($password);
            $check_email = mysqli_query($mysqli, "SELECT * FROM tbl_dangky WHERE email='$email' LIMIT 1");
            if (mysqli_num_rows($check_email) > 0) {
                echo '<script>alert("Email này đã được sử dụng!");</script>';
            } else {
                $sql_dangky = mysqli_query($mysqli, "INSERT INTO tbl_dangky(tenkhachhang,email,matkhau,sodienthoai) VALUES('$tenkhachhang','$email','$matkhau','$dienthoai')");
                if ($sql_dangky) {
                    echo '<script>alert("Đăng ký thành công!"); window.location.href="index.php?quanly=dangnhap";</script>';
                }
            }
        }
    }
?>

<div class="auth-container">
    <div class="auth-box">
        <h3 class="auth-title">ĐĂNG KÝ TÀI KHOẢN</h3>
        <form action="" method="post" autocomplete="off">
            <div class="form-group">
                <label>Họ và tên</label>
                <input type="text" name="tenkhachhang" placeholder="Nhập họ tên của bạn..." required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="Nhập địa chỉ email..." required>
            </div>
            <div class="form-group">
                <label>Số điện thoại</label>
                <input type="text" name="dienthoai" placeholder="Nhập số điện thoại..." required>
            </div>
            <div class="form-group">
                <label>Mật khẩu</label>
                <input type="password" name="matkhau" placeholder="Nhập mật khẩu..." required>
            </div>
            
            <button type="submit" name="dangky" class="btn-auth">ĐĂNG KÝ NGAY</button>
            
            <div class="auth-link">
                <p>Bạn đã có tài khoản? <a href="index.php?quanly=dangnhap">Đăng nhập tại đây</a></p>
            </div>
        </form>
    </div>
</div>