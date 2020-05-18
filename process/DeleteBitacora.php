<?php
session_start();
include '../library/configServer.php';
include '../library/consulSQL.php';
$AdminCode=consultasSQL::CleanStringText($_POST['AdminCode']);
$adminUserName=consultasSQL::CleanStringText($_POST['adminUserName']);
$adminPassword=md5(consultasSQL::CleanStringText($_POST['adminPassword']));
$checkAdmin=ejecutarSQL::consultar("SELECT * FROM administrador WHERE NombreUsuario COLLATE latin1_bin='".$adminUserName."' AND Clave COLLATE latin1_bin='".$adminPassword."'");
$dataAdmin=mysql_fetch_array($checkAdmin);
if(mysql_num_rows($checkAdmin)>=1 && $AdminCode==$dataAdmin['CodigoAdmin']){
    if(ejecutarSQL::consultar("DELETE FROM bitacora")){
        echo '<script type="text/javascript">
            swal({ 
                title:"¡Registros eliminados!", 
                text:"Los registros de la bitacora se eliminaron con éxito, debemos cerrar la sesión actual para terminar el proceso", 
                type: "success", 
                confirmButtonText: "Aceptar" 
            },
            function(isConfirm){  
                if (isConfirm) {     
                    window.location="../process/logoutRestore.php";
                } else {    
                    window.location="../process/logoutRestore.php";
                } 
            });
        </script>';
    }else{
        echo '<script type="text/javascript">
            swal({ 
                title:"¡Ocurrió un error inesperado!", 
                text:"No hemos podido eliminar los registros de la bitacora, por favor intenta nuevamente", 
                type: "error", 
                confirmButtonText: "Aceptar" 
            });
        </script>';
    }
}else{
    echo '<script type="text/javascript">
        swal({ 
            title:"¡Ocurrió un error inesperado!", 
            text:"El nombre de usuario o contraseña son incorrectos", 
            type: "error", 
            confirmButtonText: "Aceptar" 
        });
    </script>';
}
mysql_free_result($checkAdmin);
mysql_free_result($checkLoans);