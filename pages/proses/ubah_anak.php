<link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
<?php
include '../../config.php';


$id = $_POST['id_anak'];
$nama_anak = $_POST['nama_anak'];
$jk = $_POST['jk'];
$nama_ibu = $_POST['nama_ibu'];
$umur = $_POST['umur'];

$query = mysqli_query($connect, "UPDATE anak SET nama_anak = '$nama_anak', jk = '$jk', nama_ibu = '$nama_ibu', umur = '$umur' WHERE id_anak = '$id'") or die(mysqli_connect_error());
 
if ($query) {
    echo "
 <script type='text/javascript'>
  setTimeout(function () {  
    Swal.fire({
    title: 'Berhasil Di ubah',
    type: 'success',
    timer: 3000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../admin/anak.php');
  } ,1000); 
 </script>"; 
    //header('location:../anak.php');
}
?>

