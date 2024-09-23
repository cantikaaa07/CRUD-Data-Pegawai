<?php
include "header.php"
?>
<!DOCTYPE html>
<html>
<head>
    <!-- <section class="vh-100" style="background-color: #2779e2;"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Pegawai</title>
</head>

<body>
    <div class="container">
        <h3 class="text-center my-4">pegawai</h3>
        <div class="table-container">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pegawai</th>
                        <th>NIK</th>
                        <th>Alamat</th>
                        <th>Jenis Kelamin</th>
                        <th>No.Telp</th>
                        <th>Jabatan</th>
                        <th>Gaji Pokok</th>
                        <th>Tunjangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "koneksi.php";
                    $qry_pegawai = mysqli_query($conn, "SELECT * FROM tabel_pegawai JOIN table_jabatan ON table_jabatan.id_jabatan = tabel_pegawai.Jabatan");

                    $no = 0;
                    while ($data_pegawai = mysqli_fetch_array($qry_pegawai)) {
                        $no++; ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $data_pegawai['nama'] ?></td>
                            <td><?= $data_pegawai['nik'] ?></td>
                            <td><?= $data_pegawai['alamat'] ?></td>
                            <td><?= $data_pegawai['jenis_kelamin'] ?></td>
                            <td><?= $data_pegawai['no_tlp'] ?></td>
                            <!-- Updated line below to display job name -->
                            <td><?= $data_pegawai['nama_jabatan'] ?></td>
                            <td><?= $data_pegawai['gaji_pokok']?></td>
                            <td><?= $data_pegawai['tunjangan']?></td>
                            <td>
                                <a href="ubah.php?id=<?= $data_pegawai['id'] ?>" class="btn btn-success">Ubah</a> |
                                <a href="hapus.php?id=<?= $data_pegawai['id'] ?>"
                                    onclick="return confirm('Apakah anda yakin menghapus data ini?')"
                                    class="btn btn-danger">Hapus</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>