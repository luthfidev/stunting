<?php
	include_once "../config.php";

	 class usr{}

     $nama_ayah 	= $_POST["nama_ayah"];
	 $nik_ayah 		= $_POST["nik_ayah"];
	 $nama_ibu 		= $_POST["nama_ibu"];
	 $nik_ibu 		= $_POST["nik_ibu"];
	 $notelp		= $_POST["notelp"];
	 $alamat 		= $_POST["alamat"];
	 
		 $query = mysqli_query($connect, "INSERT INTO ortu (id_ortu, nama_ayah, nik_ayah, nama_ibu, nik_ibu, alamat, notelp) VALUES(0,'".$nama_ayah."','".$nik_ayah."','".$nama_ibu."','".$nik_ibu."','".$alamat."','".$notelp."')");

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