<?php
	include_once "../config.php";

	 class usr{}

	 $no_medis  	= $_POST["no_medisanak"];
	 $jk 			= $_POST["jenis_kelamin"];
	 $tanggal_lahir = $_POST["tanggal_lahir"];
	 $umur 			= $_POST["usia"];
	 $berat 		= $_POST["bb_anak"];
	 $tinggi 		= $_POST["tb_anak"];
	 //$keterangan 	= $_POST["keterangan"];
	 $status_stunting 	= $_POST["status_stunting"];
	 $status_gizi 	= $_POST["status_gizi"];
	 $tanggal		= date("Y-m-d");
	 
		 $query = mysqli_query($connect, "INSERT INTO pengukuran (id_pengukuran, no_medisanak, jenis_kelamin, usia, tanggal_lahir, bb_anak, tb_anak, status_stunting, status_gizi, tanggal_pengukuran) VALUES(0,'".$no_medis."','".$jk."','".$umur."','".$tanggal_lahir."','".$berat."','".$tinggi."','".$status_stunting."','".$status_gizi."','".$tanggal."')");

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