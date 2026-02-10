    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>U s e r</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row mt-4">
                    <div class="col-md-6 mx-auto">
                        <form method="post" action="<?=base_url()?>index.php/pegawai_user/proses_update_profil" enctype="multipart/form-data">
                            <?=$this->session->flashdata('pesan')?>
                            <div class="card card-outline card-success">
                                <div class="card-header">
                                    <h3 class="card-title"><strong>Profil</strong></h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="nama_lengkap" class="col-sm-3 col-form-label">Nama Lengkap</label>
                                        <div class="col-sm-9">
                                            <input type="hidden" id="id" name="id" value="<?=$profile_user['id']?>">
                                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?=$profile_user['nama_lengkap']?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="user" class="col-sm-3 col-form-label">U s e r</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="user" name="user" value="<?=$profile_user['user']?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a class="btn btn-danger float-right ml-2" href="javascript:window.history.go(-1)">Batal</a>
                                    <button type="submit" class="btn btn-info float-right">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>