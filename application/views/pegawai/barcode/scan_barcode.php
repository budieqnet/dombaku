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
                        <div class="card card-outline card-success">
                            <div class="card-header">
                                <h3 class="card-title"><strong>SCAN Barcode</strong></h3>
                            </div>
                            <div class="card-body text-align-center">
                                <div class="col-md-12 text-center">
                                    <button id="startScan" class="btn btn-primary">Mulai Scan</button>
                                </div>
                                <div class="row mt-3" id="cameraContainer" style="display: none;">
                                    <div class="col-md-12">
                                        <video id="preview" class="p-1 border" style="width:100%; height:100%"></video>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="modal fade" id="qrModal" tabindex="-1" role="dialog" aria-labelledby="qrModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="qrModalLabel">Data Kambing</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="qrData">
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    <style>
        .pedigree-tree-mini ul {
            padding-top: 20px; position: relative;
            transition: all 0.5s;
            display: flex;
            justify-content: center;
        }
        .pedigree-tree-mini li {
            text-align: center;
            list-style-type: none;
            position: relative;
            padding: 20px 2px 0 2px;
            transition: all 0.5s;
        }
        .pedigree-tree-mini li::before, .pedigree-tree-mini li::after{
            content: '';
            position: absolute; top: 0; right: 50%;
            border-top: 1px solid #ccc;
            width: 50%; height: 20px;
        }
        .pedigree-tree-mini li::after{
            right: auto; left: 50%;
            border-left: 1px solid #ccc;
        }
        .pedigree-tree-mini li:only-child::after, .pedigree-tree-mini li:only-child::before {
            display: none;
        }
        .pedigree-tree-mini li:only-child{ padding-top: 0;}
        .pedigree-tree-mini li:first-child::before, .pedigree-tree-mini li:last-child::after{
            border: 0 none;
        }
        .pedigree-tree-mini li:last-child::before{
            border-right: 1px solid #ccc;
            border-radius: 0 5px 0 0;
        }
        .pedigree-tree-mini li:first-child::after{
            border-radius: 5px 0 0 0;
        }
        .pedigree-tree-mini ul ul::before{
            content: '';
            position: absolute; top: 0; left: 50%;
            border-left: 1px solid #ccc;
            width: 0; height: 20px;
        }
        .pedigree-node {
            border: 1px solid #ccc;
            padding: 5px;
            text-decoration: none;
            color: #666;
            font-size: 9px;
            display: inline-block;
            border-radius: 5px;
            transition: all 0.5s;
            background-color: white;
            min-width: 60px;
        }
        .node-jantan { border-top: 2px solid #3498db; }
        .node-betina { border-top: 2px solid #e74c3c; }
        .node-root { border-top: 2px solid #2ecc71; }
    </style>
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

        let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
        $('#startScan').click(function() {
            $('#cameraContainer').show();
            // if (window.matchMedia("(max-width: 767px)").matches) {
            //     $('#cameraContainer').addClass('fullscreen');
            // }
            Instascan.Camera.getCameras().then(function (cameras) {
                // if (cameras.length > 0) {
                //     scanner.start(cameras[0]);
                // } else {
                //     console.error('No cameras found.');
                // }
                if (cameras.length > 0) {
                    let backCamera = cameras.find(camera => camera.name.includes('back'));
                    if (backCamera) {
                        scanner.start(backCamera);
                    } else {
                        // If no back camera is found, fall back to the first available camera
                        scanner.start(cameras[0]);
                    }
                } else {
                    console.error('No cameras found.');
                }
            }).catch(function (e) {
                console.error(e);
            });
            
            scanner.addListener('scan', function (content) {
            $.ajax({
                url: '<?=base_url()?>index.php/pegawai_barcode/view_barcode',
                type: 'POST',
                data: { qr_data: content },
                success: function(response) {
                    let result = JSON.parse(response);
                    if (result.status === 'success') {
                        let profit = result.data.valuation - result.data.cop.total;
                        let profit_class = (profit >= 0) ? 'text-success' : 'text-danger';

                        function renderPedigreeJS(node, type = 'root') {
                            if (!node) return "";
                            let html = "<li><div class='pedigree-node node-" + type + "'><strong>" + node.kode + "</strong><br><small>" + node.jenis + "</small></div>";
                            if (node.jantan || node.betina) {
                                html += "<ul>";
                                if (node.jantan) html += renderPedigreeJS(node.jantan, 'jantan');
                                if (node.betina) html += renderPedigreeJS(node.betina, 'betina');
                                html += "</ul>";
                            }
                            html += "</li>";
                            return html;
                        }

                        tampil_data = "<div class='row'>" +
                                        "<div class='col-md-12'>" +
                                            "<label>Kode : " + result.data.kode + "</label><br>" +
                                            "<label>Jenis : " + result.data.jenis + "</label><br>" +
                                            "<label>Kondisi : " + result.data.kondisi + "</label><br>" +
                                        "</div>" +
                                        "<div class='col-md-12 mb-3 mt-2'>" +
                                            "<div class='card card-outline card-info'>" +
                                                "<div class='card-header'><h3 class='card-title' style='font-size:14px'><b>Financial & Profitability</b></h3></div>" +
                                                "<div class='card-body p-2'>" +
                                                    "<table class='table table-sm pb-0 mb-0'>" +
                                                        "<tr><td>Est. Harga Jual</td><td class='text-right'><b>Rp " + Number(result.data.valuation).toLocaleString('id-ID') + "</b></td></tr>" +
                                                        "<tr><td>Total Biaya (COP)</td><td class='text-right'><b>Rp " + Number(result.data.cop.total).toLocaleString('id-ID') + "</b></td></tr>" +
                                                        "<tr class='table-light'><td>Est. Profit</td><td class='text-right " + profit_class + "'><b>Rp " + Math.abs(profit).toLocaleString('id-ID') + (profit < 0 ? " (Rugi)" : "") + "</b></td></tr>" +
                                                    "</table>" +
                                                "</div>" +
                                            "</div>" +
                                        "</div>" +
                                        "<div class='col-md-12 mb-3'>" +
                                            "<div class='card card-outline card-primary'>" +
                                                "<div class='card-header'><h3 class='card-title' style='font-size:14px'><b>Pedigree (Silsilah)</b></h3></div>" +
                                                "<div class='card-body p-0 overflow-auto' style='max-height:200px'>" +
                                                    "<div class='pedigree-tree-mini'><ul>" + renderPedigreeJS(result.data.pedigree) + "</ul></div>" +
                                                "</div>" +
                                            "</div>" +
                                        "</div>" +
                                      "</div>" +
                                      "<div class='row'><div class='col-md-12 text-center mt-2'>" +
                                      "<a class='btn btn-info btn-xs mr-1' href='<?=base_url()?>index.php/pegawai_pertumbuhankambing/qrcode_pertumbuhan/" + result.data.kode + "' >Pertumbuhan</a>" + 
                                      "<a class='btn btn-warning btn-xs mr-1' href='<?=base_url()?>index.php/pegawai_vaksinkambing/qrcode_vaksin/" + result.data.kode +"'>Vaksin</a>" + 
                                      "<a class='btn btn-danger btn-xs' href='<?=base_url()?>index.php/pegawai_penyakitkambing/qrcode_penyakit/" + result.data.kode + "'>Penyakit</a>" +
                                      "</div></div>";
                        $('#qrData').html(tampil_data);
                        $('#qrModal').modal('show');
                    } else {
                        alert(result.pesan);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error: ' + status + error);
                }
            });
        });
        });
    })
    </script>