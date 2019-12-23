<?php 
	include "../config.php";
	
/* 	$query = mysqli_query($connect, "select tanggal, 
                                        COUNT(case when anak.keterangan='Gizi Baik' then 1 end) as baik,
                                        COUNT(case when anak.keterangan='Gizi Buruk' then 1 end) as buruk 
                                        from anak  group by tanggal");
	
				if(mysqli_num_rows($query) > 0 ){
					$response = array();
					$response["data"] = array();
					while($x = mysqli_fetch_array($query)){
						$h['tanggal'] = $x["tanggal"];
						$h['baik'] = $x["baik"];
						$h['buruk'] = $x["buruk"];
						array_push($response["data"], $h);
					}
					echo json_encode($response);
					}else {
					$response["messages"]="tidak ada data";
					echo json_encode($response);
					}
	mysqli_close($connect); */

	$query = mysqli_query($connect, "select tanggal, 
	COUNT(case when anak.keterangan='Gizi Baik' then 1 end) as baik,
	COUNT(case when anak.keterangan='Gizi Buruk' then 1 end) as buruk 
	from anak  group by tanggal");
//loop through the returned data
$data = array();
foreach ($query as $row) {
  $data[] = $row;
}

//free memory associated with result
$query->close();

//close connection
mysqli_close($connect);

//now print the data
print json_encode($data);

	
	
?>