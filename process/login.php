<?php
session_start();
include '../library/configServer.php';
include '../library/consulSQL.php';
$UserType=consultasSQL::CleanStringText($_POST['UserType']);
$loginName=consultasSQL::CleanStringText($_POST['loginName']);
$loginPassword=consultasSQL::CleanStringText($_POST['loginPassword']);
$fecha=date("d-m-Y");
$hora=date("H:i:s");
if($UserType=="Student"){
    $checkStudent= ejecutarSQL::consultar("SELECT * FROM estudiante WHERE Nombre COLLATE latin1_bin='$loginName' AND NIE='$loginPassword'");
    $fila=mysql_fetch_array($checkStudent);
    if(mysql_num_rows($checkStudent)>0){
        $selectBit=ejecutarSQL::consultar("SELECT * FROM bitacora");
        $total=mysql_num_rows($selectBit)+1;
        $longitud=4; 
        for ($i=1; $i<=$longitud; $i++){ 
            $numero = rand(0,9); 
            $codigo .= $numero; 
        }
        mysql_free_result($selectBit);
        $codeBit="S".$fila['NIE']."N".$codigo."-".$total."";
        if(consultasSQL::InsertSQL("bitacora", "Codigo,CodigoUsuario,Tipo,Fecha,Entrada,Salida", "'".$codeBit."','".$fila['NIE']."','Estudiante','$fecha','$hora','Sin registrar'")){
            $_SESSION['UserName']=$fila['Nombre'];
            $_SESSION['UserPrivilege']='Student';
            $_SESSION['primaryKey']=$fila['NIE'];
            $_SESSION['codeBit']=$codeBit;
            echo '<script type="text/javascript"> window.location="catalog.php"; </script>';
        }else{
            echo '<script type="text/javascript">
                swal({ 
                    title:"¡Ocurrió un error inesperado!", 
                    text:"No se pudo iniciar la sesión, por favor intenta nuevamente", 
                    type: "error", 
                    confirmButtonText: "Aceptar" 
                });
            </script>';    
        }
    }else{
        echo '<script type="text/javascript">
                swal({ 
                    title:"El nombre o contraseña son incorrectos", 
                    text:"Verifique sus datos e intente nuevamente", 
                    type: "error", 
                    confirmButtonText: "Aceptar" 
                });
            </script>';
    }
    mysql_free_result($checkStudent);
}
if($UserType=="Teacher"){
    $checkTeacher= ejecutarSQL::consultar("SELECT * FROM docente WHERE Nombre COLLATE latin1_bin='$loginName' AND DUI='$loginPassword'");
    $fila=mysql_fetch_array($checkTeacher);
    if(mysql_num_rows($checkTeacher)>0){
        $selectBit=ejecutarSQL::consultar("SELECT * FROM bitacora");
        $total=mysql_num_rows($selectBit)+1;
        $longitud=4; 
        for ($i=1; $i<=$longitud; $i++){ 
            $numero = rand(0,9); 
            $codigo .= $numero; 
        }
        mysql_free_result($selectBit);
        $codeBit="T".$fila['DUI']."N".$codigo."-".$total."";
        if(consultasSQL::InsertSQL("bitacora", "Codigo,CodigoUsuario,Tipo,Fecha,Entrada,Salida", "'".$codeBit."','".$fila['DUI']."','Docente','$fecha','$hora','Sin registrar'")){
            $_SESSION['UserName']=$fila['Nombre'];
            $_SESSION['UserPrivilege']='Teacher';
            $_SESSION['primaryKey']=$fila['DUI'];
            $_SESSION['codeBit']=$codeBit;
            echo '<script type="text/javascript"> window.location="catalog.php"; </script>';
        }else{
            echo '<script type="text/javascript">
                swal({ 
                    title:"¡Ocurrió un error inesperado!", 
                    text:"No se pudo iniciar la sesión, por favor intenta nuevamente", 
                    type: "error", 
                    confirmButtonText: "Aceptar" 
                });
            </script>';    
        } 
    }else{
        echo '<script type="text/javascript">
                swal({ 
                    title:"El nombre o contraseña son incorrectos", 
                    text:"Verifique sus datos e intente nuevamente", 
                    type: "error", 
                    confirmButtonText: "Aceptar" 
                });
            </script>';
    }
    mysql_free_result($checkTeacher);
}
if($UserType=="Admin"){
    $pass=md5($loginPassword);
    $checkAdmin=ejecutarSQL::consultar("SELECT * FROM administrador WHERE NombreUsuario COLLATE latin1_bin='$loginName' AND Clave COLLATE latin1_bin='$pass' AND Estado='Activo'");
    $fila=mysql_fetch_array($checkAdmin);
    if(mysql_num_rows($checkAdmin)>0){
        $selectBit=ejecutarSQL::consultar("SELECT * FROM bitacora");
        $total=mysql_num_rows($selectBit)+1;
        $longitud=4; 
        for ($i=1; $i<=$longitud; $i++){ 
            $numero = rand(0,9); 
            $codigo .= $numero; 
        }
        mysql_free_result($selectBit);
        $codeBit="A".$fila['CodigoAdmin']."N".$codigo."-".$total."";
        if(consultasSQL::InsertSQL("bitacora", "Codigo,CodigoUsuario,Tipo,Fecha,Entrada,Salida", "'".$codeBit."','".$fila['CodigoAdmin']."','Administrador','$fecha','$hora','Sin registrar'")){
            $_SESSION['UserName']=$fila['NombreUsuario'];
            $_SESSION['UserPrivilege']='Admin';
            $_SESSION['primaryKey']=$fila['CodigoAdmin'];
            $_SESSION['codeBit']=$codeBit;
            $_SESSION['CheckConfig']='unrevised';
            echo '<script type="text/javascript"> window.location="home.php"; </script>';
        }else{
            echo '<script type="text/javascript">
                swal({ 
                    title:"¡Ocurrió un error inesperado!", 
                    text:"No se pudo iniciar la sesión, por favor intenta nuevamente", 
                    type: "error", 
                    confirmButtonText: "Aceptar" 
                });
            </script>';    
        }
    }else{
        echo '<script type="text/javascript">
            swal({ 
                title:"¡Datos invalidos o cuenta desactivada!", 
                text:"Verifique sus datos e intente nuevamente, o póngase en contacto con el administrador de la biblioteca", 
                type: "error", 
                confirmButtonText: "Aceptar" 
            });
        </script>';
    }
    mysql_free_result($checkAdmin);
}
if($UserType=="Personal"){
    $checkPersonal=ejecutarSQL::consultar("SELECT * FROM personal WHERE Nombre COLLATE latin1_bin='$loginName' AND DUI='$loginPassword'");
    $fila=mysql_fetch_array($checkPersonal);
    if(mysql_num_rows($checkPersonal)>0){
        $selectBit=ejecutarSQL::consultar("SELECT * FROM bitacora");
        $total=mysql_num_rows($selectBit)+1;
        $longitud=4; 
        for ($i=1; $i<=$longitud; $i++){ 
            $numero = rand(0,9); 
            $codigo .= $numero; 
        }
        mysql_free_result($selectBit);
        $codeBit="P".$fila['DUI']."N".$codigo."-".$total."";
        if(consultasSQL::InsertSQL("bitacora", "Codigo,CodigoUsuario,Tipo,Fecha,Entrada,Salida", "'".$codeBit."','".$fila['DUI']."','Personal','$fecha','$hora','Sin registrar'")){
            $_SESSION['UserName']=$fila['Nombre'];
            $_SESSION['UserPrivilege']='Personal';
            $_SESSION['primaryKey']=$fila['DUI'];
            $_SESSION['codeBit']=$codeBit;
            echo '<script type="text/javascript"> window.location="catalog.php"; </script>';
        }else{
            echo '<script type="text/javascript">
                swal({ 
                    title:"¡Ocurrió un error inesperado!", 
                    text:"No se pudo iniciar la sesión, por favor intenta nuevamente", 
                    type: "error", 
                    confirmButtonText: "Aceptar" 
                });
            </script>';    
        } 
    }else{
        echo '<script type="text/javascript">
            swal({ 
                title:"El nombre o contraseña son incorrectos", 
                text:"Verifique sus datos e intente nuevamente", 
                type: "error", 
                confirmButtonText: "Aceptar" 
            });
        </script>';
    }
    mysql_free_result($checkPersonal);
}
if($UserType==""){
    echo '<script type="text/javascript">
        swal({ 
            title:"Selecciona el tipo de usuario", 
            text:"Debes de seleccionar el tipo de usuario para iniciar sesión en el sistema", 
            type: "error", 
            confirmButtonText: "Aceptar" 
        });
    </script>';
}