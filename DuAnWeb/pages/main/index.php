<h3 class="heading-product">Sản phẩm mới nhất</h3>
<ul class="product_list">
    <?php
    $sql_pro = "SELECT * FROM tbl_sanpham, tbl_danhmuc WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc ORDER BY tbl_sanpham.id_sanpham DESC LIMIT 25";
    $query_pro = mysqli_query($mysqli,$sql_pro);
    while($row = mysqli_fetch_array($query_pro)) {
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
    ?>
</ul>