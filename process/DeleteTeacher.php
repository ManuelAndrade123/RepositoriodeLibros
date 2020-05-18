<?php
session_start();
include '../library/configServer.php';
include '../library/consulSQL.php';
$primaryKey=consultasSQL::CleanStringText($_POST['primaryKey']);
if(consultasSQL::DeleteSQL("docente", "DUI='$primaryKey'")){
    echo '<script type="text/javascript">
        swal({ 
            title:"¡Docente eliminada!", 
            text:"Los datos de la Docente se eliminaron exitosamente", 
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
            text:"No se pudo eliminar la Docente, por favor intente nuevamente", 
            type: "error", 
            confirmButtonText: "Aceptar" 
        });
    </script>';
}