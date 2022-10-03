<?php
require_once 'Lingkaran.php';
require_once 'PersegiPanjang.php';
require_once 'Segitiga.php';

$ligkaran = new Lingkaran();
$persegiPanjang = new PersegiPanjang();
$segitiga = new Segitiga();

$kumpulanBidang = [$ligkaran, $persegiPanjang, $segitiga];

$ar_judul = ['No','Nama Bidang','Keterangan','Luas Bidang','Keliling Bidang'];
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kumpulan Bangun Datar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>

  <body>
<h3 align="center">DAFTAR BANGUN DATAR</h3>
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
            foreach($kumpulanBidang as $bidang){
            
            ?>
            <tr>
                <th class="text-center"><?= $no ,'.' ?></th>
                <th><?= $bidang->namaBidang() ?></th>
                <th><?= $bidang->keterangan() ?></th>
                <th><?= $bidang->luasBidang() ?></th>
                <th><?= $bidang->kelilingBidang() ?></th>
            </tr>
            <?php $no++; } 
            ?>
    </tbody>
    </table>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>