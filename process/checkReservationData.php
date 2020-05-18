<?php
session_start();
include '../library/configServer.php';
include '../library/consulSQL.php';
$codeLoan=consultasSQL::CleanStringText($_POST['codeLoan']);
$userType=consultasSQL::CleanStringText($_POST['userType']);
if($userType=="Docente"){ $fileUser="fichaDN"; }
if($userType=="Estudiante"){ $fileUser="fichaEN"; }
if($userType=="Personal"){ $fileUser="fichaPN"; }
$selectDataL=ejecutarSQL::consultar("SELECT * FROM prestamo WHERE CodigoPrestamo='$codeLoan'");
$dataL=mysql_fetch_array($selectDataL);
if(mysql_num_rows($selectDataL)>=1){
    echo '<div class="alert alert-info text-center" role="alert"><strong><i class="zmdi zmdi-alert-triangle"></i> &nbsp; ¡Importante!:</strong> Para aprobar el préstamo selecciona el código correlativo del libro a prestar y haz click el botón "Aprobar reservación"</div>';
    $selectDataB=ejecutarSQL::consultar("SELECT * FROM libro WHERE CodigoLibro='".$dataL['CodigoLibro']."'");
    $fila=mysql_fetch_array($selectDataB);
    echo '<div class="group-material"><span>Código correlativo</span><select class="tooltips-general material-control" name="bookCorrelative" data-toggle="tooltip" data-placement="top" title="Elige el código correlativo del libro">';
    for($c=1;$c<=$fila['Existencias'];$c++){
        if($c>=100){
           $correl=substr($fila['CodigoCorrelativo'], 0, -2);
           $correlativo=$fila['CodigoInfraestructura']."-".$fila['CodigoCategoria']."-".$correl.$c;
           echo '<option value="'.$correlativo.'">'.$correlativo.'</option>';
        }elseif($c>=10){
           $correl=substr($fila['CodigoCorrelativo'], 0, -1);
           $correlativo=$fila['CodigoInfraestructura']."-".$fila['CodigoCategoria']."-".$correl.$c;
           echo '<option value="'.$correlativo.'">'.$correlativo.'</option>';
        }elseif($c<10){
           $correlativo=$fila['CodigoInfraestructura']."-".$fila['CodigoCategoria']."-".$fila['CodigoCorrelativo'].$c;
           echo '<option value="'.$correlativo.'">'.$correlativo.'</option>'; 
        }
    }
    echo '</select><span class="highlight"></span><span class="bar"></span></div>';
    echo '<input type="hidden" value="'.$dataL['CodigoLibro'].'" name="bookCode" ><input type="hidden" value="'.$dataL['CodigoPrestamo'].'" name="loanCode" ><input type="hidden" value="'.$fileUser.'" name="userFile" >';
}else{
    echo '<div class="alert alert-danger text-center" role="alert"><strong><i class="zmdi zmdi-alert-triangle"></i> &nbsp; ¡Error!:</strong> Lo sentimos ha ocurrido un error.</div>';
}
mysql_free_result($selectDataL);
mysql_free_result($selectDataB);