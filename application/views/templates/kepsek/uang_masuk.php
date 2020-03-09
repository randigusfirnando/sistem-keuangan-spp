<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>TK-IT | Uang Masuk</title>

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
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('KepalaSekolah/index') ?>">
        <i class="fas fa-user"></i>
          <span>Profile</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('KepalaSekolah/DataGuru') ?>">
        <i class="fas fa-users"></i>
          <span>Data Guru</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('KepalaSekolah/DataSiswa') ?>">
        <i class="fas fa-user-friends"></i>
          <span>Data Siswa</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-tasks"></i>
          <span>BOP</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-primary py-2 collapse-inner rounded">
            <!-- Divider
            <hr class="sidebar-divider"> -->
            <a class="collapse-item  active" href="<?= base_url('KepalaSekolah/UangMasukBop') ?>">Uang Masuk BOP</a>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <a class="collapse-item" href="<?= base_url('KepalaSekolah/UangKeluarBop') ?>">Uang Keluar BOP</a>
            <!-- Divider -->
            <hr class="sidebar-divider">
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('kepalaSekolah/CekPengajuan') ?>">
        <i class="fas fa-money-check-alt"></i>
          <span>Cek Pengajuan SPP</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('kepalaSekolah/DataSpp') ?>">
            <i class="fas fa-archive"></i>
            <span>Data SPP</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('kepalaSekolah/Logout') ?>">
        <i class="fa fa-sign-out-alt"></i>
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
          <h1 class="h3 mb-2 text-gray-800">Data Uang Masuk BOP</h1>
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                <i class="fas fa-plus"></i>
                Tambah Data Uang Masuk
                </button>

                <a href="<?= base_url('KepalaSekolah/LaporanUangMasukPrint') ?>" type="submit" class="btn btn btn-warning"><i class="fas fa-print"></i> Print</a>


                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Tambah Data Uang Masuk BOP</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="<?= base_url('KepalaSekolah/TambahDataUangMasuk') ?>" method="post">
                      <div class="modal-body">
                      <div class="row">
                        <div class="col">
                          <div class="p-5">
                            <form class="user">
                            <label for="nominal">Nominal Uang Masuk</label>
                              <div class="form-group">
                                <input type="text" class="form-control form-control-user" placeholder="Masukkan Nominal Nya" name="nominal" required>
                              </div>
                              <label for="nominal">Tanggal Uang Masuk</label>
                              <div class="form-group">
                                <input type="date" class="form-control form-control-user" name="tanggal_masuk" required>
                              </div>
                          </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                  <tr>
                    <th style="widows: 5%">No</th>
                    <th>Nominal Uang Masuk</th>
                    <th>Tanggal Uang Masuk</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $no=1; ?>
                  <?php foreach($bop as $data):?>
                      <tr>
                          <td><?= $no++ ?></td>
                          <td><?= "Rp " . number_format($data->nominal,2,',','.') ?></td>
                          <td><?= $data->tanggal_masuk  ?></td>
                      </tr>
                  <?php endforeach ;?>
                  </tbody>
                </table>

                <?php foreach($bop as $data):?>
                 <!-- Modal Ubah Data -->
                 <div class="modal fade" id="update<?= $data->id_uangmasuk ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ubah Data Uang Masuk</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>

                      <form action="<?= base_url('KepalaSekolah/EditUangMasuk/') .$data->id_uangmasuk ?>" method="post">
                      <div class="modal-body">
                      <div class="row">
                        <div class="col">
                          <div class="p-5">
                            <form class="user">
                            <label for="nominal">Nominal</label>
                              <div class="form-group">
                                <input type="text" class="form-control form-control-user" placeholder="Masukkan Nominal Nya" name="nominal" value="<?= $data->nominal ?>" required>
                              </div>
                              <label for="nominal">Tanggal Masuk</label>
                              <div class="form-group">
                                <input type="date" class="form-control form-control-user" name="tanggal_masuk" value="<?= $data->tanggal_masuk ?>" required>
                              </div>
                          </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Ubah data</button>
                        </form>

                      </div>
                    </div>
                  </div>
              
                </div>
                <?php endforeach ;?>
            </div>
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
