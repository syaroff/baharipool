<?php 
        session_start();
        include "../db/konek.php";
        if(!$_SESSION['username']) {
            header("Location: ../");
        }
        $comment = [];
        $total = [];
        $selectComment = mysqli_query($konek,"SELECT * FROM comment");
        foreach($selectComment as $rowComment) {
          array_push($comment,$rowComment['id_comment']);
        }
        $j = sizeof($comment);
            for($i=0;$i<$j;$i++) {
              $cekTiket = mysqli_query($konek,"SELECT COUNT(*) as total FROM tiket WHERE id_comment = $comment[$i]");
              foreach($cekTiket as $row ) {
                array_push($total,$row['total']);
                if($row['total'] <=0) {
                    $deleteComment = mysqli_query($konek,"DELETE FROM `comment` WHERE id_comment=$comment[$i]");
                }
              }
            }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Pesanan - Bahari Swimming Pool
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
            <a href="../db/signout.php" class="nav-link">
              <i class="ni ni-send text-dark"></i> Sign Out
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="main-content">
    <!-- Navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark bg-gradient-danger" id="navbar-main">
      <div class="container-fluid">
        <!-- Form -->
        <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex">
          <div class="form-group mb-0">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                <span class="input-group-text" onclick="search()"><i class="fas fa-search"></i></span>
              </div>
              <input class="form-control" id="query" placeholder="Search" type="text">
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
    
    <div class="container-fluid pb-8 pt-2 pt-md-5">
      <div class="row mt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="px-2"><i class="fas fa-plus pr-2"></i> Tambah Pesanan Baru</h3>
                </div>
                <div class="card-body">
                    <form method="post">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xl-4 mb-3">
                                      <label for="nama">Nama Pembeli</label>
                                      <input type="text" name="nama" id="nama" class="form-control" placeholder="Enter text here" required>
                                </div>
                                <div class="col-xl-4 mb-3">
                                    <label for="jenis">Jenis Tiket</label>
                                    <select name="jenis" id="jenis" class="form-control" required>
                                        <option value="0" disabled selected>Pilih Tiket</option>
                                        <?php
                                              $selJenis = mysqli_query($konek,"SELECT * FROM `comment`");
                                              foreach($selJenis as $rowJenis) {
                                        ?>
                                                    <option value="<?=$rowJenis['id_comment']?>">
                                                      <?=$rowJenis['comment']?>
                                                      <?php
                                                          
                                                          $l = 0;
                                                          echo '('.$total[$l++].')';
                                                      
                                                      ?>
                                                    </option>
                                        <?php
                                              }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-xl-4 mb-3">
                                      <label for="nama_tiket">Nama Tiket</label>
                                      <input type="text" name="nama_tiket" id="nama_tiket" class="form-control" placeholder="Enter text here" required>
                                </div>
                                <div class="col-xl-4 mb-3">
                                      <label for="jumlah">Jumlah</label>
                                      <input type="number" name="jumlah" id="jumlah" class="form-control" placeholder="Enter number here" required>
                                </div>
                                <div class="col-xl-4 mb-3">
                                      <label for="harga">Harga Satuan</label>
                                      <input type="number" name="harga" id="harga" class="form-control" value="0"  readonly required>
                                </div>
                                <div class="col-xl-4 mb-3">
                                      <label for="hatot">Harga Total</label>
                                      <input type="number" name="hatot" id="hatot" class="form-control" readonly required>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="card-footer">
                        <p class="float-left">Note: Jumlah tidak boleh melebihi jumlah tiket yg ada.</p>
                        <input type="submit" name="simpanPesanan" value="Simpan" class="btn btn-danger float-right ml-2">
                        <input type="submit" name="ubahPesanan" value="Ubah" class="btn btn-primary float-right">
                    </form>
                </div>
            </div>
            <div class="card mt-4 mb-4 mb-md-0">
                <div class="card-header">
                    <h3 class="px-2"><i class="fas fa-money-check mr-2"></i> Tabel Data Pesaanan</h3>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush text-center">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Pembeli</th>
                                <th>Tanggal</th>
                                <th>Nama Tiket</th>
                                <th>Jumlah</th>
                                <th>Harga Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                              <?php include "../db/showOrder.php"; ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    
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
        $('#jenis').change(function (e) { 
          e.preventDefault();
          let jenisVal = $(this).val();
          $.ajax({
            type: "GET",
            url: "../db/harga.php?i=" + jenisVal,
            dataType: "JSON",
            success: function (response) {
                $('#harga').val(response.harga);
            }
          });
        });
        $('#jumlah').change(function (e) { 
          e.preventDefault();
          let jumlahVal = $(this).val();
          total = jumlahVal * $('#harga').val();
          $("#hatot").val(total);
        });
        const search = () => {
          let query = $('#query').val();
          window.location.href = 'order.php?q=' + query;
        }
    </script>
    <?php
        // Insert ke tabel pesanan
        if(isset($_POST['simpanPesanan'])) {
          $tanggal = date("Y-m-d");
          
          $insert = mysqli_query($konek,"INSERT INTO `order` (id_comment,tanggal,jumlah,harga,nama_pembeli,nama_tiket) VALUES('$_POST[jenis]','$tanggal','$_POST[jumlah]','$_POST[hatot]','$_POST[nama]','$_POST[nama_tiket]')");

          //hapus tiket 

          $hapusTiket = mysqli_query($konek,"DELETE FROM tiket WHERE id_comment = '$_POST[jenis]' LIMIT $_POST[jumlah]");

          $selOrder = mysqli_query($konek,"SELECT * FROM `order` ORDER BY id_order DESC LIMIT 1");
          $rowOrder = mysqli_fetch_assoc($selOrder);$id_order = $rowOrder['id_order'];

          // Insert tabel hasil

          $insertHasil = mysqli_query($konek,"INSERT INTO hasil (id_order,tanggal,jumlah) VALUES ('$id_order','$tanggal','$_POST[hatot]')");
          if($insertHasil) {
            echo "<script>window.location.href = 'order.php';</script>";
          }

        }
        else if (isset($_GET['d'])) {
            // hapus 
            $hapusOrder = mysqli_query($konek,"DELETE FROM `order` WHERE id_order= $_GET[d]");
            echo "<script>window.location.href = 'order.php';</script>";
        }
    ?>
</body>

</html>