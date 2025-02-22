<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>
        <?= isset($title) ? esc($title) : "Trang Quản Lý" ?>
    </title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('sb2-admin/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="<?php echo base_url('sb2-admin/css/sb-admin-2.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('sb2-admin/css/custom.css') ?>" rel="stylesheet">
     <!-- Custom styles for this template-->
    <?php $this->renderSection('page-style') ?>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?=  $this->include('Modules/Admin/Views\includes\sidebar') ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar menu -->
    
                <?= $this->include('Modules/Admin/Views\includes\nav') ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content: page template here -->
                <div class="container-fluid">
                    <?php $this->renderSection('content') ?>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; quanghuy.com</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- logout modal -->
    <?= $this->include('Modules/Admin/Views\includes\logout-modal') ?>
    
    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url('sb2-admin') ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url('sb2-admin') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('sb2-admin') ?>/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('sb2-admin') ?>/js/sb-admin-2.min.js"></script>
    <!-- Page level plugins -->
    <?php $this->renderSection('page-scripts') ?>
</body>

</html>