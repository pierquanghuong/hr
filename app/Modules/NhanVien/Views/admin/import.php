<?= $this->extend('Modules\Admin\Views\layouts\sb2-admin') ?>
<?= $this->section('page-style') ?>
    <style>
    
    </style>
<?php $this->endSection() ?>

<?= $this->section('content') ?> <!-- start code html here -->
    <div class="hr-game-page">
        <h1 class="h3 mb-2 text-gray-800">Nhập Nhân Viên</h1>
        <div class="row">
            <div class="col-md-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="text-center">
                            <h6 class="h4 text-gray-900 mb-4">Thêm mới nhân viên</h6>
                        </div>
                    </div>

                    <div class="card-body">
                        <form class="form" action="<?= site_url('admin/nhanvien/create') ?>" method="POST">
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
                                <label for="name">Mã Game:</label>
                                <input type="text" id="mascan" name="mascan" class="form-control" placeholder="Mã Scan" required>
                            </div>
                            <button type="submit" class="btn btn-info">Lưu nhân viên</button>
                        </form>
                    </div>

                    <div class="card-footer">
                        <div class="alert alert-warning" role="alert">
                            <?= session()->get('message') ?> trở về <a href="<?= site_url('admin/nhanvien') ?>">danh sách nhân viên</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="text-center">
                            <h4 class="h4 text-gray-900 mb-4">Nhập nhân viên từ file excel</h4>
                            <p class="mb-0 small text-left">Chú ý, dữ liệu nhập có thể bị trùng lặp - bạn nên kiểm tra kĩ file excel trước khi import dữ liệu bằng excel</p>
                        </div>
                    </div>
                    <div class="card-body">
                            <div class="custom-file">
                                
                                    <form action="<?= site_url('admin/nhanvien/import') ?>" class="form" method="post" enctype="multipart/form-data">
                                        <?= csrf_field() ?>
                                        <div class="form-group">
                                            <label class="custom-file-label" for="customFile">Tải file lên</label>
                                            <input type="file" class="custom-file-input" id="customFile" name="excel_file" accept=".xlsx, .xls">
                                            <small id="helpId" class="text-muted">File excel phải có định dạng theo <a href="<?= base_url('uploads/excel_mau.xlsx') ?>">mẫu</a> </small>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-warning">Import</button>
                                        </div>
                                    </form>
                            </div>
                    </div>
                    <div class="card-footer">
                        <?php if (isset($message)) :  ?>
                            <div class="alert alert-primary" role="alert">
                                <strong><?= esc($message) ?></strong>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>

<?= $this->section('page-scripts') ?>
<script>
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
<?= $this->endSection() ?>