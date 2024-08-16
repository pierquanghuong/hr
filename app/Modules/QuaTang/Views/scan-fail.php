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
        .display-3 {
            font-size: 2em;
            color: red;
        }
    </style>
<?php $this->endSection() ?>
   
<!-- PAge content -->
<?php $this->section('content') ?>
<div class="row thankyou-page">
        <div class="col-md-4 offset-md-4">
            <div class="main">
            <div class="jumbotron text-center">
                <h2 class="display-3">Lỗi! <br/>Bạn chắc chắn scan <br/>mã Qr của mình?</h2>
                    <p class="lead">
                        Vui lòng scan lại mã QR của bạn hoặc
                    </p>
                <hr>
                <p>
                Liên hệ phòng Nhân Sự
                </p>
                </div>
            </div>
        </div>
    </div>
<?php $this->endSection() ?>