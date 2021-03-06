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
?><html>

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
  <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.css"/>
</head>


<body>
  <!-- Sidenav -->
<?php   include '../../config.php'; 
  include '../../assets/pages/navbar_left_admin.php';
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
                <div class="col">
                  <h1 class="mb-0">Detail Data Anak</h1>
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
                    <th scope="col">Tanggal Pengukuran</th>
                    <th scope="col">No. Medis</th>
                    <th scope="col">NIK Anak</th>
                    <th scope="col">Nama Anak</th>
                    <th scope="col">Tempat Lahir</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Nama Ayah</th>
                    <th scope="col">NIK Ayah</th>
                    <th scope="col">Nama Ibu</th>
                    <th scope="col">NIK Ibu</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No Telpon</th>
                    <th scope="col">Berat</th>
                    <th scope="col">Tinggi Badan</th> 
                    <th scope="col">Action</th> 
                  </tr>
                </thead>
                  <tbody>
                      <?php
                     /*  $strCustomerID = null;

                      if(isset($_GET["tanggal"]))
                      {
                        $tanggal = $_GET["tanggal"];
                      
                      } $query = mysqli_query($connect, "SELECT * FROM anak WHERE tanggal = '".$tanggal."' ORDER BY id_anak DESC");
                      */
                       $query = mysqli_query($connect, "SELECT * FROM anak a JOIN ortu o ON a.no_medisanak = o.no_medisanak 
                                                                             JOIN pengukuran p ON a.no_medisanak = p.no_medisanak");
                       $no=1;
                       while ($data=mysqli_fetch_array($query)) {
                      ?>
                        <tr>
                          <td><?php echo $no++; ?></td>
                          <td><?php echo $data['tanggal_pengukuran']; ?></td>
                          <td><?php echo $data['no_medisanak']; ?></td>
                          <td><?php echo $data['nik_anak'];?></td>
                          <td><?php echo $data['nama_anak']; ?></td>
                          <td><?php echo $data['tempat_lhr'];?></td>
                          <td><?php echo $data['tgllahir_anak']; ?></td>
                          <td><?php echo $data['jenis_kelamin']; ?></td>
                          <td><?php echo $data['nama_ayah'];?></td>
                          <td><?php echo $data['nik_ayah'];?></td>
                          <td><?php echo $data['nama_ibu']; ?></td>
                          <td><?php echo $data['nik_ibu']; ?></td>
                          <td><?php echo $data['alamat'];?></td>
                          <td><?php echo $data['notelp'];?></td>
                          <td><?php echo $data['bb_anak']; ?> kg</td>
                          <td><?php echo $data['tb_anak']; ?> cm</td>
                          <!-- <?php if ($data['keterangan']=="Gizi Baik") {?>
                            <td class="text-center">
                            <a class="btn btn-success" data-toggle="tooltip" data-placement="right" title="Sehat" href="#"><i class="fa fa-check"></i></a>
                          </td>
                          <?php }else{ ?>
                            <td class="text-center">
                            <a class="btn btn-warning" data-toggle="tooltip" data-placement="right" title="Tidak Sehat" href="#"><i class="fa fa-times"></i></a>
                          </td>
                          <?php } ?> -->
                          <td>
                         <a href="#" data-toggle="modal" data-target="#EditModal<?php echo $data['no_medisanak']; ?>" class="btn btn-primary">Ubah</a>
                          <a href="../proses/hapus_anak.php?no_medisanak=<?php echo $data["no_medisanak"];?>" class="btn btn-danger del">Hapus</a>
                          <!-- <a href="profil_anak.php?no_medisanak=<?php echo $data["no_medisanak"];?>" class="btn btn-default">Profil</a>
                          <a href="detail_grafik.php?no_medisanak=<?php echo $data["no_medisanak"];?>" class="btn btn-info">Grafik</a>  
                          </td>-->
                            
                        </tr>
                        <div class="modal fade show" id="EditModal<?php echo $data['no_medisanak']; ?>" tabindex="-1" role="dialog" aria-labelledby="modal-form"">
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
                                      <form role="form" method="POST" action="../proses/ubah_anak.php">
                                            <?php
                                              $id = $data['no_medisanak']; 
                                              $query_edit = mysqli_query($connect, "SELECT * FROM anak a JOIN ortu o ON a.no_medisanak = o.no_medisanak 
                                              JOIN pengukuran p ON a.no_medisanak = p.no_medisanak where a.no_medisanak = '$id'");
                                              //$result = mysqli_query($conn, $query);
                                              while ($row = mysqli_fetch_array($query_edit)) {  
                                            ?>
                                        <div class="form-group">
                                          <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                                            </div>
                                            <input class="form-control" placeholder="Nama Anak" type="hidden" name="no_medisanak" id="id"  value="<?php echo $row['no_medisanak']; ?>">
                                            <input class="form-control" placeholder="Nama Anak" type="text" name="nama_anak" id="nama_anak" value="<?php echo $row['nama_anak']; ?>">
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="ni ni-badge"></i></span>
                                            </div>
                                            <input class="form-control" placeholder="NIK" type="text" name="nik_anak" id="ibu" value="<?php echo $row['nik_anak']; ?>">
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="ni ni-badge"></i></span>
                                            </div>
                                            <input class="form-control" placeholder="Tempat Lahir" type="text" name="tempat_lhr" id="tempat_lhr" value="<?php echo $row['tempat_lhr']; ?>">
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="ni ni-badge"></i></span>
                                            </div>
                                            <input class="form-control" placeholder="Tanggal Lahir" type="text" name="tgllahir_anak" id="tgllahir_anak" value="<?php echo $row['tgllahir_anak']; ?>">
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="ni ni-badge"></i></span>
                                            </div>
                                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" value="<?php echo $row['jenis_kelamin']; ?>">
                                                <option value="Laki-Laki">Laki-Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                              </select>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="ni ni-badge"></i></span>
                                            </div>
                                            <input class="form-control" placeholder="Nama Ayah" type="text" name="nama_ayah" id="nama_ayah" value="<?php echo $row['nama_ayah']; ?>">
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="ni ni-badge"></i></span>
                                            </div>
                                            <input class="form-control" placeholder="NIK Ayah" type="text" name="nik_ayah" id="nikayah" value="<?php echo $row['nik_ayah']; ?>">
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="ni ni-badge"></i></span>
                                            </div>
                                            <input class="form-control" placeholder="Nama Ibu" type="text" name="nama_ibu" id="ibu" value="<?php echo $row['nama_ibu']; ?>">
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="ni ni-badge"></i></span>
                                            </div>
                                            <input class="form-control" placeholder="NIK Ibu" type="text" name="nik_ibu" id="nikibu" value="<?php echo $row['nik_ibu']; ?>">
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="ni ni-badge"></i></span>
                                            </div>
                                            <input class="form-control" placeholder="Alamat" type="text" name="alamat" id="alamat" value="<?php echo $row['alamat']; ?>">
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="ni ni-badge"></i></span>
                                            </div>
                                            <input class="form-control" placeholder="No Telp" type="text" name="notelp" id="notelp" value="<?php echo $row['notelp']; ?>">
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="ni ni-badge"></i></span>
                                            </div>
                                            <input class="form-control" placeholder="BB Anak" type="text" name="bb_anak" id="bb_anak" value="<?php echo $row['bb_anak']; ?>">
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <div class="input-group input-group-alternative">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="ni ni-badge"></i></span>
                                            </div>
                                            <input class="form-control" placeholder="TB Anak" type="text" name="tb_anak" id="tb_anak" value="<?php echo $row['tb_anak']; ?>">
                                          </div>
                                        </div>
                                      
                                        <div class="text-center">
                                          <button type="submit" class="btn btn-primary my-4">Ubah</button>
                                        </div>
                                          <?php 
                                              }
                                            ?>  
                                        </form>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        <?php
                          
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

   
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="../../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
  <script src="../../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Optional JS -->
  <script src="../../assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="../../assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="../../assets/js/argon.js?v=1.0.0"></script>
  <script type="text/javascript" src="../../assets/DataTables/datatables.min.js"></script>
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
            var recipient5 = button.data('what5')
            var recipient6 = button.data('what6')
            var recipient7 = button.data('what7')
            var recipient8 = button.data('what8')
            var recipient9 = button.data('what9')
             var recipient10 = button.data('what10')
            var recipient11 = button.data('what11')
            var recipient12 = button.data('what12')
            var recipient13 = button.data('what13')
             // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-body #id').val(recipient)
            modal.find('.modal-body #nama_anak').val(recipient1)
            modal.find('.modal-body #nik_anak').val(recipient2)
            modal.find('.modal-body #tempat_lhr').val(recipient3)
            modal.find('.modal-body #tgllahir_anak').val(recipient4)
            modal.find('.modal-body #jk').val(recipient5)
            modal.find('.modal-body #nama_ayah').val(recipient6)
            modal.find('.modal-body #nik_ayah').val(recipient7)
            modal.find('.modal-body #nama_ibu').val(recipient8)
            modal.find('.modal-body #nik_ibu').val(recipient9)
            modal.find('.modal-body #alamat').val(recipient10)
            modal.find('.modal-body #notelp').val(recipient11)
            modal.find('.modal-body #bb_anak').val(recipient12)
            modal.find('.modal-body #tb_anak').val(recipient13)
         
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
