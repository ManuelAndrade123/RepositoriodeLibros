<?php
session_start();
include '../library/configServer.php';
include '../library/consulSQL.php';
$CDI=ejecutarSQL::consultar("SELECT * FROM institucion");
$CDP=ejecutarSQL::consultar("SELECT * FROM proveedor");
$CDC=ejecutarSQL::consultar("SELECT * FROM categoria");
if(mysql_num_rows($CDI)>=1 && mysql_num_rows($CDP)>=1 && mysql_num_rows($CDC)>=1){
    echo 'Avaliable';
}else{
    echo 'NotAvaliable';
}
mysql_free_result($CDI);
mysql_free_result($CDP);
mysql_free_result($CDC);