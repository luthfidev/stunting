<?php 
  session_start();
  include '../config.php';
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
                  <h1 class="mb-0">Data Anak</h1>
                </div>
                <div class="col text-right">
                  <!-- <a href="report/cetak_report_rekap_stok.php" class="btn btn-danger">Cetak Report</a> -->
                   <!-- <a href="#" data-toggle="modal" data-target="#AddModal" class="btn btn-success">Tambah</a> --> 
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table id="data" class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Laki</th>
                    <th scope="col">Perempuan</th> 
                    <th scope="col">Detail</th>
                  </tr>
                </thead>
                  <tbody>
                      <?php
                       //$query = mysqli_query($connect, "SELECT tanggal, COUNT(*) as jenis FROM anak WHERE jk='L' GROUP BY tanggal");
                        $query = mysqli_query($connect, "select tanggal, COUNT(*)as tot, 
                                                        COUNT(case when anak.jk='Laki-Laki' then 1 end) as laki,
                                                        COUNT(case when anak.jk='Perempuan' then 1 end) as cew 
                                                        from anak  group by tanggal order by id_anak DESC");
                                        
                       $no=1;
                       while ($data=mysqli_fetch_array($query)) {
                      ?>
                        <tr>
                          <td><?php echo $no; ?></td>
                          <td><?php echo $data['tanggal']; ?></td>
                          <td><?php echo $data['laki']; ?></td>
                          <td><?php echo $data['cew']; ?></td>
                          <td><a href="anak_detail.php?tanggal=<?php echo $data["tanggal"];?>"><i class="btn btn-info">Detail</i></a></td>
                       <?php
                          $no++;
                          }
                        ?>
                  </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer -->
      <footer class="footer">
      </footer>
    </div>

    <!-- Modal Content -->
    <div class="modal fade show" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="modal-form"">
      <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-body p-0">
            <div class="card bg-secondary shadow border-0">
              <div class="card-header bg-white pb-2">
                <div class="text-center mb-3">
                  <h2>Add Anak</h2>
                </div>
              </div>
              <div class="card-body px-lg-3 py-lg-3">
                <form role="form" method="post" action="proses/tambah_anak.php">
                  <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                      </div>
                      <input class="form-control" placeholder="Nama Anak" type="text" name="nama" id="nama">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-badge"></i></span>
                      </div>
                      <input class="form-control" placeholder="Nama Ibu" type="text" name="ibu" id="telp">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-badge"></i></span>
                      </div>
                      <input class="form-control" placeholder="Umur Anak" type="text" name="umur" id="telp">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-badge"></i></span>
                      </div>
                      <input class="form-control" placeholder="Keterangan Kesehatan" type="text" name="keterangan" id="telp">
                    </div>
                  </div>
                 
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary my-4">Submit</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade show" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="modal-form"">
      <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
          <div class="modal-body p-0">
            <div class="card bg-secondary shadow border-0">
              <div class="card-header bg-white pb-2">
                <div class="text-center mb-3">
                  <h2>Edit Anak</h2>
                </div>
              </div>
              <div class="card-body px-lg-3 py-lg-3">
                <form role="form" method="post" action="proses/tambah_anak.php">
                  <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                      </div>
                      <input class="form-control" placeholder="Nama Anak" type="text" name="nama" id="nama">
                      <input class="form-control" placeholder="Nama Anak" type="hidden" name="id" id="id">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-badge"></i></span>
                      </div>
                      <input class="form-control" placeholder="Nama Ibu" type="text" name="ibu" id="ibu">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-badge"></i></span>
                      </div>
                      <input class="form-control" placeholder="Umur Anak" type="text" name="umur" id="umur">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-badge"></i></span>
                      </div>
                      <input class="form-control" placeholder="Keterangan Kesehatan" type="text" name="keterangan" id="keterangan">
                    </div>
                  </div>
                 
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary my-4">Submit</button>
                  </div>
                </form>
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
</body>

</html>