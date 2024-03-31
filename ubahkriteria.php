<?php

include("konfig/koneksi.php");


//$hasil = mysqli_query($k21,"select * from kriteria where id_kriteria='$_GET[id]'");
//$data  = mysqli_fetch_array($hasil);
//$nim = $data['idMaks'];

//mengatur 6 karakter sebagai jumalh karakter yang tetap
//mengatur 3 karakter untuk jumlah karakter yang berubah-ubah
//$noUrut = (int) substr($nim, 2, 3);
//$noUrut++;

//menjadikan 201353 sebagai 6 karakter yang tetap
//$char = "kr";
//%03s untuk mengatur 3 karakter di belakang 201353
//$IDbaru = $char . sprintf("%03s", $noUrut);

//ambil data \
$s = mysqli_query($k21, "select * from kriteria where id_kriteria='$_GET[id]'");
$d = mysqli_fetch_assoc($s);


?>
<div class="box-header">
	<h3 class="box-title">Ubah Kriteria</h3>
</div>

<div class="box-body pad">
	<form action="" method="POST">
		<label for="id_kriteria" class="form-label">ID Kriteria</label>
		<input type="text" name="id_kriteria" class="form-control" value="<?php echo $d['id_kriteria']; ?>" readonly>
		<br />
		<label for="nama_kriteria" class="form-label">Nama Kriteria</label>
		<input type="text" name="nama_kriteria" class="form-control" placeholder="Nama Kriteria" value="<?php echo $d['nama_kriteria']; ?>">
		<br />
		<label for="bobot" class="form-label">Bobot</label>
		<select name="bobot" class="form-control">
			<option value="<?php echo $d['bobot']; ?>"><?php // Mengubah nilai tipe menjadi teks yang sesuai
                        switch ($d['bobot']) {
                            case '5':
                                echo 'Sangat Penting (Bobot 5)';
                                break;
                            case '4':
                                echo 'Penting (Bobot 4)';
                                break;
                            case '3':
                                echo 'Cukup Penting (Bobot 3)';
                                break;
							case '2':
								echo 'Kurang Penting (Bobot 2)';
								break;
							case '1':
								echo 'Sangat Kurang Penting (Bobot 1)';
								break;
                            default:
                                echo $d['bobot']; // Jika tidak cocok, tetap tampilkan nilai asli
                        } ?></option>
			<option value="5">Sangat Penting (Bobot 5)</option>
            <option value="4">Penting (Bobot 4)</option>
            <option value="3">Cukup Penting (Bobot 3)</option>
            <option value="2">Kurang Penting (Bobot 2)</option>
            <option value="1">Sangat Kurang Penting (Bobot 1)</option>
		</select>
		<br />
		<label for="tipe_nilai" class="form-label">Tipe Nilai</label>
		<select name="tipe_nilai" class="form-control">
			<option value="<?php echo $d['tipe_nilai']; ?>"><?php // Mengubah nilai tipe menjadi teks yang sesuai
                        switch ($d['tipe_nilai']) {
                            case 'Opsi1':
                                echo '5 Predikat Penilaian';
                                break;
                            case 'Opsi2':
                                echo '4 Predikat Penilaian';
                                break;
                            case 'Opsi3':
                                echo '3 Predikat Penilaian';
                                break;
                            default:
                                echo $d['tipe_nilai']; // Jika tidak cocok, tetap tampilkan nilai asli
                        } ?></option>
			<option value="Opsi1">5 Predikat Penilaian</option>
            <option value="Opsi2">4 Predikat Penilaian</option>
            <option value="Opsi3">3 Predikat Penilaian</option>
		</select>
		<br />
		<label for="sifat" class="form-label">Sifat</label>
		<select name="sifat" class="form-control">
			<option value="<?php echo $d['sifat']; ?>"><?php // Mengubah nilai tipe menjadi teks yang sesuai
                        switch ($d['sifat']) {
                            case 'benefit':
                                echo 'Keuntungan (Benefit)';
                                break;
                            case 'cost':
                                echo 'Kerugian (Cost)';
                                break;
                            default:
                                echo $d['sifat']; // Jika tidak cocok, tetap tampilkan nilai asli
                        } ?></option>
			<option value="benefit">Keuntungan (Benefit)</option>
            <option value="cost">Kerugian (Cost)</option>
		</select>
		<br />
		<input type="submit" name="ubah" value="Ubah" class="btn btn-primary">
		<br />
	</form>
</div>
<?php
if (isset($_POST['ubah'])) {
	$s = mysqli_query($k21, "update kriteria set nama_kriteria='$_POST[nama_kriteria]', bobot='$_POST[bobot]', tipe_nilai='$_POST[tipe_nilai]', sifat='$_POST[sifat]' where id_kriteria='$_POST[id_kriteria]'");

	if ($s) {
		echo "<script>alert('Diubah'); window.open('index.php?a=kriteria&k=kriteria','_self');</script>";
	}
}

?>