<?php

    include "konek.php";
    if(isset($_GET['i'])) {
        $selHarga = mysqli_query($konek,"SELECT tiket.harga FROM tiket WHERE tiket.id_comment = $_GET[i] LIMIT 1");
        $result = mysqli_fetch_assoc($selHarga);
        echo json_encode($result);
    }

?>