<?php
require_once("koneksi.php");

// Query data siswa
$sql = "SELECT * FROM siswa";
$res = mysqli_query($conn, $sql);
$result = array();

// Ganti IP sesuai alamat server kamu
$base_url = "http://localhost/tenizencode/upload/";

while ($row = mysqli_fetch_assoc($res)) {
    // Jika kolom 'foto' kosong, kirim URL default
    $foto_url = !empty($row["foto"]) ? $base_url . $row["foto"] : $base_url . "default.jpg";

    $result[] = array(
        "nis" => $row["nis"],
        "namasiswa" => $row["namasiswa"],
        "jk" => $row["jk"],
        "alamat" => $row["alamat"],
        "tanggallahir" => $row["tanggallahir"],
        "foto" => $foto_url
    );
}

// Output JSON
header('Content-Type: application/json; charset=utf-8');
echo json_encode(array("result" => $result), JSON_PRETTY_PRINT);
?>