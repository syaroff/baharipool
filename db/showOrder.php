<?php 

    if(!isset($_GET['q'])) {
        $selectOrder = mysqli_query($konek,"SELECT * FROM vworder");
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
                <td>
                    <a href="order.php?d=<?=$row['id_order']?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
<?php
        }
    }
    else if(isset($_GET['q'])) {
        $selectOrder = mysqli_query($konek,"SELECT * FROM vworder WHERE nama_pembeli LIKE '%$_GET[q]%' OR nama_pembeli LIKE '%$_GET[q]%'");
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
                <td>
                    <a href="order.php?d=<?=$row['id_order']?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                </td>
            </tr>
<?php
        }

    }

?>