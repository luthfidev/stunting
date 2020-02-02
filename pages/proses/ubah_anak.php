<link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
<?php
include '../../config.php';


$id = $_POST['no_medisanak'];
$nik_anak = $_POST['nik_anak'];
$nama_anak = $_POST['nama_anak'];
$tempat_lhr = $_POST['tempat_lhr'];
$tgllahir_anak = $_POST['tgllahir_anak'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$nama_ayah = $_POST['nama_ayah'];
$nik_ayah = $_POST['nik_ayah'];
$nama_ibu = $_POST['nama_ibu'];
$nik_ibu = $_POST['nik_ibu'];
$alamat = $_POST['alamat'];
$notelp = $_POST['notelp'];
$bb_anak = $_POST['bb_anak'];
$tb_anak = $_POST['tb_anak'];



/* $query = mysqli_query($connect, "UPDATE anak, ortu, pengukuran SET anak.nik_anak = '$nik_anak', anak.nama_anak = '$nama_anak', anak.tempat_lhr = '$tempat_lhr', anak.tgllahir_anak = '$tgllahir_anak' WHERE anak.no_medisanak = '$id'
                                 AND ortu.nama_ayah = '$nama_ayah', ortu.nik_ayah = '$nik_ayah', ortu.nama_ibu = '$nama_ibu', ortu.nik_ibu = '$nik_ibu', ortu.alamat = '$alamat' ortu.notelp = '$notelp'
                                 AND pengukuran.jenis_kelamin = '$jenis_kelamin', pengukuran.bb_anak = '$bb_anak', pengukuran.tb_anak = '$tb_anak' ") or die(mysqli_connect_error());
 */
$query = mysqli_query($connect, "UPDATE anak SET nik_anak = '$nik_anak', nama_anak = '$nama_anak', tempat_lhr = '$tempat_lhr', tgllahir_anak = '$tgllahir_anak' WHERE no_medisanak = '$id'") or die(mysqli_connect_error());

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

