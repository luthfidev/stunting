<?php
include '../../config.php';
 
$username = $_POST['username'];
$password = $_POST['password'];
$level 	 =	$_POST['level'];

		$result=mysqli_query($connect,"SELECT username FROM admin WHERE username='$username'");
		$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
		if(mysqli_num_rows($result) == 1)
		{
			$pesan = "exist";
			header('location:../admin/user.php?pesan=exist');
		}
		else
		{
			
		$query = mysqli_query($connect, "INSERT INTO admin VALUES (NULL, '$username', '$password', '$level');") or die(mysqli_connect_error());
			if($query)
			{
				 header('location:../admin/user.php?pesan=sukses');
			}
		}

?>