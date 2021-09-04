<?php
// koneksi database
$server = "localhost";
$user = "root";
$password = "";
$database = "nurul";
$koneksi = mysqli_connect($server, $user, $password, $database);

function query($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
function tambah($data)
{
    global $koneksi;

    $tanggal = htmlspecialchars(strip_tags($data['tanggal']));
    $nisn = htmlspecialchars(strip_tags($data['nisn']));
    $kelas = htmlspecialchars(strip_tags($data['kelas']));
    $nama = htmlspecialchars(strip_tags($data['nama_siswa']));
    $noabsen = htmlspecialchars(strip_tags($data['no_urut_absen']));
    $jk = htmlspecialchars(strip_tags($data['jenis_kelamin']));
    $mapel = htmlspecialchars(strip_tags($data['mapel']));
    $keterangan = htmlspecialchars(strip_tags($data['keterangan']));

    $query = "INSERT INTO no_absen_17 VALUES('','$keterangan','$tanggal','$nisn','$nama','$kelas','$mapel','$noabsen','$jk')";


    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}
function hapus($id)
{
    global $koneksi;
    $query = "DELETE FROM no_absen_17 WHERE id_absen=$id";
    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}
function edit($data)
{
    global $koneksi;
    $id_absen = $data['id_absen'];
    $tanggal = htmlspecialchars(strip_tags($data['tanggal']));
    $nisn = htmlspecialchars(strip_tags($data['nisn']));
    $kelas = htmlspecialchars(strip_tags($data['kelas']));
    $nama = htmlspecialchars(strip_tags($data['nama_siswa']));
    $noabsen = htmlspecialchars(strip_tags($data['no_urut_absen']));
    $jk = htmlspecialchars(strip_tags($data['jenis_kelamin']));
    $mapel = htmlspecialchars(strip_tags($data['mapel']));
    $keterangan = htmlspecialchars(strip_tags($data['keterangan']));

    $query = "UPDATE no_absen_17 SET
                keterangan = '$keterangan',
                tanggal = '$tanggal',
                nisn = '$nisn',
                nama_siswa = '$nama',
                kelas = '$kelas',
                mapel = '$mapel',
                no_urut_absen = '$noabsen',
                jenis_kelamin = '$jk'                
            WHERE id_absen=$id_absen
            ";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}
function cari($keyword)
{
    global $koneksi;
    $query = "SELECT * FROM no_absen_17 WHERE
                tanggal LIKE '%$keyword%' OR
                nisn LIKE '%$keyword%' OR
                nama_siswa LIKE '%$keyword%' OR
                kelas LIKE '$keyword%' OR
                mapel LIKE '%$keyword%' OR
                no_urut_absen LIKE '%$keyword%' OR
                jenis_kelamin LIKE '%$keyword%' OR
                keterangan LIKE '%$keyword%'
                ";
    return query($query);
}
