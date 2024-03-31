<div class="box">
    <div class="box-header">
        <h3 class="box-title mb-3">Data Alternatif</h3>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id Alternatif</th>
                    <th>Nama Siswa</th>
                    <th>Jenis Kelamin</th>
                    <th>Kelas</th>
                  <th>Pilihan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include("konfig/koneksi.php");

                $s = mysqli_query($k21, "SELECT * FROM alternatif ORDER BY id_alternatif ASC");
                while ($d = mysqli_fetch_assoc($s)) {
                ?>
                    <tr>
                        <td><?php echo $d['id_alternatif']; ?></td>
                        <td><?php echo $d['nm_alternatif']; ?></td>
                        <td><?php echo $d['jenis_kelamin']; ?></td>
                        <td><?php echo $d['kelas']; ?></td>
                        <td>
                            <a href="?a=alternatif&k=ubaha&id=<?php echo $d['id_alternatif']; ?>" class="btn btn-warning">Ubah</a>
                            <a href="hapusalternatif.php?id=<?php echo $d['id_alternatif']; ?>" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
