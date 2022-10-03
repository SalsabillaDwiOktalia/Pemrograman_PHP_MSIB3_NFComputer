<?php
require_once 'Bentuk2D.php';
class PersegiPanjang extends Bentuk2D{
    //member1 variable
    public $panjang = 8;
    public $lebar = 10;
    //method
    public function namaBidang(){
        echo 'Persegi Panjang';
    }
    public function luasBidang(){
        $luas = $this->panjang * $this->lebar;
        return $luas;
    }
    public function kelilingBidang(){
        $keliling = 2 * ($this->panjang + $this->lebar);
        return $keliling;
    }
    public function keterangan(){
        echo 'Panjang: '.$this->panjang;
        echo '<br/>Lebar: '.$this->lebar;
    }
}