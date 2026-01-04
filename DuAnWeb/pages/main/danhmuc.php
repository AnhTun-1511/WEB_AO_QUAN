<?php
    // Lấy tên danh mục
    $sql_cate = "SELECT * FROM tbl_danhmuc WHERE id_danhmuc='$_GET[id]' LIMIT 1";
    $query_cate = mysqli_query($mysqli, $sql_cate);
    $row_title = mysqli_fetch_array($query_cate);
?>

<h3 class="heading-product">Danh mục: <?php echo $row_title['tendanhmuc'] ?></h3>

<ul class="product_list">
    <?php
    // Lấy sản phẩm thuộc danh mục
    $sql_pro = "SELECT * FROM tbl_sanpham WHERE id_danhmuc='$_GET[id]' ORDER BY id_sanpham DESC";
    $query_pro = mysqli_query($mysqli, $sql_pro);
    
    // Kiểm tra nếu có sản phẩm thì hiển thị
    if(mysqli_num_rows($query_pro) > 0){
        while($row = mysqli_fetch_array($query_pro)){
    ?>
    <li>
        <div class="product-item">
            <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham']?>">
                <div class="product-img">
                    <img src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh']?>">
                </div>
                <div class="product-info">
                    <p class="title_product"><?php echo $row['tensanpham']?></p>
                    <p class="title_price"><?php echo number_format($row['giasanpham'],0,',','.').' VNĐ'?></p>
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
        echo '<p style="padding: 10px;">Hiện chưa có sản phẩm nào trong danh mục này.</p>';
    }
    ?>
</ul>