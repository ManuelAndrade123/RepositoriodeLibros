<?php
session_start();
include '../library/configServer.php';
include '../library/consulSQL.php';
$codeStudent=consultasSQL::CleanStringText($_POST['code']);
$selectStudent=ejecutarSQL::consultar("SELECT * FROM estudiante WHERE NIE='".$codeStudent."'");
$dataStudent=mysql_fetch_array($selectStudent);
if(mysql_num_rows($selectStudent)>=1){
    echo '
    <legend><strong>Información del estudiante</strong></legend><br>
    <input type="hidden" value="'.$dataStudent['NIE'].'" name="studentNIEOld">
    <div class="group-material">
        <input type="text" class="material-control tooltips-general" value="'.$dataStudent['NIE'].'" name="studentNIE" required="" maxlength="20" data-toggle="tooltip" data-placement="top" title="NIE de estudiante">
        <span class="highlight"></span>
        <span class="bar"></span>
        <label>NIE</label>
    </div>
    <div class="group-material">
        <input type="text" class="material-control tooltips-general" value="'.$dataStudent['Nombre'].'" name="studentName" required="" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,50}" maxlength="50" data-toggle="tooltip" data-placement="top" title="Nombres del estudiante">
        <span class="highlight"></span>
        <span class="bar"></span>
        <label>Nombres</label>
    </div>
    <div class="group-material">
        <input type="text" class="material-control tooltips-general" value="'.$dataStudent['Apellido'].'" name="studentSurname" required="" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,50}" maxlength="50" data-toggle="tooltip" data-placement="top" title="Apellidos del estudiante">
        <span class="highlight"></span>
        <span class="bar"></span>
        <label>Apellidos</label>
    </div>
    <div class="group-material">
    <input type="text" class="material-control tooltips-general" value="'.$dataStudent['correo'].'" name="representativeName" required="" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,50}" maxlength="50" data-toggle="tooltip" data-placement="top" title="Apellidos del estudiante">
    <span class="highlight"></span>
    <span class="bar"></span>
    <label>Apellidos</label>
</div>
  
    <div class="full-reset representative-resul"></div>
    <script>
        $(document).ready(function(){
            $(".check-representative").keyup(function(){
              $.ajax({
                url:"../process/check-representative.php?DUI="+$(this).val(),
                success:function(data){
                  $(".representative-resul").html(data);
                }
              });
            });
        });
    </script>';
}else{
    echo '<div class="alert alert-danger text-center" role="alert"><strong><i class="zmdi zmdi-alert-triangle"></i> &nbsp; ¡Error!:</strong> Lo sentimos ha ocurrido un error.</div>';
}
mysql_free_result($selectStudent);