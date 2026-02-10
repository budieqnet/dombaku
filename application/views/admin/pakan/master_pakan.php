<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Master Data Pakan</h1>
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
                            <h3 class="card-title"><strong>Daftar Jenis Pakan</strong></h3>
                            <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#tambah_master"><i class="fas fa-plus"></i> Tambah Pakan Baru</button>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pakan</th>
                                        <th>Satuan</th>
                                        <th>Jenis</th>
                                        <th>Keterangan</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $no=1; foreach($pakan as $row): ?>
                                    <tr>
                                        <td><?=$no++?></td>
                                        <td><?=$row['nama_pakan']?></td>
                                        <td><?=$row['satuan']?></td>
                                        <td><?=$row['jenis_pakan']?></td>
                                        <td><?=$row['keterangan']?></td>
                                        <td>
                                            <a href="<?=base_url()?>index.php/admin_pakan/proses_hapus_master/<?=$row['id']?>" class="btn btn-danger btn-xs" onclick="return confirm('Hapus?')"><i class="fas fa-trash"></i></a>
                                        </td>
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

    <div class="modal fade" id="tambah_master">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="<?=base_url()?>index.php/admin_pakan/proses_tambah_master">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Master Pakan</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Pakan</label>
                            <input type="text" class="form-control" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label>Satuan</label>
                            <input type="text" class="form-control" name="satuan" placeholder="Kg, Gram, Liter, dll" required>
                        </div>
                        <div class="form-group">
                            <label>Jenis Pakan</label>
                            <select class="form-control" name="jenis" required>
                                <option value="Hijauan">Hijauan</option>
                                <option value="Konsentrat">Konsentrat</option>
                                <option value="Suplemen">Suplemen</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
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
