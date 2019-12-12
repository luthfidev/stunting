<?php
include '../../config.php';
 
$nama_anak 	= $_POST['nama_anak'];
$nama_ibu 	= $_POST['nama_ibu'];
$umur 		= $_POST['umur'];
$berat 		= $_POST['berat'];
$tinggi 	= $_POST['tinggi'];
$keterangan = $_POST['keterangan'];
$tanggal 	= $_POST['tanggal'];

$query = mysqli_query($connect, "INSERT INTO anak VALUES (NULL, '$nama_anak', '$nama_ibu', '$umur', '$berat', '$tinggi', '$keterangan', '$tanggal')") or die(mysqli_connect_error());
 
 $response = array();
if ($query) {

    //header('location:../anak.php');
    $response['code'] = 1;
    $response['message'] = "success !";
} else{
	$response['code'] = 0;
	$response['message'] = "Failed !"; 
}

echo json_encode($response);
?>