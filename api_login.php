<?php
	include_once "config.php";

	 // class usr{}
	//Get the input request parameters
$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, TRUE);
	$username = $_POST["username"];
	$password = $_POST["password"];
	
	if ((empty($username)) || (empty($password))) { 
	// $response = new usr();
	$response->success = 0;
	$response->message = "Kolom tidak boleh kosong"; 
	 	die(json_encode($response));
	 }
	
	 $query = mysqli_query($connect, "SELECT * FROM admin WHERE username='$username' AND password='$password'");
	
	 $row = mysqli_fetch_array($query);
	
	 if (!empty($row)){
	 	// $response = new usr();
	 	$response->success = 1;
	 	$response->message = "Selamat datang ".$row['username'];
	 	$response->id_admin = $row['id_admin'];
	 	$response->username = $row['username'];
	 	die(json_encode($response));
		
	 } else { 
	 	// $response = new usr();
	 	$response->success = 2;
	 	$response->message = "Username atau password salah";
	 	die(json_encode($response));
	 }
	
	 mysqli_close($connect);

?>