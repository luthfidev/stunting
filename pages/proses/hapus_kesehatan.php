<?php
include('../../config.php');
 
$id = $_GET['id'];
 
$query = mysql_query("delete from kesehatan where id_data='$id'") or die(mysql_error());
 
if ($query) {
    header("location:../kesehatan.php");
}
?>