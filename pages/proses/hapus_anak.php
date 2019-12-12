<?php
include('../../config.php');
 
$id = $_GET['id'];
 
$query = mysql_query("delete from anak where id_anak='$id'") or die(mysql_error());
 
if ($query) {
    header("location:../anak.php");
}
?>