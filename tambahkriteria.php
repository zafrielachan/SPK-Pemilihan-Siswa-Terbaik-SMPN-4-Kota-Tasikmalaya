<?php

include("konfig/koneksi.php");

$query = "SELECT max(id_kriteria) as idMaks FROM kriteria";
$hasil = mysqli_query($k21, $query);
$data  = mysqli_fetch_array($hasil);
$id_kriteria = $data['idMaks'];

// Mengatur 6 karakter sebagai jumlah karakter yang tetap
// Mengatur 3 karakter untuk jumlah karakter yang berubah-ubah
$noUrut = (int) substr($id_kriteria, 2, 3);
$noUrut++;

// Menjadikan 201353 sebagai 6 karakter yang tetap
$char = "kr";
// %03s untuk mengatur 3 karakter di belakang 201353
$id_baru = $char . sprintf("%03s", $noUrut);

?>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tambah Kriteria</h3>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="id_kriteria" class="form-label">ID Kriteria</label>
                            <input type="text" name="id_kriteria" class="form-control" value="<?php echo $id_baru; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="nama_kriteria" class="form-label">Nama Kriteria</label>
                            <input type="text" name="nama_kriteria" class="form-control" placeholder="Nama Kriteria">
                        </div>
                        <div class="mb-3">
                            <label for="bobot" class="form-label">Bobot</label>
                            <select name="bobot" class="form-select">
                                <option selected><p class="">Pilih...</p></option>
                                <option value="5">Sangat Penting (Bobot 5)</option>
                                <option value="4">Penting (Bobot 4)</option>
                                <option value="3">Cukup Penting (Bobot 3)</option>
                                <option value="2">Kurang Penting (Bobot 2)</option>
                                <option value="1">Sangat Kurang Penting (Bobot 1)</option>
                            </select>
                        </div>
                        <div class="mb-3">
                        <label for="tipe_nilai" class="form-label">Tipe Nilai</label>
                            <select name="tipe_nilai" class="form-select">
                                <option selected><p class="">Pilih...</p></option>
                                <option value="Opsi1">5 Predikat Penilaian</option>
                                <option value="Opsi2">4 Predikat Penilaian</option>
                                <option value="Opsi3">3 Predikat Penilaian</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="sifat" class="form-label">Sifat</label>
                            <select name="sifat" class="form-select">
                                <option selected><p class="">Pilih...</p></option>
                                <option value="benefit">Keuntungan (Benefit)</option>
                                <option value="cost">Kerugian (Cost)</option>
                            </select>
                        </div>
                        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_POST['simpan'])) {
    $s = mysqli_query($k21, "INSERT INTO kriteria (id_kriteria, nama_kriteria, bobot, tipe_nilai, sifat) VALUES ('$_POST[id_kriteria]', '$_POST[nama_kriteria]', '$_POST[bobot]', '$_POST[tipe_nilai]', '$_POST[sifat]')");

    if ($s) {
        echo "<script>alert('Disimpan'); window.open('index.php?a=kriteria&k=kriteria', '_self');</script>";
    }
}

?>
