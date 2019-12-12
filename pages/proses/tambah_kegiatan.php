<?php
include '../../config.php';
 
$nama = $_POST['nama'];
$ket = $_POST['deskripsi'];
$tanggal = $_POST['tgl'];

$query = mysql_query("INSERT INTO kegiatan VALUES (NULL, '$nama', '$ket', '$tanggal');") or die(mysql_error());
 
if ($query) {
    header('location:../kegiatan.php');
}
?>