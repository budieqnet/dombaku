<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Kalkulator Formulasi Pakan</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title">Hitung Kebutuhan Nutrisi</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Pilih Ternak</label>
                                <select class="form-control select2bs4" id="pilih_kambing">
                                    <option value="">--- Pilih Ternak ---</option>
                                    <?php foreach($kambing as $k): ?>
                                        <option value="<?=$k['kode']?>" data-berat="<?=$k['berat_lahir']?>" data-tgl="<?=$k['tgl_lahir']?>"><?=$k['kode']?> - <?=$k['jenis']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Bobot Badan (Kg)</label>
                                <input type="number" step="0.1" class="form-control" id="bobot_kalkulasi">
                            </div>
                            <button type="button" class="btn btn-success btn-block" onclick="hitung()"><i class="fas fa-calculator"></i> Hitung</button>
                        </div>
                    </div>

                    <div id="hasil_kalkulasi" style="display:none">
                        <div class="card card-outline card-info">
                            <div class="card-header">
                                <h3 class="card-title">Rekomendasi Pakan Harian</h3>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <tr>
                                        <td><strong>Hijauan (10% BB)</strong></td>
                                        <td style="text-align:right"><span id="res_hijauan">0</span> Kg</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Konsentrat (2% BB)</strong></td>
                                        <td style="text-align:right"><span id="res_kon">0</span> Kg</td>
                                    </tr>
                                    <tr class="table-info">
                                        <td><strong>TOTAL KEBUHTUHAN</strong></td>
                                        <td style="text-align:right"><strong><span id="res_total">0</span> Kg</strong></td>
                                    </tr>
                                </table>
                                <p class="small text-muted mt-3">* Rekomendasi berdasarkan standar umum peternakan domba/kambing.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
$(document).ready(function() {
    $(".select2bs4").select2({ theme: 'bootstrap4' });
    
    $('#pilih_kambing').on('change', function() {
        var berat = $(this).find(':selected').data('berat');
        $('#bobot_kalkulasi').val(berat);
    });
});

function hitung() {
    var bb = parseFloat($('#bobot_kalkulasi').val());
    if(!bb) { alert('Masukkan bobot badan!'); return; }
    
    var h = bb * 0.1;
    var k = bb * 0.02;
    
    $('#res_hijauan').text(h.toFixed(2));
    $('#res_kon').text(k.toFixed(2));
    $('#res_total').text((h+k).toFixed(2));
    $('#hasil_kalkulasi').show();
}
</script>
