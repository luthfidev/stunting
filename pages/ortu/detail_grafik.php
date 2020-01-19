<?php 
  session_start();
  include '../config.php';
    
  if (isset($_SESSION['username'])) {
  $username = $_SESSION['username'];
  $isLoggedIn = $_SESSION['isLoggedIn'];
  $id_login = $_SESSION['iduser'];
  }
  else {
    header('location:../index.php?pesan=belum_login');
  }
   $nama_anak = null;

  if(isset($_GET["nama_anak"]))
  {
    $nama_anak = $_GET["nama_anak"];
  }
 /*  $query = mysqli_query($connect, "select tanggal, nama_anak,
  COUNT(case when anak.keterangan='Stunting Gizi Baik' then 1 end) as baik,
  COUNT(case when anak.keterangan='Stunting Gizi Buruk' then 1 end) as buruk,
  COUNT(case when anak.keterangan='Stunting Gizi Kurang' then 1 end) as kurang,
  COUNT(case when anak.keterangan='Gizi lebih' then 1 end) as lebih 
  from anak where nama_anak = '".$nama_anak."'"); */

  $query = mysqli_query($connect, "select date_format(tanggal, '%Y-%m') as tanggal, nama_anak,
  COUNT(case when anak.keterangan='Stunting Gizi Baik' then 1 end) as baik,
  COUNT(case when anak.keterangan='Stunting Gizi Buruk' then 1 end) as buruk,
  COUNT(case when anak.keterangan='Stunting Gizi Kurang' then 1 end) as kurang,
  COUNT(case when anak.keterangan='Gizi lebih' then 1 end) as lebih 
  from anak where nama_anak = '".$nama_anak."' group by tanggal");
  $chart_data = '';
  while($row = mysqli_fetch_array($query))
  {
    $chart_data .= "{ tanggal: '".$row["tanggal"]."', baik: ".$row["baik"].", buruk: ".$row["buruk"].", lebih: ".$row["lebih"].", kurang: ".$row["kurang"].",}, ";
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
  <link href="../assets/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="../assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="../assets/css/argon.css?v=1.0.0" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../assets/DataTables/datatables.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
</head>


<body>
  <!-- Sidenav -->
<?php   include '../config.php'; 
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
              <div class="container-fluid">
                  <div class="header-body">
                    <!-- Card stats -->
                    <div class="row">
                

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
  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Optional JS -->
  <script src="../assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="../assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.0.0"></script>
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

new Morris.Area({
  // ID of the element in which to draw the chart.
  element: 'chart',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [<?php echo $chart_data; ?>  ],
  // The name of the data record attribute that contains x-values.
  xkey: 'tanggal',
  parseTime: false,
  // A list of names of data record attributes that contain y-values.
  ykeys: ['baik','buruk','lebih','kurang'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Stunting Baik','Stunting Buruk','Stunting Lebih','Stunting Kurang'],
  lineColors: ['#373651','#E65A26','#0bb356','#ebe834']
});
</script>

</body>

</html>