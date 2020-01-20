<?php
include '../../config.php';
 
$id = $_POST['id'];
$nama = $_POST['nama'];
$telp = $_POST['telp'];
$user = $_POST['user'];
$pass = $_POST['pass'];
$level = $_POST['level'];

$query = mysql_query("UPDATE user SET `nama_user` = '$nama', `username` = '$user', `password` = '$pass' , `cp` = '$telp' , `level` = '$level' WHERE `id_user` = '$id';") or die(mysql_error());
 
if ($query) {
    header('location:../admin/user.php');
}
?>