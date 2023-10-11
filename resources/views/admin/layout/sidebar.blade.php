<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex dropdown">
        <!-- <div class="image">
            <img src="admin_assets/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
        </div> -->
        <div class="info ">
            <a href="javascript:void(0)" class="d-block dropdown-toggle" id="dropdown-user" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Alexander Pierce</a>
            <div class="dropdown-menu" aria-labelledby="dropdown-user">
                <a class="dropdown-item" tabindex="-1" href="#">Action</a>
                <a class="dropdown-item" tabindex="-1" href="#">Another action</a>
                <a class="dropdown-item" tabindex="-1" href="#">Something else here</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" tabindex="-1" href="#">Separated link</a>
            </div>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-header">THEATER</li>

            <!-- Mange movie -->
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <p>
                        Quản Lý Phim
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="admin/movie_genres" class="nav-link">
                            <p>Thể loại</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="admin/movie" class="nav-link">
                            <p>Phim</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="admin/director" class="nav-link">
                            <p>Đạo diễn</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="admin/cast" class="nav-link">
                            <p>Diễn viên</p>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Mange Theater -->
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <p>
                        Quản Lý Rạp
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="admin/theater" class="nav-link">
                            <p>Rạp</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="admin/news" class="nav-link">
                            <p>Tin tức</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="admin/events" class="nav-link">
                            <p>Sự kiện</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="admin/food" class="nav-link">
                            <p>Thức ăn</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="admin/combo" class="nav-link">
                            <p>Combo</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <p>
                        Quản Lý vé
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="admin/prices" class="nav-link">
                            <p>Giá vé</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="admin/ticket" class="nav-link">
                            <p>
                                Thông tin vé
                            </p>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- Mange ticket -->

            <!-- Mange schedule-->
            <li class="nav-item">
                <a href="admin/schedule" class="nav-link">
                    <p>
                        Lịch chiếu
                    </p>
                </a>
            </li>

            <!-- Mange discount -->
            <li class="nav-item">
                <a href="admin/discount" class="nav-link">
                    <p>
                        Mã khuyến mãi
                    </p>
                </a>
            </li>

            <!-- Mange user -->
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <p>
                        Quản Lý Người dùng
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="admin/staff" class="nav-link">
                            <p>Nhân viên</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="admin/user" class="nav-link">
                            <p>Khách hàng</p>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Mange at the counter -->
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <p>
                        Quản Lý Tại Quầy
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="admin/scanTicket" class="nav-link">
                            <p>Quét vé</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="admin/scanCombo" class="nav-link">
                            <p>Quét combo</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="admin/buyTicket" class="nav-link">
                            <p>Bán vé</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="admin/buyCombo" class="nav-link">
                            <p>Bán combo</p>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Mange information -->
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <p>
                        Quản Lý Thông tin
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="admin/banners" class="nav-link">
                            <p>Banner</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="admin/feedback" class="nav-link">
                            <p>Phản hồi/Liên hệ</p>
                        </a>
                    </li>
                </ul>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="admin/info" class="nav-link">
                            <p>Thông tin rạp</p>
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>