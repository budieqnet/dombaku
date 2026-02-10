<div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Kesehatan</h1>
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
                                <h3 class="card-title"><strong>Riwayat Pertumbuhan [<?=$kode_ternak?>]</strong></h3>
                                <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i></button>
                            </div>
                            <div class="card-body">
                                <table id="table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center">No</th>
                                            <th style="text-align:center">Kode<br>Ternak</th>
                                            <th style="text-align:center">Tanggal<br>Pengukuran</th>
                                            <th style="text-align:center">Berat (kg)</th>
                                            <th style="text-align:center">Tinggi (cm)</th>
                                            <th style="text-align:center">Panjang (cm)</th>
                                            <th style="text-align:center; width:120px">#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php if ($riwayat_pertumbuhan):
                                        $no = 1;
                                        foreach ($riwayat_pertumbuhan as $row):    
                                    ?>
                                        <tr>
                                            <td style="text-align:right"><?=$no?></td>
                                            <td style="text-align:center"><?=$row['kode_kambing']?></td>
                                            <td style="text-align:center"><?=tgl_indo($row['tgl_pengukuran'])?></td>
                                            <td style="text-align:center"><?=$row['berat']?></td>
                                            <td style="text-align:center"><?=$row['tinggi']?></td>
                                            <td style="text-align:center"><?=$row['panjang']?></td>
                                            <td style="text-align:center">
                                                <button class="btn btn-success btn-sm"><i class="fas fa-pencil-alt" data-toggle="modal" data-target="#update<?=$row['id']?>"></i></button>
                                                <!-- <a class="btn btn-danger btn-sm" href="<?=base_url()?>index.php/pegawai_pertumbuhankambing/qrcode_hapus/<?=$row['id']?>/<?=$kode_ternak?>" onclick="return confirm('Yakin akan menghapus data?');"><i class="far fa-trash-alt"></i></a> -->
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

        <div class="modal fade" id="tambah">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" action="<?=base_url()?>index.php/pegawai_pertumbuhankambing/qrcode_tambah/<?=$kode_ternak?>" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Data</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="tgl_pengukuran">Tanggal Pengukuran</label>
                                <input type="date" class="form-control" id="tgl_pengukuran" name="tgl_pengukuran" value="<?=date('Y-m-d')?>" required>
                            </div>
                            <div class="form-group">
                                <label for="berat">Berat (kg)</label>
                                <input type="number" class="form-control" id="berat" name="berat" step="0.1" min="0" required>
                            </div>
                            <div class="form-group">
                                <label for="tinggi">Tinggi (cm)</label>
                                <input type="number" class="form-control" id="tinggi" name="tinggi" step="0.1" min="0" required>
                            </div>
                            <div class="form-group">
                                <label for="panjang">Panjang (cm)</label>
                                <input type="number" class="form-control" id="panjang" name="panjang" step="0.1" min="0" required>
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea class="form-control summernote" name="keterangan"></textarea>
                            </div>
                            <input type="hidden" id="kode_kambing" name="kode_kambing" value="<?=$kode_ternak?>"> 
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" id="tombol_tambah">Simpan</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>             
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php foreach ($riwayat_pertumbuhan as $data): ?>
        <div class="modal fade" id="update<?=$data['id']?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" action="<?=base_url()?>index.php/pegawai_pertumbuhankambing/qrcode_update/<?=$kode_ternak?>" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h4 class="modal-title">Update Data</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="tgl_pengukuran">Tanggal Pengukuran</label>
                                <input type="date" class="form-control" id="tgl_pengukuran" name="tgl_pengukuran" value="<?=$data['tgl_pengukuran']?>" required>
                            </div>
                            <div class="form-group">
                                <label for="berat">Berat (kg)</label>
                                <input type="number" class="form-control" id="berat" name="berat" step="0.1" min="0" value="<?=$data['berat']?>">
                            </div>
                            <div class="form-group">
                                <label for="tinggi">Tinggi (cm)</label>
                                <input type="number" class="form-control" id="tinggi" name="tinggi" step="0.1" min="0" value="<?=$data['tinggi']?>" required>
                            </div>
                            <div class="form-group">
                                <label for="panjang">Panjang (cm)</label>
                                <input type="number" class="form-control" id="panjang" name="panjang" step="0.1" min="0" value="<?=$data['panjang']?>" required>
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea class="form-control summernote" name="keterangan"><?=$data['keterangan']?></textarea>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="<?=$data['id']?>">
                        <input type="hidden" name="kode_kambing" value="<?=$data['kode_kambing']?>">
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" id="tombol_update">Simpan</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>             
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>