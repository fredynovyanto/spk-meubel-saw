<?php
require '../koneksi.php';
require 'crud.php';
$crud=new crud($conn);

if ($_SERVER['REQUEST_METHOD']=='GET') {
    $id=@$_GET['id'];
    $op=@$_GET['op'];
}else if ($_SERVER['REQUEST_METHOD']=='POST'){
    $id=@$_POST['id'];
    $op=@$_POST['op'];
}
// admin
$nama=@$_POST['nama'];
$username=@$_POST['username'];
$password=@$_POST['password'];
// kriteria
$kode_kriteria=@$_POST['kode_kriteria'];
$nama_kriteria=@$_POST['nama_kriteria'];
$bobot=@$_POST['bobot'];
$tipe=@$_POST['tipe'];
// sub kriteria
$id_kriteria=@$_POST['id_kriteria'];
$nilai=@$_POST['nilai'];
$keterangan=@$_POST['subkriteria'];
// alternatif
$alternatif=@$_POST['alternatif'];
// bobot
$alternatif=@$_POST['alternatif'];
$sifat_fisik=@$_POST['sifat_fisik'];
$ketahanan=@$_POST['ketahanan'];
$sifat_mekanik=@$_POST['sifat_mekanik'];
$kelas_kayu=@$_POST['kelas_kayu'];
$tekstur=@$_POST['tekstur'];
switch ($op){
    case 'alternatif'://tambah data alternatif
        $query="INSERT INTO alternatif (nama_alternatif) VALUES ('$alternatif')";
        $crud->addData($query,$conn,'../alternatif.php');
        break;
    case 'kriteria'://tambah data kriteria
        $query="INSERT INTO kriteria (kode_kriteria, nama_kriteria, bobot, tipe) VALUES ('$kode_kriteria', '$nama_kriteria', '$bobot', '$tipe')";
        $crud->addData($query,$conn,'../kriteria.php');
        break;
    case 'subkriteria'://tambah data sub kriteria
        $query="INSERT INTO subkriteria (id_kriteria, nilai, keterangan) VALUES ('$id_kriteria', '$nilai', '$keterangan')";
        $crud->addData($query,$conn,'../subkriteria.php');
        break;
    case 'bobot'://tambah data bobot
        $query="INSERT INTO bobot (alternatif, sifat_fisik, ketahanan, sifat_mekanik, kelas_kayu, tekstur) VALUES ('$alternatif', '$sifat_fisik', '$ketahanan', '$sifat_mekanik', '$kelas_kayu', '$tekstur')";
        $crud->addData($query,$conn,'../bobot.php');
        break;
    case 'nilai'://tambah data nilai
        $cek="SELECT id_supplier FROM nilai_supplier WHERE id_supplier='$supplier'";
        $query=null;
        for ($i=0;$i<count($nilai);$i++){
            $query.="INSERT INTO nilai_supplier (id_supplier,id_jenisbarang,id_kriteria,id_nilaikriteria) VALUES ('$supplier','$barang','$kriteria[$i]','$nilai[$i]');";
        }
        $crud->multiAddData($cek,$query,$conn);
    break;
    case 'admin'://tambah data admin
        $query="INSERT INTO user (nama, username, password) VALUES ('$nama', '$username', '$password')";
        $crud->addData($query,$conn,'./?page=admin');
    break;
}