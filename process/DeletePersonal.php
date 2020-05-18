<?php
session_start();
include '../library/configServer.php';
include '../library/consulSQL.php';
$primaryKey=consultasSQL::CleanStringText($_POST['primaryKey']);
$selectAllLoansP=ejecutarSQL::consultar("SELECT * FROM prestamopersonal WHERE DUI='".$primaryKey."'");
$totalP=0;
while($rowA=mysql_fetch_array($selectAllLoansP)){
    $seletLP=ejecutarSQL::consultar("SELECT * FROM prestamo WHERE CodigoPrestamo='".$rowA['CodigoPrestamo']."' AND Estado='Prestamo'");
    if(mysql_num_rows($seletLP)>0){ $totalP=$totalP+1; }
    mysql_free_result($seletLP);
}
if($totalP<=0){
    $totalErrors=0;
    $selectAllLoansP2=ejecutarSQL::consultar("SELECT * FROM prestamopersonal WHERE DUI='".$primaryKey."'");
    while($dataAllLoans=mysql_fetch_array($selectAllLoansP2)){
        if(consultasSQL::DeleteSQL("prestamopersonal", "CodigoPrestamo='".$dataAllLoans['CodigoPrestamo']."'")){
            if(consultasSQL::DeleteSQL("prestamo", "CodigoPrestamo='".$dataAllLoans['CodigoPrestamo']."'")){

            }else{
                $totalErrors=$totalErrors+1;
            }
        }else{
            $totalErrors=$totalErrors+1; 
        }   
    }
    if($totalErrors<=0){
        if(consultasSQL::DeleteSQL("bitacora", "CodigoUsuario='".$primaryKey."' AND Tipo='Personal'")){
            if(consultasSQL::DeleteSQL("personal", "DUI='".$primaryKey."'")){
                echo '<script type="text/javascript">
                    swal({ 
                        title:"¡Personal administrativo eliminado!", 
                        text:"Todos los datos del personal administrativo y préstamos asociados han sido eliminados del sistema exitosamente", 
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
                        text:"No hemos podido eliminar los datos del personal administrativo, por favor intenta nuevamente", 
                        type: "error", 
                        confirmButtonText: "Aceptar" 
                    });
                </script>';  
            }
        }else{
            echo '<script type="text/javascript">
                swal({ 
                    title:"¡Ocurrió un error inesperado!", 
                    text:"No hemos podido eliminar los datos del personal administrativo, por favor intenta nuevamente", 
                    type: "error", 
                    confirmButtonText: "Aceptar" 
                });
            </script>';
        }
    }else{
       echo '<script type="text/javascript">
            swal({ 
                title:"¡Ocurrió un error inesperado!", 
                text:"No hemos podido eliminar los datos del personal administrativo, por favor intenta nuevamente", 
                type: "error", 
                confirmButtonText: "Aceptar" 
            });
        </script>'; 
    }
}else{
    echo '<script type="text/javascript">
        swal({ 
            title:"¡Ocurrió un error inesperado!", 
            text:"El personal administrativo tiene préstamos pendientes, no se pueden borrar los datos mientras no devuelva los libros", 
            type: "error", 
            confirmButtonText: "Aceptar" 
        });
    </script>';
}
mysql_free_result($selectAllLoansP);
mysql_free_result($selectAllLoansP2);