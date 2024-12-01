<?= $this->extend('Modules\Home\Views\layouts\default') ?>
<!-- Custom Style -->
<?php $this->section('page-styles') ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">

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
        body {
            font-family: "Nunito Sans", sans-serif;
            font-optical-sizing: auto;
        }
    </style>
<?php $this->endSection() ?>
   
<!-- PAge content -->
<?php $this->section('content') ?>

    <div class="thanks-block">
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
            <p>Liên hệ phòng Nhân Sự để được cấp mã Qr</p>
        </div>
    </div>

<?php $this->endSection() ?>