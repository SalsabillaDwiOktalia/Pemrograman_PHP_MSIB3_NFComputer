<?php
require_once 'Bentuk2D.php';
class Lingkaran extends Bentuk2D{
    //member1 variable
    public $jarijari = 7;
    //method
    public function namaBidang(){
        echo 'Lingkaran';
    }
    public function luasBidang(){
        $luas = 3.14 * $this->jarijari * $this->jarijari;
        return $luas;
    }
    public function kelilingBidang(){
        $keliling = 2 * 3.14 * $this->jarijari;
        return $keliling;
    }
    public function keterangan(){
        echo 'Jari-Jari: '.$this->jarijari;
    }
}