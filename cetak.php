<?php
@session_start();
include("konfig/koneksi.php");
/*
 echo "<i>cek sessionn dplus</i>";    
echo "<pre>";    
print_r($_SESSION['dplus']);    
echo "</pre>";  
echo "<i>cek sessionn dmin</i>";    
echo "<pre>";    
print_r($_SESSION['dmin']);    
echo "</pre>";  
*/
?>


<title>Laporan Data</title>

<body onLoad="javascript:window:print()">
    <?php include "konfig/koneksi.php"; ?>
    <style type="text/css"></style>

    <div style="width:80%;">

        <h2 align="center">Laporan Hasil Perhitungan <br>
            SPK TOPSIS</h2>

        <hr style="border-top:2px solid #333;" width="80%">
    </div>

    <table id='theList' border=1 width='80%' align="center">
        <thead>
            <tr>
                <th width="3%" bgcolor="#CCCCCC">Nomor</th>
                <th width="10%" bgcolor="#CCCCCC">Nama</th>
                <th width="10%" bgcolor="#CCCCCC">Jenis Kelamin</th>
                <th width="10%" bgcolor="#CCCCCC">Kelas</th>
                <th width="12%" bgcolor="#CCCCCC">Nilai preferensi (V<sub>i)</sub></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            $a = mysqli_query($k21, "select * from alternatif");
            echo "<tr>";
            $sortir = array();
            while ($da = mysqli_fetch_assoc($a)) {
                $idalt = $da['id_alternatif'];

                //ambil nilai
                $n = mysqli_query($k21, "select * from nilai_matrik where id_alternatif='$idalt' order by id_matrik ASC");

                $c = 0;
                $ymax = array();
                while ($dn = mysqli_fetch_assoc($n)) {
                    $idk = $dn['id_kriteria'];

                    //nilai kuadrat
                    $nilai_kuadrat = 0;
                    $k = mysqli_query($k21, "select * from nilai_matrik where id_kriteria='$idk' order by id_matrik ASC ");
                    while ($dkuadrat = mysqli_fetch_assoc($k)) {
                        $nilai_kuadrat = $nilai_kuadrat + ($dkuadrat['nilai'] * $dkuadrat['nilai']);
                    }

                    //hitung jml alternatif
                    $jml_alternatif = mysqli_query($k21, "select * from alternatif");
                    $jml_a = mysqli_num_rows($jml_alternatif);
                    //nilai bobot kriteria (rata")
                    $bobot = 0;
                    $tnilai = 0;

                    $k2 = mysqli_query($k21, "select * from nilai_matrik where id_kriteria='$idk' order by id_matrik ASC ");
                    while ($dbobot = mysqli_fetch_assoc($k2)) {
                        $tnilai = $tnilai + $dbobot['nilai'];
                    }
                    $bobot = $tnilai / $jml_a;

                    //nilai bobot input
                    $b2 = mysqli_query($k21, "select * from kriteria where id_kriteria='$idk'");
                    $nbot = mysqli_fetch_assoc($b2);
                    $bot = $nbot['bobot'];

                    $v = round(($dn['nilai'] / sqrt($nilai_kuadrat)) * $bot);

                    $ymax[$c] = $v;
                    $c;
                    $mak = max($ymax);
                    $min = min($ymax);
                }

                $i++;
            }

            foreach (@$_SESSION['dplus'] as $key => $dxmin) {
                #ubah ke nol hasil akhir
                $nilaid = 0;
                $nilaiPre = 0;
                $nilai = 0;

                $jarakm = $_SESSION['dmin'][$key];
                $id_alt = $_SESSION['id_alt'][$key];

                // nama alternatif, jenis kelamin, dan kelas
                $query_alternatif = mysqli_query($k21, "SELECT * FROM alternatif WHERE id_alternatif='$id_alt'");
                $data_alternatif = mysqli_fetch_assoc($query_alternatif);
                $nm = $data_alternatif['nm_alternatif'];
                $jk = $data_alternatif['jenis_kelamin']; // Mendapatkan jenis kelamin dari tabel alternatif
                $kls = $data_alternatif['kelas']; // Mendapatkan kelas dari tabel alternatif

                // hitung nilai preferensi
                $nilaiPre = $dxmin + $jarakm;
                $nilaid = $jarakm / $nilaiPre;
                $nilai = round($nilaid, 4);

                // simpan ke tabel nilai preferensi
                $sql2 = mysqli_query($k21, "INSERT INTO nilai_preferensi (nm_alternatif, jenis_kelamin, kelas, nilai) VALUES ('$nm', '$jk', '$kls', '$nilai')");

                // echo "insert into nilai_preferensi (nm_alternatif,nilai) values('$nm','$nilai')";
            }

            // ambil data sesuai dengan nilai tertinggi
            $i = 1;
            $sql3 = mysqli_query($k21, "SELECT * FROM nilai_preferensi ORDER BY nilai DESC");
            while ($data3 = mysqli_fetch_assoc($sql3)) {
                echo "<tr>
        <td>" . $i . "</td>
        <td>$data3[nm_alternatif]</td>
        <td>$data3[jenis_kelamin]</td>
        <td>$data3[kelas]</td>
        <td>$data3[nilai]</td>
        </tr>";

                $i++;
            }

            // kosongkan tabel nilai preferensi
            $del = mysqli_query($k21, "DELETE FROM nilai_preferensi");

            echo "</tr>";
            ?>

        </tbody>
    </table>

    <br>
    <br>
    <br>
    <table border="0" width='80%' align="center">
        <tr>
            <td colspan="3" align="right">Tasikmalaya, <?php echo date('d-M-Y'); ?></td>
        </tr>
        <tr>
            <td colspan="3" align="right">-- Jabatan --</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="3" align="right">-- Nama & TTD --</td>
        </tr>
    </table>

    <br>
    <br>
    <br>
    <br>
    <br>
</body>
