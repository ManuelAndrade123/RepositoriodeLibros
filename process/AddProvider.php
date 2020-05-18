<?php
session_start();
include '../library/configServer.php';
include '../library/consulSQL.php';
$providerName=consultasSQL::CleanStringText($_POST['providerName']);
$providerEmail=consultasSQL::CleanStringText($_POST['providerEmail']);
$providerAddres=consultasSQL::CleanStringText($_POST['providerAddres']);
$providerPhone=consultasSQL::CleanStringText($_POST['providerPhone']);
$providerResponsible=consultasSQL::CleanStringText($_POST['providerResponsible']);
$checkProvider=ejecutarSQL::consultar("SELECT * FROM proveedor");
$checktotal=mysql_num_rows($checkProvider);
$numP=$checktotal+1;
$checkInst=ejecutarSQL::consultar("SELECT * FROM institucion");
$dataInsti=mysql_fetch_array($checkInst);
$codigo=""; 
$longitud=4; 
for ($i=1; $i<=$longitud; $i++){ 
    $numero = rand(0,9); 
    $codigo .= $numero; 
}
$providerCode="I".$dataInsti['CodigoInfraestructura']."Y".$dataInsti['Year']."P".$numP."N".$codigo."";
if(mysql_num_rows($checkInst)>0){
    $checkProvR=ejecutarSQL::consultar("select * from proveedor where Nombre='".$providerName."' and Email='".$providerEmail."'");
    if(mysql_num_rows($checkProvR)<=0){
        if(consultasSQL::InsertSQL("proveedor", "CodigoProveedor, Nombre, Email, Direccion, Telefono, ResponAtencion", "'$providerCode','$providerName','$providerEmail','$providerAddres','$providerPhone','$providerResponsible'")){
            echo '<script type="text/javascript">
                swal({
                   title:"¡Proveedor registrado!",
                   text:"Los datos del proveedor se almacenaron exitosamente",
                   type: "success",
                   confirmButtonText: "Aceptar"
                });
                $(".form_SRCB")[0].reset();
            </script>'; 
        }
        else{
            echo '<script type="text/javascript">
                swal({
                   title:"¡Ocurrió un error inesperado!",
                   text:"No se pudo registrar el proveedor, por favor intenta nuevamente",
                   type: "error",
                   confirmButtonText: "Aceptar"
                });
            </script>'; 
        }
    }else{
        echo '<script type="text/javascript">
            swal({
               title:"¡Ocurrió un error inesperado!",
               text:"El nombre y email ya están registrados, por favor verifica e intenta nuevamente",
               type: "error",
               confirmButtonText: "Aceptar"
            });
        </script>'; 
    }
}else{
    echo '<script type="text/javascript">
        swal({ 
            title:"¡Ocurrió un error inesperado!", 
            text:"Primero debes de registrar los datos de la institución, ve a la opción Administración y luego a Datos Institución", 
            type: "error", 
            confirmButtonText: "Aceptar" 
        });
    </script>';
}
    
mysql_free_result($checkProvider);
mysql_free_result($checkInst);
mysql_free_result($checkProvR);