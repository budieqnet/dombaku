<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pengaturan Keuangan</h1>
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
                            <h3 class="card-title"><strong>Parameter Keuangan & Bisnis</strong></h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Parameter</th>
                                        <th>Nilai</th>
                                        <th>Satuan</th>
                                        <th>Keterangan</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $no=1; foreach($konfigurasi as $row): ?>
                                    <tr>
                                        <td><?=$no++?></td>
                                        <td><?=ucwords(str_replace('_', ' ', $row['nama_konfigurasi']))?></td>
                                        <td style="text-align:right"><strong><?=number_format($row['nilai'], 0, ',', '.')?></strong></td>
                                        <td><?=$row['satuan']?></td>
                                        <td><?=$row['keterangan']?></td>
                                        <td style="text-align:center">
                                            <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#edit<?=$row['id']?>"><i class="fas fa-edit"></i> Edit</button>
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

    <!-- Modal Edit -->
    <?php foreach ($konfigurasi as $row): ?>
    <div class="modal fade" id="edit<?=$row['id']?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="<?=base_url()?>index.php/admin_keuangan/proses_update_konf">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Parameter</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" value="<?=$row['id']?>">
                        <div class="form-group">
                            <label><?=ucwords(str_replace('_', ' ', $row['nama_konfigurasi']))?></label>
                            <input type="number" class="form-control" name="nilai" value="<?=$row['nilai']?>" required>
                        </div>
                        <p class="small text-muted">Aksi ini akan mempengaruhi estimasi valuasi dan COP seluruh ternak secara real-time.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
