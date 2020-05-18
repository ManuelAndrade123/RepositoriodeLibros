<?php
session_start();
include '../library/configServer.php';
include '../library/consulSQL.php';

$bookCategory=consultasSQL::CleanStringText($_POST['bookCategory']);
$bookCode=consultasSQL::CleanStringText($_POST['bookCode']);
$bookName=consultasSQL::CleanStringText($_POST['bookName']);
$bookAutor=consultasSQL::CleanStringText($_POST['bookAutor']);
$bookCountry=consultasSQL::CleanStringText($_POST['bookCountry']);
$bookYear=consultasSQL::CleanStringText($_POST['bookYear']);
$bookEditorial=consultasSQL::CleanStringText($_POST['bookEditorial']);
$bookEdition=consultasSQL::CleanStringText($_POST['bookEdition']);
$bookCopies=consultasSQL::CleanStringText($_POST['bookCopies']);


$checkCategory=ejecutarSQL::consultar("SELECT * FROM libro WHERE CodigoLibro='".$bookCode."'");
if(mysql_num_rows($checkCategory)<=0){
    $checkname=ejecutarSQL::consultar("SELECT * FROM libro WHERE titulo='".$bookName."'");
    if(mysql_num_rows($checkname)<=0){
        if(consultasSQL::InsertSQL("libro", "CodigoLibro,CodigoCategoria, Autor, Pais, Year,Titulo , Edicion,Editorial, Existencias ", 
        "'$bookCode','$bookCategory','$bookAutor','$bookCountry','$bookYear','$bookName','$bookEdition','$bookEditorial','$bookCopies'")){ 
            echo '<script type="text/javascript">
                swal({
                   title:"¡libro registrado!",
                   text:"Los datos del libro se almacenaron correctamente",
                   type: "success",
                   confirmButtonText: "Aceptar"
                });
                $(".form_SRCB")[0].reset();
            </script>';
        }else{
            echo '<script type="text/javascript">
                swal({ 
                    title:"¡Ocurrió un error inesperado!", 
                    text:"No se pudo registrar el libro, por favor intente nuevamente", 
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