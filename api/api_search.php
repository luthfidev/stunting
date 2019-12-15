<?php
require_once('../config.php');
if($_SERVER['REQUEST_METHOD']=='POST') {

  $nama_anak = $_POST['nama_anak'];
  $nama_ibu = $_POST['nama_ibu'];
  $tanggal = $_POST['tanggal'];

  $res = mysqli_query($connect,"SELECT * FROM anak where nama_anak LIKE '%$nama_anak%' AND nama_ibu LIKE '%$nama_ibu%' AND tanggal LIKE '%$tanggal%");
 $cek = mysqli_num_rows($res);
  if ($cek == 0 ){

  	echo json_encode("data tidak ditemukan");
  }
  if ($cek == 1){
  
    $result = array();
    while($row = mysqli_fetch_array($res)){
      array_push($result, array('id_anak'=>$row[0], 'nama_anak'=>$row[1], 'nama_ibu'=>$row[2], 'tanggal'=>$row[3]));
    }
    echo json_encode(array("value"=>1,"result"=>$result));
  mysqli_close($connect);
}
}