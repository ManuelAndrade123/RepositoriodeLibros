<?php
session_start();
include '../library/configServer.php';
include '../library/consulSQL.php';
$CDI=ejecutarSQL::consultar("SELECT * FROM institucion");
if(mysql_num_rows($CDI)>=1){
    echo 'Avaliable';
}else{
    echo 'NotAvaliable';
}
mysql_free_result($CDI);

