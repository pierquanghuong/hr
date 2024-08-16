<?= $this->extend('Modules\Admin\Views\layouts\sb2-admin') ?>
<?= $this->section('page-style') ?>
    <link href="<?= base_url('sb2-admin') ?>/vendor/daterangepicker/daterangepicker.css" rel="stylesheet">
    <style>
        .time-label {
            font-weight: normal;
            font-style: normal;
            color:midnightblue;
            font-size: .9em;
        }
        .chart h6 {
            color: #000;
            font-size: 1em;
            font-weight: bold;
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

            <div class="row">
                <div class="col-md-6 chart">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6>Thống kê các Phòng Ban  <br/> <span class="time-label"><?= $time_label ?></span></h6>
                        </div>
                        <div class="card-body char">
                            <canvas id="phongbanChart" height="200"></canvas>
                        </div>
                    </div> <!-- end chart phong ban -->
                </div>
                <div class="col-md-6 chart">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6>Top 
                                <select id="top-number"> 
                                    <option value="5">5</option> 
                                    <option value="10">10</option> 
                                </select> 
                                nhân viên <br/><span class="time-label"><?= $time_label ?></span>
                            </h6>
                        </div>
                        <div class="card-body char">
                            <canvas id="topChart" height="200"></canvas>
                        </div>
                    </div>  <!-- end chart top -->
                </div>
            </div>
              
    </div>
<?= $this->endSection() ?>

<?= $this->section('page-scripts') ?>
    <script src="<?= base_url('sb2-admin') ?>/vendor/daterangepicker/moment.min.js"></script>
    <script src="<?= base_url('sb2-admin') ?>/vendor/daterangepicker/daterangepicker.js"></script>
    <script src="<?= base_url('sb2-admin') ?>/vendor/chart.js/Chart.min.js"></script>

    <script>
        const ctx = document.getElementById('phongbanChart');
        var phongbanchart = new Chart(ctx, {
            type: 'bar',
            data: {
                    labels: <?= json_encode(array_keys($phongban)) ?>,
                    datasets: [{
                        label: 'Nhân viên được tặng quà',
                        data: <?= json_encode(array_values($phongban)) ?>,
                        backgroundColor: '#003f8f',
                        barPercentage: 1,
                        base: 1
                    }]
                },
                options: {
                indexAxis: 'y', // Make the bars horizontal
                scales: {
                        yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            userCallback: function(label, index, labels) {
                                // when the floored value is the same as the value we have a whole number
                                if (Math.floor(label) === label) {
                                    return label;
                                }

                            },
                            }
                        }],
                    }
                }
        });

        //chart top nhan vien
        const tnv = document.getElementById('topChart').getContext('2d');
        var topChart = new Chart(tnv, {
            type: 'horizontalBar',
            data: {
                    labels: <?= json_encode(array_keys($top_nhanvien)) ?>,
                    datasets: [{
                        label: 'Quà nhận được',
                        data: <?= json_encode(array_values($top_nhanvien)) ?>,
                        backgroundColor: "#ee5900", // Bar color
                        borderColor: 'rgba(75, 192, 192, 1)', // Bar border color
                        borderWidth: 1, // Border width
                        backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)'
                        ],
                    }]
                },
            options: {
                indexAxis: 'y', // Make the bars horizontal
                scales: {
                    xAxes: [{
                    ticks: {
                        beginAtZero: true,
                        userCallback: function(label, index, labels) {
                            // when the floored value is the same as the value we have a whole number
                            if (Math.floor(label) === label) {
                                return label;
                            }

                        },
                        }
                    }],
                }
            }
        });
        //change top nv
        $( "select#top-number" ).on( "change", function() {
            var optionSelected = $("option:selected", this);
            var valueSelected = this.value;
            
            var json_url = "<?= site_url('api/hr-game/count/') ?>" + valueSelected;

            $.getJSON(json_url).done(function(response) {
                    console.log(response); //debug
                    updateChart(topChart, response.nhanvien, response.count);
            } );
        } ); //end onchange

        /**
         * update chart
         */
        function updateChart(chart, label, data) {
            chart.reset();
            
            chart.data.labels.push(label);
            chart.data.datasets.forEach((dataset) => {
                dataset.data.push(data);
            });
            chart.update();
        }

    </script>
<?= $this->endSection() ?>