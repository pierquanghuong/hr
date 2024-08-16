<?= $this->extend('Modules\Admin\Views\layouts\sb2-admin') ?>

<?= $this->section('content') ?> <!-- start code html here -->
    <div class="dashboard-page">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Cấu hình hệ thống</h1>
            <a href="<?= site_url('admin') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-download fa-sm text-white-50"></i> Trang chính </a>
        </div>


    </div>
<?= $this->endSection() ?>

<?= $this->section('page-scripts') ?>

<?= $this->endSection() ?>