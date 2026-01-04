        <div id="main">
                <?php
                include("sidebar/sidebar.php");
                ?>

            <div class="maincontent">
                <?php
                    if(isset($_GET['quanly'])) {
                        $tam = $_GET['quanly'];
                    } else {
                        $tam = '';
                    }
                    if($tam == 'danhmucsanpham') {
                        include("pages/main/danhmuc.php");
                    } elseif($tam == 'giohang') {
                        include("pages/main/giohang.php");
                    } elseif($tam == 'dangky') {
                        include("main/dangky.php");
                    } elseif($tam == 'dangnhap') {
                        include("pages/main/dangnhap.php");
                    } elseif($tam == 'doimatkhau') {
                        include("pages/main/doimatkhau.php");
                    }elseif($tam == 'thanhtoan') {
                        include("pages/main/thanhtoan.php");
                    } elseif($tam == 'thongtin') {
                        include("pages/main/thongtin.php");
                    } elseif($tam == 'lienhe') {
                        include("pages/main/lienhe.php");
                    } elseif($tam == 'sanpham') {
                        include("pages/main/sanpham.php");
                    } elseif($tam == 'timkiem') {
                        include("pages/main/timkiem.php");
                    }elseif($tam == 'chinhsach') {
                        include("pages/main/chinhsach.php");
                    }

                    else {
                        include("pages/main/index.php");
                    }
                ?>
            </div>
        </div>