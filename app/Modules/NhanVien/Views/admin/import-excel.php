<?= $this->extend('Modules\Admin\Views\layouts\sb2-admin') ?>
<?= $this->section('page-style') ?>
    <style>
    
    </style>
<?php $this->endSection() ?>

<?= $this->section('content') ?> <!-- start code html here -->
    <div class="hr-game-page">
        <form class="form" action="<?= site_url('admin/nhanvien/import-excel') ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="card shadow">
                <div class="card-header">
                    <div class="row">
                        <h3>
                            Nhập danh sách nhân viên bằng excel
                        </h3>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 col-left">
                            <p class="text-justify">
                                1. File sử dụng là file excel theo mẫu đính kèm, file có định dạng .xlsx, .xls<br/ >
                                2. Dữ liệu sau khi import sẽ thêm vào dữ liệu có sẵn - vì vậy chú ý trùng lặp dữ liệu <br/ >
                                
                            </p>
                        </div>
                        <div class="col-md-8 col-right">
                            <div class="custom-file">              
                                <div class="form-group">
                                    <label class="custom-file-label" for="customFile">Tải file lên</label>
                                    <input required type="file" class="custom-file-input" id="customFile" name="excel_file" accept=".xlsx, .xls">
                                    <small id="helpId" class="text-muted">File excel phải có định dạng theo <a href="<?= base_url('uploads/excel_mau.xlsx') ?>">mẫu</a> </small>
                                </div>
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
                            <?php if (isset($message)): ?>
                                <div class="alert alert-warning" role="alert">
                                    <?= $message ?> trở về <a href="<?= site_url('admin/nhanvien') ?>">danh sách nhân viên</a>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-6 text-right">
                            <button type="submit" class="btn btn-info">Import Dữ Liệu</button> 
                        </div>
                    </div>
                </div>
            </div>
        </form>
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