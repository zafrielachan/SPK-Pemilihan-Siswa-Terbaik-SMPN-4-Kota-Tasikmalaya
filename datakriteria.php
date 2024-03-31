<div class="box-header">
    <h3 class="box-title">Data Kriteria</h3>
</div>
<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Id Kriteria</th>
                <th>Nama Kriteria</th>
                <th>Bobot</th>
                <th>Tipe Penilaian</th>
                <th>Sifat Kriteria</th>
                <th>Pilihan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include("konfig/koneksi.php");

            $s = mysqli_query($k21, "select * from kriteria order by id_kriteria ASC");
            while ($d = mysqli_fetch_assoc($s)) {
                ?>
                <tr>
                    <td><?php echo $d['id_kriteria']; ?></td>
                    <td><?php echo $d['nama_kriteria']; ?></td>
                    <td>
                    <?php 
                        // Mengubah nilai tipe menjadi teks yang sesuai
                        switch ($d['bobot']) {
                            case '5':
                                echo '5';
                                break;
                            case '4':
                                echo '4';
                                break;
                            case '3':
                                echo '3';
                                break;
                            case '2':
                                echo '2';
                                break;
                            case '1':
                                echo '1';
                                break;
                            default:
                                echo $d['bobot']; // Jika tidak cocok, tetap tampilkan nilai asli
                        }
                        ?>
                </td>
                    <td>
                        <?php 
                        // Mengubah nilai tipe menjadi teks yang sesuai
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
                        }
                        ?>
                    </td>
                    <td><?php echo $d['sifat']; ?></td>
                    <td>
                        <a href="?a=kriteria&k=ubahk&id=<?php echo $d['id_kriteria']; ?>" class="btn btn-warning">Ubah</a>
                        <a href="hapus.php?id=<?php echo $d['id_kriteria']; ?>" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
