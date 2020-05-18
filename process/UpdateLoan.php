<?php
session_start();
include '../library/configServer.php';
include '../library/consulSQL.php';
$LoanKey=consultasSQL::CleanStringText($_POST['LoanKey']);
$BookKey=consultasSQL::CleanStringText($_POST['BookKey']);
$selectBook=ejecutarSQL::consultar("SELECT * FROM libro WHERE CodigoLibro='$BookKey'");
$dataBook=mysql_fetch_array($selectBook);
$totalP=$dataBook['Prestado']-1;
if($totalP<0){
    $totalP=0;
}
if(consultasSQL::UpdateSQL("prestamo", "Estado='Entregado'", "CodigoPrestamo='$LoanKey'") && consultasSQL::UpdateSQL("libro", "Prestado='$totalP'", "CodigoLibro='$BookKey'")){
    echo '<script type="text/javascript">
        swal({ 
            title:"¡Préstamo entregado!", 
            text:"El préstamo ahora aparecerá como entregado", 
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
            text:"No hemos podido realizar la operación solicitada, por favor intenta nuevamente", 
            type: "error", 
            confirmButtonText: "Aceptar" 
        });
    </script>';
}
mysql_free_result($selectBook);