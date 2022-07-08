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
    <div class="mb-3" style="position: absolute; margin-left: 600px;">
        <h1 class="d-flex justify-content-center">Form Pasien Vaksinasi Covid</h1>
        <br>
        <form action="simpan.php" id="formbox" enctype="multipart/form-data" name="formulir" method="post">
            <!-- Nama Pasien -->
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label fw-bold">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" name="nama">
            </div>
            <!-- Tempat & Tanggal Lahir -->
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label fw-bold">Tempat & Tanggal Lahir</label>
                <input type="text" class="form-control" id="tanggallahir" name="tanggallahir">
            </div>
            <!-- jenis kelamin -->
            <p class="fw-bold">Jenis Kelamin</p>
            <select class="form-select" aria-label="Default select example" name="jeniskelamin">
                <?php
                include 'koneksi.php';
                $jeniskelamin = mysqli_query($koneksi, "SELECT * FROM kelamin");
                foreach ($jeniskelamin as $row) {
                    echo "<option value=" . $row['id_kelamin'] . ">" . $row['jenis_kelamin'] . "</option>";
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
                    echo "<option value=" . $row['id_status'] . ">" . $row['status'] . "</option>";
                }
                ?>
            </select>
            <br>
            <!-- NIK-->
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label fw-bold">NIK</label>
                <input type="text" class="form-control" id="nik" name="nik">
            </div>
             <!-- Alamat-->
             <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label fw-bold">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat">
            </div>
            <!-- Pekerjaan -->
            <p class="fw-bold">Pekerjaan</p>
            <select class="form-select" aria-label="Default select example" name="pekerjaan">
                <?php
                include 'koneksi.php';
                $pekerjaan = mysqli_query($koneksi, "SELECT * FROM pekerjaan");
                foreach ($pekerjaan as $row) {
                    echo "<option value=" . $row['id_pekerjaan'] . ">" . $row['nama_pekerjaan'] . "</option>";
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
                    echo "<option value=" . $row['id_domisili'] . ">" . $row['domisili'] . "</option>";
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
                    echo "<option value=" . $row['id_vaksinke'] . ">" . $row['vaksinke'] . "</option>";
                }
                ?>
            </select>
            <br>
            <!-- jenis vaksin-->
            <p class="fw-bold">Jenis Vaksin</p>
            <select class="form-select" aria-label="Default select example" name="jenisvaksin">
                <?php
                include 'koneksi.php';
                $jenisvaksin = mysqli_query($koneksi, "SELECT * FROM antrian");
                foreach ($jenisvaksin as $row) {
                    echo "<option value=" . $row['id_vaksin'] . ">" . $row['jenis_vaksin'] . "</option>";
                }
                ?>
            </select>
            <br>
            <div class="mb-3">
                <label for="exampleInputtelepon1" class="form-label fw-bold">Tanggal Vaksin</label>
                <input type="date" class="form-control" id="tanggalvaksin" name="tanggalvaksin">
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
                        <button type="submit" id="submit" value="simpan" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>