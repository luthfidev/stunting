<?php
require_once('../config.php');

 // $no_medis = $_POST['no_medis'];
 /*  $nama_anak = $_POST['nama_anak'];
  $nama_ibu = $_POST['nama_ibu']; */
  // $tanggal = $_POST['tanggal'];

$res = mysqli_query($connect,"SELECT * FROM anak order by no_medisanak");
 $cek = mysqli_num_rows($res);
if ($cek > 0){
    $data = array();
    while($row = mysqli_fetch_array($res)){
      array_push($data, array('no_medisanak'=>$row[0])
                );
    }
    echo json_encode(array("message"=>1,"semuamedis"=>$data));
  mysqli_close($connect);
}
