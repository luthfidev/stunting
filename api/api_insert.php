<?php
	include_once "../config.php";

	 class usr{}

	 $nama_anak 	= $_POST["nama_anak"];
	 $nama_ibu 		= $_POST["nama_ibu"];
	 /* $nama_ayah 	= $_POST["nama_ayah"];
	 $alamat 		= $_POST["alamat"]; */
	 $jk 			= $_POST["jk"];
	 $tanggal_lahir = $_POST["tanggal_lahir"];
	 $umur 			= $_POST["umur"];
	 $berat 		= $_POST["berat"];
	 $tinggi 		= $_POST["tinggi"];
	 //$keterangan 	= $_POST["keterangan"];
	 $status_stunting 	= $_POST["status_stunting"];
	 $status_gizi 	= $_POST["status_gizi"];
	 $tanggal		= date("Y-m-d");
	 
		 $query = mysqli_query($connect, "INSERT INTO anak (id_anak, nama_anak, jk, nama_ibu, umur, tanggal_lahir, berat, tinggi, status_stunting, status_gizi, tanggal) VALUES(0,'".$nama_anak."','".$jk."','".$nama_ibu."','".$umur."','".$tanggal_lahir."','".$berat."','".$tinggi."','".$status_stunting."','".$status_gizi."','".$tanggal."')");

		 		if ($query){
		 			$response = new usr();
		 			$response->status = 1;
		 			$response->messages = "berhasil Simpan.";
		 			die(json_encode($response));

		 		} else {
		 			$response = new usr();
		 			$response->status = 0;
		 			$response->messages = "Gagal";
		 			die(json_encode($response));
		 		}
		 	
		 
	 

	 mysqli_close($connect);

?>	