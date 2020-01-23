<?php 
  session_start();
  include '../../config.php';
    
  if (isset($_SESSION['username'])) {
  $username = $_SESSION['username'];
  $isLoggedIn = $_SESSION['isLoggedIn'];
  //$id_login = $_SESSION['iduser'];
  }
  else {
    header('location:../../index.php?pesan=belum_login');
  }
  


?>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Stunting Prediction</title>
  <!-- Favicon -->
  <link href="../../assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="../../assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="../../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="../../assets/css/argon.css?v=1.0.0" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../../assets/DataTables/datatables.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
</head>


<body>
  <!-- Sidenav -->
<?php   include '../../config.php'; 
  include '../../assets/pages/navbar_left_ortu.php';
?>
  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <?php include '../../assets/pages/navbar_top.php'; ?>

    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
          <?php include '../../assets/pages/top_report.php'; ?>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <div class="row mt-5">
        <div class="col-xl-12 mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
              <div class="container-fluid">
                  <div class="header-body">
                    <!-- Card stats -->
                    <div class="row">
                

                      <div class="col-xl-12 col-lg-6">
                        <div class="card-body">
                        <h1>BIODATA ANAK</h1>
               
                        <div>
                        <?php
                            $no_medisanak = null;

                            if(isset($_GET["no_medisanak"]))
                            {
                              $no_medisanak = $_GET["no_medisanak"];
                            }
                               
                        $query = mysqli_query($connect, "SELECT * FROM anak a JOIN ortu o ON a.no_medisanak = o.no_medisanak 
                                                                             JOIN pengukuran p ON a.no_medisanak = p.no_medisanak
                                                                            WHERE a.no_medisanak = '$no_medisanak' GROUP BY '$no_medisanak'");
                        //$result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($query)) {  
                    ?>
                                          <div class="form-group">
                                          <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text">NIK Anak:</span>
                                            </div>
                                            <input class="form-control" placeholder="NIK Anak" type="text" name="nik_anak" id="nikanak" value="<?php echo $row['nik_anak']; ?>" readonly>
                                          </div>
                                        </div>
                                          <div class="form-group">
                                          <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text">Nama Anak:</span>
                                            </div>
                                            <input class="form-control" placeholder="Nama Anak" type="text" name="nama_anak" id="nama" value="<?php echo $row['nama_anak']; ?>" readonly>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text">Tempat Lahir Anak:</span>
                                            </div>
                                            <input class="form-control" placeholder="tempatlhr" type="text" name="tempatlhr" id="tempatlhr" value="<?php echo $row['tempat_lhr']; ?>" readonly>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text">Tanggal Lahir Anak:</span>
                                            </div>
                                            <input class="form-control" placeholder="Nama Ibu" type="text" name="nama_ibu" id="ibu" value="<?php echo $row['tgllahir_anak']; ?>" readonly>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text">Jenis Kelamin:</span>
                                            </div>
                                            <select class="form-control" name="jk" id="level" readonly>
                                                <option value="<?php echo $row['jenis_kelamin']; ?>"> <?php echo $row['jenis_kelamin']; ?></option>
                                          
                                              </select>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text">Nama Ayah:</span>
                                            </div>
                                            <input class="form-control" placeholder="Nama Ibu" type="text" name="nama_ibu" id="ibu" value="<?php echo $row['nama_ayah']; ?>" readonly>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text">NIK Ayah:</span>
                                            </div>
                                            <input class="form-control" placeholder="Nama Ibu" type="text" name="nama_ibu" id="ibu" value="<?php echo $row['nik_ayah']; ?>" readonly>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text">Nama Ibu:</span>
                                            </div>
                                            <input class="form-control" placeholder="Nama Ibu" type="text" name="nama_ibu" id="ibu" value="<?php echo $row['nama_ibu']; ?>" readonly>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text">NIK Ibu:</span>
                                            </div>
                                            <input class="form-control" placeholder="Nama Ibu" type="text" name="nama_ibu" id="ibu" value="<?php echo $row['nik_ibu']; ?>" readonly>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text">Alamat:</span>
                                            </div>
                                            <input class="form-control" placeholder="Nama Ibu" type="text" name="nama_ibu" id="ibu" value="<?php echo $row['alamat']; ?>" readonly>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text">Nomor Telpon:</span>
                                            </div>
                                            <input class="form-control" placeholder="Notelp" type="text" name="notelp" id="notelp" value="<?php echo $row['notelp']; ?>" readonly>
                                          </div>
                                        </div>
                                              <?php }?>

                          
                        </div>
                      </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    


  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="../../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Optional JS -->
  <script src="../../assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="../../assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="../../assets/js/argon.js?v=1.0.0"></script>
  <script type="text/javascript" src="../../assets/DataTables/datatables.min.js"></script>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
 <!-- <script src="../assets/js/grafik_gizi.js"></script>   -->



</body>

</html>
