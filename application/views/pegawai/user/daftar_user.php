    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Setting</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row mt-4">
                    <div class="col-12 mx-auto">
                        <?=$this->session->flashdata('pesan')?>
                        <div class="card card-outline card-success">
                            <div class="card-header">
                                <h3 class="card-title"><strong>Daftar User</strong></h3>
                                <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#tambah-user"><i class="fas fa-plus"></i></button>
                            </div>
                            <div class="card-body">
                                <table id="table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center">No.</th>
                                            <th style="text-align:center">User</th>
                                            <th style="text-align:center">Nama Lengkap</th>
                                            <th style="text-align:center">Level</th>
                                            <th style="text-align:center">Tanggal Dibuat</th>
                                            <th style="text-align:center">Dibuat Oleh</th>
                                            <th style="text-align:center">#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php if ($daftar_user):
                                        $no = 1;
                                        foreach ($daftar_user as $row):    
                                    ?>
                                        <tr>
                                            <td style="text-align:right"><?=$no?></td>
                                            <td style="text-align:left"><?=$row['user']?></td>
                                            <td style="text-align:left"><?=$row['nama_lengkap']?></td>
                                            <td style="text-align:center"><?=$row['group_nama']?></td>
                                            <td style="text-align:center"><?=tgl_indo2($row['tgl_dibuat'])?></td>
                                            <td style="text-align:center"><?=$row['dibuat_oleh']?></td>
                                            <td align="center">
                                                <?php if ($row['id'] == $this->session->userdata('user_id') || $row['id'] == '1'): ?>
                                                <a class="btn btn-danger btn-sm disabled" href="<?=base_url()?>index.php/admin_user/hapus_user/<?=$row['id']?>" onclick="return confirm('Yakin akan menghapus data?');"><i class="far fa-trash-alt"></i></a>
                                                <?php else: ?>
                                                <a class="btn btn-danger btn-sm" href="<?=base_url()?>index.php/admin_user/hapus_user/<?=$row['id']?>" onclick="return confirm('Yakin akan menghapus data?');"><i class="far fa-trash-alt"></i></a>
        										<?php endif; ?>
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

        <div class="modal fade" id="tambah-user">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" action="<?=base_url()?>index.php/admin_user/proses_tambah_user" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Data</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama_lengkap">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
                            </div>
                            <div class="form-group">
                                <label for="user" class="col-sm-3 col-form-label">User</label>
                                <input type="text" class="form-control" id="user" name="user" required>
                            </div>
                            <div class="form-group">
                                <label for="group" class="col-sm-3 col-form-label">Level</label>
                                <select class="form-control" id="group" name="group" required>
                                    <option value="">--- Pilih Level ---</option>
                                    <?php foreach ($group as $row): ?>
                                    <option value=<?=$row['id']?>><?=$row['nama']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>