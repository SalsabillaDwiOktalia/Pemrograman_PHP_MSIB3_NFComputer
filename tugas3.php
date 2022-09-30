<?php
//array scalar (1 dimensi)
$m1 = ['nim'=>'19411060','nama'=>'Salsabilla Dwi Oktalia','nilai'=>98];
$m2 = ['nim'=>'19411028','nama'=>'Sephia Tasya Fabilla','nilai'=>88];
$m3 = ['nim'=>'19411027','nama'=>'Viva Tiara','nilai'=>90];
$m4 = ['nim'=>'19411073','nama'=>'Hanzaqi Alfayed','nilai'=>70];
$m5 = ['nim'=>'19411061','nama'=>'Novaldo Andrian','nilai'=>65];
$m6 = ['nim'=>'19411011','nama'=>'Iqbal Sanjaya','nilai'=>45];
$m7 = ['nim'=>'19411062','nama'=>'Lee Jong Suk','nilai'=>70];
$m8 = ['nim'=>'19411031','nama'=>'Muhammad Tohir','nilai'=>35];
$m9 = ['nim'=>'19411026','nama'=>'Nadia Putri','nilai'=>80];
$m10 = ['nim'=>'19411001','nama'=>'Seliya Pirnanda','nilai'=>25];

$ar_judul = ['No','NIM','Nama','Nilai','Keterangan','Grade','Predikat'];

//array assosiative(>1 dimensi)
$mahasiswa = [$m1,$m2,$m3,$m4,$m5,$m6,$m7,$m8,$m9,$m10];

//agregate function in array
$jumlah_mahasiswa = count($mahasiswa);
$jumlah_nilai = array_column($mahasiswa,'nilai');
$total_nilai = array_sum($jumlah_nilai);
$max_nilai = max($jumlah_nilai);
$min_nilai = min($jumlah_nilai);
$ratarata = $total_nilai / $jumlah_mahasiswa;

//keterangan
$ar_ket = [
'Jumlah Mahasiswa'=>$jumlah_mahasiswa,
'Nilai Tertinggi'=>$max_nilai,
'Nilai Terendah'=>$min_nilai,
'Nilai Rata-Rata'=>$ratarata
];
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Nilai Mahasiswa </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>

  <body>
<h3 align="center">DAFTAR NILAI MAHASISWA</h3>
  <table border=3 cellpadding="10" cellspacing="0" width="100%">
    <table class="table table-bordered table-striped">
    <thead>
        <tr align="center" bgcolor="F29191">
            <?php
            foreach($ar_judul as $jdl){
            ?>    
                <th><?= $jdl ?></th>
            <?php } ?>
        </tr>
    </thead>

    <tbody>
            <?php
            $no = 1;
            foreach($mahasiswa as $mhs){
            //keterangan nilai
            $keterangan = ($mhs['nilai'] >= 60) ? "Lulus" : "Gagal";
            //set grade A - E (if multi kondisi)
            // A = 85 - 100, B = 75 - < 85 dst
            if($mhs['nilai'] >= 85 && $mhs['nilai'] <= 100) $grade = 'A';
            else if($mhs['nilai'] >= 75 && $mhs['nilai'] < 85) $grade = 'B';
            else if($mhs['nilai'] >= 60 && $mhs['nilai'] < 75) $grade = 'C';
            else if($mhs['nilai'] >= 45 && $mhs['nilai'] < 60) $grade = 'D';
            else if($mhs['nilai'] >= 0 && $mhs['nilai'] < 45) $grade = 'E';
            else $grade = '';
            //set predikat ( swtich case)
            //A = Sangat Baik, B=Baik, C=Cukup, D=kurang, E=Buruk
            switch($grade){
                case 'A': $predikat = 'Sangat Baik'; break;
                case 'B': $predikat = 'Baik'; break;
                case 'C': $predikat = 'Cukup'; break;
                case 'D': $predikat = 'kurang'; break;
                case 'E': $predikat = 'Buruk'; break;
                default: $predikat = '';
            }
            ?>
            <tr>
                <th class="text-center"><?= $no ,'.' ?></th>
                <th><?= $mhs['nim'] ?></th>
                <th><?= $mhs['nama'] ?></th>
                <th><?= $mhs['nilai'] ?></th>
                <th><?= $keterangan ?></th>
                <th><?= $grade ?></th>
                <th><?= $predikat ?></th>
            </tr>
            <?php $no++; } 
            ?>
    </tbody>

    <tfoot>
        <?php
        foreach($ar_ket as $ketr => $hasil) {
        ?>
        <tr bgcolor="F29191">
            <th colspan = "6"><?= $ketr ?></th>
            <th colspan = "6"><?= $hasil ?></th>
        </tr>
        <?php }
        ?>
    </tfoot>
    </table>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>