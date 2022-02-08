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
    Laporan Penghasilan - Bahari Swimming Pool
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
<body>
    <div class="container-fluid">
        <div class="row">
            <?php 
                $select = mysqli_query($konek,"SELECT * FROM vwtiket WHERE id_comment='$_GET[t]'");
                while($rows=mysqli_fetch_assoc($select)) {
            ?>
                <div class="card col-3">
                    <div class="card-body">
                        <center>
                            <h4 style="font-size: 5rem;"><i class="fas fa-swimming-pool"></i></h4>
                            <h4 style="letter-spacing: .2em;">BAHARI SWIMMING POOL</h4>
                            <small><?= $rows['comment']; ?></small>
                            <hr>
                        </center>
                        <div class="row">
                            <div class="col-12">
                                <p class="my-2">ID Tiket : <?= $rows['id_tiket']; ?></p>
                            </div>
                            <div class="col-12">
                                <p class="my-2">Nama Tiket : <?= $rows['nama_tiket']; ?> </p>
                            </div>
                            <div class="col-12">
                                <p class="my-2">Harga : <?= $rows['harga']; ?> </p>
                            </div>
                            <div class="col-12">
                                <p class="my-2">Jenis Tempat / Tiket : <?= $rows['jenis_tempat']; ?> </p>
                            </div>
                        </div>
                        <hr>
                        <center>
                            <p class=""><b>TIKET MASUK & KELUAR | JANGAN DIHILANGKAN</b></p>
                        </center>
                    </div>
                </div>
            <?php
                }
            ?>
        </div>
    </div>
    <script>
        window.print();
    </script>
</body>
</html>