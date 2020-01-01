<?php
require_once('../config.php');
if($_SERVER['REQUEST_METHOD']=='POST') {


  $no_medis = $_POST['no_medis'];
 /*  $nama_anak = $_POST['nama_anak'];
  $nama_ibu = $_POST['nama_ibu']; */
  // $tanggal = $_POST['tanggal'];

  $res = mysqli_query($connect,"SELECT * FROM anak where no_medis LIKE '%$no_medis%' ");
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
                    'no_medis'=>$row[1], 
      							'nama_anak'=>$row[2], 
      							'jk' => $row[3],
      							'nama_ibu'=>$row[4], 
      							'umur'=>$row[5],
      							'berat'=>$row[6],
      							'tinggi'=>$row[7],
      							'keterangan'=>$row[8],
      							'tanggal'=>$row[9])
  									);
    }
    echo json_encode(array("status"=>1,"data"=>$data));
  mysqli_close($connect);
}
}