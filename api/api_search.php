<?php
require_once('../config.php');
if($_SERVER['REQUEST_METHOD']=='POST') {

  $nama_anak = $_POST['nama_anak'];
  $nama_ibu = $_POST['nama_ibu'];
  // $tanggal = $_POST['tanggal'];

  $res = mysqli_query($connect,"SELECT * FROM anak where nama_anak LIKE '%$nama_anak%' AND nama_ibu LIKE '%$nama_ibu%' ");
 $cek = mysqli_num_rows($res);
  if ($cek == 0 ){
    $response->status = 0;
	 	$response->messages = "Data tidak Ditemukan";
	 		 	die(json_encode($response));
  	//echo json_encode("data tidak ditemukan");
  }
  if ($cek == 1){
    $data = array();
    while($row = mysqli_fetch_array($res)){
      array_push($data, array('id_anak'=>$row[0], 
      							'nama_anak'=>$row[1], 
      							'jk' => $row[2],
      							'nama_ibu'=>$row[3], 
      							'umur'=>$row[4],
      							'berat'=>$row[5],
      							'tinggi'=>$row[6],
      							'keterangan'=>$row[7],
      							'tanggal'=>$row[8])
  									);
    }
    echo json_encode(array("status"=>1,"data"=>$data));
  mysqli_close($connect);
}
}