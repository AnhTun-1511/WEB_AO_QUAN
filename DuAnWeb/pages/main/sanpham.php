<h3 class="heading-product">Chi tiết sản phẩm</h3>
<?php
    $sql_chitiet = "SELECT * FROM tbl_sanpham, tbl_danhmuc WHERE tbl_sanpham.id_danhmuc = tbl_danhmuc.id_danhmuc AND tbl_sanpham.id_sanpham = '$_GET[id]' LIMIT 1";
    $query_chitiet = mysqli_query($mysqli, $sql_chitiet);
    while($row_chitiet = mysqli_fetch_array($query_chitiet)) {
?>
<div class="wrapper_detail">
    <div class="detail_img">
        <img src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh']?>" width="100%">
    </div>

    <form method="POST" action="pages/main/themgiohang.php?idsanpham=<?php echo $row_chitiet['id_sanpham']?>">
        <div class="detail_info">
            <h3 class="detail_name"><?php echo $row_chitiet['tensanpham'] ?></h3>
            
            <p class="detail_code">Mã SP: <span><?php echo $row_chitiet['masanpham'] ?></span></p>
            
            <p class="detail_price"><?php echo number_format($row_chitiet['giasanpham'],0,',','.').' VNĐ' ?></p>
            
            <p class="detail_stock">Số lượng kho: <?php echo $row_chitiet['soluong'] ?></p>
            
            <p class="detail_cate">Danh mục: <?php echo $row_chitiet['tendanhmuc'] ?></p>
            
            <div class="detail_desc">
                <b>Mô tả sản phẩm:</b>
                <p><?php echo $row_chitiet['tomtat'] ?></p>
                <p><?php echo $row_chitiet['noidung'] ?></p>
            </div>

            <div class="detail_button">
                <button type="submit" name="themgiohang" class="btn-add-cart">
                    <i class="fa fa-shopping-cart"></i> THÊM VÀO GIỎ
                </button>
            </div>
        </div>
    </form>
</div>
<?php
}
?>