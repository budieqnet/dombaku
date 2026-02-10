<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laporan Pertumbuhan Ternak (ADG)</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .header { text-align: center; margin-bottom: 30px; }
        .footer { margin-top: 30px; text-align: right; }
        .text-right { text-align: right; }
        @media print {
            .no-print { display: none; }
        }
    </style>
</head>
<body onload="window.print()">
    <div class="header">
        <h1>LAPORAN PERTUMBUHAN TERNAK (ADG)</h1>
        <p>Peternakan Dombaku</p>
        <p>Tanggal Cetak: <?=date('d-m-Y')?></p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Jenis</th>
                <th class="text-right">Berat Lahir (Kg)</th>
                <th class="text-right">Berat Akhir (Kg)</th>
                <th class="text-right">Hari Hidup</th>
                <th class="text-right">ADG (Kg/Hari)</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach($adg_report as $row): ?>
            <tr>
                <td><?=$no++?></td>
                <td><?=$row['kode']?></td>
                <td><?=$row['jenis']?></td>
                <td class="text-right"><?=number_format($row['berat_lahir'], 1)?></td>
                <td class="text-right"><?=number_format($row['berat_terakhir'], 1)?></td>
                <td class="text-right"><?=$row['hari_hidup']?></td>
                <td class="text-right"><strong><?=number_format($row['adg'], 3)?></strong></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="footer">
        <p>Dicetak oleh: <?=$this->session->userdata('user')?></p>
    </div>

    <div class="no-print" style="margin-top: 20px;">
        <button onclick="window.print()">Cetak</button>
        <button onclick="window.close()">Tutup</button>
    </div>
</body>
</html>
