<?php
include '../../config.php';
 
$nama = $_POST['nama'];
$keterangan = $_POST['keterangan'];
$kategori = $_POST['kategori'];
$isi = $_POST['isi'];

$query = mysql_query("INSERT INTO kesehatan VALUES (NULL, '$nama', '$keterangan', '$kategori', '$isi');") or die(mysql_error());
 
if ($query) {
    header('location:../kesehatan.php');
}
?>