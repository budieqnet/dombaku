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
                                <h3 class="card-title"><strong>Riwayat Penyakit [<?=$kode_ternak?>]</strong></h3>
                                <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i></button>
                            </div>
                            <div class="card-body">
                                <table id="table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center">No</th>
                                            <th style="text-align:center">Kode<br>Ternak</th>
                                            <th style="text-align:center">Tgl<br>Diagnosa</th>
                                            <th style="text-align:center">Penyakit</th>
                                            <th style="text-align:center">Dokter</th>
                                            <th style="text-align:center">Kondisi</th>
                                            <th style="text-align:center">#</th>
                                            <th style="text-align:center">Tindakan<br>Medis</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php if ($riwayat_penyakit):
                                        $no = 1;
                                        foreach ($riwayat_penyakit as $row):    
                                    ?>
                                        <tr>
                                            <td style="text-align:right"><?=$no?></td>
                                            <td style="text-align:center"><?=$row['kode_kambing']?></td>
                                            <td style="text-align:center"><?=tgl_indo($row['tgl_diagnosa'])?></td>
                                            <td style="text-align:center"><?=$row['penyakit']?></td>
                                            <td style="text-align:center"><?=$row['dokter_diagnosa']?></td>
                                            <td style="text-align:center">
                                                <?=($row['status_sakit'] == 'Sakit') ? "<button class='btn btn-sm btn-danger'>Sakit</button>": "<button class='btn btn-sm btn-success'>Sehat</button>"?>
                                            </td>
                                            <td style="text-align:center">
                                                <button class="btn btn-success btn-sm"><i class="fas fa-pencil-alt" data-toggle="modal" data-target="#update<?=$row['id_penyakit']?>"></i></button>
                                                <!-- <a class="btn btn-danger btn-sm" href="<?=base_url()?>index.php/pegawai_penyakitkambing/qrcode_hapus/<?=$row['id_penyakit']?>/<?=$kode_ternak?>" onclick="return confirm('Yakin akan menghapus data?');"><i class="far fa-trash-alt"></i></a> -->
                                            </td>
                                            <td style="text-align:center">
                                                <a class="btn btn-info btn-sm" href="<?=base_url()?>index.php/pegawai_pengobatankambing/qrcode_riwayat_pengobatan/<?=$row['id_penyakit']?>"><i class="fa fa-medkit"></i></a>
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
                    <form method="post" action="<?=base_url()?>index.php/pegawai_penyakitkambing/qrcode_tambah/<?=$kode_ternak?>" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Data</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="tgl_diagnosa">Tanggal Diagnosa</label>
                                <input type="date" class="form-control" id="tgl_diagnosa" name="tgl_diagnosa" value="<?=date('Y-m-d')?>" required>
                            </div>
                            <div class="form-group">
                                <label for="penyakit">Penyakit</label>
                                <textarea class="form-control summernote" id="penyakit" name="penyakit"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="gejala">Gejala</label>
                                <textarea class="form-control summernote" id="gejala" name="gejala"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="tindakan">Tindakan</label>
                                <textarea class="form-control summernote" id="tindakan" name="tindakan"></textarea>
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
                            <input type="hidden" name="kode_kambing" value="<?=$kode_ternak?>">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" id="tombol_tambah">Simpan</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>             
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php foreach ($riwayat_penyakit as $data): ?>
        <div class="modal fade" id="update<?=$data['id_penyakit']?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" action="<?=base_url()?>index.php/pegawai_penyakitkambing/qrcode_update/<?=$kode_ternak?>" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h4 class="modal-title">Update Data</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="tgl_diagnosa">Tanggal Diagnosa</label>
                                <input type="date" class="form-control" id="tgl_diagnosa" name="tgl_diagnosa" value="<?=$data['tgl_diagnosa']?>" required>
                            </div>
                            <div class="form-group">
                                <label for="penyakit">Penyakit</label>
                                <textarea class="form-control summernote" id="penyakit" name="penyakit"><?=$data['penyakit']?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="gejala">Gejala</label>
                                <textarea class="form-control summernote" id="gejala" name="gejala"><?=$data['gejala']?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="tindakan">Tindakan</label>
                                <textarea class="form-control summernote" id="tindakan" name="tindakan"><?=$data['tindakan']?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="dokter">Dokter</label>
                                <select class="form-control select2bs4" id="dokter" name="dokter" required>
                                    <option value="">--- Pilih Dokter ---</option>
                                    <?php foreach ($dokter as $row): ?>
                                    <option value="<?=$row['nama']?>" <?=($row['nama']==$data['dokter_diagnosa'])?"selected":""?>><?=$row['nama']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea class="form-control summernote" id="keterangan" name="keterangan"><?=$data['keterangan_penyakit']?></textarea>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="<?=$data['id_penyakit']?>">
                        <input type="hidden" name="kode_kambing" value="<?=$kode_ternak?>">
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