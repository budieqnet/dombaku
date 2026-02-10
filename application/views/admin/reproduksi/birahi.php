<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Monitoring Birahi</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row mt-4">
                <div class="col-lg-12 mx-auto">
                    <?=$this->session->flashdata('pesan')?>
                    <div class="card card-outline card-warning">
                        <div class="card-header">
                            <h3 class="card-title"><strong>Catatan Birahi & Prediksi Siklus</strong></h3>
                            <button class="btn btn-warning btn-sm float-right" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i> Catat Birahi</button>
                        </div>
                        <div class="card-body">
                            <table id="table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="text-align:center">No</th>
                                        <th style="text-align:center">Kode Ternak</th>
                                        <th style="text-align:center">Tanggal Birahi</th>
                                        <th style="text-align:center">Prediksi Berikutnya</th>
                                        <th style="text-align:center">Keterangan</th>
                                        <th style="text-align:center">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if ($birahi):
                                    $no = 1;
                                    foreach ($birahi as $row):    
                                ?>
                                    <tr>
                                        <td style="text-align:right"><?=$no?></td>
                                        <td style="text-align:center"><?=$row['kode_kambing']?></td>
                                        <td style="text-align:center"><?=date('d-m-Y', strtotime($row['tgl_birahi']))?></td>
                                        <td style="text-align:center">
                                            <span class="badge badge-warning"><?=date('d-m-Y', strtotime($row['tgl_prediksi_berikutnya']))?></span>
                                            <br>
                                            <small class="text-muted">
                                                <?php 
                                                    $now = time();
                                                    $prediksi = strtotime($row['tgl_prediksi_berikutnya']);
                                                    $diff = $prediksi - $now;
                                                    $days = round($diff / (60 * 60 * 24));
                                                    if ($days > 0) echo $days . " hari lagi";
                                                    elseif ($days == 0) echo "Hari ini!";
                                                    else echo abs($days) . " hari yang lalu";
                                                ?>
                                            </small>
                                        </td>
                                        <td><?=$row['keterangan']?></td>
                                        <td style="text-align:center">
                                            <a class="btn btn-danger btn-sm" href="<?=base_url()?>index.php/admin_reproduksi/proses_hapus_birahi/<?=$row['id']?>" onclick="return confirm('Yakin akan menghapus data?');"><i class="far fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                <?php 
                                    $no++;
                                    endforeach;
                                endif;
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Tambah -->
    <div class="modal fade" id="tambah">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="<?=base_url()?>index.php/admin_reproduksi/proses_tambah_birahi">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Catatan Birahi</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Kode Ternak (Betina)</label>
                            <select class="form-control select2bs4" name="kode" required>
                                <option value="">--- Pilih Ternak ---</option>
                                <?php foreach ($kambing as $k): if($k['jenis_kelamin'] == 'Betina'): ?>
                                    <option value="<?=$k['kode']?>"><?=$k['kode']?> - <?=$k['jenis']?></option>
                                <?php endif; endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Birahi</label>
                            <input type="date" class="form-control" name="tgl_birahi" value="<?=date('Y-m-d')?>" required>
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea class="form-control" name="keterangan"></textarea>
                        </div>
                        <p class="text-warning"><i class="fas fa-info-circle"></i> Prediksi siklus berikutnya akan dihitung otomatis (21 hari).</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>             
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $(".select2bs4").select2({
        theme: 'bootstrap4'
    })
})
</script>
