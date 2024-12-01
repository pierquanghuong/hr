<?= $this->extend('Modules\Home\Views\layouts\default') ?>
<!-- Custom Style -->
<?php $this->section('page-styles') ?>
    <style>
        .row-icon {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            min-height: 50vh;
        }
        .responsive {
            width: 100%;
            height: auto;
        }
    </style>
<?php $this->endSection() ?>

<!-- PAge content -->
<?php $this->section('content') ?>
    <div class="col-md-6 offset-md-3">
        <div class="row row-icon">
            <div class="col-6 text-center">
                <div class="button vote">
                    <a href="<?= site_url('vote') ?>">
                        <img src="<?php echo base_url('template/images/vote.png')  ?>" alt="vote" width="200px" class="responsive">
                    </a>
                </div>
            </div>
            <div class="col-6 text-center">
                <div class="button vote">
                    <a href="<?= site_url('tangqua') ?>">
                        <img src="<?php echo base_url('template/images/present.png')  ?>" alt="present" width="200px"  class="responsive">
                    </a>
                </div>
            </div>
        </div>
    </div>
      
<?php $this->endSection() ?>

<!-- custom Script -->
<?php $this->section('page-scripts') ?>
    <script {csp-script-nonce}>
          
    </script>
<?php $this->endSection() ?>