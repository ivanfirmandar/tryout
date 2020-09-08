<?php
class Halaman
{
    public $jumlahHalaman;
    public $akhirHalaman;
    public $nomorSoal;
    public function __construct($data, $data2, $data3)
    {
        $this->nomorSoal = "Soal " . $data2[$data3];
        $this->jumlahHalaman = count($data);
    }
    public function akhirHalaman($nomor)
    {
        if ($nomor == $this->jumlahHalaman) {
            $akhirHalaman = 1;
        } else {
            $akhirHalaman = 0;
        }
        return $akhirHalaman;
    }
}
