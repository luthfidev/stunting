<?php include '../config.php'; ?>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Stunting Prediction</title>
  <!-- Favicon -->
  <link href="../assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="../assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="../assets/css/argon.css?v=1.0.0" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../assets/DataTables/datatables.min.css"/>
</head>


<body>
  <!-- Sidenav -->
  <?php   include '../config.php'; 

session_start();
  function rupiah($angka){
  
  $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
  return $hasil_rupiah;
 
  }
if (isset($_SESSION['username'])) {
$username = $_SESSION['username'];
$isLoggedIn = $_SESSION['isLoggedIn'];
$id_login = $_SESSION['iduser'];
}
else {
$username = "";
$isLoggedIn = "";
$id_login = "";
}

  include '../assets/pages/navbar_left_wakil.php';
?>
  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <?php include '../assets/pages/navbar_top.php'; ?>

    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
          <?php include '../assets/pages/top_report.php'; ?>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row mt-5">
        <div class="col-xl-12 mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h1 class="mb-0">Detail Data</h1>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form>
                 <?php
                      $id=$_GET['id'];
                       $query = mysql_query("SELECT * FROM kesehatan WHERE id_data='$id'");
                       $data=mysql_fetch_array($query);
                      ?>
                <!-- <h6 class="heading-small text-muted mb-4">Data Info Kesehatan</h6> -->
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Judul</label>
                         <p class="form-control form-control-alternative"><?php echo $data['nama'];?></p>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Kategori</label>
                         <p class="form-control form-control-alternative"><?php echo $data['kategori'];?></p>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Keterangan</label>
                         <textarea class="form-control" rows="4" cols="50" placeholder="Keterangan" name="keterangan" form="usrform"><?php echo $data['keterangan'];?></textarea>
                         <!-- <p class="form-control form-control-alternative"> -->
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Isi</label>
                         <textarea class="form-control" rows="4" cols="50" placeholder="Keterangan" name="keterangan" form="usrform"><?php echo ($data['isi']);?></textarea>
                         <!-- <p class="form-control form-control-alternative"></p> -->
                      </div>
                    </div>
                  </div>
                </div>
                <!-- <hr class="my-4" /> -->
                <!-- Address -->
              
            
          </div>
        </div>
      </div>
      
      <!-- Footer -->
      <footer class="footer">
      </footer>
    </div>

  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Optional JS -->
  <script src="../assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="../assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.0.0"></script>
  <script type="text/javascript" src="../assets/DataTables/datatables.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#data').DataTable( {        
        "paging": true,     
        "ordering": false,     
        "info": true,     
        "searching": true,     
        "pagingType": "numbers",
        "bLengthChange" : false
      }
      );
    });
  </script>

</body>

</html>