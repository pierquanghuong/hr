<?= $this->extend('Modules\Home\Views\layouts\default') ?>
<!-- Custom Style -->
<?php $this->section('page-styles') ?>
    <style {csp-style-nonce}>
        .title {
            text-align: center;
        }
        .form {
            margin: 30px 20px;
        }
    </style>
<?php $this->endSection() ?>

<?php $this->section('content') ?>
    <div class="row thankyou-page">
        <div class="col-md-8 offset-md-2">
        <div class="jumbotron text-center">
            <h1 class="display-3">Cảm ơn bạn!</h1>
                <p class="lead"><strong>Bạn đã tặng quà cho <?php echo $nguoinhan ?></strong> <br/> Phòng Nhân Sự chúc bạn <br/>một ngày làm việc hiệu quả</p>
            <hr>
            <p>
                Nếu muốn tặng quà cho người khác <br/> vui lòng quét lại mã QR của bạn
            </p>
        </div>
        </div>
    </div>
<!-- PAge content -->
<?php $this->endSection() ?>
    