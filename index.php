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
    <div>
        <br>
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col">
                    <p class="fw-bold">Pencarian</p>
                    <form action="index.php" method="get" style="width: 30em;">
                        <div class="input-group mb-3">
                            <input type="text" name="cari" class="form-control" placeholder="Masukkan nama pasien" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2" name="">Cari</button>
                        </div>
                    </form>
                </div>
                <div class="col">
                    <p></p>
                    <div class="float-end">
                        <a href="form-input.php" type="button" class="btn btn-primary">Input Data Vaksin</a>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $cari = "";
        if (isset($_GET['cari'])) {
            $cari = $_GET['cari'];
        }
        ?>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Antrian</th>
                    <th scope="col">NIK</th>
                    <th scope="col">NAMA PASIEN</th>
                    <th scope="col">TEMPAT & TANGGAL LAHIR</th>
                    <th scope="col">JENIS KELAMIN</th>
                    <th scope="col">STATUS</th>
                    <th scope="col">ALAMAT</th>
                    <th scope="col">PEKERJAAN</th>
                    <th scope="col">DOMISILI</th>
                    <th scope="col">STATUS VAKSIN</th>
                    <th scope="col">JENIS</th>
                    <th scope="col">TANGGAL VAKSIN</th>
                    <th scope="col">FOTO</th>
                    <th scope="col">ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'koneksi.php';

                $perpage = 2;
                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $start = $perpage * ($page - 1);
                $get = mysqli_fetch_array(mysqli_query($koneksi, "SELECT COUNT(*) total FROM data_pasien"));
                $total = $get['total'];

                $pages = ceil($total/$perpage);
                if ($cari != "") {
                    $data_pasien = mysqli_query($koneksi, "SELECT * FROM data_pasien a JOIN pekerjaan b ON a.id_pekerjaan=b.id_pekerjaan JOIN antrian c ON a.id_vaksin=c.id_vaksin JOIN tempat_vaksin d ON a.id_domisili=d.id_domisili JOIN kelamin e ON a.id_kelamin=e.id_kelamin JOIN status f ON a.id_status=f.id_status JOIN vaksinke g ON a.id_vaksinke=g.id_vaksinke WHERE a.nama LIKE '%" . $cari . "%' ");
                } else {
                    $data_pasien = mysqli_query($koneksi, "SELECT * FROM data_pasien a JOIN pekerjaan b ON a.id_pekerjaan=b.id_pekerjaan JOIN antrian c ON a.id_vaksin=c.id_vaksin JOIN tempat_vaksin d ON a.id_domisili=d.id_domisili JOIN kelamin e ON a.id_kelamin=e.id_kelamin JOIN status f ON a.id_status=f.id_status JOIN vaksinke g ON a.id_vaksinke=g.id_vaksinke LIMIT $start, $perpage");
                }
                $no = 1;
                foreach ($data_pasien as $row) {
                    echo "<tr>  
                    <td>$no</td>
                    <td>" . $row['nik'] . "</td>
                    <td>" . $row['nama'] . "</td>
                    <td>" . $row['tanggal_lahir'] . "</td>
                    <td>" . $row['jenis_kelamin'] . "</td>
                    <td>" . $row['status'] . "</td>
                    <td>" . $row['alamat'] . "</td>
                    <td>" . $row['nama_pekerjaan'] . "</td>
                    <td>" . $row['domisili'] . "</td>
                    <td>" . $row['vaksinke'] . "</td>
                    <td>" . $row['jenis_vaksin'] . "</td>
                    <td>" . $row['tanggal_vaksin'] . "</td>
                    <td><img src='files/" . $row['foto'] . "' width='150'></td>
                    <td><a class='btn' style='background-color: green; color: white' href='form-edit.php?nik=" . $row['nik'] . "'>Edit</a> |
                    <a class='btn' style='background-color: red; color: white' href='delete.php?nik=" . $row['nik'] . "'>Hapus</a>
                    </td>
                  </tr>";
                    $no++;
                }
                ?>

            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col text-center">
            <div class="btn-group me-2" role="group" aria-label="First group">
                <?php 
                    for ($i=1; $i <= $pages; $i++) { 
                        echo "<a href='?page=".$i."' type='button' class='btn btn-primary'>".$i."</a>";
                    }
                ?>
                <!-- <button type="button" class="btn btn-primary">1</button>
                <button type="button" class="btn btn-primary">2</button>
                <button type="button" class="btn btn-primary">3</button>
                <button type="button" class="btn btn-primary">4</button> -->
            </div>
        </div>
    </div>
</body>

</html>