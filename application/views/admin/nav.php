    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <!-- <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <?=($jumlah_notifikasi['jumlah'] > 0) ? '<span class="badge badge-danger navbar-badge">'.$jumlah_notifikasi['jumlah'].'</span>' : '';  ?>
                    <span class="badge badge-danger navbar-badge"><?=$jumlah_notifikasi['jumlah']?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header"><?= ($jumlah_notifikasi['jumlah'] > 0) ? $jumlah_notifikasi['jumlah'].' notifikasi masuk' : 'Tidak ada notifikasi'; ?></span>
                    <div class="dropdown-divider"></div>
                <?php 
                if ($daftar_notifikasi):
                    foreach ($daftar_notifikasi as $row):
                ?>
                    <a href="<?=base_url().$row['url']?>" class="dropdown-item" data-id="<?=$row['id']?>">
                        <i class="fas fa-envelope mr-2"></i> <?=$row['judul']?>
                    </a>
                    <div class="dropdown-divider"></div>
                <?php
                    endforeach;
                endif;
                ?>
                </div>
            </li> -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <strong><?=ucfirst($this->session->userdata('nama_lengkap'))?></strong>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="<?=base_url()?>index.php/admin_user/profile_user/<?=$this->session->userdata('user_id')?>" class="dropdown-item">
                        <div class="media">
                            <div class="media-body">
                                <h3 class="dropdown-item-title">Profil</h3>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="<?=base_url()?>index.php/admin_user/ganti_password/<?=$this->session->userdata('user_id')?>" class="dropdown-item">
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

    <!-- <script>
    $(document).ready(function() {
       $(document).on('click', '.dropdown-item', function() {
            var id = $(this).data('id');
            var aksi = $(this).data('aksi');

            if (aksi == 'Hapus') {
                $.ajax({
                    method: 'post',
                    data: {id:id, aksi:aksi},
                    url: '<?=base_url()?>index.php/admin_backend/proses_notifikasi_hapus',
                    success: function(data) {
                        window.location.reload(true);
                    }
                });
            }
       });
    });
    </script> -->