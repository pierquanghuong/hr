<?= $this->extend('Modules\Admin\Views\layouts\sb2-admin') ?>
<?= $this->section('page-style') ?>
    <style>
        .present-text {
            background-color: #e6e6e6;
            font-weight: bold;
            display: block;
            margin:3px;
            border-radius: 2px;
            padding: 0 10px;
        }
    </style>
<?php $this->endSection() ?>

<?= $this->section('content') ?> <!-- start code html here -->
    <div class="hr-game-page">
            <h1 class="h3 mb-2 text-gray-800">Chi tiết tặng quà số #<?= $present->id ?></h1>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 m-0 font-weight-bold text-primary>Tặng Quà dành cho: 
                        <span style="font-weight: bold"><a href="#"><?= $present->tennguoinhan ?></a></span>
                        - Phòng ban: <?= $present->phongnguoinhan ?>
                    </h6>
                </div>
                <div class="card-body">
                    <div class="chitiet-tangqua row">
                        <div class="col-md-3">Thời gian: </div> <div class="col-md-9"> 
                            <span class="present-text"><?= $present->created_at ?></span>
                        </div>
                        <div class="col-md-3">Người tặng: </div> <div class="col-md-9">
                            <span class="present-text"><a href="#"><?= $present->tennguoitang ?></a> - Phòng ban: <?= $present->phongnguoitang ?></span>
                        </div>
                        <div class="col-md-3">Lý do: </div> <div class="col-md-9">
                           <span class="present-text">
                                <?= $present->ly_do ?>
                           </span>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <a href="<?= site_url('admin/hr-game') ?>" class="btn btn-primary">Trở lại</a>
                </div>
            </div>
    </div>
<?= $this->endSection() ?>

<?= $this->section('page-scripts') ?>
<?= $this->endSection() ?>