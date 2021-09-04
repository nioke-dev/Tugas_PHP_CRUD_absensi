<?php
require "functions.php";

$siswa = query("SELECT * FROM no_absen_17");

if (isset($_POST['submit'])) {
    if (tambah($_POST) > 0) {
        echo "<script>
                alert('data berhasil ditambahkan!');
                document.location.href='index.php';
        </script>";
    } else {
        echo "<script>
                alert('Data Gagal Ditambahkan');
                document.location.href='index.php';
            </script>";
        die;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Absensi Siswa</title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-success">

    <div class="container">
        <br>
        <div class="row">
            <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
            <div class="col-md-6 text-center">
                <img src="assets/img/logo nurul.png" alt="" width="250">
                <h3 class="text-white">
                    Sistem Absensi Siswa
                    <br><b>Nurul Mustofa</b>
                    <br><small>Rekayasa Perangkat Lunak <strong>(RPL)</strong></small>
                </h3>
            </div>
            <div class="col-md-6">
                <div class="card shadow mb-4 mt-3">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Absensi Siswa</h6>
                    </div>
                    <!-- start card body -->
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-row">
                                <?php
                                date_default_timezone_set('Asia/Jakarta');
                                $tgl = date('Y-m-d H:i:s'); ?>
                                <input type="hidden" name="tanggal" value="<?= $tgl; ?>">
                                <div class="form-group col-md-6">
                                    <label for="inputNisn">NISN</label>
                                    <input type="text" name="nisn" class="form-control" id="inputNisn" placeholder="Masukkan NISN Anda" autocomplete="off" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputKelas">Kelas</label>
                                    <input type="text" name="kelas" class="form-control" id="inputKelas" placeholder="Ex: 12 RPL 2" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputNamaSiswa">Nama Siswa</label>
                                <input type="text" name="nama_siswa" class="form-control" id="inputNamaSiswa" placeholder="Input Nama Anda" autocomplete="off" required>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputNoAbsen">No Urut Absen</label>
                                    <input type="text" name="no_urut_absen" class="form-control" id="inputNoAbsen" placeholder="Ex : 17" autocomplete="off" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputState">Jenis Kelamin</label>
                                    <select id="inputState" class="form-control" name="jenis_kelamin">
                                        <option selected>Choose...</option>
                                        <option value="Laki - Laki">Laki - Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputMapel">Mapel</label>
                                    <input type="text" name="mapel" class="form-control" id="inputMapel" placeholder="Ex : PWPB" autocomplete="off" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputState">Keterangan</label>
                                    <select id="inputState" class="form-control" name="keterangan">
                                        <option selected>Choose...</option>
                                        <option value="Hadir">Hadir</option>
                                        <option value="Izin">Izin</option>
                                        <option value="Sakit">Sakit</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Absen Siswa | <?= date('d,m,Y'); ?></h6>
            </div>
            <div class="card-body">
                <a href="rekapitulasi.php" class="btn btn-success mb-3"><i class="fa fa-table mr-1"></i>Rekapitulasi Pengunjung</a>
                <a href="logout.php" class="btn btn-danger mb-3"><i class="fa fa-sign-out-alt mr-1"></i>Logout</a>

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Tanggal Dan Waktu</th>
                                <th>NISN</th>
                                <th>Nama Siswa</th>
                                <th>Kelas</th>
                                <th>Mapel</th>
                                <th>No. Absen</th>
                                <th>Jenis Kelamin</th>
                                <th>Ket</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $tgl = date('Y-m-d'); //2021-07-16 
                            ?>
                            <?php foreach ($siswa as $s) : ?>
                                <tr>
                                    <th><?= $s['tanggal']; ?></th>
                                    <th><?= $s['nisn']; ?></th>
                                    <th><?= $s['nama_siswa']; ?></th>
                                    <th><?= $s['kelas']; ?></th>
                                    <th><?= $s['mapel']; ?></th>
                                    <th><?= $s['no_urut_absen']; ?></th>
                                    <th><?= $s['jenis_kelamin']; ?></th>
                                    <th><?= $s['keterangan']; ?></th>
                                    <th>
                                        <a href="edit.php?id_absen=<?= $s['id_absen']; ?>" class="btn btn-warning btn-sm mb-2" data-toggle="tooltip" title="Edit Data"><i class="fas fa-edit fa-sm"></i></a><br>
                                        <a href="hapus.php?id_absen=<?= $s['id_absen']; ?>" onclick="return confirm('Apakah anda Yakin Ingin Menghapus Data Ini....?')" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Hapus Data"><i class="fas fa-trash fa-md"></i></a>
                                    </th>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

    <!-- Custom Tooltip with js -->
    <script src="assets/js/script.js"></script>

</body>

</html>