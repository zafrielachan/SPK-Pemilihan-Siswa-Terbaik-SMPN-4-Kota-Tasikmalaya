<?php
include("konfig/koneksi.php");
$s = mysqli_query($k21, "select * from kriteria");
$h = mysqli_num_rows($s);
?>

<div class="box-header">
    <h3 class="box-title">Matriks Ideal Positif (A<sup>+</sup>)</h3>
</div>

<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th colspan="<?php echo $h; ?>"><center>Kriteria</center></th>
            </tr>
            <tr>
                <?php
                $hk = mysqli_query($k21, "select nama_kriteria from kriteria order by id_kriteria asc;");
                while ($dhk = mysqli_fetch_assoc($hk)) {
                    echo "<th>$dhk[nama_kriteria]</th>";
                }
                ?>
            </tr>
            <tr>
                <?php
                for ($n = 1; $n <= $h; $n++) {
                    echo "<th>y<sub>$n</sub><sup>+</sup></th>";
                }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            $a = mysqli_query($k21, "select * from kriteria order by id_kriteria asc;");
            echo "<tr>";
            while ($da = mysqli_fetch_assoc($a)) {
                $idalt = $da['id_kriteria'];
                $n = mysqli_query($k21, "select * from nilai_matrik where id_kriteria='$idalt'  order by id_matrik ASC");
                $c = 0;
                $ymax = array();
                while ($dn = mysqli_fetch_assoc($n)) {
                    $idk = $dn['id_kriteria'];
                    $nilai_kuadrat = 0;
                    $k = mysqli_query($k21, "select * from nilai_matrik where id_kriteria='$idk'  order by id_matrik ASC ");
                    while ($dkuadrat = mysqli_fetch_assoc($k)) {
                        $nilai_kuadrat = $nilai_kuadrat + ($dkuadrat['nilai'] * $dkuadrat['nilai']);
                    }
                    $jml_alternatif = mysqli_query($k21, "select * from alternatif");
                    $jml_a = mysqli_num_rows($jml_alternatif);
                    $bobot = 0;
                    $tnilai = 0;
                    $k2 = mysqli_query($k21, "select * from nilai_matrik where id_kriteria='$idk'  order by id_matrik ASC ");
                    while ($dbobot = mysqli_fetch_assoc($k2)) {
                        $tnilai = $tnilai + $dbobot['nilai'];
                    }
                    $bobot = $tnilai / $jml_a;
                    $b2 = mysqli_query($k21, "select * from kriteria where id_kriteria='$idk'");
                    $nbot = mysqli_fetch_assoc($b2);
                    $bot = $nbot['bobot'];
                    $v = round(($dn['nilai'] / sqrt($nilai_kuadrat)) * $bot, 4);
                    $ymax[$c] = $v;
                    $c++;
                }
                if ($nbot['sifat'] == 'benefit') {
                    echo "<td>" . max($ymax) . "</td>";
                } else {
                    echo "<td>" . min($ymax) . "</td>";
                }
            }
            echo "</tr>";
            ?>
        </tbody>
    </table>
</div>

<!-- tabel min -->

<div class="box-header">
    <h3 class="box-title">Matriks Ideal Negatif (A<sup>-</sup>)</h3>
</div>

<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th colspan="<?php echo $h; ?>"><center>Kriteria</center></th>
            </tr>
            <tr>
                <?php
                $hk = mysqli_query($k21, "select nama_kriteria from kriteria order by id_kriteria asc;");
                while ($dhk = mysqli_fetch_assoc($hk)) {
                    echo "<th>$dhk[nama_kriteria]</th>";
                }
                ?>
            </tr>
            <tr>
                <?php
                for ($n = 1; $n <= $h; $n++) {
                    echo "<th>y<sub>$n</sub><sup>-</sup></th>";
                }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 0;
            $a = mysqli_query($k21, "select * from kriteria order by id_kriteria asc;");
            echo "<tr>";
            while ($da = mysqli_fetch_assoc($a)) {
                $idalt = $da['id_kriteria'];
                $n = mysqli_query($k21, "select * from nilai_matrik where id_kriteria='$idalt'  order by id_matrik ASC");
                $c = 0;
                $ymax = array();
                while ($dn = mysqli_fetch_assoc($n)) {
                    $idk = $dn['id_kriteria'];
                    $nilai_kuadrat = 0;
                    $k = mysqli_query($k21, "select * from nilai_matrik where id_kriteria='$idk' order by id_matrik ASC ");
                    while ($dkuadrat = mysqli_fetch_assoc($k)) {
                        $nilai_kuadrat = $nilai_kuadrat + ($dkuadrat['nilai'] * $dkuadrat['nilai']);
                    }
                    $jml_alternatif = mysqli_query($k21, "select * from alternatif");
                    $jml_a = mysqli_num_rows($jml_alternatif);
                    $bobot = 0;
                    $tnilai = 0;
                    $k2 = mysqli_query($k21, "select * from nilai_matrik where id_kriteria='$idk' order by id_matrik ASC ");
                    while ($dbobot = mysqli_fetch_assoc($k2)) {
                        $tnilai = $tnilai + $dbobot['nilai'];
                    }
                    $bobot = $tnilai / $jml_a;
                    $b2 = mysqli_query($k21, "select * from kriteria where id_kriteria='$idk'");
                    $nbot = mysqli_fetch_assoc($b2);
                    $bot = $nbot['bobot'];
                    $v = round(($dn['nilai'] / sqrt($nilai_kuadrat)) * $bot, 4);
                    $ymax[$c] = $v;
                    $c++;
                }
                if ($nbot['sifat'] == 'cost') {
                    echo "<td>" . max($ymax) . "</td>";
                } else {
                    echo "<td>" . min($ymax) . "</td>";
                }
            }
            echo "</tr>";
            ?>
        </tbody>
    </table>
</div>
