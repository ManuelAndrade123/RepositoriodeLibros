<?php
session_start();
include '../library/configServer.php';
include '../library/consulSQL.php';
$studentNIEOld=consultasSQL::CleanStringText($_POST['studentNIEOld']);
$studentNIE=consultasSQL::CleanStringText($_POST['studentNIE']);
$studentName=consultasSQL::CleanStringText($_POST['studentName']);
$studentSurname=consultasSQL::CleanStringText($_POST['studentSurname']);
$studentSection=consultasSQL::CleanStringText($_POST['studentSection']);
$representativeRelationship=consultasSQL::CleanStringText($_POST['representativeRelationship']);
$representativeDUI=consultasSQL::CleanStringText($_POST['representativeDUI']);
$responStatus=consultasSQL::CleanStringText($_POST['responStatus']);
$representativeName=consultasSQL::CleanStringText($_POST['representativeName']);
$representativePhone=consultasSQL::CleanStringText($_POST['representativePhone']);
$CheckRepre=ejecutarSQL::consultar("SELECT * FROM encargado");
$NumR=mysql_num_rows($CheckRepre);
if($studentNIEOld==$studentNIE){
    if($NumR>0){
        if(consultasSQL::UpdateSQL("estudiante", "CodigoSeccion='$studentSection',Nombre='$studentName',Apellido='$studentSurname',Parentesco='$representativeRelationship'", "NIE='$studentNIEOld'")){
            echo '<script type="text/javascript">
                swal({ 
                    title:"¡Estudiante actualizado!", 
                    text:"Los datos del estudiante se actualizaron correctamente", 
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
                    text:"No hemos podido actualizar los datos del estudiante, por favor intenta nuevamente", 
                    type: "error", 
                    confirmButtonText: "Aceptar" 
                });
            </script>';
        }
    }else{
        if(consultasSQL::InsertSQL("encargado", "DUI,Nombre,Telefono", "'$representativeDUI','$representativeName','$representativePhone'")){
            if(consultasSQL::UpdateSQL("estudiante", "DUI='$representativeDUI',CodigoSeccion='$studentSection',Nombre='$studentName',Apellido='$studentSurname',Parentesco='$representativeRelationship'", "NIE='$studentNIEOld'")){
                echo '<script type="text/javascript">
                    swal({ 
                        title:"¡Estudiante actualizado!", 
                        text:"Los datos del estudiante se actualizaron correctamente", 
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
                consultasSQL::DeleteSQL("encargado", "DUI='$representativeDUI'");
                echo '<script type="text/javascript">
                    swal({ 
                        title:"¡Ocurrió un error inesperado!", 
                        text:"No hemos podido actualizar los datos del estudiante, por favor intenta nuevamente", 
                        type: "error", 
                        confirmButtonText: "Aceptar" 
                    });
                </script>';
            }
        }else{
            echo '<script type="text/javascript">
                swal({ 
                    title:"¡Ocurrió un error inesperado!", 
                    text:"No hemos podido actualizar los datos del estudiante, por favor intenta nuevamente", 
                    type: "error", 
                    confirmButtonText: "Aceptar" 
                });
            </script>';
        }
    }
}else{
    $checkNIE=ejecutarSQL::consultar("SELECT * FROM estudiante WHERE NIE='$studentNIE'");
    if(mysql_num_rows($checkNIE)<=0){
        if($NumR>0){
            if(consultasSQL::UpdateSQL("estudiante", "NIE='$studentNIE',CodigoSeccion='$studentSection',Nombre='$studentName',Apellido='$studentSurname',Parentesco='$representativeRelationship'", "NIE='$studentNIEOld'")){
                echo '<script type="text/javascript">
                    swal({ 
                        title:"¡Estudiante actualizado!", 
                        text:"Los datos del estudiante se actualizaron correctamente", 
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
                        text:"No hemos podido actualizar los datos del estudiante, por favor intenta nuevamente", 
                        type: "error", 
                        confirmButtonText: "Aceptar" 
                    });
                </script>';
            }
        }else{
            if(consultasSQL::InsertSQL("encargado", "DUI,Nombre,Telefono", "'$representativeDUI','$representativeName','$representativePhone'")){
                if(consultasSQL::UpdateSQL("estudiante", "NIE='$studentNIE',DUI='$representativeDUI',CodigoSeccion='$studentSection',Nombre='$studentName',Apellido='$studentSurname',Parentesco='$representativeRelationship'", "NIE='$studentNIEOld'")){
                    echo '<script type="text/javascript">
                        swal({ 
                            title:"¡Estudiante actualizado!", 
                            text:"Los datos del estudiante se actualizaron correctamente", 
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
                    consultasSQL::DeleteSQL("encargado", "DUI='$representativeDUI'");
                    echo '<script type="text/javascript">
                        swal({ 
                            title:"¡Ocurrió un error inesperado!", 
                            text:"No hemos podido actualizar los datos del estudiante, por favor intenta nuevamente", 
                            type: "error", 
                            confirmButtonText: "Aceptar" 
                        });
                    </script>';
                }
            }else{
                echo '<script type="text/javascript">
                    swal({ 
                        title:"¡Ocurrió un error inesperado!", 
                        text:"No hemos podido actualizar los datos del estudiante, por favor intenta nuevamente", 
                        type: "error", 
                        confirmButtonText: "Aceptar" 
                    });
                </script>';
            }
        }
    }else{
        echo '<script type="text/javascript">
            swal({ 
                title:"¡Ocurrió un error inesperado!", 
                text:"El NIE que acabas de escribir ya está asignado a otro estudiante, por favor verifica e intenta nuevamente", 
                type: "error", 
                confirmButtonText: "Aceptar" 
            });
        </script>';
    }
}
mysql_free_result($CheckRepre);
mysql_free_result($checkNIE);