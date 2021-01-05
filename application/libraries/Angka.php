<?php 

class Angka{

	//fungsi untuk memperoleh angka numeric
    function get_numeric($angka){
        $angka= str_replace(".", "", $angka);
        $angka= str_replace(",", ".", $angka);
        $angka= str_replace("%", "", $angka);
        return $angka;
    }

    //fungsi untuk menampilkan angka dalam rupiah
    function rupiah($angka){
        $hasil_rupiah = number_format($angka,2,',','.');
        return $hasil_rupiah;
    }
}