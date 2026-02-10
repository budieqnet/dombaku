<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php 
    foreach ($cetak_barcode as $row)
    {
        echo "<div style='background:white; border:1px solid; padding: 5px; display:inline-block; margin:15px; float:left'>";
        echo "<img src='".base_url('dokumen_qrcode/').$row[0]['qr']."' width='200'><br><strong>".$row[0]['kode']."</strong>";
        echo "</div>"; 
    }
    ?>
</body>
</html>