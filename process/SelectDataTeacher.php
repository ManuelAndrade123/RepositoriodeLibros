<?php
session_start();
include '../library/configServer.php';
include '../library/consulSQL.php';
$codeTeacher=consultasSQL::CleanStringText($_POST['code']);
$selectTeacher=ejecutarSQL::consultar("SELECT * FROM docente WHERE DUI='".$codeTeacher."'");
$dataTeacher=mysql_fetch_array($selectTeacher);
if(mysql_num_rows($selectTeacher)>=1){
    echo '
    <legend><strong>Información del docente</strong></legend><br>
    <input type="hidden" value="'.$dataTeacher["DUI"].'" name="teachingDUI" >
    <div class="group-material">
        <input type="text" class="material-control tooltips-general" value="'.$dataTeacher["Nombre"].'" name="teachingName" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,50}" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Escribe los nombres del docente, solamente letras">
        <span class="highlight"></span>
        <span class="bar"></span>
        <label>Nombres</label>
    </div>
    <div class="group-material">
        <input type="text" class="material-control tooltips-general" value="'.$dataTeacher["Apellido"].'" name="teachingSurname" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,50}" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Escribe los apellidos del docente, solamente letras">
        <span class="highlight"></span>
        <span class="bar"></span>
        <label>Apellidos</label>
    </div>
    <div class="group-material">
    <input type="email" class="material-control tooltips-general" value="'.$dataTeacher["correo"].'"  name="teachingSpecialty" required="" maxlength="40" data-toggle="tooltip" data-placement="top" title="Correo del docente">

    <span class="highlight"></span>
    <span class="bar"></span>
    <label>Correo</label>
</div>
    <div class="group-material">
        <input type="text" class="material-control tooltips-general" value="'.$dataTeacher["Telefono"].'" name="teachingPhone" pattern="[0-9]{1,11}" required="" maxlength="10" data-toggle="tooltip" data-placement="top" title="Solamente 10 números">

        <span class="highlight"></span>
        <span class="bar"></span>
        <label>Teléfono</label>
    </div>
  
   
    <div class="group-material">
        
    </div>';
}else{
    echo '<div class="alert alert-danger text-center" role="alert"><strong><i class="zmdi zmdi-alert-triangle"></i> &nbsp; ¡Error!:</strong> Lo sentimos ha ocurrido un error.</div>';
}
mysql_free_result($selectTeacher);

