<?php
include('../../config.php');
 
$id = $_GET['id'];
 
$query = mysql_query("delete from kegiatan where id_kegiatan='$id'") or die(mysql_error());
 
if ($query) {
    header("location:../kegiatan.php");
}
?>