<?php
include("koneksi.php");
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $nikganti = $_POST['nikganti'];
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

    move_uploaded_file($temp, $folder . $foto);


    $sql = "UPDATE data_pasien SET nik='$nikganti', id_vaksin='$jenisvaksin', id_vaksinke='$vaksinke', tanggal_vaksin='$tanggalvaksin', id_pekerjaan='$pekerjaan', id_domisili='$domisili', nama='$nama', id_kelamin = '$jeniskelamin', id_status = '$status', tanggal_lahir='$tanggallahir', alamat='$alamat', foto='$foto' WHERE data_pasien.nik=$nik";
    $query = mysqli_query($koneksi, $sql);
    if ($query) {

        echo $sql;
        header('Location: index.php');
    } else {
        die("Gagal menyimpan perubahan");
    }
} else {
    die("Akses dilarang");
}
