<div class="pagetitle">
      <h1>Alternatif</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="?a=dashboard">Dasbor</a></li>
          <li class="breadcrumb-item active">Alternatif</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
<ul class="nav nav-tabs">
  <?php
  $act1 = '';
  $act2 = '';
  if ($_GET['k'] == 'alternatif') {
      $act1 = 'active';
  } else if ($_GET['k'] == 'tambah') {
      $act2 = 'active';
  }
  ?>
  <li class="nav-item">
    <a class="nav-link <?php echo $act1; ?>" href="index.php?a=alternatif&k=alternatif">Data Alternatif</a>
  </li>

  <li class="nav-item">
    <a class="nav-link <?php echo $act2; ?>" href="index.php?a=alternatif&k=tambah">Tambah Alternatif</a>
  </li>

</ul>

<?php
if (@$_GET['a'] == 'alternatif' && @$_GET['k'] == 'alternatif') {
    include("datakalternatif.php");
} else if (@$_GET['k'] == 'tambah') {
    include("tambahalternatif.php");
} else if (@$_GET['k'] == 'ubaha') {
    include("ubahalternatif.php");
}
?>
