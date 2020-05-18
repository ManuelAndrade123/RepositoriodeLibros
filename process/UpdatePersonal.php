<?php
session_start();
include '../library/configServer.php';
include '../library/consulSQL.php';
$personalDUI=consultasSQL::CleanStringText($_POST['personalDUI']);
$personalName=consultasSQL::CleanStringText($_POST['personalName']);
$personalSurname=consultasSQL::CleanStringText($_POST['personalSurname']);
$personalPhone=consultasSQL::CleanStringText($_POST['personalPhone']);
$personalPosition=consultasSQL::CleanStringText($_POST['personalPosition']);
if(consultasSQL::UpdateSQL("personal","Nombre='$personalName',Apellido='$personalSurname',Telefono='$personalPhone',Cargo='$personalPosition'","DUI='".$personalDUI."'")){
    echo '<script type="text/javascript">
        swal({ 
            title:"¡Personal administrativo actualizado!", 
            text:"Los datos del personal administrativo se actualizaron correctamente", 
            type: "success", 
            confirmButtonText: "Aceptar" 
        },
        function(isConfirm){  
            if (isConfirm) {     
                location.reload();
            } else {    
                location.reload();
            } 
        });
    </script>'; 
}else{
    echo '<script type="text/javascript">
        swal({ 
            title:"¡Ocurrió un error inesperado!", 
            text:"No hemos podido actualizar los datos del personal administrativo, por favor intenta nuevamente", 
            type: "error", 
            confirmButtonText: "Aceptar" 
        });
    </script>';
}