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
    </style>
<?php $this->endSection() ?>

<!-- PAge content -->
<?php $this->section('content') ?>
    <div class="row row-icon">
        <?php foreach ($awards as $key => $award) : ?>
        <div class="col-md-2 col-sm-4 col-6 text-center">
            <div class="button vote">
                <?php if (in_array($key, $award_already)) : ?>
                    <span>
                        <?php if ($award['type'] == 'nhanvien') : ?>
                            <img src="<?php echo base_url('template/images/vote_staff_dis.png')  ?>" alt="vote" width="200px" class="responsive">
                        <?php else: ?>
                            <img src="<?php echo base_url('template/images/vote_group_dis.png')  ?>" alt="vote" width="200px" class="responsive">
                        <?php endif; ?>
                        <div class="award-title"><?= $award['name'] ?></div>
                    </span>
                <?php else: ?>
                    <a href="<?= site_url('vote/award/' . $key) ?>">
                        <?php if ($award['type'] == 'nhanvien') : ?>
                            <img src="<?php echo base_url('template/images/award.png')  ?>" alt="vote" width="200px" class="responsive">
                        <?php else: ?>
                            <img src="<?php echo base_url('template/images/award_group.png')  ?>" alt="vote" width="200px" class="responsive">
                        <?php endif; ?>
                        <div class="award-title"><?= $award['name'] ?></div>
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
<?php $this->endSection() ?>

<!-- custom Script -->
<?php $this->section('page-scripts') ?>
    <script {csp-script-nonce}>
          
    </script>
<?php $this->endSection() ?>