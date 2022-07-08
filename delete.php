<?php
include("koneksi.php");
    $id = $_GET['nik'];
    $sql = "DELETE FROM data_pasien WHERE nik='$id'";
    $query = mysqli_query($koneksi, $sql);
    if( $query ){
        header('Location: index.php');
    } else {
        die("gagal menghapus");
    }
?>