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
$admin=@$_POST['admin'];
$namaadmin=@$_POST['nama'];
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
switch ($op){
    case 'alternatif':
        $query = "UPDATE alternatif SET nama_alternatif='$alternatif' WHERE id_alternatif='$id'";
        $crud->update($query,$conn,'../alternatif.php');
        break;
    case 'kriteria':
        $query = "UPDATE kriteria SET kode_kriteria = '$kode_kriteria', nama_kriteria = '$nama_kriteria', bobot = '$bobot', tipe = '$tipe' WHERE id_kriteria='$id'";
        $crud->update($query,$conn,'../kriteria.php');
        break;
    case 'subkriteria':
        $query="UPDATE subkriteria SET id_kriteria = '$id_kriteria', nilai = '$nilai', keterangan = '$keterangan' WHERE id_subkriteria='$id'";
        $crud->update($query,$conn,'../subkriteria.php');
        break;
}