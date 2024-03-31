<div class="pagetitle">
      <h1>Kriteria</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="?a=dashboard">Dasbor</a></li>
          <li class="breadcrumb-item active">Kriteria</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
<ul class="nav nav-tabs">
  <?php
  $act1 = '';
  $act2 = '';
  if ($_GET['k'] == 'kriteria') {
      $act1 = 'active';
  } else if ($_GET['k'] == 'tambah') {
      $act2 = 'active';
  }
  ?>
  <li class="nav-item">
    <a class="nav-link <?php echo $act1; ?>" href="index.php?a=kriteria&k=kriteria">Data Kriteria</a>
  </li>

  <li class="nav-item">
    <a class="nav-link <?php echo $act2; ?>" href="index.php?a=kriteria&k=tambah">Tambah Kriteria</a>
  </li>


</ul>

<?php
if (@$_GET['a'] == 'kriteria' && @$_GET['k'] == 'kriteria') {
    include("datakriteria.php");
} else if (@$_GET['k'] == 'tambah') {
    include("tambahkriteria.php");
} else if (@$_GET['k'] == 'ubahk') {
    include("ubahkriteria.php");
}
?>
