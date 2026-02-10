<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Valuasi Aset Ternak</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title"><strong>Estimasi Harga Jual Real-time</strong></h3>
                            <a href="<?=base_url()?>index.php/admin_keuangan/konfigurasi" class="btn btn-info btn-sm float-right"><i class="fas fa-cog"></i> Atur Harga Pasar</a>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">Estimasi didasarkan pada harga pasar saat ini: <strong>Rp <?=number_format($harga_pasar, 0, ',', '.')?> / Kg</strong></p>
                            <table id="table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="text-align:center">No</th>
                                        <th style="text-align:center">Kode Ternak</th>
                                        <th style="text-align:center">Ras</th>
                                        <th style="text-align:center">Bobot (Kg)</th>
                                        <th style="text-align:center">Estimasi Nilai (Rp)</th>
                                        <th style="text-align:center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    $no=1; 
                                    $total_valuasi = 0;
                                    foreach($kambing as $row): 
                                        $valuasi = $row['berat_lahir'] * $harga_pasar;
                                        $total_valuasi += $valuasi;
                                ?>
                                    <tr>
                                        <td style="text-align:right"><?=$no++?></td>
                                        <td style="text-align:center"><?=$row['kode']?></td>
                                        <td><?=$row['jenis']?></td>
                                        <td style="text-align:right"><?=$row['berat_lahir']?></td>
                                        <td style="text-align:right"><strong><?=number_format($valuasi, 0, ',', '.')?></strong></td>
                                        <td style="text-align:center">
                                            <a href="<?=base_url()?>index.php/admin_keuangan/analisis_cop/<?=$row['kode']?>" class="btn btn-primary btn-xs"><i class="fas fa-chart-line"></i> Analisis Profit</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr class="table-success">
                                        <th colspan="4" style="text-align:right">TOTAL ESTIMASI ASET</th>
                                        <th style="text-align:right"><strong>Rp <?=number_format($total_valuasi, 0, ',', '.')?></strong></th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
