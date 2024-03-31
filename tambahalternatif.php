<?php
include("konfig/koneksi.php");

$query = "SELECT max(id_alternatif) as idMaks FROM alternatif";
$hasil = mysqli_query($k21, $query);
$data  = mysqli_fetch_array($hasil);
$id_alternatif = $data['idMaks'];

// Mengatur 6 karakter sebagai jumlah karakter yang tetap
// Mengatur 3 karakter untuk jumlah karakter yang berubah-ubah
$noUrut = (int) substr($id_alternatif, 2, 3);
$noUrut++;

// Menjadikan 201353 sebagai 6 karakter yang tetap
$char = "al";
// %03s untuk mengatur 3 karakter di belakang 201353
$id_baru = $char . sprintf("%03s", $noUrut);
?>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Tambah Alternatif</h3>
    </div>
    <div class="box-body">
        <form action="" method="POST">
            <div class="mb-3">
                <label for="id_alternatif" class="form-label">ID Alternatif</label>
                <input type="text" name="id_alternatif" class="form-control" value="<?php echo $id_baru; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="nama_alternatif" class="form-label">Nama Alternatif</label>
                <input type="text" name="nama_alternatif" class="form-control" placeholder="Nama Alternatif">
            </div>
            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control">
                    <option value="Pria">Pria</option>
                    <option value="Wanita">Wanita</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="kelas" class="form-label">Kelas</label>
                <input type="text" name="kelas" class="form-control" placeholder="Kelas">
            </div>
            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

<?php
if (isset($_POST['simpan'])) {
    $s = mysqli_query($k21, "INSERT INTO alternatif (id_alternatif, nm_alternatif, jenis_kelamin, kelas) VALUES ('$_POST[id_alternatif]', '$_POST[nama_alternatif]','$_POST[jenis_kelamin]','$_POST[kelas]')");

    if ($s) {
        echo "<script>alert('Disimpan'); window.open('index.php?a=alternatif&k=alternatif', '_self');</script>";
    }
}
?>