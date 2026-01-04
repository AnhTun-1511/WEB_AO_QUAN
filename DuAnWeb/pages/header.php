<?php
if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
    unset($_SESSION['dangky']);
    header('Location:index.php');
}
?>
<div class="header-container">
    <div class="header-main">
        <div class="logo">
            <a href="index.php">
                <img src="images/logo/logo.png" alt="W/N Shop Logo">
            </a>
        </div>

        <div class="main-menu">
            <ul>
                <li><a href="index.php">TRANG CHỦ</a></li>
                <?php
                // Lấy danh mục từ CSDL để hiển thị lên menu
                $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY thutu DESC";
                $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
                while($row = mysqli_fetch_array($query_danhmuc)){
                ?>
                <li><a href="index.php?quanly=danhmucsanpham&id=<?php echo $row['id_danhmuc'] ?>"><?php echo strtoupper($row['tendanhmuc']) ?></a></li>
                <?php } ?>
                <li><a href="index.php?quanly=lienhe">LIÊN HỆ</a></li>
            </ul>
        </div>

        <div class="header-actions">
            <form action="index.php?quanly=timkiem" method="POST" class="search-box">
                <input type="text" name="tukhoa" placeholder="Tìm kiếm sản phẩm...">
                <button type="submit" name="timkiem"><i class="fa fa-search"></i></button>
            </form>

            <div class="user-actions">
                <?php if(isset($_SESSION['dangky'])){ ?>
                    <a href="index.php?quanly=thongtin" title="Tài khoản">
                        <i class="fa fa-user"></i> <?php echo $_SESSION['dangky']; ?>
                    </a>
                    <a href="index.php?dangxuat=1" title="Đăng xuất"><i class="fa fa-sign-out-alt"></i></a>
                <?php } else { ?>
                    <a href="index.php?quanly=dangky" title="Đăng nhập/Đăng ký">
                        <i class="fa fa-user"></i> Tài khoản
                    </a>
                <?php } ?>
                
                <a href="index.php?quanly=giohang" class="cart-btn">
                    <i class="fa fa-shopping-cart"></i> Giỏ hàng
                </a>
            </div>
        </div>
    </div>
</div>