<html>
    <title>

    </title>
    <head>
        <!-- Custom fonts for this template -->
  <link href="<?php echo base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?php echo base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="<?php echo base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    </head>
    <body>
        <center>
            <br>
        <h1>Data Uang Keluar BOP</h1>
        <h3>TK IT Insan Madani</h3>
        <div class="row">
            <div class="col-md-8 mx-auto" >
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nominal Uang Keluar</th>
                    <th>Tanggal Uang Keluar</th>
                    <th>Bukti Foto</th>
                    <th>Keterangan</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $no=1; ?>
                  <?php foreach($bop as $data):?>
                      <tr>
                          <td><?= $no++ ?></td>
                          <td><?="Rp " .number_format($data->nominal,2,',','.') ?></td>
                          <td><?= $data->tanggal_keluar  ?></td>
                          <td><img target="_blank" class="img-thumbnail" style="width: 300px; height: 200px" ; src="<?= base_url().'/assets/img/'. $data->foto ?>"></td></td>
                          <td><?= $data->keterangan ?></td>
                    </tr>
                  <?php endforeach ;?>
                  </tbody>
                </table>

            </div>
        </div>
        
                <script type="text/javascript">
                    window.print();
                </script>

    </body>
</html>