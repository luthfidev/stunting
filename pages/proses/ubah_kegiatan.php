<?php
include '../../config.php';

$id = $_POST['id']; 
$nama = $_POST['nama'];
$ket = $_POST['deskripsi'];
$tanggal = $_POST['tgl'];

$query = mysql_query("UPDATE kegiatan SET `nama_kegiatan` = '$nama', `deskripsi` = '$deskripsi', `tanggal` = '$tanggal'  WHERE `id_kegiatan` = '$id'") or die(mysql_error());
 
if ($query) {
    header('location:../kegiatan.php');
}
?>