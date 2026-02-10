<div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Riwayat Kesehatan</h1>
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
                                <h3 class="card-title"><strong>Riwayat Pengobatan</strong></h3>
                                <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i></button>
                            </div>
                            <div class="card-body">
                                <table id="table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center">No</th>
                                            <th style="text-align:center">Kode<br>Kambing</th>
                                            <th style="text-align:center">Nama<br>Penyakit</th>
                                            <th style="text-align:center">Tanggal<br>Pengobatan</th>
                                            <th style="text-align:center">Dokter</th>
                                            <th style="text-align:center; width:120px">#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php if ($riwayat_pengobatan):
                                        $no = 1;
                                        foreach ($riwayat_pengobatan as $row):    
                                    ?>
                                        <tr>
                                            <td style="text-align:right"><?=$no?></td>
                                            <td style="text-align:center"><?=$row['kode_kambing']?></td>
                                            <td style="text-align:center"><?=$row['nama_penyakit']?></td>
                                            <td style="text-align:center"><?=tgl_indo($row['tgl_pengobatan'])?></td>
                                            <td style="text-align:center"><?=$row['dokter']?></td>
                                            <td style="text-align:center">
                                                <button class="btn btn-success btn-sm"><i class="fas fa-pencil-alt" data-toggle="modal" data-target="#update<?=$row['id']?>"></i></button>
                                                <a class="btn btn-danger btn-sm" href="<?=base_url()?>index.php/pegawai_pengobatankambing/hapus_data/<?=$row['id']?>" onclick="return confirm('Yakin akan menghapus data?');"><i class="far fa-trash-alt"></i></a>
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
                    <form method="post" action="<?=base_url()?>index.php/pegawai_pengobatankambing/proses_tambah" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Data</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="kode_kambing">Kode Kambing</label>
                                <select class="form-control select2bs4" id="kode_kambing" name="kode_kambing" required>
                                    <option value="">--- Pilih Kode ---</option>
                                    <?php foreach ($riwayat_penyakit as $row): ?>
                                    <option value="<?=$row['kode_kambing']?>"><?=$row['kode_kambing']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nama_penyakit">Nama Penyakit</label>
                                <input type="text" class="form-control" id="nama_penyakit" name="nama_penyakit" required>
                            </div>
                            <div class="form-group">
                                <label for="tgl_pengobatan">Tanggal Pengobatan</label>
                                <input type="date" class="form-control" id="tgl_pengobatan" name="tgl_pengobatan" required>
                            </div>
                            <div class="form-group">
                                <label for="jenis_pengobatan">Jenis Pengobatan</label>
                                <select class="form-control select2bs4" name="jenis_pengobatan" required>
                                    <option value="">--- Pilih Jenis Pengobatan ---</option>
                                    <option value="Injeksi">Injeksi</option>
                                    <option value="Oral">Oral</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="dosis">Dosis (ml)</label>
                                <input type="number" class="form-control" id="dosis" name="dosis" step="0.1" min="0">
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
                                <textarea class="form-control summernote" name="keterangan"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" id="tombol_tambah">Simpan</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>             
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php foreach ($riwayat_pengobatan as $data): ?>
        <div class="modal fade" id="update<?=$data['id']?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" action="<?=base_url()?>index.php/pegawai_pengobatankambing/proses_update" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h4 class="modal-title">Update Data</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                        <div class="form-group">
                                <label for="kode_kambing">Kode Kambing</label>
                                <select class="form-control select2bs4" name="kode_kambing" required>
                                    <option value="">--- Pilih Kode ---</option>
                                    <?php foreach ($riwayat_penyakit as $row): ?>
                                    <option value="<?=$row['kode_kambing']?>" <?=($row['kode_kambing']==$data['kode_kambing'])?"selected":""?>><?=$row['kode_kambing']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nama_penyakit">Nama Penyakit</label>
                                <input type="text" class="form-control" name="nama_penyakit" value="<?=$data['nama_penyakit']?>" required>
                            </div>
                            <div class="form-group">
                                <label for="tgl_pengobatan">Tanggal Pengobatan</label>
                                <input type="date" class="form-control" id="tgl_pengobatan" name="tgl_pengobatan" value="<?=$data['tgl_pengobatan']?>" required>
                            </div>
                            <div class="form-group">
                                <label for="jenis_pengobatan">Jenis Pengobatan</label>
                                <select class="form-control select2bs4" name="jenis_pengobatan" required>
                                    <option value="">--- Pilih Jenis Pengobatan ---</option>
                                    <option value="Injeksi" <?=($data['jenis']=='Injeksi')?"selected":""?>>Injeksi</option>
                                    <option value="Oral" <?=($data['jenis']=='Oral')?"selected":""?>>Oral</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="dosis">Dosis (ml)</label>
                                <input type="number" class="form-control" name="dosis" step="0.1" min="0" value="<?=$data['dosis']?>">
                            </div>
                            <div class="form-group">
                                <label for="durasi">Durasi (hari)</label>
                                <input type="number" class="form-control" name="durasi" value="<?=$data['durasi']?>">
                            </div>
                            <div class="form-group">
                                <label for="dokter">Dokter</label>
                                <select class="form-control select2bs4" name="dokter" required>
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

    <script>
    $(document).ready(function() 
    {
        console.log("dokumen siap");
        $("#kode_kambing").on('change', function() {
            var kode_kambing = $('#kode_kambing').val();
            $.ajax({
                url:'<?=base_url()?>index.php/pegawai_penyakitkambing/data_kambing_penyakit',
                data: 'kode_kambing='+kode_kambing,
                success: function(hasil) {
                    $('#nama_penyakit').val(hasil);
                }
            });
        });
    })
    </script>