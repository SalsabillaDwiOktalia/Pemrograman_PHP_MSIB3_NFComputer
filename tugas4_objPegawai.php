<?php
require 'tugas4_PEGAWAI.php';
//ciptakan object
$saleh = new Pegawai('1187112','M. Saleh','Asisten Manager','Islam','Menikah');
$sinta = new Pegawai('1187872','Queen Sinta','Manager','Katholik','Belum Menikah');
$salsa = new Pegawai('1187872','Salsabill Dwi','Kepala Bagian','Islam','Belum Menikah');
$aisyah = new Pegawai('1187431','Aisyah Aprianty','Staff','Hindu','Menikah');
$amena = new Pegawai('1187431','Ammena lovest','Kepala Bagian','Islam','Menikah');
//use member class

echo '<h3 align="center">'.Pegawai::PEGAWAI.'</h3>';
$saleh->mencetak();
$sinta->mencetak();
$salsa->mencetak();
$aisyah->mencetak();
$amena->mencetak();
echo 'Jumlah Pegawai: '.Pegawai::$jml;
?>