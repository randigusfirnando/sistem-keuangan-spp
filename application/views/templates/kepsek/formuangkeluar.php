<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Form Tambah Data Uang keluar</h1>
    <form action="<?= base_url('KepalaSekolah/TambahDataUangKeluar') ?>" method="post">
        <label for="">Tanggal</label>
        <input type="date" name="tanggal_keluar"><br>
        <?= form_error('tanggal_keluar') ?>

        <label for="">Nominal</label>
        <input type="text" name="nominal"> <br>
        <?= form_error('nominal') ?>

        <label for="">Foto</label>
        <input type="text" name="foto"> <br>
        <?= form_error('foto') ?>

        <label for="">Keterangan</label>
        <input type="text" name="keterangan"> <br>
        <?= form_error('keterangan') ?>

        <button type="submit">Tambah</button>

    </form>
    
</body>
</html>