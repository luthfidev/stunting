<?php
//host yang digunakan
//99,9% tidak perlu dirubah
$host = 'localhost'; 
 
//username untuk login ke host
//biasanya didapatkan pada email konfirmasi order hosting
$user = 'puskes15_ghea'; 
 
//jika menggunakan PC sendiri sebagai host,
//secara default password dikosongkan
$pass = 'Stunting123#';
 
//isikan nama database sesuai database
//yang dibuat pada langkah-1
$dbname = 'puskes15_db-ghea';
 
//mengubung ke host
$connect = mysqli_connect($host, $user, $pass, $dbname) or die(mysqli_connect_error());
 
//memilih database yang akan digunakan
//$dbselect = mysql_select_db($dbname);
?>
