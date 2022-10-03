<?php
require_once 'Bentuk2D.php';
class Segitiga extends Bentuk2D{
    //member1 variable
    public $alas = 12;
    public $tinggi = 8;
    //method
    public function namaBidang(){
        echo 'Segitiga Siku-Siku';
    }
    public function sisiMiring(){
        $sisiMiring = sqrt(($this->alas * $this->alas) + ($this->tinggi * $this->tinggi));
        return $sisiMiring;
    }
    public function luasBidang(){
        $luas = 0.5 * $this->alas * $this->tinggi;
        return $luas;
    }
    public function kelilingBidang(){
        $keliling = $this->alas + $this->tinggi + $this->sisiMiring();
        return $keliling;
    }
    public function keterangan(){
        echo 'Alas: '.$this->alas;
        echo '<br/>Tinggi: '.$this->tinggi;
        echo '<br/>Sisi Miring: '.$this->sisiMiring();
    }
}