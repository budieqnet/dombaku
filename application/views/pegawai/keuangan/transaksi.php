<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Modul Transaksi</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <?=$this->session->flashdata('pesan')?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title"><strong>Riwayat Transaksi Bisnis</strong></h3>
                            <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#tambah_transaksi"><i class="fas fa-plus"></i> Catat Transaksi</button>
                        </div>
                        <div class="card-body">
                            <table id="table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th style="text-align:center">No</th>
                                        <th style="text-align:center">Tanggal</th>
                                        <th style="text-align:center">Jenis</th>
                                        <th style="text-align:center">Kategori</th>
                                        <th style="text-align:center">Jumlah (Rp)</th>
                                        <th style="text-align:center">Dicatat Oleh</th>
                                        <th style="text-align:center">Keterangan</th>
                                        <?php if($this->session->userdata('group_id') == '1'): ?>
                                        <th style="text-align:center">#</th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $no=1; foreach($transaksi as $row): ?>
                                    <tr>
                                        <td style="text-align:right"><?=$no++?></td>
                                        <td style="text-align:center"><?=date('d-m-Y', strtotime($row['tgl_transaksi']))?></td>
                                        <td style="text-align:center">
                                            <?php 
                                                $color = 'secondary';
                                                if ($row['jenis_transaksi'] == 'Penjualan') $color = 'success';
                                                elseif ($row['jenis_transaksi'] == 'Pembelian') $color = 'danger';
                                                elseif ($row['jenis_transaksi'] == 'Operasional') $color = 'warning';
                                            ?>
                                            <span class="badge badge-<?=$color?>"><?=$row['jenis_transaksi']?></span>
                                        </td>
                                        <td><?=$row['kategori']?></td>
                                        <td style="text-align:right"><strong><?=number_format($row['jumlah'], 0, ',', '.')?></strong></td>
                                        <td><?=$row['dibuat_oleh']?></td>
                                        <td><?=$row['keterangan']?></td>
                                        <?php if($this->session->userdata('group_id') == '1'): ?>
                                        <td style="text-align:center">
                                            <a class="btn btn-danger btn-sm" href="<?=base_url()?>index.php/admin_keuangan/proses_hapus_transaksi/<?=$row['id']?>" onclick="return confirm('Yakin akan menghapus data?');"><i class="far fa-trash-alt"></i></a>
                                        </td>
                                        <?php endif; ?>
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

    <!-- Modal Tambah Transaksi -->
    <div class="modal fade" id="tambah_transaksi">
        <div class="modal-dialog">
            <div class="modal-content">
                <?php 
                    $role = ($this->session->userdata('group_id') == '1') ? 'admin_keuangan' : 'pegawai_keuangan';
                ?>
                <form method="post" action="<?=base_url()?>index.php/<?=$role?>/proses_transaksi">
                    <div class="modal-header">
                        <h4 class="modal-title">Catat Transaksi Baru</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" class="form-control" name="tgl" value="<?=date('Y-m-d')?>" required>
                        </div>
                        <div class="form-group">
                            <label>Jenis Transaksi</label>
                            <select class="form-control" name="jenis" required>
                                <option value="Penjualan">Penjualan (Pemasukan)</option>
                                <?php if($this->session->userdata('group_id') == '1'): ?>
                                <option value="Pembelian">Pembelian (Pengeluaran)</option>
                                <?php endif; ?>
                                <option value="Operasional">Operasional (Pengeluaran)</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kategori</label>
                            <input type="text" class="form-control" name="kategori" placeholder="misal: Jual Kambing, Beli Bibit, Listrik, dll" required>
                        </div>
                        <div class="form-group">
                            <label>Jumlah (Rp)</label>
                            <input type="number" class="form-control" name="jumlah" required>
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
