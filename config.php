<?php
//host yang digunakan
//99,9% tidak perlu dirubah
$host = 'localhost'; 
 
//username untuk login ke host
//biasanya didapatkan pada email konfirmasi order hosting
$user = 'root'; 
 
//jika menggunakan PC sendiri sebagai host,
//secara default password dikosongkan
$pass = '123123123';
 
//isikan nama database sesuai database
//yang dibuat pada langkah-1
$dbname = 'db-ghea';
 
//mengubung ke host
$connect = mysqli_connect($host, $user, $pass, $dbname) or die(mysqli_connect_error());
 
//memilih database yang akan digunakan
//$dbselect = mysql_select_db($dbname);
?>