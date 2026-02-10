<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Analisis Biaya Produksi (COP)</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h3 class="card-title">Pilih Ternak</h3>
                        </div>
                        <div class="card-body">
                            <form action="<?=base_url()?>index.php/admin_keuangan/analisis_cop" method="get">
                                <div class="form-group">
                                    <label>Ternak</label>
                                    <select class="form-control select2bs4" name="kode" onchange="this.form.submit()">
                                        <option value="">--- Pilih Ternak ---</option>
                                        <?php foreach ($kambing as $k): ?>
                                            <option value="<?=$k['kode']?>" <?=($this->input->get('kode') == $k['kode'])?'selected':''?>><?=$k['kode']?> - <?=$k['jenis']?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <?php if ($cop): ?>
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Rincian Profitabilitas : <strong><?=$kode_ternak?></strong></h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="bg-light">
                                        <th>Komponen Biaya</th>
                                        <th style="text-align:right">Nilai (Rp)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Estimasi Biaya Pakan (Rata-rata)</td>
                                        <td style="text-align:right"><?=number_format($cop['pakan'], 0, ',', '.')?></td>
                                    </tr>
                                    <tr>
                                        <td>Biaya Tenaga Kerja (Teratribusi)</td>
                                        <td style="text-align:right"><?=number_format($cop['tenaga_kerja'], 0, ',', '.')?></td>
                                    </tr>
                                    <tr>
                                        <td>Biaya Medis & Vaksin</td>
                                        <td style="text-align:right"><?=number_format($cop['medis'], 0, ',', '.')?></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr class="table-danger">
                                        <th>TOTAL BIAYA PRODUKSI (COP)</th>
                                        <th style="text-align:right"><strong><?=number_format($cop['total'], 0, ',', '.')?></strong></th>
                                    </tr>
                                    <tr class="table-success">
                                        <th>ESTIMASI HARGA JUAL (Valuasi)</th>
                                        <th style="text-align:right"><strong><?=number_format($valuasi, 0, ',', '.')?></strong></th>
                                    </tr>
                                    <?php $profit = $valuasi - $cop['total']; ?>
                                    <tr class="<?=($profit >= 0)?'table-primary':'table-warning'?>">
                                        <th>ESTIMASI KEUNTUNGAN (PROFIT)</th>
                                        <th style="text-align:right"><strong><?=number_format($profit, 0, ',', '.')?></strong></th>
                                    </tr>
                                </tfoot>
                            </table>
                            <div class="mt-4">
                                <p class="small text-muted">
                                    * Catatan:<br>
                                    - Biaya pakan dihitung berdasarkan rata-rata harian.<br>
                                    - Biaya tenaga kerja dihitung berdasarkan konfigurasi biaya bulanan per ekor.<br>
                                    - Biaya medis diambil dari riwayat vaksinasi tercatat.
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php else: ?>
                    <div class="alert alert-info">Pilih ternak untuk melihat analisis profitabilitas.</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
$(document).ready(function() {
    $(".select2bs4").select2({ theme: 'bootstrap4' });
});
</script>
