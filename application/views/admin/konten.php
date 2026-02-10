      <div class="content-wrapper">
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
              </div>
            </div>
          </div>
        </div>

        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-6 col-6">
                <div class="small-box bg-info">
                  <div class="inner">
                    <h3><?=($total_jantan)?$total_jantan['total_jantan']:"0"?></h3>
                    <p>Total Kambing Jantan</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-6">
                <div class="small-box bg-warning">
                  <div class="inner">
                    <h3><?=($total_betina)?$total_betina['total_betina']:"0"?></h3>
                    <p>Total Kambing Betina</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-lg-6">
                <div class="card card-outline card-success shadow">
                  <div class="card-header border-transparent">
                      <h3 class="card-title"><strong>Berdasarkan Usia Kambing</strong></h3>
                  </div>
                  <div class="card-body p-0">
                    <canvas id="statistik_usia" style="min-height:250px; height:250px; max-height:250px; max-width:100% mt-2"></canvas>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="card card-outline card-success shadow">
                  <div class="card-header border-transparent">
                      <h3 class="card-title"><strong>Berdasarkan Kondisi Kambing</strong></h3>
                  </div>
                  <div class="card-body p-0">
                    <canvas id="statistik_kondisi" style="min-height:250px; height:250px; max-height:250px; max-width:100% mt-2"></canvas>
                  </div>
                </div>
              </div>
            </div>

            <!-- ADG SECTION START -->
            <div class="row mt-4">
                <div class="col-sm-12">
                    <h3 class="m-0 mb-2">Analisis Pertumbuhan (ADG)</h3>
                </div>
            </div>
            <div class="row">
                <!-- Bar Chart: Top 10 Growth -->
                <div class="col-md-8">
                    <div class="card card-outline card-primary shadow">
                        <div class="card-header">
                            <h3 class="card-title"><strong>Top 10 Pertumbuhan (ADG Terbaik)</strong></h3>
                        </div>
                        <div class="card-body">
                            <canvas id="adgChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Slow Growth Alerts -->
                <div class="col-md-4">
                    <div class="card card-outline card-danger shadow">
                        <div class="card-header">
                            <h3 class="card-title"><strong>Peringatan Pertumbuhan Lambat</strong></h3>
                        </div>
                        <div class="card-body p-0" style="height: 250px; overflow-y: auto;">
                            <?php if (empty($slow_growth)): ?>
                                <div class="p-3 text-center text-muted">Semua ternak tumbuh optimal.</div>
                            <?php else: ?>
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>Kode</th>
                                            <th class="text-right">ADG (Kg/Hari)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($slow_growth as $s): ?>
                                            <tr class="table-warning">
                                                <td><a href="<?=base_url()?>index.php/admin_pertumbuhankambing/qrcode_pertumbuhan/<?=$s['kode']?>"><?=$s['kode']?></a></td>
                                                <td class="text-right text-danger"><strong><?=number_format($s['adg'], 3)?></strong></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php endif; ?>
                        </div>
                        <div class="card-footer text-center">
                            <small class="text-muted">* ADG < 0.1 Kg/Hari butuh perhatian.</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card card-outline card-info shadow">
                        <div class="card-header">
                            <h3 class="card-title"><strong>Laporan Lengkap ADG</strong></h3>
                        </div>
                        <div class="card-body">
                            <table id="table_adg" class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode</th>
                                        <th>Berat Lahir</th>
                                        <th>Berat Akhir</th>
                                        <th>Hari</th>
                                        <th>ADG</th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1; foreach($adg_report as $row): ?>
                                    <tr>
                                        <td><?=$no++?></td>
                                        <td><?=$row['kode']?></td>
                                        <td class="text-right"><?=number_format($row['berat_lahir'], 1)?></td>
                                        <td class="text-right"><?=number_format($row['berat_terakhir'], 1)?></td>
                                        <td class="text-right"><?=$row['hari_hidup']?></td>
                                        <td class="text-right"><strong><?=number_format($row['adg'], 3)?></strong></td>
                                        <td class="text-center">
                                            <a class='btn btn-info btn-xs' href='<?=base_url()?>index.php/admin_pertumbuhankambing/qrcode_pertumbuhan/<?=$row['kode']?>' ><i class="fas fa-search"></i></a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ADG SECTION END -->
            
          </div>
        </section>
      </div>
      <script type="text/javascript">
      $(document).ready(function() 
      {
        $(function() {
          var donutChartCanvas = $('#statistik_usia').get(0).getContext('2d')
          var donutData = {
            labels: [
                'Anak',
                'Remaja',
                'Muda',
                'Dewasa'
            ],
            datasets: [
              {
                data: [<?php 
                  if (!empty($statistik_usia)):
                    echo $statistik_usia["usia_anak"].",".$statistik_usia["usia_remaja"].",".$statistik_usia["usia_muda"].",".$statistik_usia["usia_dewasa"];
                  endif;
                ?>],
                backgroundColor : ['#00a65a', '#f012be', '#00c0ef', '#f56954'],
              }
            ]
          }
          var donutOptions = {
            maintainAspectRatio : false,
            responsive : true,
          }
          new Chart(donutChartCanvas, {
            type: 'pie',
            data: donutData,
            options: donutOptions
          });
        });

        $(function() {
          var donutChartCanvas = $('#statistik_kondisi').get(0).getContext('2d')
          var donutData = {
            labels: [
                'Sehat',
                'Sakit'
            ],
            datasets: [
              {
                data: [<?php 
                  if (!empty($statistik_kondisi)):
                    echo $statistik_kondisi["sehat"].",".$statistik_kondisi["sakit"];
                  endif;
                ?>],
                backgroundColor : ['#00c0ef', '#f56954'],
              }
            ]
          }
          var donutOptions = {
            maintainAspectRatio : false,
            responsive : true,
          }
          new Chart(donutChartCanvas, {
            type: 'pie',
            data: donutData,
            options: donutOptions
          });
        });

        // ADG Chart
        $(function () {
            var adgChartCanvas = $('#adgChart').get(0).getContext('2d')

            var adgData = {
                labels: [
                    <?php 
                    $top_10 = array_slice($adg_report, 0, 10);
                    foreach($top_10 as $t) echo "'".$t['kode']."',"; 
                    ?>
                ],
                datasets: [
                    {
                        label: 'ADG (Kg/Hari)',
                        backgroundColor: 'rgba(60,141,188,0.9)',
                        borderColor: 'rgba(60,141,188,0.8)',
                        data: [
                            <?php foreach($top_10 as $t) echo number_format($t['adg'], 3, '.', '').","; ?>
                        ]
                    }
                ]
            }

            var adgChartOptions = {
                maintainAspectRatio: false,
                responsive: true,
                legend: { display: false },
                scales: {
                    yAxes: [{ ticks: { beginAtZero: true } }]
                }
            }

            new Chart(adgChartCanvas, {
                type: 'bar',
                data: adgData,
                options: adgChartOptions
            })

            $("#table_adg").DataTable({
                "responsive": true,
                "autoWidth": false
            });
        });
      });
      </script>