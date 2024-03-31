<div class="pagetitle">
      <h1>Nilai Matriks</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Dasbor</a></li>
          <li class="breadcrumb-item active">Nilai Matriks</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
<ul class="nav nav-tabs">
    <li class="nav-item"><a class="nav-link active" href="index.php?a=kriteria&k=kriteria">Isi Nilai Matriks</a></li>
</ul>
<div class="container">
    <div class="row mt-3">
        <div class="col">
            <h3 class="box-title">Tambah Nilai Matriks</h3>
        </div>
    </div>
    <form method="POST" action="">
        <div class="row mb-3">
            <label for="idAlt" class="col-lg-2 col-form-label">Id Alternatif</label>
            <div class="col-lg-4">
                <select name="id_alt" id="idAlt" class="form-select">
                    <?php
                    include("konfig/koneksi.php");
                    $s = mysqli_query($k21, "select * from alternatif");
                    while ($d = mysqli_fetch_assoc($s)) {
                    ?>
                    <option value="<?php echo $d['id_alternatif'] ?>"><?php echo $d['id_alternatif'] . " | " . $d['nm_alternatif'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <hr />
        <div class="row">
    <?php
    include("konfig/koneksi.php");
    $kriteria_query = mysqli_query($k21, "SELECT * FROM kriteria");
    while ($row = mysqli_fetch_assoc($kriteria_query)) {
        $kriteria_id = $row['id_kriteria'];
        $kriteria_nama = $row['nama_kriteria'];
        $tipe_nilai = $row['tipe_nilai'];
    ?>
    <div class="col-lg-12 mb-3">
        <label class="form-label"><?php echo $kriteria_nama; ?></label>
        <input type="hidden" name="id_krite<?php echo $kriteria_id; ?>" value="<?php echo $kriteria_id; ?>" />
        <?php if($tipe_nilai === 'Opsi1'): ?>
        <select class="form-select" name="nilai<?php echo $kriteria_id; ?>" aria-label="Default select example">
  		<option selected><p class="">Pilih Penilaian</p></option>
  		<option value="5">Sangat Baik (Nilai 5)</option>
  		<option value="4">Baik (Nilai 4)</option>
  		<option value="3">Cukup Baik (Nilai 3)</option>
		<option value="2">Kurang Baik (Nilai 2)</option>
        <option value="1">Sangat Kurang Baik (Nilai 1)</option>
		</select>
        <?php elseif($tipe_nilai === 'Opsi2'): ?>
		<select class="form-select" name="nilai<?php echo $kriteria_id; ?>" aria-label="Default select example">
  		<option selected><p class="">Pilih Penilaian</p></option>
  		<option value="4">Sangat Baik (Nilai 4)</option>
  		<option value="3">Baik (Nilai 3)</option>
  		<option value="2">Cukup (Nilai 2)</option>
		<option value="1">Kurang (Nilai 1)</option>
		</select>
        <?php elseif($tipe_nilai === 'Opsi3'): ?>
		<select class="form-select" name="nilai<?php echo $kriteria_id; ?>" aria-label="Default select example">
  		<option selected><p class="">Pilih Penilaian</p></option>
  		<option value="5">Sangat Baik (Nilai 5)</option>
  		<option value="3">Cukup (Nilai 3)</option>
		<option value="1">Sangat Kurang (Nilai 1)</option>
		</select>
        <?php endif; ?>
    </div>
    <?php
    }
    ?>
</div>

        <div class="row mt-3">
            <div class="col-lg-offset-2 col-lg-10">
                <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
            </div>
        </div>
    </form>
</div>
<?php
if (isset($_POST['simpan'])) {
    $id_alt = $_POST['id_alt'];
    $cek = mysqli_query($k21, "select * from alternatif where id_alternatif='$id_alt'");
    $cek_l = mysqli_num_rows($cek);
    if ($cek_l > 0) {
        $del = mysqli_query($k21, "delete from nilai_matrik where id_alternatif='$id_alt'");
    }
    $kriteria_query = mysqli_query($k21, "SELECT * FROM kriteria");
    while ($row = mysqli_fetch_assoc($kriteria_query)) {
        $kriteria_id = $row['id_kriteria'];
        $input_type = $row['tipe_nilai'];
        $nilai = $_POST['nilai'.$kriteria_id];
        $m = mysqli_query($k21, "insert into nilai_matrik (id_alternatif,id_kriteria,nilai) values('$id_alt','$kriteria_id','$nilai')");
        if (!$m) {
            // Gagal menyimpan, lakukan sesuatu
        }
    }
}
?>
