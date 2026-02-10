<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Log Pemberian Pakan</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <?=$this->session->flashdata('pesan')?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><strong>Riwayat Pemberian Pakan</strong></h3>
                            <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#tambah_log"><i class="fas fa-plus"></i> Catat Pemberian</button>
                        </div>
                        <div class="card-body">
                            <table id="table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="text-align:center">No</th>
                                        <th style="text-align:center">Tanggal</th>
                                        <th style="text-align:center">Kandang</th>
                                        <th style="text-align:center">Pakan</th>
                                        <th style="text-align:center">Waktu</th>
                                        <th style="text-align:center">Jumlah</th>
                                        <th style="text-align:center">Dicatat Oleh</th>
                                        <th style="text-align:center">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $no=1; foreach($logs as $row): ?>
                                    <tr>
                                        <td style="text-align:right"><?=$no++?></td>
                                        <td style="text-align:center"><?=date('d-m-Y', strtotime($row['tgl_pemberian']))?></td>
                                        <td><?=$row['nama_kandang']?></td>
                                        <td><?=$row['nama_pakan']?></td>
                                        <td style="text-align:center"><?=$row['waktu_pemberian']?></td>
                                        <td style="text-align:right"><?=number_format($row['jumlah'], 2)?> <?=$row['satuan']?></td>
                                        <td><?=$row['dibuat_oleh']?></td>
                                        <td><?=$row['keterangan']?></td>
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

    <!-- Modal Tambah Log -->
    <div class="modal fade" id="tambah_log">
        <div class="modal-dialog">
            <div class="modal-content">
                <?php 
                    $role = ($this->session->userdata('group_id') == '1') ? 'admin_pakan' : 'pegawai_pakan';
                ?>
                <form method="post" action="<?=base_url()?>index.php/<?=$role?>/proses_pemberian_pakan">
                    <div class="modal-header">
                        <h4 class="modal-title">Catat Pemberian Pakan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Kandang</label>
                            <select class="form-control select2bs4" name="id_kandang" required>
                                <option value="">--- Pilih Kandang ---</option>
                                <?php foreach($kandang as $k): ?>
                                    <option value="<?=$k['id']?>"><?=$k['nama_kandang']?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Pakan</label>
                            <select class="form-control select2bs4" name="id_pakan" required>
                                <option value="">--- Pilih Pakan ---</option>
                                <?php foreach($pakan as $p): ?>
                                    <option value="<?=$p['id']?>"><?=$p['nama_pakan']?> (<?=$p['satuan']?>)</option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" class="form-control" name="tgl" value="<?=date('Y-m-d')?>" required>
                        </div>
                        <div class="form-group">
                            <label>Waktu</label>
                            <select class="form-control" name="waktu" required>
                                <option value="Pagi">Pagi</option>
                                <option value="Siang">Siang</option>
                                <option value="Sore">Sore</option>
                                <option value="Malam">Malam</option>
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
