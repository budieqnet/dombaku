      <aside class="main-sidebar sidebar-dark-primary">
        <a href="<?=base_url()?>index.php/admin_backend" class="brand-link">
          <img src="<?=base_url('back_assets/')?>img/logo.png" class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light"><strong>DombaKu</strong></span>
        </a>

        <div class="sidebar">
          <nav class="mt-5">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-list-alt nav-icon"></i>
                  <p>Identifikasi<i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?=base_url()?>index.php/admin_idkambing/" class="nav-link">
                      <i class="far fa-circle nav-icon"></i><p>Pendataan</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-heart nav-icon"></i>
                  <p>Reproduksi<i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?=base_url()?>index.php/admin_reproduksi/perkawinan" class="nav-link">
                      <i class="far fa-circle nav-icon"></i><p>Perkawinan & HPL</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?=base_url()?>index.php/admin_reproduksi/birahi" class="nav-link">
                      <i class="far fa-circle nav-icon"></i><p>Monitoring Birahi</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?=base_url()?>index.php/admin_reproduksi/pedigree" class="nav-link">
                      <i class="far fa-circle nav-icon"></i><p>Silsilah (Pedigree)</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-medkit nav-icon"></i>
                  <p>Kesehatan<i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?=base_url()?>index.php/admin_pertumbuhankambing/" class="nav-link">
                      <i class="far fa-circle nav-icon"></i><p>Riwayat Pertumbuhan</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?=base_url()?>index.php/admin_vaksinkambing/" class="nav-link">
                      <i class="far fa-circle nav-icon"></i><p>Riwayat Vaksin</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?=base_url()?>index.php/admin_penyakitkambing/" class="nav-link">
                      <i class="far fa-circle nav-icon"></i><p>Riwayat Penyakit</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-utensils"></i>
                  <p>Manejemen Pakan<i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?=base_url()?>index.php/admin_pakan/inventaris" class="nav-link">
                      <i class="far fa-circle nav-icon"></i><p>Inventaris Stok</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?=base_url()?>index.php/admin_pakan/formulasi" class="nav-link">
                      <i class="far fa-circle nav-icon"></i><p>Kalkulator Nutrisi</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?=base_url()?>index.php/admin_pakan/log_pemberian" class="nav-link">
                      <i class="far fa-circle nav-icon"></i><p>Log Pemberian</p>
                    </a>
                  </li>
                   <li class="nav-item">
                    <a href="<?=base_url()?>index.php/admin_pakan/kandang" class="nav-link">
                      <i class="far fa-circle nav-icon"></i><p>Master Kandang</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-wallet"></i>
                  <p>Keuangan & Bisnis<i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?=base_url()?>index.php/admin_keuangan/valuasi" class="nav-link">
                      <i class="far fa-circle nav-icon"></i><p>Valuasi Aset</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?=base_url()?>index.php/admin_keuangan/analisis_cop" class="nav-link">
                      <i class="far fa-circle nav-icon"></i><p>Analisis COP</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?=base_url()?>index.php/admin_keuangan/transaksi" class="nav-link">
                      <i class="far fa-circle nav-icon"></i><p>Transaksi</p>
                    </a>
                  </li>
                   <li class="nav-item">
                    <a href="<?=base_url()?>index.php/admin_keuangan/konfigurasi" class="nav-link">
                      <i class="far fa-circle nav-icon"></i><p>Pengaturan</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="<?=base_url()?>index.php/admin_laporan/" class="nav-link">
                  <i class="nav-icon fa fa-file-alt"></i>
                  <p>Laporan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-cogs"></i>
                  <p>Setting<i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?=base_url()?>index.php/admin_user/daftar_user" class="nav-link">
                      <i class="far fa-circle nav-icon"></i><p>User</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?=base_url()?>index.php/jenis_kambing/" class="nav-link">
                      <i class="far fa-circle nav-icon"></i><p>Ras</p></a>
                  </li>
                  <li class="nav-item">
                    <a href="<?=base_url()?>index.php/jenis_vaksin/" class="nav-link">
                      <i class="far fa-circle nav-icon"></i><p>Vaksin</p></a>
                  </li>
                  <li class="nav-item">
                    <a href="<?=base_url()?>index.php/dokter/" class="nav-link">
                      <i class="far fa-circle nav-icon"></i><p>Dokter</p></a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-qrcode"></i>
                  <p>Barcode<i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?=base_url()?>index.php/barcode/scan_barcode/" class="nav-link">
                      <i class="far fa-circle nav-icon"></i><p>Scan</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?=base_url()?>index.php/barcode/" class="nav-link">
                      <i class="far fa-circle nav-icon"></i><p>Cetak</p></a>
                  </li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>
      </aside>