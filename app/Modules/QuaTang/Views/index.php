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
        .form {
            margin: 30px 20px;
        }
    </style>
<?php $this->endSection() ?>

<!-- PAge content -->
<?php $this->section('content') ?>
    <div class="row">
        <div class="col-md-4 offset-md-4">
            <div class="main">
                <div class="header">
                    <img src="<?= base_url('template/images/banner.png');?>" alt="Tặng Quà" width="100%">
                </div>
                <form class="form" action="<?= site_url('/tangqua') ?>" method="POST" id="form-validate">
                    <?= csrf_field() ?>
                    <input type="hidden" name="nguoitang" value="<?= $nguoitang ?>">
                    <input type="hidden" name="mascan" value="<?= $mascan ?>">
                    <div class="form-row">

                        <div class="form-group pmd-textfield pmd-textfield-outline pmd-textfield-floating-label col-md-12">
                            <label for="nhanvien">Người bạn muốn tặng</label>
                            <select class="nhanvien-select2 form-control" id="nhanvien" name="nguoinhan"></select>
                        </div>


                        <div class="form-group pmd-textfield pmd-textfield-outline pmd-textfield-floating-label col-md-12">
                            <label for="outline-form-layout-address1">Lý do bạn tặng quà?</label>
                            <textarea name="ly_do" id="txt-lydo" class="form-control" rows=5 required>Tôi muốn cảm ơn anh ấy vì đã giúp đỡ tôi trong công việc</textarea>
                        </div>

                    
                    </div>
                    
                    <button type="submit" class="btn pmd-ripple-effect btn-primary">
                        <i class="fa fa-pencil"></i> Tặng Quà
                    </button>
                    
                </form>

                <?php if (session()->has('msg')) : ?>
                    <div class="alert alert-warning" role="alert">
                        <?= session()->get('msg') ?>
                    </div>
                <?php endif;  ?>
            </div>
        </div>
    </div>
<?php $this->endSection() ?>

<!-- custom Script -->
<?php $this->section('page-scripts') ?>
    <script {csp-script-nonce}>
    $(document).ready(function() {
            $('.nhanvien-select2').select2({
                ajax: {
                        url: "<?php echo site_url('/nhanvien/search-ajax') ?>",
                        dataType: 'json',
                        data: function (params) {
                            var query = {
                            q: params.term,
                        }
                        return query;
                    },
                    //result
                    processResults: function (data) {
                        return {
                            results: $.map(data, function(nhanvien) {
                                var display = nhanvien.hoten + " - " + nhanvien.phongban;
                                return { id: nhanvien.id, text: display };
                            })
                        };
                    },//end result
                    cache: true
                },//end ajax
                placeholder: 'Tìm người nhận quà',
                minimumInputLength: 2,
            });//end select 2
        });
    </script>

<?php $this->endSection() ?>