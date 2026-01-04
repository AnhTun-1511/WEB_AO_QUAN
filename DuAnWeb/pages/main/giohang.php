<h3 class="heading-product">GIỎ HÀNG CỦA BẠN</h3>

<?php
    if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0){
        $i = 0;
        $tongsotien = 0;
?>
<div class="cart-container">
    <table class="cart-table">
        <thead>
            <tr>
                <th>Sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($_SESSION['cart'] as $cart_item) {
                $thanhtien = $cart_item['soluong'] * $cart_item['giasanpham'];
                $tongsotien += $thanhtien;
                $i++;
            ?>
            <tr>
                <td style="font-weight: bold;"><?php echo $cart_item['tensanpham']; ?></td>
                
                <td><img src="admincp/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh']; ?>" width="80px"></td>
                
                <td><?php echo number_format($cart_item['giasanpham'],0,',','.').' đ'; ?></td>
                
                <td>
                    <div class="qty-box">
                        <a href="pages/main/themgiohang.php?tru=<?php echo $cart_item['id']?>"><i class="fa fa-minus"></i></a>
                        <span><?php echo $cart_item['soluong']; ?></span>
                        <a href="pages/main/themgiohang.php?cong=<?php echo $cart_item['id']?>"><i class="fa fa-plus"></i></a>
                    </div>
                </td>
                
                <td style="color: #ff3333; font-weight: bold;"><?php echo number_format($thanhtien,0,',','.').' đ'; ?></td>
                
                <td>
                    <a href="pages/main/themgiohang.php?xoa=<?php echo $cart_item['id']?>" class="btn-delete">
                        <i class="fa fa-trash"></i> Xóa
                    </a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <div class="cart-summary">
        <p>Tổng tiền thanh toán: <span><?php echo number_format($tongsotien,0,',','.').' VNĐ' ?></span></p>
        
        <?php if(isset($_SESSION['dangky'])) { ?>
            <a href="index.php?quanly=thanhtoan" class="btn-checkout">TIẾN HÀNH ĐẶT HÀNG</a>
        <?php } else { ?>
            <a href="index.php?quanly=dangky" class="btn-checkout">ĐĂNG KÝ ĐỂ ĐẶT HÀNG</a>
        <?php } ?>
    </div>
</div>

<?php
    } else {
?>
    <div class="empty-cart">
        <i class="fa fa-shopping-bag" style="font-size: 50px; color: #ddd;"></i>
        <p>Giỏ hàng của bạn đang trống</p>
        <a href="index.php" class="btn-continue">TIẾP TỤC MUA SẮM</a>
    </div>
<?php
    }
?>