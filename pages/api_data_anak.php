<?php 
	include "../config.php";
	
	$query = mysqli_query($connect, "SELECT * FROM anak ORDER BY tanggal DESC");
	
	$json = array();
	
	while($row = mysqli_fetch_assoc($query)){
		$json[] = $row;
	}
	
	echo json_encode($json);
	
	mysqli_close($connect);
	
?>