<?php
include('../../config.php');
 
$id = $_GET['id_anak'];
 
$query = mysqli_query($connect,"delete from anak where id_anak='$id'") or die(mysql_error());
 
if ($query) {
    header("location:../anak.php");
}
?>