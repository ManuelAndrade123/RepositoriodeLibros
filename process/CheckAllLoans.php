<?php
session_start();
include '../library/configServer.php';
include '../library/consulSQL.php';
$selectInstitution=ejecutarSQL::consultar("SELECT * FROM institucion");
$dataInstitution=mysql_fetch_array($selectInstitution);
$selAllL=ejecutarSQL::consultar("SELECT * FROM prestamo WHERE Estado='Entregado'");
$Total=0;
while($dat=mysql_fetch_array($selAllL)){
    $SYear=date("Y",strtotime($dat['FechaSalida']));
    if($dataInstitution['Year']==$SYear){
        $Total++;
    }
}
if($Total>=1){
    echo 'Avaliable';
}else{
    echo 'NotAvaliable';
}
mysql_free_result($selAllL);