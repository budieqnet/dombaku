<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Inventaris Pakan</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <?=$this->session->flashdata('pesan')?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title"><strong>Stok Pakan Saat Ini</strong></h3>
                            <div class="card-tools">
                                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambah_stok"><i class="fas fa-plus"></i> Transaksi Stok</button>
                                <a href="<?=base_url()?>index.php/admin_pakan/master_pakan" class="btn btn-info btn-sm"><i class="fas fa-list"></i> Kelola Master Pakan</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="text-align:center">No</th>
                                        <th style="text-align:center">Nama Pakan</th>
                                        <th style="text-align:center">Jenis</th>
                                        <th style="text-align:center">Stok</th>
                                        <th style="text-align:center">Satuan</th>
                                        <th style="text-align:center">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $no=1; foreach($master_pakan as $row): ?>
                                    <tr>
                                        <td style="text-align:right"><?=$no++?></td>
                                        <td><?=$row['nama_pakan']?></td>
                                        <td style="text-align:center"><?=$row['jenis_pakan']?></td>
                                        <td style="text-align:right"><strong><?=number_format($row['stok'], 2)?></strong></td>
                                        <td style="text-align:center"><?=$row['satuan']?></td>
                                        <td style="text-align:center">
                                            <a href="<?=base_url()?>index.php/admin_pakan/riwayat_stok/<?=$row['id']?>" class="btn btn-info btn-xs"><i class="fas fa-history"></i> Riwayat</a>
                                        </td>
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

    <!-- Modal Transaksi Stok -->
    <div class="modal fade" id="tambah_stok">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="<?=base_url()?>index.php/admin_pakan/proses_tambah_stok">
                    <div class="modal-header">
                        <h4 class="modal-title">Transaksi Stok Pakan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Pilih Pakan</label>
                            <select class="form-control select2bs4" name="id_pakan" required>
                                <?php foreach($master_pakan as $p): ?>
                                    <option value="<?=$p['id']?>"><?=$p['nama_pakan']?> (<?=$p['satuan']?>)</option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" class="form-control" name="tgl" value="<?=date('Y-m-d')?>" required>
                        </div>
                        <div class="form-group">
                            <label>Jenis Transaksi</label>
                            <select class="form-control" name="jenis" required>
                                <option value="Masuk">Masuk (Penambahan Stok)</option>
                                <option value="Keluar">Keluar (Pengurangan Stok)</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jumlah</label>
                            <input type="number" step="0.01" class="form-control" name="jumlah" required>
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea class="form-control" name="keterangan"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $(".select2bs4").select2({ theme: 'bootstrap4' });
});
</script>
