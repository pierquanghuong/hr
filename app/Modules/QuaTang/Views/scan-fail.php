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
        .display-3 {
            font-size: 1.5em;
            color: red;
        }
        .fail-msg {
            font-size: 1.5em;
            color:brown;
        }
    </style>
<?php $this->endSection() ?>
   
<!-- PAge content -->
<?php $this->section('content') ?>
    <div class="row thankyou-page">
        <div class="col-md-8 offset-md-2">
            <div class="jumbotron text-center">
                    <h2 class="display-3">
                        Cảm ơn bạn <br/>
                        đã tham gia chương trình <br/>
                        của Phòng Nhân Sự.
                    </h2>
                        <div class="alert alert-danger fail-msg" role="alert">
                            <strong> <?php echo($msg) ?></strong>
                        </div>
                    <hr>
                    <p>
                    Vui lòng liên hệ phòng Nhân Sự
                    </p>
            </div>
        </div>
    </div>
<?php $this->endSection() ?>