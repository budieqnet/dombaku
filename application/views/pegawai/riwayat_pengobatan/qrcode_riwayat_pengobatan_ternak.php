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
                        <form method="post" action="<?=base_url()?>index.php/pegawai_penyakitkambing/qrcode_update_kondisi/<?=$riwayat_penyakit_ternak['id_penyakit']?>/<?=$riwayat_penyakit_ternak['kode_kambing']?>" enctype="multipart/form-data">
                            <div class="card card-outline card-success">
                                <div class="card-header">
                                    <h3 class="card-title"><strong>Tindakan Medis</strong></h3>
                                    <a class="btn btn-warning btn-sm float-right" href="<?=base_url()?>index.php/pegawai_penyakitkambing/qrcode_penyakit/<?=$riwayat_penyakit_ternak['kode_kambing']?>"><i class="fa fa-backward"></i></a>
                                </div>
                                <div class="card-body">
                                    <table id="table" class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td style="text-align:right"><b>Kode Ternak</b></td>
                                                <td><?=$riwayat_penyakit_ternak['kode_kambing']?></td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:right"><b>Penyakit</b></td>
                                                <td><?=$riwayat_penyakit_ternak['penyakit']?></td>
                                            </tr>
                                            <tr>
                                                <td style="text-align:right"><b>Tgl Diagnosa</b></td>
                                                <td><?=tgl_indo($riwayat_penyakit_ternak['tgl_diagnosa'])?></td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td style="text-align:right"><b>Kondisi</b></td>
                                                <td>
                                                    <div style="display:flex;align-items:center">
                                                        <select class="form-control" id="kondisi" name="kondisi" style="width:40%;height:38px">
                                                            <?php foreach ($kondisi_kambing as $row): ?>
                                                            <option value="<?=$row['nama']?>" <?=($row['nama']==$riwayat_penyakit_ternak['status_sakit'])?"selected":""?>><?=$row['nama']?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <button type="submit" class="btn btn-info btn-sm ml-2">Update kondisi</button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </forM>
                        <?=$this->session->flashdata('pesan')?>
                        <div class="card card-outline card-success mt-4">
                            <div class="card-header">
                                <h3 class="card-title"><strong>Riwayat Pengobatan</strong></h3>
                                <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#tambah"><i class="fa fa-plus"></i></button>
                            </div>
                            <div class="card-body">
                            <table id="table2" class="table table-bordered table-striped">
                                    <thead>
                                        <th style="text-align:center">No.</th>
                                        <th style="text-align:center">Tgl<br>Pengobatan</th>
                                        <th style="text-align:center">Obat</th>
                                        <th style="text-align:center">Duras (Hari)i</th>
                                        <th style="text-align:center">Dokter</th>
                                        <th style="text-align:center">#</th>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1; foreach ($riwayat_pengobatan_ternak as $row): ?>
                                        <tr>
                                            <td style="text-align:right"><?=$no?></td>
                                            <td style="text-align:center"><?=tgl_indo($row['tgl_pengobatan'])?></td>
                                            <td><?=$row['obat']?></td>
                                            <td style="text-align:center"><?=$row['durasi']?></td>
                                            <td style="text-align:center"><?=$row['dokter_pengobatan']?></td>
                                            <td style="text-align:center">
                                                <button class="btn btn-success btn-sm"><i class="fas fa-pencil-alt" data-toggle="modal" data-target="#update<?=$row['id_pengobatan']?>"></i></button>
                                                <a class="btn btn-danger btn-sm" href="<?=base_url()?>index.php/pegawai_pengobatankambing/qrcode_hapus/<?=$row['id_pengobatan']?>/<?=$row['id_riwayat_sakit']?>" onclick="return confirm('Yakin akan menghapus data?');"><i class="far fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    <?php $no++; endforeach;?>
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
                    <form method="post" action="<?=base_url()?>index.php/pegawai_pengobatankambing/qrcode_tambah/<?=$riwayat_penyakit_ternak['id_penyakit']?>" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Data</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="tgl_pengobatan">Tanggal Pengobatan</label>
                                <input type="date" class="form-control" id="tgl_pengobatan" name="tgl_pengobatan" value="<?=date('Y-m-d')?>" required>
                            </div>
                            <div class="form-group">
                                <label for="obat">Obat</label>
                                <textarea class="form-control summernote" id="obat" name="obat"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="durasi">Durasi (hari)</label>
                                <input type="number" class="form-control" id="durasi" name="durasi">
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
                                <textarea class="form-control summernote" id="keterangan" name="keterangan"></textarea>
                            </div>
                            <input type="hidden" id="id_riwayat_sakit" name="id_riwayat_sakit" value="<?=$riwayat_penyakit_ternak['id_penyakit']?>">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" id="tombol_tambah">Simpan</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>             
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php foreach ($riwayat_pengobatan_ternak as $data): ?>
        <div class="modal fade" id="update<?=$data['id_pengobatan']?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" action="<?=base_url()?>index.php/pegawai_pengobatankambing/qrcode_update/<?=$data['id_riwayat_sakit']?>" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h4 class="modal-title">Update Data</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="tgl_pengobatan">Tanggal Pengobatan</label>
                                <input type="date" class="form-control" id="tgl_pengobatan" name="tgl_pengobatan" value="<?=$data['tgl_pengobatan']?>" required>
                            </div>
                            <div class="form-group">
                                <label for="obat">Obat</label>
                                <textarea class="form-control summernote" id="obat" name="obat"><?=$data['obat']?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="durasi">Durasi (hari)</label>
                                <input type="number" class="form-control" id="durasi" name="durasi" value="<?=$data['durasi']?>">
                            </div>
                            <div class="form-group">
                                <label for="dokter">Dokter</label>
                                <select class="form-control select2bs4" id="dokter" name="dokter" required>
                                    <option value="">--- Pilih Dokter ---</option>
                                    <?php foreach ($dokter as $row): ?>
                                    <option value="<?=$row['nama']?>" <?=($row['nama']==$data['dokter_pengobatan'])?"selected":""?>><?=$row['nama']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea class="form-control summernote" id="keterangan" name="keterangan"><?=$data['keterangan_pengobatan']?></textarea>
                            </div>
                            <input type="hidden" id="id_pengobatan" name="id_pengobatan" value="<?=$data['id_pengobatan']?>">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" id="tombol_tambah">Simpan</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>             
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>