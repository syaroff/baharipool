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
    
    <div class="container-fluid pb-8 pt-2 pt-md-5">
      <div class="row mt-5">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="px-2"><i class="fas fa-bookmark pr-2"></i> Tambah Jenis</h3>
                </div>
                <div class="card-body">
                    <form method="post">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <label for="jenis">Nama Jenis</label>
                                    <input type="hidden" name="id_jenis" id="id_jenis">
                                    <input type="text" name="nama_jenis" id="nama_jenis" class="form-control" placeholder="Enter text here">
                                </div>
                            </div>
                        </div>
                </div>
                <div class="card-footer">
                        <input type="submit" name="simpanJenis" value="Simpan" class="btn btn-danger float-right ml-2">
                        <input type="submit" name="ubahJenis" value="Ubah" class="btn btn-primary float-right">
                    </form>
                </div>
            </div>
            <div class="card mt-4 mb-4 mb-md-0">
                <div class="card-header">
                    <h3 class="px-2"><i class="fas fa-bookmark mr-2"></i> Tabel Data Jenis</h3>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush text-center">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Jenis</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $selJenis = mysqli_query($konek,"SELECT * FROM jenis");
                                $no=1;
                                foreach($selJenis as $rowJenis) {
                            ?>
                                    <tr>
                                        <td><?=$no++?></td>
                                        <td><?=$rowJenis['jenis_tempat']?></td>
                                        <td>
                                            <button onclick="edit('<?=$rowJenis['id_jenis']?>','<?=$rowJenis['jenis_tempat']?>',)" class="btn btn-sm btn-warning"><i class="fas fa-pen"></i></button>
                                            <a href="tiket.php?j=<?=$rowJenis['id_jenis']?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    
                </div>
            </div>
        </div>
        <div class="col-xl-8 mb-5">
            <div class="card">
                <div class="card-header">
                    <h3 class="px-2"><i class="fas fa-ticket-alt pr-1"></i> Generate Tiket</h3>
                </div>
                <div class="card-body">
                    <form method="post">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xl-6 mb-3">
                                    <label for="jenis">Jenis Tiket</label>
                                    <select name="jenis" id="jenis" class="form-control">
                                        <?php
                                              foreach($selJenis as $rowJenis) {
                                        ?>
                                                    <option value="<?=$rowJenis['id_jenis']?>"><?=$rowJenis['jenis_tempat']?></option>
                                        <?php
                                              }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-xl-6 mb-3">
                                    <label for="nama_tiket">Nama Tiket</label>
                                    <input type="text" name="nama_tiket" id="nama_tiket" class="form-control" placeholder="Enter text here">
                                </div>
                                <div class="col-xl-4 mb-3">
                                    <label for="jumlah">Jumlah</label>
                                    <input type="number" name="jumlah" id="jumlah" class="form-control" value="1" placeholder="Enter number here">
                                </div>
                                <div class="col-xl-4 mb-3">
                                    <label for="harga">Harga</label>
                                    <input type="number" name="harga" id="harga" class="form-control" placeholder="Enter number here">
                                </div>
                                <div class="col-xl-4 mb-3">
                                    <label for="comment">Comment</label>
                                    <input type="text" name="comment" id="comment" class="form-control" placeholder="Opsional">
                                </div>
                            </div>
                        </div>
                </div>
                <div class="card-footer">
                        <input type="submit" name="simpanTiket" value="Simpan" class="btn btn-danger float-right">
                    </form>
                </div>
            </div>
            <div class="card mt-4 mb-4 mb-md-0">
                <div class="card-header">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-6 align-items-center">
                                <h2 class="px-2 py-2 py-md-0"><i class="fas fa-ticket-alt pr-1"></i> Tabel Data Tiket</h2>
                            </div>
                            <div class="col-xl-6 d-flex flex-wrap flex-md-nowrap">
                                <select name="comment" id="id_comment" class="form-control mr-2">
                                                <option value="0" readonly>Filter</option>
                                                <option value="all">All</option>
                                    <?php 
                                    
                                              $selComment = mysqli_query($konek,"SELECT * FROM `comment`");
                                              foreach($selComment as $row) {
                                    ?>
                                                  <option value="<?=$row['id_comment']?>"><?=$row['comment']?></option>
                                    <?php
                                              }
                                              
                                    ?>
                                </select>
                                <?php
                                      if(isset($_GET['comment'])) {
                                ?>
                                        <a href="print.php?t=<?=$_GET['comment']?>" class="btn btn-danger mx-auto mx-md-0 mr-md-2 mt-2 mt-md-0"><i class="fas fa-print"></i></button>
                                        <a href="?dt=<?=$_GET['comment'];?>" class="btn btn-danger mx-auto mx-md-0 mt-2 mt-md-0"><i class="fas fa-trash-alt"></i></a> 
                                <?php
                                      }
                                ?>
                            </div>
                        </div>
                    </div>
                   
                    
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush text-center">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Tiket</th>
                                <th>Jenis</th>
                                <th>Comment</th>
                            </tr>
                        </thead>
                        <tbody>
                              
                              <?php include "../db/showTiket.php"; ?>

                        </tbody>
                        <tfoot>
                              <tr>
                                <td colspan="4">Total Tiket : <b><?=$total?></b></td>
                              </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="card-footer">
                  <nav>
                    <ul class="pagination justify-content-center">
                      <?php 
                      for($x=1;$x<=$total_halaman;$x++){
                        ?> 
                        <li class="page-item"><a class="page-link" href="<?php echo $url.$x ?>"><?php echo $x; ?></a></li>
                        <?php
                      }
                      ?>				
                    </ul>
                  </nav>
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
        const edit = (idJenis,jenis) => {
          $('#id_jenis').val(idJenis);
          $('#nama_jenis').val(jenis);
        }
        $('#id_comment').on('change', function () {
            let query = $(this).val();
            if(query == "all") {
              window.location.href= "tiket.php";
            }
            else  {
              window.location.href= "?comment=" + query;
            } 
        });
    </script>
    <?php
    
        // Input Jenis
        if(isset($_POST['simpanJenis'])) {
            $insertJenis = mysqli_query($konek,"INSERT INTO jenis (jenis_tempat) VALUES ('$_POST[nama_jenis]')");
            if($insertJenis) {
                echo "<script>window.location.href = 'tiket.php';</script>";
            }
        }
        // Ubah Jenis
        else if(isset($_POST['ubahJenis'])) {
          $ubahJenis = mysqli_query($konek,"UPDATE jenis SET jenis_tempat='$_POST[nama_jenis]' WHERE id_jenis='$_POST[id_jenis]'");
          if($ubahJenis) {
            echo "<script>window.location.href = 'tiket.php';</script>";
          }
        }
        // Hapus Jenis
        else if(isset($_GET['j'])) {
            $delJenis = mysqli_query($konek,"DELETE FROM jenis WHERE id_jenis='$_GET[j]'");
            if($delJenis) {
              echo "<script>window.location.href = 'tiket.php';</script>";
            }
        }
        // Insert tiket
        else if(isset($_POST['simpanTiket'])) {
            $comment = "TKT".date("Ymdhis")." - ".$_POST['comment'];
            $insertComment = mysqli_query($konek,"INSERT INTO `comment` (`comment`) VALUES ('$comment')");
            $selComment = mysqli_query($konek,"SELECT * FROM `comment` ORDER BY id_comment DESC LIMIT 1");foreach($selComment as $row) { $id_comment = $row['id_comment'];}
            for($i = 1;$i<=$_POST['jumlah'];$i++) {
                $insertTiket = mysqli_query($konek,"INSERT INTO tiket (id_jenis,id_comment,nama_tiket,harga) VALUES ('$_POST[jenis]','$id_comment','$_POST[nama_tiket]','$_POST[harga]')");

            }
            if($insertTiket) {
              echo "<script>window.location.href = 'tiket.php';</script>";
            }
        }
        // Delete Tiket
        else if(isset($_GET['dt'])) {
            $delTiket = mysqli_query($konek,"DELETE FROM tiket WHERE id_comment='$_GET[dt]'");
            $delComment = mysqli_query($konek,"DELETE FROM `comment` WHERE id_comment='$_GET[dt]'");
            echo "<script>window.location.href = 'tiket.php';</script>";
        }
    ?>
</body>

</html>