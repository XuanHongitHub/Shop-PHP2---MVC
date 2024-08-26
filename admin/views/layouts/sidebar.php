<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php?controller=home&action=index" class="brand-link">
        <img src="assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Admin Shop PHP2</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-header">ADMIN</li>
                <li class="nav-item">
                    <a href="index.php?controller=category&action=index" class="nav-link">
                        <i class="nav-icon fas fa-folder"></i> <!-- Thay đổi class này thành icon category -->
                        <p>
                            Danh Mục
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?controller=product&action=index" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Sản Phẩm
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?controller=user&action=index" class="nav-link">
                        <i class="nav-icon fas fa-user"></i> <!-- Thay đổi class này thành icon người dùng -->
                        <p>
                            Người Dùng
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?controller=comment&action=index" class="nav-link">
                        <i class="nav-icon far fa-comment"></i> <!-- Thay đổi class này thành icon bình luận -->
                        <p>
                            Bình Luận
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?controller=order&action=index" class="nav-link">
                        <i class="nav-icon fas fa-file-invoice"></i> <!-- Thay đổi class này thành icon hóa đơn -->
                        <p>
                            Hóa Đơn
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="index.php?controller=orderdetails&action=index" class="nav-link">
                        <i class="nav-icon fas fa-file-invoice"></i> <!-- Thay đổi class này thành icon hóa đơn -->
                        <p>
                            Hóa Đơn Chi Tiết
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>



</div>