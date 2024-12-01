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
    <div class="vote-page">
        <h1 class="h3 mb-2 text-gray-800">Quản lý đề cử - nhân viên của năm</h1>
            <p class="mb-4">
                Chương trình nhân viên của năm - The Award 2024
            </p>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                   <div class="row">
                    <div class="col-md-6">
                    <form action="<?= site_url('admin/vote')  ?>" method="GET" class="form-inline form-horizontal float-left">
                        <h6 class="m-0 font-weight-bold text-primary">Tìm theo tên:  </h6>
                        <div class="form-group">
                            <input class="datetime form-control" id="daterange" type="text" name="nominee" value="" />
                            <button type="submit" class="btn btn-primary">Tìm</button>
                        </div>
                    </form>
                    </div>
                    <div class="col-md-6 text-right">
                        <strong>Có <span class="badge badge-success">
                            5</span> lượt đề cử
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
                                    <th>Ứng cử viên</th>
                                    <th>Người đề cử</th>
                                    <th width="10%">Giải thưởng</th>
                                    <th>Trạng thái</th>
                                    <th width="10%">Lý do</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php foreach ($votes as $vote) : ?>
                                    <tr>
                                        <td>
                                            <a href="<?= site_url('admin/vote/detail/' . $vote->id) ?>">
                                                <?php echo date('H:i d/m/Y ',strtotime($vote->created_at)) ?>
                                            </a>
                                        </td>
                                        <td><?php echo $vote->nominee_name ?>  - <?php echo $vote->nominee_room; ?></td>
                                        <td><?php echo $vote->nomineer_name; ?> - <?php echo $vote->nomineer_room; ?></td>
                                        <td>Giải thưởng <?= $vote->award + 1 ?></td>
                                        <td><?=  display_status($vote->status) ?></td>
                                        <td><span class="over"> <?php echo $vote->reason; ?> </span></td>
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