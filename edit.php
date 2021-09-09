<?php
require "functions.php";
$id_absen = $_GET['id_absen'];
$siswa = query("SELECT * FROM no_absen_17 WHERE id_absen=$id_absen")[0];

if (isset($_POST['kembali'])) {
    echo "<script>
                alert('anda yakin?');
                document.location.href='table.php';
        </script>";
}

if (isset($_POST['edit'])) {
    if (edit($_POST) > 0) {
        echo "<script>
                alert('data berhasil di Update!');
                document.location.href='table.php';
        </script>";
    } else {
        echo "<script>
                        alert('Data Gagal di Update');
                        document.location = 'edit.php';
            </script>";
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <title>Forms Bootstrap</title>
</head>

<body background="assets/img/swirl_pattern.png  ">
    <div class="container">
        <h2 class="alert alert-primary text-center mt-3">FORMULIR EDIT DATA ABSENSI SISWA</h2>
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow mb-4 mt-3">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Siswa</h6>
                    </div>
                    <!-- start card body -->
                    <div class="card-body">
                        <form action="" method="POST">
                            <input type="hidden" name="id_absen" value="<?= $siswa['id_absen']; ?>">
                            <div class="form-row">
                                <?php
                                date_default_timezone_set('Asia/Jakarta');
                                $tgl = date('Y-m-d H:i:s'); ?>
                                <input type="hidden" name="tanggal" value="<?= $tgl; ?>">
                                <div class="form-group col-md-6">
                                    <label for="inputNisn">NISN</label>
                                    <input type="text" value="<?= $siswa['nisn']; ?>" name="nisn" class="form-control" id="inputNisn" placeholder="Masukkan NISN Anda" autocomplete="off" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputKelas">Kelas</label>
                                    <input type="text" value="<?= $siswa['kelas']; ?>" name="kelas" class="form-control" id="inputKelas" placeholder="Ex: 12 RPL 2" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputNamaSiswa">Nama Siswa</label>
                                <input type="text" value="<?= $siswa['nama_siswa']; ?>" name="nama_siswa" class="form-control" id="inputNamaSiswa" placeholder="Input Nama Anda" autocomplete="off" required>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputNoAbsen">No Urut Absen</label>
                                    <input type="text" value="<?= $siswa['no_urut_absen']; ?>" name="no_urut_absen" class="form-control" id="inputNoAbsen" placeholder="Ex : 17" autocomplete="off" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputState">Jenis Kelamin</label>
                                    <select id="inputState" class="form-control" name="jenis_kelamin">
                                        <option value="<?= $siswa['jenis_kelamin']; ?>" selected><?= $siswa['jenis_kelamin']; ?></option>
                                        <option value="Laki - Laki">Laki - Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputMapel">Mapel</label>
                                    <input type="text" value="<?= $siswa['mapel']; ?>" name="mapel" class="form-control" id="inputMapel" placeholder="Ex : PWPB" autocomplete="off" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputState">Keterangan</label>
                                    <select id="inputState" class="form-control" name="keterangan">
                                        <option value="<?= $siswa['keterangan']; ?>" selected><?= $siswa['keterangan']; ?></option>
                                        <option value="Hadir">Hadir</option>
                                        <option value="Izin">Izin</option>
                                        <option value="Sakit">Sakit</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" name="edit">Edit Data</button>
                            <button type="submit" class="btn btn-danger" name="kembali">Kembali</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>

</html>