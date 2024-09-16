<?= $this->extend('Modules\Admin\Views\layouts\sb2-admin') ?>
<?= $this->section('page-style') ?>
    <link href="<?= base_url('sb2-admin') ?>/vendor/DataTables/datatables.min.css" rel="stylesheet">
    
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
        .qrCodeModal {
            text-align: center;
        }
        .qrCodeModal img{
            width: 70%;
        }
        .modal-title-qr {
            text-align: center;
            font-weight: bold;
        }
    </style>
<?php $this->endSection() ?>

<?= $this->section('content') ?> <!-- start code html here -->
    <div class="nhanvien-page">
        <h1 class="h3 mb-2 text-gray-800">Quản Lý Nhân Viên</h1>
            <p class="mb-4">
               Khu vực quản lý thông tin nhân viên công ty.
            </p>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h5>Danh sách nhân viên</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                
                        <table id="nhanvienTable" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#Id</th>
                                    <th>Họ Tên</th>
                                    <th>Phân loại </th>
                                    <th>Phòng Ban</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $row) : ?>
                                    <?php $scan_img_link = "https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=" . site_url('tangqua/scan/' . $row['id']) . '/' . $row['mascan']  ?>
                                    <tr>
                                        <td> <?= $row['id'] ?></td>
                                        <td> <?= $row['hoten'] ?></td>
                                        <td> <?= $row['nv_type'] ?></td>
                                        <td> <?= $row['phongban'] ?></td>
                                        <td> <a href="#" id="showQr" data-name="<?= $row['hoten'] ?>" data-qr="<?= $scan_img_link ?>"> Xem mã</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>

    <!-- qrscan Modal-->
    <div class="modal fade" id="QrViewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header modal-title-qr">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="qrCodeModal">
                        <img id="NvQrCode" src="" alt="">                  
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Thoát</button>
                </div>
            </div>
        </div>
    </div>

<?= $this->endSection() ?>

<?= $this->section('page-scripts') ?>
    <script src="<?= base_url('sb2-admin') ?>/vendor/DataTables/datatables.min.js"></script>
    <script>
        // Call the dataTables jQuery plugin
        new DataTable('#nhanvienTable');

        //modal hien qr code
        $( document ).ready(function() {
            console.log( "ready!" );
            
            $(document).on("click", "#showQr", function (e) {
                e.preventDefault();
                var _self = $(this);
                var qrLink = _self.data('qr');
                var nhanvien = _self.data('name');
                $('#exampleModalLabel').text('Mã QR của ' + nhanvien);
                $('#NvQrCode').attr('src',qrLink); 
                $('#QrViewModal').modal('show');
            });
        });
       
    </script>
<?= $this->endSection() ?>