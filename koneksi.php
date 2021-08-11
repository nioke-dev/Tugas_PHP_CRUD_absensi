<?php
$server = "localhost";
$nama_user = "root";
$password = "";
$nama_database = "nurul";

$koneksi = mysqli_connect($server, $nama_user, $password, $nama_database) or die(mysqli_error($koneksi));
