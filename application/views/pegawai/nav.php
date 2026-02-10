    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <strong><?=ucfirst($this->session->userdata('nama_lengkap'))?></strong>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="<?=base_url()?>index.php/pegawai_user/profile_user/<?=$this->session->userdata('user_id')?>" class="dropdown-item">
                        <div class="media">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">Profil</h3>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="<?=base_url()?>index.php/pegawai_user/ganti_password/<?=$this->session->userdata('user_id')?>" class="dropdown-item">
                        <div class="media">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">Ganti Kata Kunci</h3>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="<?=base_url()?>index.php/autentikasi/logout" class="dropdown-item">
                        <div class="media">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">Keluar</h3>
                            </div>
                        </div>
                    </a>
                </div>
            </li>
        </ul>
    </nav>