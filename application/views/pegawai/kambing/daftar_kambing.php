    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Identifikasi</h1>
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
                                <h3 class="card-title"><strong>Pendataan</strong></h3>
                                <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#tambah"><i class="fas fa-plus"></i></button>
                            </div>
                            <div class="card-body">
                                <table id="table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center">No</th>
                                            <th style="text-align:center">Kode<br>Ternak</th>
                                            <th style="text-align:center">Ras</th>
                                            <!-- <th style="text-align:center">Tanggal<br>Lahir</th> -->
                                            <th style="text-align:center">Umur</th>
                                            <th style="text-align:center">Berat<br>Lahir (Kg)</th>
                                            <th style="text-align:center">Jenis<br>Kelamin</th>
                                            <th style="text-align:center">Kode<br>Induk<br>Jantan</th>
                                            <th style="text-align:center">Kode<br>Induk<br>Betina</th>
                                            <th style="text-align:center; width:120px">#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php if ($kambing):
                                        $no = 1;
                                        foreach ($kambing as $row):    
                                    ?>
                                        <tr>
                                            <td style="text-align:right"><?=$no?></td>
                                            <td style="text-align:center"><?=$row['kode']?></td>
                                            <td style="text-align:center"><?=$row['jenis']?></td>
                                            <!-- <td style="text-align:center"><?=tgl_indo($row['tgl_lahir'])?></td> -->
                                            <td style="text-align:center"><?=$row['umur']?></td>
                                            <td style="text-align:center"><?=$row['berat_lahir']?></td>
                                            <td style="text-align:center"><?=$row['jenis_kelamin']?></td>
                                            <td style="text-align:center"><?=$row['kode_induk_jantan']?></td>
                                            <td style="text-align:center"><?=$row['kode_induk_betina']?></td>
                                            <td style="text-align:center">
                                                <button class="btn btn-success btn-sm"><i class="fas fa-pencil-alt" data-toggle="modal" data-target="#update<?=$row['id']?>"></i></button>
                                                <!-- <a class="btn btn-danger btn-sm" href="<?=base_url()?>index.php/pegawai_idkambing/hapus_kambing/<?=$row['id']?>" onclick="return confirm('Yakin akan menghapus data?');"><i class="far fa-trash-alt"></i></a> -->
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
                    <form method="post" action="<?=base_url()?>index.php/pegawai_idkambing/proses_tambah" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Data</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="kode">Kode Ternak</label>
                                <input type="text" class="form-control" id="kode" name="kode" required>
                                <span class="badge badge-danger" id="pesan"></span>
                            </div>
                            <div class="form-group">
                                <label for="jenis">Ras</label>
                                <select class="form-control select2bs4" name="jenis" required>
                                    <option value="">--- Pilih Ras ---</option>
                                    <?php foreach ($jenis_kambing as $row): ?>
                                    <option value="<?=$row['nama']?>"><?=$row['nama']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tgl_lahir">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tgl_lahir" required>
                            </div>
                            <div class="form-group">
                                <label for="berat_lahir">Berat Lahir (Kg)</label>
                                <input type="number" class="form-control" name="berat_lahir" step="0.1" min="0" required>
                            </div>
                            <div class="form-group">
                                <label for="sex">jenis Kelamin</label>
                                <select class="form-control select2bs4" name="sex" required>
                                    <option value="">--- Pilih Jenis Kelamin ---</option>
                                    <?php foreach ($kelamin_kambing as $row): ?>
                                    <option value="<?=$row['nama']?>"><?=$row['nama']?></option>
                                    <?php endforeach; ?>\
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="kij">Kode Induk Jantan</label>
                                <select class="form-control select2bs4" name="kij">
                                    <option value="">--- Pilih Kode Induk Jantan ---</option>
                                    <option value="Kosong">Tidak Ada Induk</option>
                                    <?php foreach ($kambing as $row):?>
                                    <option value="<?=$row['kode']?>"><?=$row['kode'].' - '.$row['jenis']?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="kib">Kode Induk Betina</label>
                                <select class="form-control select2bs4" name="kib">
                                    <option value="">--- Pilih Kode Induk Betina ---</option>
                                    <option value="Kosong">Tidak Ada Induk</option>
                                    <?php foreach ($kambing as $row):?>
                                    <option value="<?=$row['kode']?>"><?=$row['kode'].' - '.$row['jenis']?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="kondisi">Kondisi</label>
                                <select class="form-control select2bs4" name="kondisi" required>
                                    <option value="">--- Pilih Kondisi ---</option>
                                    <?php foreach ($kondisi_kambing as $row): ?>
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

        <?php foreach ($kambing as $data): ?>
        <div class="modal fade" id="update<?=$data['id']?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" action="<?=base_url()?>index.php/pegawai_idkambing/proses_update" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h4 class="modal-title">Update Data</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="kode">Kode Ternak</label>
                                <input type="text" class="form-control" name="kode" value="<?=$data['kode']?>" required>
                            </div>
                            <div class="form-group">
                                <label for="jenis">Ras</label>
                                <select class="form-control select2bs4" name="jenis" required>
                                    <option value="">--- Pilih Ras ---</option>
                                    <?php foreach ($jenis_kambing as $row): ?>
                                    <option value="<?=$row['nama']?>" <?=($row['nama']==$data['jenis'])?"selected":""?>><?=$row['nama']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tgl_lahir">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tgl_lahir" value="<?=$data['tgl_lahir']?>" required>
                            </div>
                            <div class="form-group">
                                <label for="berat_lahir">Berat Lahir (Kg)</label>
                                <input type="number" class="form-control" name="berat_lahir" step="0.1" min="0" value="<?=$data['berat_lahir']?>" required>
                            </div>
                            <div class="form-group">
                                <label for="sex">jenis Kelamin</label>
                                <select class="form-control select2bs4" name="sex" required>
                                    <option value="">--- Pilih Jenis Kelamin ---</option>
                                    <?php foreach ($kelamin_kambing as $row): ?>
                                    <option value="<?=$row['nama']?>" <?=($row['nama']==$data['jenis_kelamin'])?"selected":""?>><?=$row['nama']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="kij">Kode Induk Jantan</label>
                                <select class="form-control select2bs4" name="kij" required>
                                    <option value="">--- Pilih Kode Induk Jantan ---</option>
                                    <option value="Kosong" <?=($data['kode_induk_jantan']=="Kosong")?"selected":""?>>Tidak Ada Induk</option>
                                    <?php foreach ($kambing as $row):?>
                                    <option value="<?=$row['kode']?>" <?=($row['kode']==$data['kode_induk_jantan'])?"selected":""?>><?=$row['kode'].' - '.$row['jenis']?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="kib">Kode Induk Betina</label>
                                <select class="form-control select2bs4" name="kib" required>
                                    <option value="">--- Pilih Kode Induk Betina ---</option>
                                    <option value="Kosong" <?=($data['kode_induk_betina']=="Kosong")?"selected":""?>>Tidak Ada Induk</option>
                                    <?php foreach ($kambing as $row):?>
                                    <option value="<?=$row['kode']?>" <?=($row['kode']==$data['kode_induk_betina'])?"selected":""?>><?=$row['kode'].' - '.$row['jenis']?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="kondisi">Kondisi</label>
                                <select class="form-control select2bs4" name="kondisi" required>
                                    <option value="">--- Pilih Kondisi ---</option>
                                    <?php foreach ($kondisi_kambing as $row): ?>
                                    <option value="<?=$row['nama']?>" <?=($row['nama']==$data['kondisi'])?"selected":""?>><?=$row['nama']?></option>
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
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>             
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

        <?php foreach ($kambing as $baris): ?>
        <div class="modal fade" id="lihat<?=$baris['id']?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Detil Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group text-center">
                            <img src="<?=base_url('dokumen_qrcode/').$baris['qr']?>" width="75%">
                        </div>
                        <div class="form-group">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td style="text-align:right">Kode Ternak :</td>
                                        <td><?=$data['kode']?></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:right">Ras :</td>
                                        <td><?=$data['jenis']?></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:right">Tanggal Lahir :</td>
                                        <td><?=tgl_indo($baris['tgl_lahir'])?></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:right">Berat Lahir :</td>
                                        <td><?=$baris['berat_lahir']?> Kg</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:right">Jenis Kelamin :</td>
                                        <td><?=$baris['jenis_kelamin']?></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:right">Kode Induk Jantan :</td>
                                        <td><?=$baris['kode_induk_jantan']?></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:right">Kode Induk Betina :</td>
                                        <td><?=$baris['kode_induk_betina']?></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:right">Kondisi :</td>
                                        <td><?=$baris['kondisi']?></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:right">Keterangan :</td>
                                        <td><?=$baris['keterangan']?></td>
                                    </tr>
                                    <tr>
                                        <td style="text-align:right">Diupdate oleh :</td>
                                        <td><?=(!empty($baris['diedit_oleh']))?$baris['diedit_oleh']:$baris['dibuat_oleh']?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <script>
    $(document).ready(function() 
    {
        $("#kode").on('change', function() {
            var kode = $("#kode").val();
            $.ajax({
                url: '<?=base_url()?>index.php/admin_idkambing/cek_kode_kambing',
                data: 'kode='+kode,
                success: function(data) {
                    if (data) {
                        $("#pesan").html(data);
                        $("#tombol_tambah").prop("disabled", true);
                    }
                    else {
                        $("#pesan").empty();
                        $("#tombol_tambah").prop("disabled", false);
                    }
                }
            })
        })

        $(".select2bs4").select2({
            theme: 'bootstrap4'
        })
    })
    </script>