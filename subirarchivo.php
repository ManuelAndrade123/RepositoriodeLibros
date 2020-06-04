<?php

require_once "conexion.php";
$obj= new conectar();
$conexion=$obj->conexion();


if($_FILES['file']['size'] > 0){
    
    $carpeta = 'archivos/'; 

    if(!file_exists($carpeta)){
      mkdir($carpeta,0777,true);
    }

    $nombre = $_FILES['file']['name'];
    $ruta = $_FILES['file']['tmp_name'];
    $size = $_FILES['file']['size'];
    $nombre_libro = ['nombre_libro'];
    
   
    $destino = $carpeta."/".$nombre;
   
    if(copy($ruta,$destino)){
        //echo "se guardo correctamente";
   
        $sql = "INSERT INTO files (nombre,size,nombre_libro)values('$nombre','$size','$nombre_libro')";
        //$resultado = mysql
        $resultado=mysqli_query($conexion,$sql);
   
        if($resultado){
            echo "se guardo correctamente";
        }
    }
} 
?>