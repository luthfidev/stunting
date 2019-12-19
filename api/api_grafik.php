<?php 
	include "../config.php";
	
	$query = mysqli_query($connect, "select tanggal, COUNT(*)as tot, 
                                        COUNT(case when anak.keterangan='Gizi Baik' then 1 end) as baik,
                                        COUNT(case when anak.keterangan='Gizi Buruk' then 1 end) as buruk 
                                        from anak  group by tanggal");
	
	$json = array();
	
	while($row = mysqli_fetch_assoc($query)){
		$json[] = $row;
	}
	
	echo json_encode($json);
	
	mysqli_close($connect);
	
?>