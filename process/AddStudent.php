<?php
session_start();
include '../library/configServer.php';
include '../library/consulSQL.php';
$studentNIE=consultasSQL::CleanStringText($_POST['studentNIE']);
$studentName=consultasSQL::CleanStringText($_POST['studentName']);
$studentSurname=consultasSQL::CleanStringText($_POST['studentSurname']);
$representativeName=consultasSQL::CleanStringText($_POST['representativeName']);

$checkCategory=ejecutarSQL::consultar("SELECT * FROM estudiante WHERE NIE='".$studentNIE."'");
if(mysql_num_rows($checkCategory)<=0){
    $checkname=ejecutarSQL::consultar("SELECT * FROM estudiante WHERE correo='".$representativeName."'");
    if(mysql_num_rows($checkname)<=0){
        if(consultasSQL::InsertSQL("estudiante", "NIE,  Nombre, Apellido, correo", "'$studentNIE','$studentName','$studentSurname','$representativeName'")){ 
            echo '<script type="text/javascript">
                swal({
                   title:"¡estudiante registrado!",
                   text:"Los datos del estudiante se almacenaron correctamente",
                   type: "success",
                   confirmButtonText: "Aceptar"
                });
                $(".form_SRCB")[0].reset();
            </script>';
        }else{
            echo '<script type="text/javascript">
                swal({ 
                    title:"¡Ocurrió un error inesperado!", 
                    text:"No se pudo registrar el estudiante, por favor intente nuevamente", 
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
