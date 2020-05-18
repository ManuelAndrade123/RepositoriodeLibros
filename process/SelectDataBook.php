<?php
session_start();
include '../library/configServer.php';
include '../library/consulSQL.php';
$codeBook=consultasSQL::CleanStringText($_POST['code']);
$SdataB=ejecutarSQL::consultar("SELECT * FROM libro WHERE CodigoLibro='$codeBook'");
$dBook=mysql_fetch_array($SdataB);
if(mysql_num_rows($SdataB)>=1){
    echo '<input value="'.$dBook["CodigoLibro"].'" type="hidden" name="primaryKey">
    <legend><strong>Información básica</strong></legend><br>
    <div class="group-material">
        <span>Categoría</span>
        <select class="tooltips-general material-control" name="bookCategory" data-toggle="tooltip" data-placement="top" title="Elige la categoría del libro">';
            $nameCateg=ejecutarSQL::consultar("SELECT * FROM categoria WHERE CodigoCategoria='".$dBook['CodigoCategoria']."'");
            $nC=mysql_fetch_array($nameCateg);
            echo '<option value="'.$nC['CodigoCategoria'].'">'.$nC['Nombre'].'</option>'; 
            $checkCategory=ejecutarSQL::consultar("SELECT * FROM categoria WHERE CodigoCategoria <> '".$dBook['CodigoCategoria']."'");
            while($row=mysql_fetch_array($checkCategory)){
                echo '<option value="'.$row['CodigoCategoria'].'">'.$row['Nombre'].'</option>'; 
            }
            mysql_free_result($checkCategory);
            mysql_free_result($nameCateg);
    echo '</select>
    </div>

    <div class="group-material">
        <input type="text" value="'.$dBook['Titulo'].'" class="tooltips-general material-control" name="bookName" required="" maxlength="70" data-toggle="tooltip" data-placement="top" title="Escribe el título o nombre del libro">
        <span class="highlight"></span>
        <span class="bar"></span>
        <label>Título</label>
    </div>
    <div class="group-material">
        <input type="text" value="'.$dBook['Autor'].'" class="tooltips-general material-control" name="bookAutor" required="" maxlength="70" data-toggle="tooltip" data-placement="top" title="Escribe el nombre del autor del libro">
        <span class="highlight"></span>
        <span class="bar"></span>
        <label>Autor</label>
    </div>
    <div class="group-material">
        <input type="text" value="'.$dBook['Pais'].'" class="tooltips-general material-control" required="" name="bookCountry" maxlength="50" data-toggle="tooltip" data-placement="top" title="Escribe el país del libro">
        <span class="highlight"></span>
        <span class="bar"></span>
        <label>País</label>
    </div>
    <legend><strong>Otros datos</strong></legend><br>
    
    <div class="group-material">
       <input type="text" value="'.$dBook['Year'].'" class="material-control tooltips-general" name="bookYear" required="" pattern="[0-9]{1,4}" maxlength="4" data-toggle="tooltip" data-placement="top" title="Solamente números, sin espacios">
        <span class="highlight"></span>
        <span class="bar"></span>
        <label>Año</label>
    </div>
    <div class="group-material">
        <input type="text" value="'.$dBook['Editorial'].'" class="material-control tooltips-general" name="bookEditorial" required="" maxlength="70" data-toggle="tooltip" data-placement="top" title="Editorial del libro">
        <span class="highlight"></span>
        <span class="bar"></span>
        <label>Editorial</label>
    </div>
    <div class="group-material">
        <input type="text" value="'.$dBook['Edicion'].'" class="material-control tooltips-general" name="bookEdition" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Edición del libro">
        <span class="highlight"></span>
        <span class="bar"></span>
        <label>Edición</label>
    </div>
    <div class="group-material">
        <input type="text" value="'.$dBook['Existencias'].'" class="material-control tooltips-general" name="bookCopies" required=" "pattern="[0-9]{1,7}" maxlength="7" data-toggle="tooltip" data-placement="top" title="¿Cuántos libros registraras?">
        <span class="highlight"></span>
        <span class="bar"></span>
        <label>Cantidad</label>
    </div>
    
    
    
    <div class="group-material">
        <span>Estado</span>
        <select class="tooltips-general material-control" name="bookState" data-toggle="tooltip" data-placement="top" title="Elige el estado del libro">';
           switch($dBook['Estado']){
                case "Disponible":
                    echo '
                    <option value="Bueno">Bueno</option>
                    <option value="Deteriorado">Deteriorado</option>
                    ';
                    break;
                case "No Disponible":
                    echo '
                    <option value="Deteriorado">Deteriorado</option>
                    <option value="Bueno">Bueno</option>
                    ';
                    break;
                default : echo 'Error al intentar recuperar el estado';
            }
        echo '</select>
    </div>';
}else{
    echo '<div class="alert alert-danger text-center" role="alert"><strong><i class="zmdi zmdi-alert-triangle"></i> &nbsp; ¡Error!:</strong> Lo sentimos ha ocurrido un error.</div>';
}
mysql_free_result($SdataB);