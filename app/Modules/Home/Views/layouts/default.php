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
    <link  rel="stylesheet" type="text/css" href="<?= base_url('template/plugin/select2/css/select2.min.css');?>">
    <script src="<?= base_url('template/plugin/jquery.js');?>" ></script>
    <script src="<?= base_url('template/plugin/bootstrap/js/bootstrap.min.js');?>" ></script>
    <script src="<?= base_url('template/plugin/select2/js/select2.min.js');?>" ></script>
    <!-- STYLES -->

    <?php $this->renderSection('page-styles') ?>
   
</head>
<body class="app">
    <?php $this->renderSection('content') ?>
    <?php $this->renderSection('page-scripts') ?>
</body>
</html>
