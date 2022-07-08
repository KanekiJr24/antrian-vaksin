<?php
include 'koneksi.php';

$nama = $_POST['nama'];
$nik = $_POST['nik'];
$jeniskelamin = $_POST['jeniskelamin'];
$tanggallahir = $_POST['tanggallahir'];
$pekerjaan = $_POST['pekerjaan'];
$jenisvaksin = $_POST['jenisvaksin'];
$tanggalvaksin = $_POST['tanggalvaksin'];
$alamat = $_POST['alamat'];
$domisili = $_POST['domisili'];
$status = $_POST['status'];
$vaksinke = $_POST['vaksinke'];


$temp = $_FILES['foto']['tmp_name'];
$foto = $_FILES['foto']['name'];
$folder = "files/";

move_uploaded_file($temp, $folder.$foto);

$query = "INSERT INTO data_pasien(nik, id_vaksin, tanggal_vaksin, id_vaksinke, id_pekerjaan, id_domisili, nama, id_kelamin, id_status, tanggal_lahir, alamat, foto) 
VALUES  ('$nik', '$jenisvaksin', '$tanggalvaksin', '$vaksinke', '$pekerjaan', '$domisili', '$nama',  '$jeniskelamin', '$status', '$tanggallahir', '$alamat', '$foto')";

mysqli_query($koneksi, $query);

header("location:index.php");

?>