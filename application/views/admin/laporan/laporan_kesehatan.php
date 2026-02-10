<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laporan Kesehatan Ternak</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .header { text-align: center; margin-bottom: 30px; }
        .footer { margin-top: 30px; text-align: right; }
        @media print {
            .no-print { display: none; }
        }
    </style>
</head>
<body onload="window.print()">
    <div class="header">
        <h1>LAPORAN KESEHATAN TERNAK</h1>
        <p>Peternakan Dombaku</p>
        <p>Tanggal Cetak: <?=date('d-m-Y')?></p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Ternak</th>
                <th>Tanggal Diagnosa</th>
                <th>Penyakit</th>
                <th>Gejala</th>
                <th>Tindakan</th>
                <th>Dokter</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach($daftar_penyakit as $row): ?>
            <tr>
                <td><?=$no++?></td>
                <td><?=$row['kode_kambing']?></td>
                <td><?=$row['tgl_diagnosa']?></td>
                <td><?=$row['penyakit']?></td>
                <td><?=$row['gejala']?></td>
                <td><?=$row['tindakan']?></td>
                <td><?=$row['dokter_diagnosa']?></td>
                <td><?=$row['status_sakit']?></td>
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
