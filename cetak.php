<?php
require "functions.php";

date_default_timezone_set('Asia/Jakarta');
$tgl = date('Y-m-d H:i:s');

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
if (isset($_POST['cari'])) {
    $siswa = cari($_POST['keyword']);
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
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <form action="" method="POST" class="form-inline my-2 my-lg-0">
                    <h6 class="m-0 font-weight-bold text-primary">Data Absen Siswa | <?= date('d,m,Y'); ?></h6>
                </form>
            </div>
            <div class="card-body">
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
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // $tgl = date('Y-m-d'); //2021-07-16 
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
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <br>
        <script type="text/javascript">
            window.print()
        </script>
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