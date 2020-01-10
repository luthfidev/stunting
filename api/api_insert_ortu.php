<?php
	include_once "../config.php";

	 class usr{}

     $nama_ayah 	= $_POST["nama_ayah"];
	 $nama_ibu 		= $_POST["nama_ibu"];
	 $alamat 		= $_POST["alamat"];
	 
		 $query = mysqli_query($connect, "INSERT INTO ortu (id_ortu, nama_ayah, nama_ibu, alamat) VALUES(0,'".$nama_ayah."','".$nama_ibu."','".$alamat."')");

		 		if ($query){
		 			$response = new usr();
		 			$response->success = 1;
		 			$response->messages = "berhasil Simpan.";
		 			die(json_encode($response));

		 		} else {
		 			$response = new usr();
		 			$response->success = 0;
		 			$response->messages = "Gagal";
		 			die(json_encode($response));
		 		}
		 	
		 
	 

	 mysqli_close($connect);

?>	