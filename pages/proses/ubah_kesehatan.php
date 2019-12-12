<?php
include '../../config.php';
 
$id = $_POST['id'];
$nama = $_POST['nama'];
$keterangan = $_POST['keterangan'];
$kategori = $_POST['kategori'];
$isi = $_POST['isi'];

$query = mysql_query("UPDATE kesehatan SET `nama` = '$nama', `keterangan` = '$keterangan', `kategori` = '$kategori' , `isi` = '$isi'  WHERE `id_data` = '$id';") or die(mysql_error());
 
if ($query) {
    header('location:../kesehatan.php');
}
?>