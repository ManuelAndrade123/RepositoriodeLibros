<?php
session_start();
include '../library/configServer.php';
include '../library/consulSQL.php';
$UserName=consultasSQL::CleanStringText($_GET['user']);
$checkBDUser= ejecutarSQL::consultar("SELECT * FROM administrador WHERE NombreUsuario='".$UserName."'");
if(mysql_num_rows($checkBDUser)>=1){
    echo '<p class="control-label" style="margin-top:15px; color:red; font-size: 16px; "><i class="zmdi zmdi-alert-triangle"></i> &nbsp; Este nombre de usuario ya está siendo utilizado, por favor elige otro</p>';
}else{
    
}