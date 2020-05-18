<?php
session_start();
include '../library/configServer.php';
include '../library/consulSQL.php';
$institutionCode=consultasSQL::CleanStringText($_POST['institutionCode']);
$institutionName=consultasSQL::CleanStringText($_POST['institutionName']);
$institutionDistrict=consultasSQL::CleanStringText($_POST['institutionDistrict']);
$institutionPhone=consultasSQL::CleanStringText($_POST['institutionPhone']);
$institutionYear=consultasSQL::CleanStringText($_POST['institutionYear']);
if(consultasSQL::UpdateSQL("institucion", "CodigoInfraestructura='$institutionCode',Nombre='$institutionName',Distrito='$institutionDistrict',Telefono='$institutionPhone',Year='$institutionYear'", "CodigoInfraestructura='$institutionCode'")){
    echo '<script type="text/javascript">
        swal({ 
            title:"¡Datos de la institución actualizados!", 
            text:"Los datos de la institución se actualizaron correctamente", 
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
            text:"No se pudo actualizar los datos de la institución, por favor intenta de nuevamente", 
            type: "error", 
            confirmButtonText: "Aceptar" 
        });
    </script>';
}