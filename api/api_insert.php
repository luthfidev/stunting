<?php
	include_once "../config.php";

	 class usr{}

	 $nama_anak = $_POST["nama_anak"];
	 $nama_ibu = $_POST["nama_ibu"];
	 $jk = $_POST["jk"];
	 $umur = $_POST["umur"];
	 $berat = $_POST["berat"];
	 $tinggi = $_POST["tinggi"];
	 $keterangan = $_POST["keterangan"];
	 $tanggal = date("Y-m-d");
	 
		 $query = mysqli_query($connect, "INSERT INTO anak (id_anak, nama_anak, jk, nama_ibu, umur, berat, tinggi, keterangan, tanggal) VALUES(0,'".$nama_anak."','".$jk."','".$nama_ibu."','".$umur."','".$berat."','".$tinggi."','".$keterangan."','".$tanggal."')");

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