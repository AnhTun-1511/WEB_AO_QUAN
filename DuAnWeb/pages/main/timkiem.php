<?php
    if(isset($_POST['timkiem'])){
        $tukhoa = $_POST['tukhoa'];
    } else {
        $tukhoa = '';
    }
    // Dùng mysqli_real_escape_string để tránh lỗi khi người dùng nhập ký tự lạ
    $tukhoa_clean = mysqli_real_escape_string($mysqli, $tukhoa);
    $sql_timkiem = "SELECT * FROM tbl_sanpham WHERE tensanpham LIKE '%".$tukhoa_clean."%'";
    $query_timkiem = mysqli_query($mysqli, $sql_timkiem);
?>

<h3 class="heading-product">Từ khóa tìm kiếm: <?php echo $tukhoa; ?></h3>

<ul class="product_list">
    <?php
    if(mysqli_num_rows($query_timkiem) > 0){
        while($row = mysqli_fetch_array($query_timkiem)){
    ?>
    <li>
        <div class="product-item">
            <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham']?>">
                <div class="product-img">
                    <img src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh']?>">
                </div>
                <div class="product-info">
                    <p class="title_product"><?php echo $row['tensanpham']?></p>
                    <p class="title_price"><?php echo number_format($row['giasanpham'],0,',','.').' đ'?></p>
                </div>
            </a>
            <div class="cart-icon-hover">
            <i class="fa fa-shopping-bag"></i>
            </div>
        </div>
    </li>
    <?php
        }
    } else {
        echo '<p style="padding: 10px; font-size: 16px; color: #555;">Không tìm thấy sản phẩm nào phù hợp với từ khóa: <b>'.$tukhoa.'</b></p>';
    }
    ?>
</ul>