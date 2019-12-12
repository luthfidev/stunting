<?php
include '../../config.php';
 
$username = $_POST['username'];
$password = $_POST['password'];
$level 	 =	$_POST['level'];

$query = mysqli_query($connect, "INSERT INTO admin VALUES (NULL, '$username', '$password', '$level');") or die(mysqli_connect_error());
 
if ($query) {
    header('location:../user.php');
}
?>