<?php
session_start();
include '../library/configServer.php';
include '../library/consulSQL.php';
$teachingDUI=consultasSQL::CleanStringText($_POST['teachingDUI']);
$teachingName=consultasSQL::CleanStringText($_POST['teachingName']);
$teachingSurname=consultasSQL::CleanStringText($_POST['teachingSurname']);
$teachingPhone=consultasSQL::CleanStringText($_POST['teachingPhone']);
$teachingSpecialty=consultasSQL::CleanStringText($_POST['teachingSpecialty']);


if(consultasSQL::UpdateSQL("docente", "Nombre='$teachingName',Apellido='$teachingSurname',Telefono='$teachingPhone',correo='$teachingSpecialty'", "DUI='".$teachingDUI."'")){
    echo '<script type="text/javascript">
        swal({ 
            title:"¡Docente actualizado!", 
            text:"Los datos del docente se actualizaron correctamente, recuerda que si cambiaste la sección encargada del docente los estudiantes de la sección anterior no tendrán encargado y deberás asignarle uno.", 
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
            text:"No hemos podido actualizar los datos del docente, por favor intenta nuevamente", 
            type: "error", 
            confirmButtonText: "Aceptar" 
        });
    </script>';
}