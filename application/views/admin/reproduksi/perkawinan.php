<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Manajemen Perkawinan</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row mt-4">
                <div class="col-lg-12 mx-auto">
                    <?=$this->session->flashdata('pesan')?>
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title"><strong>Daftar Perkawinan & Prediksi HPL</strong></h3>
                            <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i> Tambah Perkawinan</button>
                        </div>
                        <div class="card-body">
                            <table id="table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="text-align:center">No</th>
                                        <th style="text-align:center">Induk Betina</th>
                                        <th style="text-align:center">Induk Jantan</th>
                                        <th style="text-align:center">Tanggal Kawin</th>
                                        <th style="text-align:center">Prediksi HPL</th>
                                        <th style="text-align:center">Status</th>
                                        <th style="text-align:center">Keterangan</th>
                                        <th style="text-align:center">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if ($perkawinan):
                                    $no = 1;
                                    foreach ($perkawinan as $row):    
                                ?>
                                    <tr>
                                        <td style="text-align:right"><?=$no?></td>
                                        <td style="text-align:center"><?=$row['kode_induk_betina']?></td>
                                        <td style="text-align:center"><?=$row['kode_induk_jantan']?></td>
                                        <td style="text-align:center"><?=date('d-m-Y', strtotime($row['tgl_kawin']))?></td>
                                        <td style="text-align:center">
                                            <span class="badge badge-info"><?=date('d-m-Y', strtotime($row['tgl_hpl']))?></span>
                                            <br>
                                            <small class="text-muted">
                                                <?php 
                                                    $now = time();
                                                    $hpl = strtotime($row['tgl_hpl']);
                                                    $diff = $hpl - $now;
                                                    $days = round($diff / (60 * 60 * 24));
                                                    if ($days > 0) echo $days . " hari lagi";
                                                    elseif ($days == 0) echo "Hari ini!";
                                                    else echo abs($days) . " hari yang lalu";
                                                ?>
                                            </small>
                                        </td>
                                        <td style="text-align:center">
                                            <?php 
                                                $color = 'secondary';
                                                if ($row['status'] == 'Hamil') $color = 'warning';
                                                elseif ($row['status'] == 'Lahir') $color = 'success';
                                                elseif ($row['status'] == 'Gagal') $color = 'danger';
                                            ?>
                                            <span class="badge badge-<?=$color?>"><?=$row['status']?></span>
                                        </td>
                                        <td><?=$row['keterangan']?></td>
                                        <td style="text-align:center">
                                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#update<?=$row['id']?>"><i class="fas fa-pencil-alt"></i></button>
                                            <a class="btn btn-danger btn-sm" href="<?=base_url()?>index.php/admin_reproduksi/proses_hapus_perkawinan/<?=$row['id']?>" onclick="return confirm('Yakin akan menghapus data?');"><i class="far fa-trash-alt"></i></a>
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
                <form method="post" action="<?=base_url()?>index.php/admin_reproduksi/proses_tambah_perkawinan">
                    <div class="modal-header">
                        <h4 class="modal-title">Catat Perkawinan Baru</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Induk Betina</label>
                            <select class="form-control select2bs4" name="betina" required>
                                <option value="">--- Pilih Betina ---</option>
                                <?php foreach ($kambing as $k): if($k['jenis_kelamin'] == 'Betina'): ?>
                                    <option value="<?=$k['kode']?>"><?=$k['kode']?> - <?=$k['jenis']?></option>
                                <?php endif; endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Induk Jantan</label>
                            <select class="form-control select2bs4" name="jantan" required>
                                <option value="">--- Pilih Jantan ---</option>
                                <?php foreach ($kambing as $k): if($k['jenis_kelamin'] == 'Jantan'): ?>
                                    <option value="<?=$k['kode']?>"><?=$k['kode']?> - <?=$k['jenis']?></option>
                                <?php endif; endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Kawin</label>
                            <input type="date" class="form-control" name="tgl_kawin" value="<?=date('Y-m-d')?>" required>
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea class="form-control" name="keterangan"></textarea>
                        </div>
                        <p class="text-info"><i class="fas fa-info-circle"></i> Prediksi HPL akan dihitung otomatis (150 hari).</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>             
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Update -->
    <?php foreach ($perkawinan as $row): ?>
    <div class="modal fade" id="update<?=$row['id']?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="<?=base_url()?>index.php/admin_reproduksi/proses_update_perkawinan">
                    <div class="modal-header">
                        <h4 class="modal-title">Update Status Perkawinan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" value="<?=$row['id']?>">
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status" required>
                                <option value="Monitor" <?=($row['status']=='Monitor')?'selected':''?>>Monitor</option>
                                <option value="Hamil" <?=($row['status']=='Hamil')?'selected':''?>>Hamil</option>
                                <option value="Gagal" <?=($row['status']=='Gagal')?'selected':''?>>Gagal</option>
                                <option value="Lahir" <?=($row['status']=='Lahir')?'selected':''?>>Lahir</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea class="form-control" name="keterangan"><?=$row['keterangan']?></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>             
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<script>
$(document).ready(function() {
    $(".select2bs4").select2({
        theme: 'bootstrap4'
    })
})
</script>
