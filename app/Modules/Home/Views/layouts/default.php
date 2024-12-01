<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>
        <?= isset($title) ? esc($title) : esc('Trang chủ') ?>
    </title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  rel="stylesheet" type="text/css" href="<?= base_url('template/plugin/bootstrap/css/bootstrap.min.css');?>">
    <link  rel="stylesheet" type="text/css" href="<?= base_url('template/plugin/font-awesome/css/font-awesome.min.css');?>">
    <link  rel="stylesheet" type="text/css" href="<?= base_url('template/plugin/select2/css/select2.min.css');?>">
    <script src="<?= base_url('template/plugin/jquery.js');?>" ></script>
    <script src="<?= base_url('template/plugin/bootstrap/js/bootstrap.min.js');?>" ></script>
    <script src="<?= base_url('template/plugin/select2/js/select2.min.js');?>" ></script>
    <style>
        .app {
            background-image: url("<?php echo base_url('template/images/bg.png')?>");
            background-color: #cccccc;
            background-position: center; /* Center the image */
            background-repeat: no-repeat;
            background-size:cover;
        }
        .main {
            background-color: rgba(255, 255, 255, 0.9);
            height: 100%;
            margin-top: 75px;
            border-radius: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
        .banner {
            border-radius: 10px;
        }
        .banner img {
            border-radius: 5px 5px 0 0;
            width: 100%;
        }
        h3.nhanvien-info {
            color: #fff;
            font-size: 1em;
            padding: 10px 0;
            font-weight: bold;
            font-style: italic;
        }
      
        .bottom-menu .bottom-nav {
            display: flex;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            padding: 10px 0;
            background-color: #212121;
            z-index: 99;
            will-change: transform;
            transform: translateZ(0);
            box-shadow: 0 -2px 3px -2px #212121;
        }
        .bottom-menu .bottom-nav-item {
            display: flex;
            flex-direction: column;
            flex-grow: 1;
            justify-content: center;
            text-align: center;
            font-size: 0.8rem;
            color: #fff;
            
        }
        .bottom-menu a {
            color: #fff;
            font-size: 1em;
            font-weight: bold;
        }
        .bottom-menu a:hover {
            text-decoration: none;
        }
        .bottom-menu .bottom-nav-link {
            display: flex;
            flex-direction: column;
        }
        .bottom-menu .bottom-nav .active {
            color: #f7452f;
        }
    </style>
    <!-- STYLES -->
    <?php $this->renderSection('page-styles') ?>
   
</head>
<body class="app">
    <div class="container">    
        <div class="row main">
            <div class="banner">
                <img src="<?= base_url('template/images/award_banner.png') ?>" alt="banner" class="responsive">
            </div>
            <div class="col-md-12">
                <?php $this->renderSection('content') ?>
            </div>
        </div>
    </div>
    <div class="bottom-menu">
        <nav class="bottom-nav">
            <div class="bottom-nav-item d-none d-sm-block">
                <div class="bottom-nav-link">
                    <span>
                        <?php if (session()->has('AuthNhanvien')) : ?>
                            <h3 class="nhanvien-info">Xin chào: <?= session('AuthNhanvien')['hoten'] ?></h3> 
                        <?php endif; ?>
                    </span>
                </div>
            </div>
            <div class="bottom-nav-item">
                <a class="bottom-nav-link" href="<?= site_url('vote') ?>">
                    <i class="fa fa-heart" aria-hidden="true"></i>
                    <span>Trang Đề Cử</span>
                </a>
            </div>
            <div class="bottom-nav-item">
                <a class="bottom-nav-link" href="<?= site_url('tangqua') ?>">
                    <i class="fa fa-gift" aria-hidden="true"></i>
                    <span>Trang Tặng Quà</span>
                </a>
            </div>
            <div class="bottom-nav-item d-none d-lg-block">
                <a class="bottom-nav-link" href="#">
                    <i class="fa fa-address-card" aria-hidden="true"></i>
                    <span>Trang cá nhân</span>
                </a>
            </div>
            <div class="bottom-nav-item d-none d-lg-block">
                <a class="bottom-nav-link" href="#">
                    <i class="fa fa-sign-out" aria-hidden="true"></i>
                    <span>Thoát</span>
                </a>
            </div>
        </nav>
    </div>
    <?php $this->renderSection('page-scripts') ?>
</body>
</html>
