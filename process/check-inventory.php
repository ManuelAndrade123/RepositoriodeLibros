<?php
session_start();
include '../library/configServer.php';
include '../library/consulSQL.php';
$CDB=ejecutarSQL::consultar("SELECT * FROM libro");
if(mysql_num_rows($CDB)>=1){
    echo 'Avaliable';
}else{
    echo 'NotAvaliable';
}
mysql_free_result($CDB);