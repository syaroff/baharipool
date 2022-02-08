<?php 
        session_start();
        include "../db/konek.php";
        if(!$_SESSION['username']) {
            header("Location: ../");
        }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Dashboard - Bahari Swimming Pool
  </title>
  <!-- Favicon -->
  <link href="../assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="../assets/js/plugins/nucleo/css/nucleo.css" rel="stylesheet" />
  <link href="../assets/js/plugins/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="../assets/css/argon-dashboard.css?v=1.1.2" rel="stylesheet" />
</head>

<body class="">
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="">
        <h3>Bahari Swimming Pool</h3>
      </a>
      <!-- User -->
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="./index.html">
                  <h1>Bahari Swimming Pool</h1>
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        
        <!-- Sidebar -->
        <?php include "../components/sidebar.php" ?>
        <!-- Divider -->
        <hr class="my-3">
        <ul class="navbar-nav">
          <li class="nav-item active active-pro">
            <a class="nav-link" href="../db/signout">
              <i class="ni ni-send text-dark"></i> Sign Out
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
      <div class="container-fluid">
        <!-- Form -->
        <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex">
          <div class="form-group mb-0">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
              </div>
              <input class="form-control" placeholder="Search" type="text">
            </div>
          </div>
        </form>
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
          <li class="nav-item dropdown">
            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                  <img alt="Image placeholder" src="../assets/img/theme/team-4-800x800.jpg">
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                  <span class="mb-0 text-sm  font-weight-bold"><?= $_SESSION['username'] ?></span>
                </div>
              </div>
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <!-- End Navbar -->
    <!-- Header -->
    <div class="header bg-gradient-danger pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-6 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Pesanan</h5>
                      <?php $selOrder = mysqli_query($konek,"SELECT COUNT(*) AS total FROM `order`");$rowOrder=mysqli_fetch_assoc($selOrder); ?>
                      <span class="h2 font-weight-bold mb-0"><?=$rowOrder['total']?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fa-chart-bar"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-6 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Penghasilan</h5>
                      <?php $total = 0;$selHasil = mysqli_query($konek,"SELECT jumlah FROM hasil");foreach($selHasil as $row) {$total += $row['jumlah'];} ?>
                      <span class="h2 font-weight-bold mb-0">Rp. <?=$total?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                        <i class="fas fa-percent"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid mt--7">
      <div class="row mt-5">
        <div class="col-xl-8">
            <div class="card">
                <h2 class="px-4 pt-2">Tabel Data Pesanan</h2>
                <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered">
                          <thead class="thead-light">
                              <tr>
                                <th>No</th>
                                <th>Nama Pembeli</th>
                                <th>Tanggal</th>
                                <th>Tiket</th>
                                <th>Jumlah</th>
                                <th>harga Total</th>
                              </tr>
                          </thead>
                          <tbody>
                          <?php 

                              if(!isset($_GET['q'])) {
                                  $selectOrder = mysqli_query($konek,"SELECT * FROM vworder LIMIT 10");
                                  $no = 1;
                                  foreach($selectOrder as $row) {
                              ?>
                                      <tr>
                                          <td><?=$no++;?></td>
                                          <td><?=$row['nama_pembeli']?></td>
                                          <td><?=$row['tanggal'];?></td>
                                          <td><?=$row['nama_tiket'];?></td>
                                          <td><?=$row['jumlah'];?></td>
                                          <td><?=$row['hatot'];?></td>
                                      </tr>
                              <?php
                                  }
                              } 
                              ?>
                          </tbody>
                      </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4">
          <div class="card">
          <h2 class="px-4 pt-2">Tabel Data Penghasilan</h2>
                <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered">
                          <thead class="thead-light">
                              <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Jumlah</th>
                              </tr>
                          </thead>
                          <tbody>
                          <?php 

                              if(!isset($_GET['q'])) {
                                  $selectOrder = mysqli_query($konek,"SELECT * FROM hasil LIMIT 10");
                                  $no = 1;
                                  foreach($selectOrder as $row) {
                              ?>
                                      <tr>
                                          <td><?=$no++;?></td>
                                          <td><?=$row['tanggal'];?></td>
                                          <td><?=$row['jumlah'];?></td>
                                      </tr>
                              <?php
                                  }
                              } 
                              ?>
                          </tbody>
                      </table>
                    </div>
                </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--   Core   -->
  <script src="../assets/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="../assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--   Optional JS   -->
  <script src="../assets/js/plugins/chart.js/dist/Chart.min.js"></script>
  <script src="../assets/js/plugins/chart.js/dist/Chart.extension.js"></script>
  <!--   Argon JS   -->
  <script src="../assets/js/argon-dashboard.min.js?v=1.1.2"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
  </script>
</body>

</html>