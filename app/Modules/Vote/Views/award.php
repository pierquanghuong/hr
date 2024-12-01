<?= $this->extend('Modules\Home\Views\layouts\default') ?>
<!-- Custom Style -->
<?php $this->section('page-styles') ?>
    <style>
        .responsive {
            width: 100%;
            height: auto;
        }
        .award-form {
            padding:10px 10px 20px 10px;
        }

        .text-help {
            font-size: .9em;
            color:#6f6f6f;
            font-style: italic;
            text-align: justify;
            margin: 7px 0;
        }

        label {
            font-weight: bold;
        }
        label .en {
            color:#004196;
            font-style: italic;
        }
        .award-title {
            font-size: 1em;
            font-weight: bold;
            padding: 10px 0;
            width: 100%;
            color: #004196;
            border-bottom: 1px solid #cecece;
            text-align: center;
            background-color: #fff;
        }
        .award-icon {
            width: 30px;
        }
        .award-name {
            display: block;
            color: #8c0000;
        }

    </style>
<?php $this->endSection() ?>

<!-- PAge content -->
<?php $this->section('content') ?>
    <div class="row award-page">
        <div class="col-md-8 offset-md-2">
            <form class="form award-form" action="<?= site_url('vote/award') ?>" method="POST" id="form-validate">
                <?= csrf_field() ?>
        
                <input type="hidden" name="award" value="<?= $award_id ?>">
                <h3 class="award-title">
                    Nominator for/Đề cử giải
                    <span class="award-name"> 
                        <img src="<?= base_url('template/images/trophy.png') ?>" alt="award" class="award-icon">
                        <?= $award['name'] ?>
                        <img src="<?= base_url('template/images/trophy.png') ?>" alt="award" class="award-icon">    
                    </span>
                </h3>

                <div class="form-group">
                    <label for="nhanvien-select2">Nhân viên - Phòng ban  <span class="en">(Nominator's name)</span></label>
                    <select class="form-control" name="nominee" id="nhanvien-select2"></select>
                    <div class="text-help">Nhập tên nhân viên hoặc phòng ban (Pick a Staff or Room)</div>
                </div>
            

                <div class="form-group">
                    <label for="txtReason">Lý do đề cử <span class="en">(Reasons)</span></label>
                    <textarea class="form-control" name="reason" id="txtReason" rows="3"></textarea>
                    <div class="text-help">Lý do và dẫn chứng cụ thể về thành tích của ứng viên cho giải/Reasons and specific evidence of the nominee's achievements</div>
                </div>
                
                <hr />
                <div class="button-area text-right">
                    <a href="<?= site_url('vote') ?>" class="btn btn-warning">Hủy/Cancle</a>
                    <button type="submit" class="btn btn-info">Đồng ý/Submit</button>
                </div>
                    
            </form>
        </div>
    </div>
<?php $this->endSection() ?>

<!-- custom Script -->
<?php $this->section('page-scripts') ?>
    <script {csp-script-nonce}>
    $(document).ready(function() {
            $('#nhanvien-select2').select2({
                ajax: {
                        url: "<?php echo site_url('/nhanvien/search-ajax?t=' . $award['type'] ) ?>",
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
                placeholder: 'Nhập kí tự/Enter characters',
                minimumInputLength: 2,
            });//end select 2
        });
    </script>

<?php $this->endSection() ?>