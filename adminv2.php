<?php
session_start();
if ($_SESSION['status'] != "login") {
    header("location:index.php?pesan=belum_login");
}

echo "<script>
            alert('Selamat Datang, admin! Anda telah login.');
            document.location.href='table.php';
            </script>";
