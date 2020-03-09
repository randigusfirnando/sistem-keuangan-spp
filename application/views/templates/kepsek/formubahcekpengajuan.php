<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>TK-IT | Form-Ubah-Cek-Pengajuan</title>

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
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Profile</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('KepalaSekolah/DataGuru') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Data Guru</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('KepalaSekolah/DataSiswa') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Data Siswa</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>BOP</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-primary py-2 collapse-inner rounded">
            <!-- Divider
            <hr class="sidebar-divider"> -->
            <a class="collapse-item" href="<?= base_url('KepalaSekolah/UangMasukBop') ?>">Uang Masuk BOP</a>
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

      <li class="nav-item  active">
        <a class="nav-link" href="<?= base_url('kepalaSekolah/CekPengajuan') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Cek Pengajuan SPP</span></a>
      </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('kepalaSekolah/DataSpp') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Data SPP</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('kepalaSekolah/Logout') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
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
          <h1 class="h3 mb-2 text-gray-800">Form Ubah Cek Pengajuan</h1>
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
          <div class="row" id="AutoLightbox">
            <div class="col-md-7">
              <div class="card shadow mb-4">
              <form action="<?= base_url('KepalaSekolah/AksiUbahCekPengajuan') ?>" method="post">
                    <?php foreach ($spp as $data) :?>
                    <div class="form-group text-center">
                        <img class="img-thumbnail" style="width: 620px; height: 570px" ; src="<?= base_url().'/assets/img/'. $data->bukti_pembayaran ?>" alt="Bukti Pembayaran">
                        <br><label for="formGroupExampleInput2" class="text-center">Bukti Pembayaran</label>
                    </div>
              </div>
            </div>
            <div class="col-md-5">
              <div class="card shadow mb-4">
              <div class="form-group">
                  <input type="hidden" class="form-control" name="id_spp" value="<?= $data->id_spp ?>">

                  <label for="formGroupExampleInput2">NIS</label>
                  <input type="text" class="form-control" name="id_user" value="<?= $data->id_user ?>" readonly>
              </div>
              <div class="form-group">
                  <label for="formGroupExampleInput2">Nama</label>
                  <input type="text" class="form-control" name="nama" value="<?= $data->nama ?>" readonly>
              </div>
              <div class="form-group">
                  <label for="formGroupExampleInput2">Bulan</label>
                  <input type="text" class="form-control" name="bulan" value="<?= $data->bulan ?>" readonly>
              </div>
              <div class="form-group">
                  <label for="formGroupExampleInput2">Nominal</label>
                  <input type="text" class="form-control" name="nominal" value="<?= $data->nominal ?>" readonly>
              </div>
              <div class="form-group">
                  <label for="formGroupExampleInput2">Nomor Rekening</label>
                  <input type="text" class="form-control" name="nomor_rekening" value="<?= $data->nomor_rekening ?>" readonly>
              </div>
              <div class="form-group">
                  <label for="formGroupExampleInput2">Status</label>
                  <select name="status" class="form-control">
                      <option value=""><?= $data->status ?></option>
                      <option>Menunggu</option>
                      <option>Lunas</option>
                      <option>Ditolak</option>
                  </select>
                  <!-- <input type="text" class="form-control" name="status" value="<?= $data->status ?>"> -->
              </div>
              
                    <?php endforeach; ?>
              </div>
            </div>
          </div>
          <div class="form-group">
                <button type="submit" class="btn btn btn-primary" style="float: right;"><i class="fa fa-edit"></i> Ubah</button>
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
  <script src="<?php echo base_url('assets/') ?>js/jquery-3.3.1.min.js"></script>

  <script src="<?php echo base_url('assets/') ?>js/AutoLightbox.js"></script>
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
