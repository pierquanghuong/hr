<?= $this->extend('Modules\Home\Views\layouts\default') ?>
<!-- Custom Style -->
<?php $this->section('page-styles') ?>
    <style {csp-style-nonce}>
        .app {
            background: url("<?php echo base_url('template/images/bg.gif')  ?>"); 
        }
        .main {
            border: 1px solid #cecece;
            border-radius: 3;
            box-shadow: 3px 3px 5px 6px #ccc;
            margin-top: 40px;
            border-radius: 2%;
            background-color: #fff;
        }
        .title {
            text-align: center;
        }
        .form {
            margin: 30px 20px;
        }
    </style>

<?php $this->section('content') ?>
<?php $this->endSection() ?>
    <div class="row thankyou-page">
        <div class="col-md-4 offset-md-4">
            <div class="main">
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
    </div>
<!-- PAge content -->
<?php $this->endSection() ?>