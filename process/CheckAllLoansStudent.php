<?php
session_start();
include '../library/configServer.php';
include '../library/consulSQL.php';
$selAllLS=ejecutarSQL::consultar("SELECT * FROM prestamoestudiante");
if(mysql_num_rows($selAllLS)>=1){
    echo 'Avaliable';
}else{
    echo 'NotAvaliable';
}
mysql_free_result($selAllLS);