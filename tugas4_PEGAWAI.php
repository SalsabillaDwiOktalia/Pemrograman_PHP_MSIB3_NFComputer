<?php
class Pegawai{
    //memberi variable
    protected $nip;
    public $nama;
    public $jabatan;
    private $agama;
    private $status;
    //variable constanta dan static in class
    static $jml = 0;
    const PEGAWAI = 'Struktur Gaji Pegawai';

    //member-member kosntruktor
    public function __construct($nip, $nama, $jabatan, $agama, $status){
        $this->nip = $nip;
        $this->nama = $nama;
        $this->jabatan = $jabatan;
        $this->agama = $agama;
        $this->status = $status;
        self::$jml++; //akses variable static maupun constanta
    }
    //member-member method
    public function gajiPokok($jabatan){
        $this->jabatan = $jabatan;
        switch ($jabatan) {
            case 'Manager': $gajipokok = 15000000; break;
            case 'Asisten Manager': $gajipokok = 10000000; break;
            case 'Kepala Bagian': $gajipokok = 7000000; break;
            case 'Staff': $gajipokok = 4000000; break;
            default: $gajipokok = '';
        }
        return $gajipokok;
    }
    public function tunjanganJabatan($jabatan){
        $tunjanganjabatan = 0.2 * $this->gajiPokok($this->jabatan);
        return $tunjanganjabatan;
    }
    public function tunjanganKeluarga($status){
        $this->status = $status;
        $tunjangankeluarga = ($status == 'Menikah') ? 0.1 * $this->gajiPokok($this->jabatan) :0;
        return $tunjangankeluarga;
    }
    public function gajiKotor($jabatan, $status){
        $gajikotor = $this->gajiPokok($this->jabatan) + $this->tunjanganJabatan($jabatan) + $this->tunjanganKeluarga($this->status);
        return $gajikotor;
    }
    public function zakatProfesi($jabatan, $agama, $status){
        $this->agama = $agama;
        $zakatprofesi = ($agama == 'Islam' && $this->gajiKotor($jabatan, $status) >= 6000000) ? 0.025 * $this->gajiPokok($this->jabatan) :0;
        return $zakatprofesi;
    }
    public function gajiBersih($jabatan, $agama, $status){
        $gajibersih = $this->gajiKotor($jabatan, $status) - $this->zakatProfesi($jabatan, $agama, $status);
        return $gajibersih;
    }
    public function mencetak(){
        echo '<b><u>'.self::PEGAWAI.'</u></b>';
        echo '<br/>NIP: '.$this->nip;
        echo '<br/>Nama Pegawai: '.$this->nama;
        echo '<br/>Jabatan: '.$this->jabatan;
        echo '<br/>Agama: '.$this->agama;
        echo '<br/>Status: '.$this->status;
        echo '<br/>Gaji Pokok: Rp '.number_format($this->gajiPokok($this->jabatan), 0, ',', '.');
        echo '<br/>Tunjangan Jabatan: Rp '.number_format($this->tunjanganJabatan($this->jabatan), 0, ',', '.');
        echo '<br/>Tunjangan Keluarga: Rp '.number_format($this->tunjanganKeluarga($this->status), 0, ',', '.');
        echo '<br/>Zakat Profesi: Rp '.number_format($this->zakatProfesi($this->jabatan, $this->agama, $this->status), 0, ',', '.');
        echo '<br/>Gaji Bersih: Rp '.number_format($this->gajiBersih($this->jabatan, $this->agama, $this->status), 0, ',', '.');
        echo '<hr/>';
    }
}
?>