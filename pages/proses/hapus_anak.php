<link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
<?php
include('../../config.php');
 
$id = $_GET['no_medisanak'];
 
$query = mysqli_query($connect,"delete from anak where no_medisanak='$id'") or die(mysqli_connect_error());
 
if ($query) {
    echo "
 <script type='text/javascript'>
  setTimeout(function () {  
    Swal.fire({
    title: 'Berhasil Di Hapus',
    type: 'success',
    timer: 3000,
    showConfirmButton: true
   });  
  },10); 
  window.setTimeout(function(){ 
   window.location.replace('../admin/anak.php');
  },1000); 
 </script>"; 
    //header("location:../anak.php");
}
?>