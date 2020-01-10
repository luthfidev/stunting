<?php
require_once('../config.php');

 // $no_medis = $_POST['no_medis'];
 /*  $nama_anak = $_POST['nama_anak'];
  $nama_ibu = $_POST['nama_ibu']; */
  // $tanggal = $_POST['tanggal'];

$res = mysqli_query($connect,"SELECT * FROM ortu order by id_ortu ");
 $cek = mysqli_num_rows($res);
  if ($cek == 0 ){
    $response->success = 0;
    $response->data = 0;
	$response->messages = "Data tidak Ditemukan";
	 		 	die(json_encode($response));
  	//echo json_encode("data tidak ditemukan");
  }
  if ($cek == 1){
    $data = array();
    while($row = mysqli_fetch_array($res)){
      array_push($data, array(  'id_ortu'=>$row[0], 
                                'no_medisanak'=>$row[1], 
      						    'nama_ayah'=>$row[2], 
      						    'nama_ibu' => $row[3],
                                'alamat'=>$row[4])
                   									);
    }
    echo json_encode(array("success"=>1,"data"=>$data));
  mysqli_close($connect);
}
