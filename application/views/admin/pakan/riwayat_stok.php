<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Riwayat Stok Pakan</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h3 class="card-title"><strong>Log Pergerakan Stok</strong></h3>
                            <a href="<?=base_url()?>index.php/admin_pakan/inventaris" class="btn btn-secondary btn-sm float-right"><i class="fas fa-arrow-left"></i> Kembali</a>
                        </div>
                        <div class="card-body">
                            <table id="table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Pakan</th>
                                        <th>Jenis</th>
                                        <th>Jumlah (Kg)</th>
                                        <th>Keterangan</th>
                                        <th>Petugas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $no=1; foreach($riwayat as $row): ?>
                                    <tr>
                                        <td><?=$no++?></td>
                                        <td><?=date('d-m-Y', strtotime($row['tgl_transaksi']))?></td>
                                        <td><?=$row['nama_pakan']?></td>
                                        <td>
                                            <span class="badge badge-<?=($row['jenis_transaksi']=='Masuk')?'success':'danger'?>">
                                                <?=$row['jenis_transaksi']?>
                                            </span>
                                        </td>
                                        <td style="text-align:right"><?=number_format($row['jumlah'], 2)?></td>
                                        <td><?=$row['keterangan']?></td>
                                        <td><?=$row['dibuat_oleh']?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
