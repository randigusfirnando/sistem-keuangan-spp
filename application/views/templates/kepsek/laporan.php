<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Laporan Keuangan</h1>
    <form method="post">
<table border="1">
        <tr>
            <th>No</th>
            <th>Uang Masuk</th>
            <th>Uang Keluar</th>
            <th>Total</th>
        </tr>
        <?php foreach($laporan as $data):?>
        <?php $no=1 ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= number_format($data->jumlah) ?></td>
            <td><?= number_format($data->jumlah_keluar) ?></td> 
            <td><?= number_format($total = $data->jumlah -  $data->jumlah_keluar) ?></td>        
        
        <?php endforeach ;?>


    </table>
    </form>
    
    
</body>
</html>