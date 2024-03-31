<div class="pagetitle">
      <h1>Hasil Topsis</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="?a=dashboard">Dasbor</a></li>
          <li class="breadcrumb-item active">Hasil Topsis</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <ul class="nav nav-tabs">
  <?php
  $activeTab = isset($_GET['k']) ? $_GET['k'] : ''; // Mengambil nilai k dari URL untuk menentukan tab yang aktif

  // Inisialisasi variabel untuk setiap tab
  $tabs = array(
    'nilai_matriks' => 'Nilai Matriks',
    'nilai_matriks_normalisasi' => 'Nilai Matriks Ternormalisasi',
    'nilai_bobot_normalisasi' => 'Nilai Bobot Ternormalisasi',
    'matriks_ideal' => 'Matriks Ideal Posistif/Negatif',
    'jarak_solusi' => 'Jarak Solusi Ideal Posistif/Negatif',
    'nilai_preferensi' => 'Nilai Preferensi'
  );

  // Iterasi melalui setiap tab dan menentukan class active jika tab tersebut aktif
  foreach ($tabs as $key => $label) {
    $activeClass = ($activeTab == $key) ? 'active text-dark' : '';
    echo '<li class="nav-item"><a class="nav-link ' . $activeClass . '" href="index.php?a=hasiltopsis&k=' . $key . '">' . $label . '</a></li>';
  }
  ?>
</ul>


<?php

if (@$_GET['a'] == 'hasiltopsis') {
    if (@$_GET['k'] == 'nilai_matriks') {
        include("nilai_matriks.php");
    } else if (@$_GET['k'] == 'nilai_matriks_normalisasi') {
        include("nilai_matriks_normalisasi.php");
    } else if (@$_GET['k'] == 'nilai_bobot_normalisasi') {
        include("nilai_bobot_normalisasi.php");
    } else if (@$_GET['k'] == 'matriks_ideal') {
        include("matriks_ideal.php");
    } else if (@$_GET['k'] == 'jarak_solusi') {
        include("jarak_solusi.php");
    } else if (@$_GET['k'] == 'nilai_preferensi') {
        include("nilai_preferensi.php");
    }
}
?>
