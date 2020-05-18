<?php
session_start();
include '../library/configServer.php';
include '../library/consulSQL.php';
$AdminCode=consultasSQL::CleanStringText($_POST['AdminCode']);
$bookCorrelative=consultasSQL::CleanStringText($_POST['bookCorrelative']);
$bookCode=consultasSQL::CleanStringText($_POST['bookCode']);
$loanCode=consultasSQL::CleanStringText($_POST['loanCode']);
$userFile=consultasSQL::CleanStringText($_POST['userFile']);
$selectDataBook=ejecutarSQL::consultar("SELECT * FROM libro WHERE CodigoLibro='$bookCode'");
$dataBook=mysql_fetch_array($selectDataBook);
$totalD=$dataBook['Existencias']-$dataBook['Prestado'];
$totalUp=$dataBook['Prestado']+1;
if($totalD>=2){
    $checkingCorrelative=ejecutarSQL::consultar("SELECT * FROM prestamo WHERE CorrelativoLibro='$bookCorrelative' AND Estado='Prestamo'");
    if(mysql_num_rows($checkingCorrelative)<=0){
        if(consultasSQL::UpdateSQL("libro", "Prestado='$totalUp'", "CodigoLibro='$bookCode'") && consultasSQL::UpdateSQL("prestamo", "CorrelativoLibro='$bookCorrelative',CodigoAdmin='$AdminCode',Estado='Prestamo'", "CodigoPrestamo='$loanCode'")){
            echo '<script type="text/javascript">
                swal({ 
                    title:"¡Préstamo aprobado!", 
                    text:"El préstamo se aprobó con éxito", 
                    type: "success", 
                    confirmButtonText: "Aceptar",
                    closeOnConfirm: false
                },
                function(){      
                    swal({
                      title: "¿Quieres ver la ficha del préstamo?",
                      text: "También puedes ver la ficha después ingresando a la sección de Devoluciones pendientes",
                      type: "info",
                      showCancelButton: true,
                      confirmButtonColor: "#DD6B55",
                      confirmButtonText: "Si, ver ficha",
                      cancelButtonText: "No, después",
                      closeOnConfirm: false
                    },
                    function(isConfirm){
                        if (isConfirm) {
                            window.open("../report/'.$userFile.'.php?loanCode='.$loanCode.'","_blank");
                            location.reload();
                        } else {    
                            location.reload();
                        } 
                    });
                });
            </script>';
        }else{
            echo '<script type="text/javascript">
                swal({ 
                    title:"¡Ocurrió un error inesperado!", 
                    text:"No hemos podido aprobar la reservación, por favor intenta nuevamente", 
                    type: "error", 
                    confirmButtonText: "Aceptar" 
                });
            </script>';
        }
    }else{
        echo '<script type="text/javascript">
            swal({ 
                title:"¡Ocurrió un error inesperado!", 
                text:"El correlativo del libro se encuentra en un préstamo vigente, por favor verifica e intenta nuevamente", 
                type: "error", 
                confirmButtonText: "Aceptar" 
            });
        </script>';
    }
}else{
    echo '<script type="text/javascript">
        swal({ 
            title:"¡Ocurrió un error inesperado!", 
            text:"No hay existencias disponibles para realizar el préstamo", 
            type: "error", 
            confirmButtonText: "Aceptar" 
        });
    </script>';
}
mysql_free_result($selectDataBook);
mysql_free_result($checkingCorrelative);