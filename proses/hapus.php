<?php
require '../koneksi.php';
require 'crud.php';
if ($_SERVER['REQUEST_METHOD']=='GET') {
    $id=@$_GET['id'];
    $op=@$_GET['op'];
}else if ($_SERVER['REQUEST_METHOD']=='POST'){
    $id=@$_POST['id'];
    $op=@$_POST['op'];
}
$crud=new crud();
switch ($op){
    case 'alternatif':
        $query="DELETE FROM alternatif WHERE id_alternatif='$id'";
        $crud->delete($query,$conn);
        break;
    case 'kriteria':
        $query="DELETE FROM kriteria WHERE id_kriteria='$id'";
        $crud->delete($query,$conn);
        break;
    case 'subkriteria':
        $query="DELETE FROM subkriteria WHERE id_subkriteria='$id'";
        $crud->delete($query,$conn);
        break;
    case 'bobot':
        $query="DELETE FROM bobot WHERE id_bobot='$id'";
        $crud->delete($query,$conn);
        break;
    case 'nilai':
        $query="DELETE FROM nilai_supplier WHERE id_supplier='$id'";
        $crud->delete($query,$conn);
        break;
    case 'admin':
        $query="DELETE FROM user WHERE Id_admin='$id'";
        $crud->delete($query,$conn);
        break;
}