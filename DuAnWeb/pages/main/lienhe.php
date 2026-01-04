<h3 class="heading-product">LIÊN HỆ VỚI CHÚNG TÔI</h3>

<?php
    if (isset($_POST['gui'])) {
    $hoten    = mysqli_real_escape_string($mysqli, $_POST['hoten']);
    $email    = mysqli_real_escape_string($mysqli, $_POST['email']);
    $noidung  = mysqli_real_escape_string($mysqli, $_POST['noidung']);

    $sql = "INSERT INTO tbl_lienhe (hoten, email, noidung) 
            VALUES ('$hoten', '$email', '$noidung')";

    if (mysqli_query($mysqli, $sql)) {
        echo "<script>alert('Cảm ơn bạn đã phản hồi. Chúng tôi sẽ liên hệ lại sớm nhất!');</script>";
    } else {
        echo "<script>alert('Có lỗi xảy ra, vui lòng thử lại.');</script>";
    }
}
?>

<div class="contact-wrapper">
    <div class="contact-info">
        <div class="info-box">
            <i class="fa fa-map-marker-alt"></i>
            <h4>Địa chỉ</h4>
            <p>123 Đường ABC, Quận Thuận Hoá, TP. Huế</p>
        </div>
        <div class="info-box">
            <i class="fa fa-phone"></i>
            <h4>Điện thoại</h4>
            <p>0123.456.789</p>
            <p>0987.654.321</p>
        </div>
        <div class="info-box">
            <i class="fa fa-envelope"></i>
            <h4>Email</h4>
            <p>support@wnshop.com</p>
        </div>
    </div>

    <div class="contact-form">
        <h3>Gửi tin nhắn cho chúng tôi</h3>
        <form action="" method="POST">
            <div class="form-group">
                <input type="text" name="hoten" placeholder="Họ và tên của bạn" required>
            </div>
            <div class="form-group">
                <input type="email" name="email" placeholder="Email của bạn" required>
            </div>
            <div class="form-group">
                <textarea name="noidung" placeholder="Nội dung tin nhắn..." required></textarea>
            </div>
            <button type="submit" name="gui" class="btn-submit-contact">GỬI NGAY</button>
        </form>
    </div>
</div>