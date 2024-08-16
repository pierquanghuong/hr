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
       .intro-page .display-3 {
            font-size: 2em;
       }
       .chuongtrinh {
            display: block;
            font-weight: bold;
            color:dodgerblue;
       }
       .intro {
            font-size: 1em;
            display: block;
            margin-top: 20px;
            text-align: center;
       }
    </style>

<?php $this->section('content') ?>
<?php $this->endSection() ?>
    <div class="row intro-page">
        <div class="col-md-4 offset-md-4">
            <div class="main">
            <div class="jumbotron text-center">
                <h1 class="display-3">Chào mừng bạn đến với chương trình
                     <span class="chuongtrinh">KẾT NỐI ĐỒNG NGHIỆP</span></h1>
                     <hr class="my-4">
                    <p class="intro">
                        Mỗi nhân viên trong công ty sẽ được cấp 1 mã QR để tham gia chương trình "KẾT NỐI ĐỒNG NGHIỆP" <br/>
                        Nhân viên có thể sử dụng các trình quét mã QR như Zalo để vào truy cập và tặng quà cho đồng nghiệp.
                    </p>
                </div>
            </div>
        </div>
    </div>
<!-- PAge content -->
<?php $this->endSection() ?>