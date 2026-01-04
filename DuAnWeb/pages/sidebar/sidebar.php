<div class="sidebar">
    <h3 class="sidebar-title">DANH MỤC SẢN PHẨM</h3>
    <ul class="list_sidebar">
        <?php
            $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
            $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
            while($row = mysqli_fetch_array($query_danhmuc)) {
        ?>
        <li>
            <a href="index.php?quanly=danhmucsanpham&id=<?php echo $row['id_danhmuc']?>">
                <i class="fa fa-caret-right"></i> <?php echo $row['tendanhmuc']?>
            </a>
        </li>
        <?php
        }
        ?>
    </ul>
</div>