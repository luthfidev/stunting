<?php include '../config.php'; ?>
  <!-- Sidenav -->
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="../pages/index.php">
        <img src="../assets/img/theme/angular.jpg" class="navbar-brand-img" alt="...">
      </a>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="../index.html">
                <img src="../assets/img/brand/blue.png">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>

        <!-- Navigation -->
        <ul class="navbar-nav">
<!--           <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="ni ni-tv-2 text-primary"></i> Dashboard
            </a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" href="pesanan.php">
              <i class="ni ni-single-02 text-red"></i> Pesanan
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pembelian.php">
              <i class="ni ni-bag-17 text-info"></i> Pembelian
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pengeluaran.php">
              <i class="ni ni-shop text-primary"></i> Pengeluaran
            </a>
          </li>
         

          
<!--           <li class="nav-item">
            <a class="nav-link" href="#navbar-transaksi" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-transaksi">
              <i class="ni ni-shop text-success"></i>
              <span class="nav-link-text">Transaksi</span>
            </a>
            <div class="collapse" id="navbar-transaksi" style="">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                  <a href="transaksi_sewa.php" class="nav-link">Data</a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">Report</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#navbar-report" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-report">
              <i class="ni ni-single-copy-04 text-yellow"></i>
              <span class="nav-link-text">Report</span>
            </a>
            <div class="collapse" id="navbar-report" style="">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                  <a href="report.php" class="nav-link">Data</a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">Report</a>
                </li>
              </ul>
            </div>
          </li> -->
        </ul>

      </div>
    </div>
  </nav>