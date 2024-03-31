<div class="pagetitle">
      <h1>Dasbor</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dasbor</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
<section class="section dashboard">
    <div class="row">
        <!-- Customers Card -->
        <div class="col-xxl-4 col-xl-12">

            <div class="card info-card customers-card">

                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                            <h6>Filter</h6>
                        </li>

                        <li><a class="dropdown-item" href="#">Today</a></li>
                        <li><a class="dropdown-item" href="#">This Month</a></li>
                        <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                </div>

              <?php
// Query untuk menghitung jumlah baris dalam tabel
$sql = "SELECT COUNT(*) AS count FROM kriteria";
$result = mysqli_query($k21, $sql);

if ($result) {
    // Mengambil hasil query
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];
} else {
    $count = 0;
}

?>

<div class="card-body">
    <h5 class="card-title">Data Kriteria</h5>
    <div class="d-flex align-items-center">
        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
            <i class="bi bi-person-lines-fill"></i>
        </div>
        <div class="ps-3">
            <h6><?php echo $count; ?></h6>
        </div>
    </div>
</div>

            </div>

        </div><!-- End Customers Card -->
        <!-- Customers Card -->
        <div class="col-xxl-4 col-xl-12">

            <div class="card info-card customers-card">

                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                            <h6>Filter</h6>
                        </li>

                        <li><a class="dropdown-item" href="#">Today</a></li>
                        <li><a class="dropdown-item" href="#">This Month</a></li>
                        <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                </div>

          <?php
// Query untuk menghitung jumlah baris dalam tabel
$sql = "SELECT COUNT(*) AS count FROM alternatif";
$result = mysqli_query($k21, $sql);

if ($result) {
    // Mengambil hasil query
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];
} else {
    $count = 0;
}

?>

<div class="card-body">
    <h5 class="card-title">Data Alternatif</h5>
    <div class="d-flex align-items-center">
        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
            <i class="bi bi-person-lines-fill"></i>
        </div>
        <div class="ps-3">
            <h6><?php echo $count; ?></h6>
        </div>
    </div>
</div>

            </div>

        </div><!-- End Customers Card -->
    </div>
</section>