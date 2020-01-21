<?php
session_start();
include 'config.php';
 
if(!empty($_POST)){
     
    $username = $_POST['username'];
    $password = $_POST['password'];
 
   /* $sql = "select * from admin where username='$username' and password='$password'";
    #echo $sql."<br />";
    $query = mysql_query($sql) or die (mysql_error());
    $iden = mysql_result($query, 0);*/

   // $query = mysqli_query($connect, "select * from admin where username='$username' and password='$password'");
    //$iden = mysqli_result($query, 0);
 
    // pengecekan query valid atau tidak
/*     if($query){
        $row = mysqli_num_rows($query);
        $id_login = 5;
        // jika $row > 0 atau username dan password ditemukan
        if($row > 0){
            $_SESSION['isLoggedIn']=1;
            $_SESSION['iduser']=$iden;
            $_SESSION['username']=$username;
            $_SESSION['password']=$password;
            header('Location: pages/dashboard.php');
        }else{
            echo "username atau password salah";
            header('Location: index.php?pesan=gagal');
        }
    } */

    // menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($connect,"select * from admin where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);

	// cek jika user login sebagai admin
	if($data['level']=="admin"){

		// buat session login dan username
        $_SESSION['username'] = $username;
        $_SESSION['isLoggedIn']=1;
		$_SESSION['level'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:pages/admin/anak.php");

	// cek jika user login sebagai pegawai
	}else if($data['level']=="dokter"){
		// buat session login dan username
        $_SESSION['username'] = $username;
        $_SESSION['isLoggedIn']=1;
		$_SESSION['level'] = "dokter";
		// alihkan ke halaman dashboard pegawai
		header("location:pages/dokter/dashboard.php");

	// cek jika user login sebagai pengurus
	}else if($data['level']=="ortu"){
		// buat session login dan username
        $_SESSION['username'] = $username;
        $_SESSION['isLoggedIn']=1;
		$_SESSION['level'] = "ortu";
		// alihkan ke halaman dashboard pengurus
		header("location:pages/ortu/anak.php");

	}else{

		// alihkan ke halaman login kembali
		header("location:index.php?pesan=gagal");
	}	
    
    }else{
	header("location:index.php?pesan=gagal");
}

}
?>