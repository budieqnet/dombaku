<div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Barcode</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row mt-4">
                    <div class="col-lg-12 mx-auto">
                        <form method="post" action="<?=base_url()?>index.php/pegawai_barcode/cetak_barcode" enctype="multipart/form-data" target="_blank">
                            <div class="card card-outline card-success">
                                <div class="card-header">
                                    <h3 class="card-title"><strong>Daftar Barcode</strong></h3>
                                    <button type="submit" class="btn btn-primary btn-sm float-right" name="cetak"><i class="fa fa-print"></i></button>
                                </div>
                                <div class="card-body">
                                    <table id="table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th style="text-align:center; width:20px"><input type="checkbox" id="check-all" name="check_all"></td>
                                                <th style="text-align:center; width:50px">No</th>
                                                <th style="text-align:center">Kode</th>
                                                <th style="text-align:center">Barcode</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php if ($kambing):
                                            $no = 1;
                                            foreach ($kambing as $row):    
                                        ?>
                                            <tr>
                                                <td><input type="checkbox" class="check-item" name="barcode[]" value="<?=$row['qr']?>"></td>
                                                <td style="text-align:right"><?=$no?></td>
                                                <td style="text-align:center"><?=$row['kode']?></td>
                                                <td style="text-align:center"><img src="<?=base_url('dokumen_qrcode/').$row['qr']?>" style="width:50px"></td>
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
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
    $(document).ready(function() 
    {
        $("#kode").on('change', function() {
            var kode = $("#kode").val();
            $.ajax({
                url: '<?=base_url()?>index.php/admin_idkambing/cek_kode_kambing',
                data: 'kode='+kode,
                success: function(data) {
                    $("#pesan").html(data);
                }
            })
        })
        
        $(".select2bs4").select2({
            theme: 'bootstrap4'
        })

        $('#check-all').click(function() {
            if ($(this).is(':checked'))
                $('.check-item').prop("checked", true);
            else
                $('.check-item').prop('checked', false);
        });
    })
    </script>