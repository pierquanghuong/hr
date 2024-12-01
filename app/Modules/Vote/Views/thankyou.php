<?= $this->extend('Modules\Home\Views\layouts\default') ?>
<!-- Custom Style -->
<?php $this->section('page-styles') ?>
    <style>
        .button {
            margin: 10px;
            text-align: center;
        }
        .row-icon {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding:10px;
            margin-bottom: 40px;
        }
        .responsive {
            width: 100%;
            height: auto;
        }

        .vote {
            position: relative;
        }
        .award-title{
            position: absolute;
            bottom: 10px;
            left: 0;
            font-size: 8pt;
            font-weight: bold;
            color: #fff;
            padding:0px 5px;
        }
        .display-3 {
            font-size: 2em;
            font-weight: 400;
            line-height: 1.2;
        }
        .lead strong {
            font-size: 1.5em;
            color: #890000;
        }
    </style>
<?php $this->endSection() ?>

<!-- PAge content -->
<?php $this->section('content') ?>
    <div class="jumbotron text-center">
        <h1 class="display-3">Cảm ơn bạn đã tham gia đề cử!</h1>
            <p class="lead"><strong>Bạn đề cử cho <?php echo $nominee ?></strong> <br/> Phòng Nhân Sự chúc bạn <br/>một ngày làm việc hiệu quả</p>
        <hr>
        <p>
            Mời bạn bấm vào <a href="<?= site_url('vote') ?>">trang đề cử</a> để tiếp tục đề cử
        </p>
    </div>
<?php $this->endSection() ?>

<!-- custom Script -->
<?php $this->section('page-scripts') ?>
    <script {csp-script-nonce}>
          
    </script>
<?php $this->endSection() ?>