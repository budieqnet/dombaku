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
                        <form method="post" action="<?=base_url()?>index.php/pegawai_user/proses_ganti_password" enctype="multipart/form-data">
                            <?=$this->session->flashdata('pesan')?>
                            <div class="card card-outline card-success">
                                <div class="card-header">
                                    <h3 class="card-title"><strong>Profil</strong></h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="pass_baru" class="col-sm-3 col-form-label">Kata Kunci Baru</label>
                                        <div class="col-sm-9">
                                            <input type="hidden" id="id" name="id" value="<?=$profile_user['id']?>">
                                            <input type="text" class="form-control" id="pass_baru" name="pass_baru">
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