      <aside class="main-sidebar sidebar-dark-primary">
        <a href="<?=base_url()?>index.php/pegawai_backend" class="brand-link">
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
                    <a href="<?=base_url()?>index.php/pegawai_idkambing/" class="nav-link">
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
                    <a href="<?=base_url()?>index.php/pegawai_reproduksi/perkawinan" class="nav-link">
                      <i class="far fa-circle nav-icon"></i><p>Perkawinan & HPL</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?=base_url()?>index.php/pegawai_reproduksi/birahi" class="nav-link">
                      <i class="far fa-circle nav-icon"></i><p>Monitoring Birahi</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?=base_url()?>index.php/pegawai_reproduksi/pedigree" class="nav-link">
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
                    <a href="<?=base_url()?>index.php/pegawai_pertumbuhankambing/" class="nav-link">
                      <i class="far fa-circle nav-icon"></i><p>Riwayat Pertumbuhan</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?=base_url()?>index.php/pegawai_vaksinkambing/" class="nav-link">
                      <i class="far fa-circle nav-icon"></i><p>Riwayat Vaksin</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?=base_url()?>index.php/pegawai_penyakitkambing/" class="nav-link">
                      <i class="far fa-circle nav-icon"></i><p>Riwayat Penyakit</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-utensils"></i>
                  <p>Log Pakan<i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?=base_url()?>index.php/pegawai_pakan/log_pemberian" class="nav-link">
                      <i class="far fa-circle nav-icon"></i><p>Catat Pemberian</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-wallet"></i>
                  <p>Transaksi Keuangan<i class="right fas fa-angle-left"></i></p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?=base_url()?>index.php/pegawai_keuangan/transaksi" class="nav-link">
                      <i class="far fa-circle nav-icon"></i><p>Catat Penjualan</p>
                    </a>
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
                    <a href="<?=base_url()?>index.php/pegawai_barcode/scan_barcode/" class="nav-link">
                      <i class="far fa-circle nav-icon"></i><p>Scan</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?=base_url()?>index.php/pegawai_barcode/" class="nav-link">
                      <i class="far fa-circle nav-icon"></i><p>Cetak</p></a>
                  </li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>
      </aside>