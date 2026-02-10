<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Master Data Kandang</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <?=$this->session->flashdata('pesan')?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h3 class="card-title"><strong>Daftar Kandang / Kelompok</strong></h3>
                            <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#tambah_kandang"><i class="fas fa-plus"></i> Tambah Kandang Baru</button>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kandang</th>
                                        <th>Lokasi</th>
                                        <th>Kapasitas</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $no=1; foreach($kandang as $row): ?>
                                    <tr>
                                        <td><?=$no++?></td>
                                        <td><?=$row['nama_kandang']?></td>
                                        <td><?=$row['lokasi']?></td>
                                        <td><?=$row['kapasitas']?> Ekor</td>
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

    <div class="modal fade" id="tambah_kandang">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="<?=base_url()?>index.php/admin_pakan/proses_tambah_kandang">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Master Kandang</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Kandang / Kelompok</label>
                            <input type="text" class="form-control" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label>Lokasi</label>
                            <input type="text" class="form-control" name="lokasi">
                        </div>
                        <div class="form-group">
                            <label>Kapasitas (Ekor)</label>
                            <input type="number" class="form-control" name="kapasitas">
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
