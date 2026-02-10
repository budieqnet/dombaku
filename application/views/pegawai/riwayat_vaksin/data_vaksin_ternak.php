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
                                <h3 class="card-title"><strong>Riwayat Vaksin [<?=$kode_ternak?>]</strong></h3>
                                <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i></button>
                            </div>
                            <div class="card-body">
                                <table id="table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center">No</th>
                                            <th style="text-align:center">Kode<br>Ternak</th>
                                            <th style="text-align:center">Tanggal<br>Vaksin</th>
                                            <th style="text-align:center">Jenis<br>Vaksin</th>
                                            <th style="text-align:center">Dosis</th>
                                            <th style="text-align:center">Dokter</th>
                                            <th style="text-align:center; width:120px">#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php if ($riwayat_vaksin):
                                        $no = 1;
                                        foreach ($riwayat_vaksin as $row):    
                                    ?>
                                        <tr>
                                            <td style="text-align:right"><?=$no?></td>
                                            <td style="text-align:center"><?=$row['kode_kambing']?></td>
                                            <td style="text-align:center"><?=tgl_indo($row['tgl_vaksin'])?></td>
                                            <td style="text-align:center"><?=$row['jenis_vaksin']?></td>
                                            <td style="text-align:center"><?=$row['dosis']?></td>
                                            <td style="text-align:center"><?=$row['dokter']?></td>
                                            <td style="text-align:center">
                                                <button class="btn btn-success btn-sm"><i class="fas fa-pencil-alt" data-toggle="modal" data-target="#update<?=$row['id']?>"></i></button>
                                                <!-- <a class="btn btn-danger btn-sm" href="<?=base_url()?>index.php/pegawai_vaksinkambing/qrcode_hapus/<?=$row['id']?>/<?=$kode_ternak?>" onclick="return confirm('Yakin akan menghapus data?');"><i class="far fa-trash-alt"></i></a> -->
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
                    <form method="post" action="<?=base_url()?>index.php/pegawai_vaksinkambing/qrcode_tambah/<?=$kode_ternak?>" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Data</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="tgl_vaksin">Tanggal Vaksin</label>
                                <input type="date" class="form-control" id="tgl_vaksin" name="tgl_vaksin" value="<?=date('Y-m-d')?>" required>
                            </div>
                            <div class="form-group">
                                <label for="jenis_vaksin">Jenis Vaksin</label>
                                <select class="form-control select2bs4" name="jenis_vaksin" required>
                                    <option value="">--- Pilih Jenis ---</option>
                                    <?php foreach ($jenis_vaksin as $row): ?>
                                    <option value="<?=$row['nama']?>"><?=$row['nama']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="dosis">Dosis (ml)</label>
                                <input type="number" class="form-control" name="dosis" step="0.1" min="0" required>
                            </div>
                            <div class="form-group">
                                <label for="dokter">Dokter</label>
                                <select class="form-control select2bs4" name="dokter" required>
                                    <option value="">--- Pilih Dokter ---</option>
                                    <?php foreach ($dokter as $row): ?>
                                    <option value="<?=$row['nama']?>"><?=$row['nama']?></option>
                                    <?php endforeach; ?>
                                </select>
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

        <?php foreach ($riwayat_vaksin as $data): ?>
        <div class="modal fade" id="update<?=$data['id']?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" action="<?=base_url()?>index.php/pegawai_vaksinkambing/qrcode_update/<?=$kode_ternak?>" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h4 class="modal-title">Update Data</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="tgl_vaksin">Tanggal Vaksin</label>
                                <input type="date" class="form-control" id="tgl_vaksin" name="tgl_vaksin" value="<?=$data['tgl_vaksin']?>" required>
                            </div>
                            <div class="form-group">
                                <label for="jenis_vaksin">Jenis Vaksin</label>
                                <select class="form-control select2bs4" name="jenis_vaksin" required>
                                    <option value="">--- Pilih Jenis ---</option>
                                    <?php foreach ($jenis_vaksin as $row): ?>
                                    <option value="<?=$row['nama']?>" <?=($row['nama']==$data['jenis_vaksin'])?"selected":""?>><?=$row['nama']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="dosis">Dosis (ml)</label>
                                <input type="number" class="form-control" name="dosis" step="0.1" min="0" value="<?=$data['dosis']?>" required>
                            </div>
                            <div class="form-group">
                                <label for="dokter">Dokter</label>
                                <select class="form-control select2bs4" name="dokter">
                                    <option value="">--- Pilih Dokter ---</option>
                                    <?php foreach ($dokter as $row): ?>
                                    <option value="<?=$row['nama']?>" <?=($row['nama']==$data['dokter'])?"selected":""?>><?=$row['nama']?></option>
                                    <?php endforeach; ?>
                                </select>
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