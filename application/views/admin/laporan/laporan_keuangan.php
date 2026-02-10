<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laporan Keuangan Peternakan</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .header { text-align: center; margin-bottom: 30px; }
        .footer { margin-top: 30px; text-align: right; }
        .text-right { text-align: right; }
        .summary-box { border: 2px solid #000; padding: 10px; width: 300px; margin-top: 20px; }
        @media print {
            .no-print { display: none; }
        }
    </style>
</head>
<body onload="window.print()">
    <div class="header">
        <h1>LAPORAN KEUANGAN PETERNAKAN</h1>
        <p>Peternakan Dombaku</p>
        <p>Tanggal Cetak: <?=date('d-m-Y')?></p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Jenis</th>
                <th>Kategori</th>
                <th>Keterangan</th>
                <th class="text-right">Jumlah (Rp)</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach($daftar_transaksi as $row): ?>
            <tr>
                <td><?=$no++?></td>
                <td><?=$row['tgl_transaksi']?></td>
                <td><?=$row['jenis_transaksi']?></td>
                <td><?=$row['kategori']?></td>
                <td><?=$row['keterangan']?></td>
                <td class="text-right"><?=number_format($row['jumlah'], 0, ',', '.')?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="summary-box">
        <strong>Ringkasan:</strong><br>
        Total Pemasukan: Rp <?=number_format($summary['total_pemasukan'], 0, ',', '.')?><br>
        Total Pengeluaran: Rp <?=number_format($summary['total_pengeluaran'], 0, ',', '.')?><br>
        <hr>
        <strong>Saldo Akhir: Rp <?=number_format($summary['saldo'], 0, ',', '.')?></strong>
    </div>

    <div class="footer">
        <p>Dicetak oleh: <?=$this->session->userdata('user')?></p>
    </div>

    <div class="no-print" style="margin-top: 20px;">
        <button onclick="window.print()">Cetak</button>
        <button onclick="window.close()">Tutup</button>
    </div>
</body>
</html>
