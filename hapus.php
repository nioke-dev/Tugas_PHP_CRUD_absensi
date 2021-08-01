<?php
require "functions.php";
$id_absen = $_GET['id_absen'];

if (hapus($id_absen) > 0) {
    echo "<script>
                alert('data berhasil dihapus!');
                document.location.href='index.php';
        </script>";
} else {
    echo "<script>
                        alert('Data Gagal dihapus');
                        document.location.href='index.php';
            </script>";
    die;
}
