<?php
include("konfig/koneksi.php");

// Ambil data alternatif yang akan diubah
$s = mysqli_query($k21, "SELECT * FROM alternatif WHERE id_alternatif='$_GET[id]'");
$d = mysqli_fetch_assoc($s);

// Proses pembaruan data jika formulir disubmit
if (isset($_POST['ubah'])) {
    // Ambil nilai dari formulir dan sanitasi data
    $id_alternatif = mysqli_real_escape_string($k21, $_POST['id_alternatif']);
    $nama_alternatif = mysqli_real_escape_string($k21, $_POST['nm_alternatif']);
    $jenis_kelamin = mysqli_real_escape_string($k21, $_POST['jeniskelamin']);
    $kelas = mysqli_real_escape_string($k21, $_POST['kelas']);

    // Lakukan pembaruan data dalam tabel 'alternatif'
    $s = mysqli_query($k21, "UPDATE alternatif SET nm_alternatif='$nama_alternatif', jenis_kelamin='$jenis_kelamin', kelas='$kelas' WHERE id_alternatif='$id_alternatif'");

    if ($s) {
        echo "<script>alert('Data berhasil diubah'); window.open('index.php?a=alternatif&k=alternatif','_self');</script>";
    } else {
        echo "<script>alert('Gagal mengubah data');</script>";
    }
}
?>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Ubah Alternatif</h3>
    </div>
    <div class="box-body">
        <form action="" method="POST">
            <div class="mb-3">
                <label for="id_alternatif" class="form-label">ID Alternatif</label>
                <input type="text" name="id_alternatif" class="form-control" value="<?php echo $d['id_alternatif']; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="nama_alternatif" class="form-label">Nama Alternatif</label>
                <input type="text" name="nm_alternatif" class="form-control" placeholder="Nama Alternatif" value="<?php echo $d['nm_alternatif']; ?>">
            </div>
            <div class="mb-3">
                <label for="jeniskelamin" class="form-label">Jenis Kelamin</label>
                <select name="jeniskelamin" class="form-control">
                    <option value="Pria" <?php if ($d['jenis_kelamin'] == 'Pria') echo 'selected'; ?>>Pria</option>
                    <option value="Wanita" <?php if ($d['jenis_kelamin'] == 'Wanita') echo 'selected'; ?>>Wanita</option>
                </select>

            </div>
            <div class="mb-3">
                <label for="kelas" class="form-label">Kelas</label>
                <input type="text" name="kelas" class="form-control" placeholder="Kelas" value="<?php echo $d['kelas']; ?>">
            </div>
            <button type="submit" name="ubah" class="btn btn-primary">Ubah</button>
        </form>
    </div>
</div>