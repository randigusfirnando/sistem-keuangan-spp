<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>TK-IT | Profile</title>

  <!-- Custom fonts for this template -->
  <link href="<?php echo base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?php echo base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="<?php echo base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center mb-2" href="index.html">
        <div class="sidebar-brand-icon text-center">
          <img style="width: 100rpx; height: 50px;" src="<?= base_url('/assets/img/logo.png') ?>">
        </div>
        <div class="ml-1 mx-3">
        TK-IT Insan Madani
        </div>
        
      </a>
      <hr class="sidebar-divider my-3">
      <h5 class="text-gray-100 text-center mb-3"><?= $this->session->userdata('nama'); ?></h5>
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url('Guru/index') ?>">
          <i class="fas fa-user"></i>
          <span>Profile</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Guru/DataGuru') ?>">
          <i class="fas fa-users"></i>
          <span>Data Guru</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Guru/DataSiswa') ?>">
          <i class="fas fa-user-friends"></i>
          <span>Data Siswa</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Guru/Logout') ?>">
          <i class="fas fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

        <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline bg-gray">
        <button class="rounded-circle border-1" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

   <!-- Content Wrapper -->
   <div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

  <!-- Topbar -->
  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
      <i class="fa fa-bars"></i>
    </button>
    </form>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

      <div class="topbar-divider d-none d-sm-block"></div>

    </ul>

  </nav>
  <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <?= $this->session->flashdata('pesan') ?>
          <h1 class="h3 mb-2 text-gray-800">Profile</h1>
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
          <div class="row">
            <div class="col-md-5">
              <div class="card shadow mb-4">
                <form action="<?= base_url('Guru/UbahProfile') ?>" method="post">
                    <?php foreach ($profile as $data) :?>
                    <div class="form-group text-center">
                      <img style=" height: 300px; width: 200px; " class="img-thumnail" src="<?= base_url('assets/img/'.$data->foto) ?>">
                    </div>
                    <div class="form-group">
                      <label for="formGroupExampleInput">Nama</label>
                      <input type="text" class="form-control" name="nama" value="<?= $data->nama ?>">
                    </div>
                    <div class="form-group">
                      <label for="formGroupExampleInput">NIS</label>
                      <input type="text" class="form-control" name="id_user" value="<?= $data->id_user ?>" readonly>
                    </div>
                    <div class="form-group">
                      <label for="formGroupExampleInput">Password</label>
                      <input type="password" class="form-control" name="password" value="<?= $data->password ?>" readonly>
                    </div>
                    <div class="form-group">
                      <!-- <button class="btn btn-block btn-primary">Ubah Password</button> -->
                    </div>
              </div>
            </div>
            <div class="col-md-7">
              <div class="card shadow mb-4">
              <div class="form-group">
                            <label for="formGroupExampleInput2">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir" value="<?= $data->tempat_lahir ?>">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Tanggal Lahir</label>
                            <input type="text" class="form-control" name="tanggal_lahir" value="<?= $data->tanggal_lahir ?>">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Jenis kelamin</label>
                            <input type="text" class="form-control" name="jenis_kelamin" value="<?= $data->jenis_kelamin ?>">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Agama</label>
                            <input type="text" class="form-control" name="agama" value="<?= $data->agama ?>">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Alamat</label>
                            <input type="text" class="form-control" name="alamat" value="<?= $data->alamat ?>">
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">No Hp</label>
                            <input type="text" class="form-control" name="nomor_hp" value="<?= $data->nomor_hp ?>">
                        </div>
                        
                    <?php endforeach; ?>
              </div>
            </div>
          </div>
          <div class="form-group">
                <button type="submit" class="btn btn btn-primary" style="float: right;"><i class="fa fa-edit"></i> Ubah Profile</button>
            </div>
            </form>
          </div>


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content --> 

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; TK Insan Madani 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('assets/') ?>js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?php echo base_url('assets/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo base_url('assets/') ?>js/demo/datatables-demo.js"></script>

</body>

</html>
