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
                    <div class="col-lg-12 mx-auto">
                        <?=$this->session->flashdata('pesan')?>
                        <div class="card card-outline card-success">
                            <div class="card-header">
                                <h3 class="card-title"><strong>Daftar Dokter</strong></h3>
                                <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#tambah-data"><i class="fas fa-plus"></i></button>
                            </div>
                            <div class="card-body">
                                <table id="table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center">No</th>
                                            <th style="text-align:center">Nama</th>
                                            <th style="text-align:center">#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php if ($dokter):
                                        $no = 1;
                                        foreach ($dokter as $row):    
                                    ?>
                                        <tr>
                                            <td style="text-align:right"><?=$no?></td>
                                            <td style="text-align:left"><?=$row['nama']?></td>
                                            <td align="center">
                                                <button class="btn btn-success btn-sm"><i class="fas fa-pencil-alt" data-toggle="modal" data-target="#update-data<?=$row['id']?>"></i></button>
                                                <a class="btn btn-danger btn-sm" href="<?=base_url()?>index.php/dokter/hapus_data/<?=$row['id']?>" onclick="return confirm('Yakin akan menghapus data?');"><i class="far fa-trash-alt"></i></a>
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

        <div class="modal fade" id="tambah-data">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" action="<?=base_url()?>index.php/dokter/proses_tambah" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Data</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" required>
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

        <?php foreach ($dokter as $baris): ?>
        <div class="modal fade" id="update-data<?=$baris['id']?>">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" action="<?=base_url()?>index.php/dokter/proses_update" enctype="multipart/form-data">
                        <div class="modal-header">
                            <h4 class="modal-title">Update Data</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="<?=$baris['nama']?>" required>
                            </div>
                        </div>
                        <input type="hidden" id="id" name="id" value="<?=$baris['id']?>">
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>             
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>