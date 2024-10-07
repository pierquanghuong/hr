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
            margin-top: 10px;
            border-radius: 2%;
            background-color: #fff;
        }
        .title {
            text-align: center;
        }
        .form {
            margin: 30px 20px;
        }
        textarea::placeholder {
            font-weight: 400;
            font-size: 1em;
        }
        .star-content {
            padding: 10px;
        }
        .star-content ul {
            padding: 10px 20px 10px 20px;
        }
        .star-content li{
            text-align: justify;
            margin-bottom: 10px;
        }
        .star-content li span{
            color:blue;
        }
        p.star-intro {
            padding: 0 10px;
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
                            <label for="nhanvien">Người nhận/Receiver</label>
                            <select class="nhanvien-select2 form-control" id="nhanvien" name="nguoinhan"></select>
                        </div>

                        <?php if ($nvtype == 'phongban') : ?>
                        <div class="form-group pmd-textfield pmd-textfield-outline pmd-textfield-floating-label col-md-12">
                          <label for="point">Số điểm/Points </label>
                          <input type="number" class="form-control" name="point" id="point" value="1">
                        </div>
                        <?php endif; ?>

                        <div class="form-group pmd-textfield pmd-textfield-outline pmd-textfield-floating-label col-md-12">
                            <label for="outline-form-layout-address1">Lý do/Reason </label>
                            <textarea name="ly_do" id="txt-lydo" class="form-control" 
                            placeholder="Mô tả lý do theo mô hình STAR / Please explain the reason for thank-you, use the STAR model"
                            rows=6 required maxlength="1000"  minlength="300"></textarea>
                        </div>
                       
                    </div>
                    
                    <div class="row">
                        <div class="col text-left">
                            <a class="btn btn-outline-secondary" data-target="#modalSTAR" data-toggle="modal">
                                <i class="fa fa-question-circle" aria-hidden="true"></i> Mô hình STAR
                            </a>
                        </div>
                        <div class="col text-right">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-gift" aria-hidden="true"></i> Tặng Quà
                            </button>
                            
                        </div>
                    </div>
                    
                </form>

                <?php if (session()->has('msg')) : ?>
                    <div class="alert alert-warning" role="alert">
                        <?= session()->get('msg') ?>
                    </div>
                <?php endif;  ?>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modalSTAR" tabindex="-1" role="dialog" aria-labelledby="modalSTAR" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">QUY ĐỊNH THEO MÔ HÌNH STAR</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body star-content">
                    <ul class="star-list">
                        <li>Tình huống: Giới thiệu về một sự kiện, dự án, hay một thử thách mà nhân viên đã thực hiện tốt. <br /><span>Situation: Introduction to an event, project, or a challenge that an employee has faced.</span></li>
                        <li>Nhiệm vụ: Làm nổi bật nhiệm vụ cụ thể hoặc các thách thức đã được giải quyết <br /><span>Task: Highlight the specific task or challenge that was addressed.</span></li>
                        <li>Hành động: Chi tiết các hành động đã thực hiện để đạt được kết quả hoặc cung cấp hỗ trợ. <br /><span>Action: Detail the actions taken to achieve the result or provide assistance.</span></li>
                        <li>Kết quả: Nhấn mạnh kết quả và tác động của các hành động đối với đội ngũ, dự án
                        hoặc công ty <br /><span>Result: Emphasize the outcome and the impact of the actions on the
                        team, project, or company.</span></li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
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