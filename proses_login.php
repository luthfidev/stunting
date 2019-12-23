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

    $query = mysqli_query($connect, "select * from admin where username='$username' and password='$password'");
    //$iden = mysqli_result($query, 0);
 
    // pengecekan query valid atau tidak
    if($query){
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
    }
}
?>