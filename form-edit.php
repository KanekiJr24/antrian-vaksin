<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <?php
    include("koneksi.php");
    if (!isset($_GET['nik'])) {
        header('Location: list_data.php');
    }
    $nik = $_GET['nik'];
    $sql = "SELECT * FROM data_pasien WHERE nik=$nik";
    $query = mysqli_query($koneksi, $sql);
    $data_pasien = mysqli_fetch_assoc($query);
    if (mysqli_num_rows($query) < 1) {
        die("Data Tidak Ditemukan");
    }
    ?>
    <div class="mb-3" style="position: absolute; margin-left: 700px;">
        <h1 class="d-flex justify-content-center">Edit Data Pasien</h1>
        <br>
        <form action="edit.php" id="formbox" enctype="multipart/form-data" name="formulir" method="post">
            <!-- Nama Pasien -->
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label fw-bold">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data_pasien['nama'] ?>">
            </div>
            <!-- Tempat & Tanggal Lahir -->
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label fw-bold">Tempat & Tanggal Lahir</label>
                <input type="text" class="form-control" id="tanggallahir" name="tanggallahir" value="<?php echo $data_pasien['tanggal_lahir'] ?>">
            </div>
            <!-- jenis kelamin -->
            <p class="fw-bold">Jenis Kelamin</p>
            <select class="form-select" aria-label="Default select example" name="jeniskelamin">
                <?php
                include 'koneksi.php';
                $jeniskelamin = mysqli_query($koneksi, "SELECT * FROM kelamin");
                foreach ($jeniskelamin as $row) {
                    echo "<option value=" . $row['id_kelamin'];
                    echo $data_pasien['id_kelamin'] == $row['id_kelamin'] ? " selected" : "";
                    echo ">" . $row['jenis_kelamin'] . "</option>";
                }
                ?>
            </select>
            <br>
            <!-- Status -->
            <p class="fw-bold">Status</p>
            <select class="form-select" aria-label="Default select example" name="status">
                <?php
                include 'koneksi.php';
                $status = mysqli_query($koneksi, "SELECT * FROM status");
                foreach ($status as $row) {
                    echo "<option value=" . $row['id_status'];
                    echo $data_pasien['id_status'] == $row['id_status'] ? " selected" : "";
                    echo ">" . $row['status'] . "</option>";
                }
                ?>
            </select>
            <br>
            <!-- NIK-->
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label fw-bold">NIK</label>
                <input type="text" class="form-control" id="nikganti" name="nikganti" value="<?php echo $data_pasien['nik'] ?>">
            </div>
            <!-- Alamat-->
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label fw-bold">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $data_pasien['alamat'] ?>">
            </div>
            <!-- Pekerjaan -->
            <p class="fw-bold">Pekerjaan</p>
            <select class="form-select" aria-label="Default select example" name="pekerjaan">
                <?php
                include 'koneksi.php';
                $pekerjaan = mysqli_query($koneksi, "SELECT * FROM pekerjaan");
                foreach ($pekerjaan as $row) {
                    echo "<option value=" . $row['id_pekerjaan'];
                    echo $data_pasien['id_pekerjaan'] == $row['id_pekerjaan'] ? " selected" : "";
                    echo ">" . $row['nama_pekerjaan'] . "</option>";
                }
                ?>
            </select>
            <br>
            <!-- domisili -->
            <p class="fw-bold">Domisili Vaksin</p>
            <select class="form-select" aria-label="Default select example" name="domisili">
                <?php
                include 'koneksi.php';
                $domisili = mysqli_query($koneksi, "SELECT * FROM tempat_vaksin");
                foreach ($domisili as $row) {
                    echo "<option value=" . $row['id_domisili'];
                    echo $data_pasien['id_domisili'] == $row['id_domisili'] ? " selected" : "";
                    echo ">" . $row['domisili'] . "</option>";
                }
                ?>
            </select>
            <br>
            <!-- Status Vaksin -->
            <p class="fw-bold">Status Vaksin</p>
            <select class="form-select" aria-label="Default select example" name="vaksinke">
                <?php
                include 'koneksi.php';
                $vaksinke = mysqli_query($koneksi, "SELECT * FROM vaksinke");
                foreach ($vaksinke as $row) {
                    echo "<option value=" . $row['id_vaksinke'];
                    echo $data_pasien['id_vaksinke'] == $row['id_vaksinke'] ? " selected" : "";
                    echo ">" . $row['vaksinke'] . "</option>";
                }
                ?>
            </select>
            <br>
            <!-- Jenis Vaksin -->
            <p class="fw-bold">Jenis Vaksin</p>
            <select class="form-select" aria-label="Default select example" name="jenisvaksin">
                <?php
                include 'koneksi.php';
                $pekerjaan = mysqli_query($koneksi, "SELECT * FROM antrian");
                foreach ($pekerjaan as $row) {
                    echo "<option value=" . $row['id_vaksin'];
                    echo $data_pasien['id_vaksin'] == $row['id_vaksin'] ? " selected" : "";
                    echo ">" . $row['jenis_vaksin'] . "</option>";
                }
                ?>
            </select>
            <br>
            <!-- Tanggal Vaksin-->
            <div class="mb-3">
                <label for="exampleInputtelepon1" class="form-label fw-bold">Tanggal Vaksin</label>
                <input type="date" class="form-control" id="tanggalvaksin" name="tanggalvaksin" value="<?php echo $data_pasien['tanggal_vaksin'] ?>">
            </div>
            <br>
            <!-- Foto -->
            <div class="mb-3">
                <label for="formFile" class="form-label fw-bold">Pas Foto (.jpg, .jpeg, .png)</label>
                <input class="form-control" type="file" id="foto" name="foto" multiple accept=".jpg, .png, .jpeg">
            </div>
            <br>
            <!-- Submit Button -->
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <input type="hidden" name="nik" value="<?php echo $nik ?>">
                        <button type="submit" id="submit" value="simpan" name="simpan" class="btn btn-primary">Submit Changes</button>
                    </div>
                </div>
                <div class="row" style="margin-top: 0.5em;">
                    <div class="col text-center">
                        <a href="index.php" type="button" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>