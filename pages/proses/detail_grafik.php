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
?><html>

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
  <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.css"/>
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
                <div class="col">
                  <h1 class="mb-0">Detail Data Anak</h1>
                </div>
                <div class="col text-right">
                  <!-- <a href="report/cetak_report_rekap_stok.php" class="btn btn-danger">Cetak Report</a> -->
                   <!-- <a href="#" data-toggle="modal" data-target="#AddModal" class="btn btn-success">Tambah</a> --> 
                </div>
              </div>
            </div>
           

   

   

   
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
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
  <script type="text/javascript">
    $(".form_datetime").datetimepicker({
        format: "dd MM yyyy - hh:ii"
    });
</script>       

  <script type="text/javascript">
          $('#EditModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('what0')
            var recipient1 = button.data('what1')
            var recipient2 = button.data('what2')
            var recipient3 = button.data('what3')
            var recipient4 = button.data('what4')
             // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-body #id').val(recipient)
            modal.find('.modal-body #nama').val(recipient1)
            modal.find('.modal-body #keterangan').val(recipient3)
            modal.find('.modal-body #umur').val(recipient4)
            modal.find('.modal-body #ibu').val(recipient2)
          })
  </script>
  <script>

$('.del').on('click', function (e){
  e.preventDefault();
  const href = $(this).attr('href')
  Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.value) {
        document.location.href = href;
      }
    })
})

  $('.del-tbn').on('click', function(){
        swall.fire({
          type : 'success',
          tittle: 'Tittla',
          text: 'text'
        })
})
  </script>
</body>

</html>