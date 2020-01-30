<?php 
  session_start();
  include '../../config.php';
    
  if (isset($_SESSION['username'])) {
  $username = $_SESSION['username'];
  $isLoggedIn = $_SESSION['isLoggedIn'];
  $level= $_SESSION['level'];
 
  }
  else {
    header('location:../index.php?pesan=belum_login');
  }
/*   $query = mysqli_query($connect, "select tanggal, 
	COUNT(case when anak.keterangan='Stunting Gizi Baik' then 1 end) as baik,
    COUNT(case when anak.keterangan='Stunting Gizi Buruk' then 1 end) as buruk,
    COUNT(case when anak.keterangan='Stunting Gizi Kurang' then 1 end) as kurang,
    COUNT(case when anak.keterangan='Gizi lebih' then 1 end) as lebih  
  from anak  group by tanggal"); */
  $query = mysqli_query($connect, "select p.no_medisanak, date_format(p.tanggal_pengukuran, '%Y-%m') as tanggal,
	  COUNT(case when p.status_stunting='Stunting' AND  p.status_gizi='Gizi Baik' then 1 end) as sbaik,
    COUNT(case when p.status_stunting='Stunting' AND p.status_gizi='Gizi Buruk' then 1 end) as sburuk,
    COUNT(case when p.status_stunting='Stunting' AND p.status_gizi='Gizi Kurang' then 1 end) as skurang,
    COUNT(case when p.status_stunting='Stunting' AND p.status_gizi='Gizi Lebih' then 1 end) as slebih,
    COUNT(case when p.status_stunting='Normal'   AND p.status_gizi='Gizi Baik' then 1 end) as nbaik,
    COUNT(case when p.status_stunting='Normal'   AND p.status_gizi='Gizi Buruk' then 1 end) as nburuk, 
    COUNT(case when p.status_stunting='Normal'   AND p.status_gizi='Gizi Kurang' then 1 end) as nkurang, 
    COUNT(case when p.status_stunting='Normal'   AND p.status_gizi='Gizi Lebih' then 1 end) as nlebih   
	from pengukuran p join anak a where p.no_medisanak = a.no_medisanak group by p.tanggal_pengukuran");
  $chart_data = '';
  while($row = mysqli_fetch_array($query))
  {
    $chart_data .= "{ tanggal: '".$row["tanggal"]."', sbaik: ".$row["sbaik"].", sburuk: ".$row["sburuk"].", slebih: ".$row["slebih"].", skurang: ".$row["skurang"].",nbaik: ".$row["nbaik"].",nburuk: ".$row["nburuk"].",nkurang: ".$row["nkurang"].",nlebih: ".$row["nlebih"].",}, ";
  }
  $chart_data = substr($chart_data, 0, -2);

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
  include '../../assets/pages/navbar_left_dokter.php';
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
                  <h1 class="mb-0">HISTORY IDENTIFIKASI PENGUKURAN</h1>
                  <h2>Status Gizi dan Stunting Balita</h2>
                    <!-- Card stats -->
                    <div class="row">
                     <!--  <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                          <div class="card-body">
                            <div class="row">
                              <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">User</h5>
                                <span class="h2 font-weight-bold mb-0">
                                <?php
                                $result=mysqli_query($connect, "SELECT count(*) as ttluser from admin");
                                $data=mysqli_fetch_assoc($result);
                                echo $data['ttluser'];
                                ?>
                                </span>
                              </div>
                              <div class="col-auto">
                                <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                  <i class="fas fa-user"></i>
                                </div>
                              </div>
                            </div>
                      
                          </div>
                        </div>
                      </div> -->
                      <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                          <div class="card-body">
                            <div class="row">
                              <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Anak</h5>
                                <span class="h2 font-weight-bold mb-0">
                                <?php
                                $result=mysqli_query($connect, "SELECT count(*) as ttlanak from anak");
                                $data=mysqli_fetch_assoc($result);
                                echo $data['ttlanak'];
                                ?>
                                </span>
                              </div>
                              <div class="col-auto">
                                <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                <i class="fas fa-smile"></i>
                                </div>
                              </div>
                            </div>
                        
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                          <div class="card-body">
                            <div class="row">
                              <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Sehat</h5>
                                <span class="h2 font-weight-bold mb-0">
                                <?php
                                $result=mysqli_query($connect, "SELECT count(*) as sehat from pengukuran where status_gizi = 'Gizi Baik' ");
                                $data=mysqli_fetch_assoc($result);
                                echo $data['sehat'];
                                ?>
                                </span>
                              </div>
                              <div class="col-auto">
                                <div class="icon icon-shape bg-green text-white rounded-circle shadow">
                                <i class="fas fa-check-square"></i>
                                </div>
                              </div>
                            </div>
                      
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                          <div class="card-body">
                            <div class="row">
                              <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Tidak Sehat</h5>
                                <span class="h2 font-weight-bold mb-0">
                                <?php
                                $result=mysqli_query($connect, "SELECT count(*) as tsehat from pengukuran where status_gizi = 'Gizi Buruk' ");
                                $data=mysqli_fetch_assoc($result);
                                echo $data['tsehat'];
                                ?>
                                </span>
                              </div>
                              <div class="col-auto">
                                <div class="icon icon-shape bg-red text-white rounded-circle shadow">
                                <i class="fas fa-times-circle"></i>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-xl-12 col-lg-6">
                        <div class="card-body">
                           <div class="card card-stats mb-4 mb-xl-0">
                              <div id="chart"></div>
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
  <script type="text/javascript" src="../assets/DataTables/datatables.min.js"></script>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
 <!-- <script src="../assets/js/grafik_gizi.js"></script>   -->

<script>
/* new Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'chart',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [<?php echo $chart_data; ?> ],
  // The name of the data record attribute that contains x-values.
  xkey: 'tanggal',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['baik','buruk'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['baik','buruk']
}); */

new Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'chart',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [<?php echo $chart_data; ?>  ],
  // The name of the data record attribute that contains x-values.
  xkey: 'tanggal',
  parseTime: false,
  // A list of names of data record attributes that contain y-values.
  ykeys: ['sbaik','sburuk','slebih','skurang','nbaik','nburuk','nkurang','nlebih',],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Stunting Baik','Stunting Buruk','Stunting Lebih','Stunting Kurang','Normal Baik','Normal Buruk','Normal Kurang','Normal Lebih'],
  lineColors: ['#373651','#E65A26','#0bb356','#ebe834','#16a085','#16a085','#16a085','#16a085']
});
</script>

</body>

</html>
