<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Silsilah Digital (Pedigree)</h1>
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
                            <form action="<?=base_url()?>index.php/admin_reproduksi/pedigree" method="get" id="form_pedigree">
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
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Visualisasi Pohon Keluarga</h3>
                        </div>
                        <div class="card-body text-center">
                            <?php if ($tree): ?>
                                <div class="pedigree-container">
                                    <style>
                                        .pedigree-tree ul {
                                            padding-top: 20px; position: relative;
                                            transition: all 0.5s;
                                            display: flex;
                                            justify-content: center;
                                        }
                                        .pedigree-tree li {
                                            text-align: center;
                                            list-style-type: none;
                                            position: relative;
                                            padding: 20px 5px 0 5px;
                                            transition: all 0.5s;
                                        }
                                        .pedigree-tree li::before, .pedigree-tree li::after{
                                            content: '';
                                            position: absolute; top: 0; right: 50%;
                                            border-top: 1px solid #ccc;
                                            width: 50%; height: 20px;
                                        }
                                        .pedigree-tree li::after{
                                            right: auto; left: 50%;
                                            border-left: 1px solid #ccc;
                                        }
                                        .pedigree-tree li:only-child::after, .pedigree-tree li:only-child::before {
                                            display: none;
                                        }
                                        .pedigree-tree li:only-child{ padding-top: 0;}
                                        .pedigree-tree li:first-child::before, .pedigree-tree li:last-child::after{
                                            border: 0 none;
                                        }
                                        .pedigree-tree li:last-child::before{
                                            border-right: 1px solid #ccc;
                                            border-radius: 0 5px 0 0;
                                        }
                                        .pedigree-tree li:first-child::after{
                                            border-radius: 5px 0 0 0;
                                        }
                                        .pedigree-tree ul ul::before{
                                            content: '';
                                            position: absolute; top: 0; left: 50%;
                                            border-left: 1px solid #ccc;
                                            width: 0; height: 20px;
                                        }
                                        .pedigree-node {
                                            border: 1px solid #ccc;
                                            padding: 10px;
                                            text-decoration: none;
                                            color: #666;
                                            font-family: arial, verdana, tahoma;
                                            font-size: 11px;
                                            display: inline-block;
                                            border-radius: 5px;
                                            transition: all 0.5s;
                                            background-color: white;
                                            min-width: 120px;
                                        }
                                        .pedigree-node:hover, .pedigree-tree li a:hover+ul li a {
                                            background: #c8e4f8; color: #000; border: 1px solid #94a0b4;
                                        }
                                        .node-jantan { border-top: 4px solid #3498db; }
                                        .node-betina { border-top: 4px solid #e74c3c; }
                                        .node-root { border-top: 4px solid #2ecc71; }
                                    </style>

                                    <div class="pedigree-tree">
                                        <?php if (!function_exists('renderNode')): ?>
                                        <?php function renderNode($node, $type = 'root') { ?>
                                            <li>
                                                <div class="pedigree-node node-<?=$type?>">
                                                    <strong><?=$node['kode']?></strong><br>
                                                    <small><?=$node['jenis']?></small>
                                                </div>
                                                <?php if ($node['jantan'] || $node['betina']): ?>
                                                    <ul>
                                                        <?php if ($node['jantan']) renderNode($node['jantan'], 'jantan'); ?>
                                                        <?php if ($node['betina']) renderNode($node['betina'], 'betina'); ?>
                                                    </ul>
                                                <?php endif; ?>
                                            </li>
                                        <?php } ?>
                                        <?php endif; ?>

                                        <ul>
                                            <?php renderNode($tree); ?>
                                        </ul>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="alert alert-info">Pilih ternak untuk melihat silsilah.</div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
$(document).ready(function() {
    $(".select2bs4").select2({
        theme: 'bootstrap4'
    })
})
</script>
