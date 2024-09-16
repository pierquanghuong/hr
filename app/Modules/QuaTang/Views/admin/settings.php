<?= $this->extend('Modules\Admin\Views\layouts\sb2-admin') ?>
<?= $this->section('page-style') ?>
    <link href="<?= base_url('sb2-admin') ?>/vendor/datetimepicker/dist/daterangepicker.min.css" rel="stylesheet">
    <style>
        .timepick {
            color: #cecece;
            font-size: 1em;
            font-weight: normal;
        }
        .datetime {
            margin: 0 20px;
        }
        .setting-intro p {
            padding: 10px 20px 0px 10px;
        }
        .setting-form {
            background-color:#F4F6F8;
            border-radius: 5px;
            padding: 10px;
        }
    </style>
<?php $this->endSection() ?>

<?= $this->section('content') ?> <!-- start code html here -->
    <div class="setting-hr-page">
        <!-- Page Heading -->
        <form method="POST" action="<?= site_url('admin/hr-game/settings') ?>" class="form setting-form" >

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 m-0 font-weight-bold text-primary>Cấu hình thông số cho HR GAME
                    </h6>
                </div>
                <div class="card-body">
                <div class="row">
                        <div class="col-md-4 setting-intro">
                            <p class="text-justify">
                                1. Thời gian chương trình được tính theo khoảng tuần - tháng - quý <br/>
                                2. Thời gian game bắt đầu có hiệu lực, Game sẽ kết thúc trong khoảng thời gian hiện tại <br/>
                                3. Số lần nhân viên có thể tặng trong khoảng thời gian chương trình. <br/> 
                                4. Khi game có hiệu lực - nhân viên có thể thực hiện tặng quà.
                            </p>
                        </div>
                        <div class="col-md-8 setting-form">
                                <div class="form-group">
                                    <label for="inputdefault">Cài đặt khoảng thời gian</label>
                                    <div class="input-group mb-3" id="hr-datepicker">
                                        <input type="text" name="game-start" id="game-start" class="form-control" placeholder="Thời gian bắt đầu" value="<?= $data['start_time'] ?>">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">đến</span>
                                        </div>
                                        <input type="text" name="game-end" id="game-end" class="form-control" placeholder="Thời gian kết thúc" value="<?= $data['end_time'] ?>">
                                    </div>
                                </div>
                              
                                <div class="form-row">
                                    <div class="col">
                                        <label for="inputdefault">Số lần tặng của cá nhân</label>
                                            <input class="form-control" id="inputdefault" name="game-limit" type="number" value="<?= $data['limit'] ?>">
                                    </div>
                                    <div class="col">
                                        <label for="roomlimit">Số lần tặng của phòng ban</label>
                                            <input class="form-control" id="roomlimit" name="room-limit" type="number" value="<?= $data['room_limit'] ?>">
                                    </div>
                                
                                </div>
                              

                                <hr/>
                                <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="game-enable" id="" value="enable" <?php if ($data['enable']) echo 'checked'; ?>>
                                    Chạy chương trình "TẶNG QUÀ ĐỒNG NGHIÊP - KẾT NỐI YÊU THƯƠNG"
                                </label>
                                </div>
                        </div>
                </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-4 text-left">
                            <?php if (session()->getFlashdata('message')) : ?>
                            <div class="alert alert-info alert-dismissible fade show">
                                <?= session()->getFlashdata('message') ?>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-8 text-right">
                            <a href="<?= site_url('admin/hr-game') ?>" class="btn btn-warning">Hủy</a>
                            <button type="submit" class="btn btn-primary">Lưu cấu hình</button> 
                        </div>
                    </div>
                </div> <!-- end footer -->
            </div> <!-- end card -->

        </form>

    </div>
<?= $this->endSection() ?> 

<?= $this->section('page-scripts') ?>
    <script src="<?= base_url('sb2-admin') ?>/vendor/daterangepicker/moment.min.js"></script>
    <script src="<?= base_url('sb2-admin') ?>/vendor/datetimepicker/dist/jquery.daterangepicker.min.js"></script>
    <script>
        //datetime picker
        $( document ).ready(function() {
            $('#hr-datepicker').dateRangePicker({
                autoClose: true,
                format: 'DD-MM-YYYY HH:mm:ss',
                time: {
                    enabled: true
                },
                getValue: function() {
                    if ($('#game-start').val() && $('#game-end').val() )
                        return $('#game-start').val() + ' to ' + $('#game-end').val();
                    else
                        return '';
                },
                setValue: function(s,s1,s2) {
                    $('#game-start').val(s1);
                    $('#game-end').val(s2);
                }
            });
        });
       
    </script>
<?= $this->endSection() ?>