<?php
session_start();
include '../library/configServer.php';
include '../library/consulSQL.php';
$teachingDUI=consultasSQL::CleanStringText($_POST['teachingDUI']);
$teachingName=consultasSQL::CleanStringText($_POST['teachingName']);
$teachingSurname=consultasSQL::CleanStringText($_POST['teachingSurname']);
$teachingPhone=consultasSQL::CleanStringText($_POST['teachingPhone']);
$teachingSpecialty=consultasSQL::CleanStringText($_POST['teachingSpecialty']);
$teachingSection=consultasSQL::CleanStringText($_POST['teachingSection']);
$checkCategory=ejecutarSQL::consultar("SELECT * FROM docente WHERE DUI='".$teachingDUI."'");
if(mysql_num_rows($checkCategory)<=0){
    $checkname=ejecutarSQL::consultar("SELECT * FROM docente WHERE correo='".$teachingSection."'");
    if(mysql_num_rows($checkname)<=0){
        if(consultasSQL::InsertSQL("docente", "DUI,  Nombre, Apellido, Telefono, correo", "'$teachingDUI','$teachingName','$teachingSurname','$teachingPhone','$teachingSpecialty'")){ 
            echo '<script type="text/javascript">
                swal({
                   title:"¡Docente registrado!",
                   text:"Los datos del docente se almacenaron correctamente",
                   type: "success",
                   confirmButtonText: "Aceptar"
                });
                $(".form_SRCB")[0].reset();
            </script>';
        }else{
            echo '<script type="text/javascript">
                swal({ 
                    title:"¡Ocurrió un error inesperado!", 
                    text:"No se pudo registrar el Docente, por favor intente nuevamente", 
                    type: "error", 
                    confirmButtonText: "Aceptar" 
                });
            </script>';
        }
    }else{
        echo '<script type="text/javascript">
            swal({ 
                title:"¡Ocurrió un error inesperado!", 
                text:"El Correo electronico ingresado ya existe, escribe otro nombre e intenta nuevamente", 
                type: "error", 
                confirmButtonText: "Aceptar" 
            });
        </script>';
    }   
}else{
    echo '<script type="text/javascript">
        swal({ 
            title:"¡Ocurrió un error inesperado!", 
            text:"La Cedula ingresada ya existe, escribe otro N° de cedula e intenta nuevamente", 
            type: "error", 
            confirmButtonText: "Aceptar" 
        });
    </script>'; 
}
mysql_free_result($checkCategory);
mysql_free_result($checkname);
