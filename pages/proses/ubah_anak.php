<?php
include '../../config.php';
 
$id = $_POST['id'];
$nama = $_POST['nama'];
$ibu = $_POST['ibu'];
$umur = $_POST['umur'];
$keterangan = $_POST['keterangan'];

$query = mysql_query("UPDATE anak SET `nama_anak` = '$nama', `nama_ibu` = '$ibu', `umur` = '$umur', `keterangan` = '$keterangan' WHERE `id_anak` = '$id';") or die(mysql_error());
 
if ($query) {
    header('location:../anak.php');
}
?>