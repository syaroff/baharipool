<?php 

    include "konek.php";
    $batas = 10;
    $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
    $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	

    $previous = $halaman - 1;
    $next = $halaman + 1;
    
    $data = mysqli_query($konek,"select * from vwTiket");
    $jumlah_data = mysqli_num_rows($data);
    $total_halaman = ceil($jumlah_data / $batas);

    if(!isset($_GET['comment'])) {
        $url = "?halaman=";
        $total = 0;
        $selTotal = mysqli_query($konek,"SELECT COUNT(*) as total FROM vwTiket"); foreach($selTotal as $t) { $total = $t['total']; };
        $dataTiket = mysqli_query($konek,"select * from vwTiket limit $halaman_awal, $batas");
        $nomor = $halaman_awal+1;
        foreach($dataTiket as $d){
?>
                <tr>
                    <td><?php echo $nomor++; ?></td>
                    <td><?php echo $d['nama_tiket']; ?></td>
                    <td><?php echo $d['id_jenis']; ?></td>
                    <td><?php echo $d['id_comment']; ?></td>
                </tr>
<?php
        }
    }

    else if(isset($_GET['comment'])) {
        $url = "?comment=".$_GET['comment']."&halaman=";
        $total = 0;
        $selTotal = mysqli_query($konek,"SELECT COUNT(*) as total FROM vwTiket WHERE id_comment='$_GET[comment]'"); foreach($selTotal as $t) { $total = $t['total']; };
        $dataTiket = mysqli_query($konek,"SELECT * FROM vwTiket WHERE id_comment='$_GET[comment]' limit $halaman_awal, $batas");
        $nomor = $halaman_awal+1;
        foreach($dataTiket as $d){
?>
                <tr>
                    <td><?php echo $nomor++; ?></td>
                    <td><?php echo $d['nama_tiket']; ?></td>
                    <td><?php echo $d['jenis_tempat']; ?></td>
                    <td><?php echo $d['comment']; ?></td>
                </tr>
<?php
        }
    }

?>