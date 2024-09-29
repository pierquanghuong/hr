<?= $this->extend('Modules\Admin\Views\layouts\sb2-admin') ?>
<?= $this->section('page-style') ?>
    <style>
    
    </style>
<?php $this->endSection() ?>

<?= $this->section('content') ?> <!-- start code html here -->
    <div class="hr-game-page">
        <form class="form" action="<?= site_url('admin/nhanvien/create') ?>" method="POST">
            <?= csrf_field() ?>
            <div class="card shadow">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6 text-left">
                            <h1 class="h3 mb-2 text-gray-800">Thêm Nhân Viên</h1>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="<?= site_url('admin/nhanvien/import-excel') ?>">Nhập file excel</a> 
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 col-left">
                            <p class="text-justify">
                                1. Họ tên hoặc tên đại diện của phòng ban <br/ >
                                2. Nhân viên hoặc Đại diện cho phòng ban nào <br/ >
                                3. Mã Nhân Viên sử dụng để quản lý vào tạo mã QR cho nhân viên/đại diện. Mã Nhân Viên phải duy nhất <br/ >
                                4. Tùy chọn là cá nhân nhân viên hay đại diện cho phòng ban. <br/>
                                5. Nếu nhập nhiều nhân viên 1 lúc, sử dụng chức năng nhập file excel
                            </p>
                        </div>
                        <div class="col-md-8 col-right">
                            <div class="form-group">
                                <label for="name">Họ tên nhân viên:</label>
                                <input type="text" id="hoten" name="hoten" class="form-control" placeholder="Họ tên" required>
                            </div>
                            <div class="form-group">
                                <label for="phongban">Phòng ban</label>
                                <select name="phongban" id="phongban" class="form-control">
                                    <?php foreach ($phongban as $key=>$ban) : ?>
                                        <option value="<?= $ban ?>"><?= $ban ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Mã Nhân Viên:</label>
                                <input type="text" id="mascan" name="mascan" class="form-control" placeholder="Mã Scan" required>
                            </div>

                            <div class="form-check form-group">
                                <label class="form-check-label" style="margin-right:30px;">
                                    <input type="radio" class="form-check-input" name="nv_type"  value="nhanvien" checked> Cá nhân
                                    -  </label>
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="nv_type" value="phongban"> Đại diện phòng ban
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-6 text-left">
                        <?php if (session()->getFlashdata('message') !== NULL) : ?>
                                <div class="alert alert-warning" role="alert">
                                    <?= session()->get('message') ?> trở về <a href="<?= site_url('admin/nhanvien') ?>">danh sách nhân viên</a>
                                </div>
                            <?php endif ?>
                        </div>
                        <div class="col-md-6 text-right">
                            <button type="submit" class="btn btn-info">Lưu nhân viên</button> 
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
<?= $this->endSection() ?>

<?= $this->section('page-scripts') ?>
<?= $this->endSection() ?>