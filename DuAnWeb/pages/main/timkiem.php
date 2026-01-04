<?php
    if(isset($_POST['timkiem'])){
        $tukhoa = $_POST['tukhoa'];
    } else {
        $tukhoa = '';
    }
    // Dùng LIKE để tìm gần đúng
    $sql_timkiem = "SELECT * FROM tbl_sanpham WHERE tensanpham LIKE '%".$tukhoa."%'";
    $query_timkiem = mysqli_query($mysqli, $sql_timkiem);
?>
<h3>Từ khóa tìm kiếm: <?php echo $tukhoa; ?></h3>
<ul class="product_list">
    <?php
    while($row = mysqli_fetch_array($query_timkiem)){
    ?>
    <li>
        <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
            <img src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>">
            <p class="title_product"><?php echo $row['tensanpham'] ?></p>
            <p class="title_price"><?php echo number_format($row['giasanpham'],0,',','.').' VNĐ' ?></p>
        </a>
    </li>
    <?php
    }
    ?>
</ul>