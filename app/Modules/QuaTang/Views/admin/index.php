<?= $this->extend('Modules\Admin\Views\layouts\sb2-admin') ?>
<?= $this->section('page-style') ?>
    <link href="<?= base_url('sb2-admin') ?>/vendor/daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="<?= base_url('sb2-admin') ?>/vendor/DataTables/datatables.min.css" rel="stylesheet">
    <link href="<?= base_url('sb2-admin') ?>/vendor/DataTables/buttons.dataTables.css" rel="stylesheet">
    
    <style>
        .hr-game-page table{
            color: #000;
        }
        .timepick {
            color: #cecece;
            font-size: 1em;
            font-weight: normal;
        }
        .datetime {
            margin: 0 20px;
        }
        .time-label {
            font-weight: bold;
            color: blue;
        }
        table td:last-child {
            max-width: 300px; 
            min-width: 70px; 
            overflow: hidden; 
            text-overflow: 
            ellipsis; 
            white-space: nowrap;
        }
    </style>
<?php $this->endSection() ?>

<?= $this->section('content') ?> <!-- start code html here -->
    <div class="hr-game-page">
        <h1 class="h3 mb-2 text-gray-800">Quản Lý Hr-Game - Tặng Quà đồng nghiệp</h1>
            <p class="mb-4">
                Chương trình Hr-Game tặng quà cho đồng nghiệp. Được phát triển bởi Phòng Nhân Sự nhằm tăng sự đoàn kết cho anh em công ty.
                Mọi chi tiết xin liên hệ về Phòng Nhân Sư.
            </p>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                   <div class="row">
                    <div class="col-md-6">
                    <form action="<?= site_url('admin/hr-game')  ?>" method="GET" class="form-inline form-horizontal float-left">
                        <h6 class="m-0 font-weight-bold text-primary">Tìm theo thời gian:  </h6>
                        <div class="form-group">
                            <input class="datetime form-control" id="daterange" type="text" name="daterange" value="" />
                            <button type="submit" class="btn btn-primary">Tìm</button>
                        </div>
                    </form>
                    </div>
                    <div class="col-md-6 text-right">
                        <strong>Có <span class="badge badge-success">
                            <?= $count_quatang ?></span> lượt tặng quà <span class="time-label"><?= $time_label; ?></span>
                        </strong>
                    </div>
                   </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                
                        <table id="PresentTable" class="display nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Thời gian</th>
                                    <th>Người nhận</th>
                                    <th>Người tặng</th>
                                    <th width="10%">Lý do</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php foreach ($quatang as $row) : ?>
                                    <tr>
                                        <td>
                                            <a href="<?= site_url('admin/hr-game/detail/' . $row->id) ?>">
                                                <?php echo date('H:i d/m/Y ',strtotime($row->created_at)) ?>
                                            </a>
                                        </td>
                                        <td><?php echo $row->tennguoinhan; ?> - <?php echo $row->phongnguoinhan; ?></td>
                                        <td><?php echo $row->tennguoitang ?>  - <?php echo $row->phongnguoitang; ?> (<?= $row->diemnguoitang ?> điểm)</td>
                                        <td><span class="over"> <?php echo $row->ly_do; ?> </span></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

    </div>
<?= $this->endSection() ?>

<?= $this->section('page-scripts') ?>
    <script src="<?= base_url('sb2-admin') ?>/vendor/daterangepicker/moment.min.js"></script>
    <script src="<?= base_url('sb2-admin') ?>/vendor/DataTables/datatables.min.js"></script>
    <script src="<?= base_url('sb2-admin') ?>/vendor/DataTables/dataTables.buttons.js"></script>
    <script src="<?= base_url('sb2-admin') ?>/vendor/DataTables/buttons.dataTables.js"></script>
    <script src="<?= base_url('sb2-admin') ?>/vendor/DataTables/jszip.min.js"></script>
    <script src="<?= base_url('sb2-admin') ?>/vendor/DataTables/buttons.html5.min.js"></script>
    <script src="<?= base_url('sb2-admin') ?>/vendor/daterangepicker/daterangepicker.js"></script>
    <script>
        // Call the dataTables jQuery plugin
        new DataTable('#PresentTable', {
            layout: {
                topStart: {
                    buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5']
                }
            }
        });

        $('input[name="daterange"]').daterangepicker({
            "showWeekNumbers": true,
            ranges: {
                'Hôm nay': [moment(), moment()],
                'Tuần này': [moment().startOf('week'), moment().endOf('week')],
                'Tháng này': [moment().startOf('month'), moment().endOf('month')],
                'Quý này': [moment().startOf('quarter'), moment().endOf('quarter')]
            },
            "locale": {
                "format": "DD-MM-YYYY HH:mm:ss",
                "separator": " - ",
                "applyLabel": "Chọn",
                "cancelLabel": "Hủy",
                "fromLabel": "Bắt đầu",
                "toLabel": "đến",
                "customRangeLabel": "Tùy chọn",
                "weekLabel": "Tuần",
                "firstDay": 1
            },
            "linkedCalendars": false,
            "showCustomRangeLabel": false,
            }, function(start, end, label) {
            console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
        });
    </script>
<?= $this->endSection() ?>