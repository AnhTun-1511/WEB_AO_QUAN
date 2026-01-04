<?php
if(isset($_POST['doimatkhau'])) {
    $email = trim($_POST['email']);
    $password_old = trim($_POST['password_old']);
    $password_new = trim($_POST['password_new']);
    $password_confirm = trim($_POST['password_confirm']);

    if($email == "" || $password_old == "" || $password_new == "" || $password_confirm == "") {
        echo '<script>alert("Vui lòng nhập đầy đủ thông tin!");</script>';
    } elseif ($password_new !== $password_confirm) {
        echo '<script>alert("Mật khẩu mới và xác nhận không khớp!");</script>';
    } else {
        // Mã hóa và làm sạch dữ liệu
        $matkhau_cu = md5($password_old);
        $matkhau_moi = md5($password_new);
        $email = mysqli_real_escape_string($mysqli, $email);

        // Kiểm tra tài khoản có đúng Email và Mật khẩu cũ không
        $sql = "SELECT * FROM tbl_dangky WHERE email='".$email."' AND matkhau='".$matkhau_cu."' LIMIT 1";
        $row = mysqli_query($mysqli, $sql);
        $count = mysqli_num_rows($row);

        if($count > 0) {
            // Cập nhật mật khẩu mới
            $sql_update = "UPDATE tbl_dangky SET matkhau='".$matkhau_moi."' WHERE email='".$email."'";
            mysqli_query($mysqli, $sql_update);
            
            echo '<script>alert("Đổi mật khẩu thành công! Vui lòng đăng nhập lại."); window.location.href="index.php?quanly=dangnhap";</script>';
        } else {
            echo '<script>alert("Email hoặc Mật khẩu cũ không chính xác.");</script>';
        }
    }
}
?>

<div class="auth-container">
    <div class="auth-box">
        <h3 class="auth-title">ĐỔI MẬT KHẨU</h3>
        <form action="" autocomplete="off" method="post">
            <div class="form-group">
                <label>Email đăng ký</label>
                <input type="email" name="email" placeholder="Nhập email của bạn..." required>
            </div>
            
            <div class="form-group">
                <label>Mật khẩu cũ</label>
                <input type="password" name="password_old" placeholder="Nhập mật khẩu hiện tại..." required>
            </div>
            
            <div class="form-group">
                <label>Mật khẩu mới</label>
                <input type="password" name="password_new" placeholder="Nhập mật khẩu mới..." required>
            </div>

            <div class="form-group">
                <label>Xác nhận mật khẩu mới</label>
                <input type="password" name="password_confirm" placeholder="Nhập lại mật khẩu mới..." required>
            </div>
            
            <button type="submit" name="doimatkhau" class="btn-auth">LƯU THAY ĐỔI</button>
            
            <div class="auth-link">
                <p><a href="index.php?quanly=dangnhap"><i class="fa fa-arrow-left"></i> Quay lại Đăng nhập</a></p>
            </div>
        </form>
    </div>
</div>