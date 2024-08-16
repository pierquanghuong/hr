<ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">HR <sup>v1</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?= site_url('admin') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Trang Tổng Quan</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                 Tính năng
            </div>
            
            <?php if (auth()->user()->can('quatang.access')) : ?>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item <?php if (url_is('admin/hr-game*')) echo 'active'; ?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa fa-gift" aria-hidden="true"></i>
                    <span>HR Game</span>
                </a>
                <div id="collapseTwo" class="collapse <?php if (url_is('admin/hr-game*')) echo 'show';?>    " aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Quán lý tặng quà</h6>
                        <a class="collapse-item <?php if ( uri_string() == 'admin/hr-game' ) echo 'active';?>" href="<?= site_url('admin/hr-game') ?>">Hoạt động</a>
                        <a class="collapse-item <?php if ( uri_string() == 'admin/hr-game/statistic' ) echo 'active'; ?>" href="<?= site_url('admin/hr-game/statistic') ?>">Thống kê</a>
                        <a class="collapse-item <?php if ( uri_string() == 'admin/hr-game/settings' ) echo 'active'; ?>" href="<?= site_url('admin/hr-game/settings') ?>">Cấu hình</a>
                    </div>
                </div>
            </li>
            <?php endif; ?>
            
            <?php if (auth()->user()->can('menu.access')) : ?>
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fa fa-coffee" aria-hidden="true"></i>
                    <span>Menu hàng ngày</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Quản lý thực đơn</h6>
                        <a class="collapse-item" href="#">Lên Thực đơn</a>
                        <a class="collapse-item" href="#">Tạo bình chọn</a>
                        <a class="collapse-item" href="#">Thống kê</a>
                    </div>
                </div>
            </li>
            <?php endif; ?>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Quản Lý
            </div>
            
            <?php if (auth()->user()->can('nhanvien.access')) : ?>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item <?php if (url_is('admin/nhanvien*')) echo 'active';?>">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fa fa-address-card" aria-hidden="true"></i>
                    <span>Nhân Sự</span>
                </a>
                <div id="collapsePages" class="collapse <?php if (url_is('admin/nhanvien*')) echo 'show';?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item <?php if ( uri_string() == 'admin/nhanvien') echo 'active';?>" href="<?= site_url('/admin/nhanvien') ?>">Danh sách</a>
                        <a class="collapse-item <?php if ( uri_string() == 'admin/nhanvien/import' ) echo 'active';?>" href="<?= site_url('/admin/nhanvien/import') ?>">Thêm mới</a>
                    </div>
                </div>
            </li>
            <?php endif; ?>
                
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Hệ thống
            </div>
            <?php if (auth()->user()->can('admin.setting')) : ?> 
            <!-- Nav Item - Pages Collapse Menu -->
             <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages-user"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fa fa-user-circle" aria-hidden="true"></i>
                    <span>Người dùng</span>
                </a>
                <div id="collapsePages-user" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Người quản lý</h6>
                        <a class="collapse-item" href="#">Danh sách</a>
                        <a class="collapse-item" href="#">Thêm mới</a>
                        <a class="collapse-item" href="#">Quyền truy cập</a>
                    </div>
                </div>
                
            </li>
            <?php endif; ?>
            <?php if (auth()->user()->can('admin.setting')) : ?> 
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('admin/settings') ?>" title="Cấu hình hệ thống">
                <i class="fa fa-cog" aria-hidden="true"></i>
                    <span>Cấu hình</span>
                </a>  
            </li>
            <?php endif; ?>
            
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>