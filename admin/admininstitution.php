
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Institución</title>
    <?php
        session_start();
        $LinksRoute="../";
        include '../inc/links.php'; 
    ?>
    <script src="../js/SendForm.js"></script>
</head>
<body>
    <?php 
        include '../library/configServer.php';
        include '../library/consulSQL.php';
        include '../process/SecurityAdmin.php';
        include '../inc/NavLateral.php';
    ?>
    <div class="content-page-container full-reset custom-scroll-containers">
        <?php 
            include '../inc/NavUserInfo.php';
        ?>
        <div class="container">
            <div class="page-header">
              <h1 class="all-tittles">Informacion de la institucion</h1>
            </div>
        </div>
        <div class="container-fluid">
            <ul class="nav nav-tabs nav-justified"  style="font-size: 17px;">
              <li role="presentation" class="active"><a href="admininstitution.php">Institución</a></li>
              
              <li role="presentation"><a href="admincategory.php">Categorías</a></li>
             
            </ul>
        </div>
        <div class="container-fluid"  style="margin: 50px 0;">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <img src="../assets/img/institution1.png" alt="user" class="img-responsive center-box" style="max-width: 110px;">
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
                   <h1 class="all-tittles">Historia</h1>
                   El gobierno municipal de Valledupar en cabeza del doctor Elías Guillermo Ochoa Daza, alcalde elegido popularmente entre 1.994 y 1.997 presentó al honorable Consejo Municipal un proyecto para construir en el municipio de Valledupar, cuatro colegios, dos urbanos y dos en zona rural. Uno de ellos ubicado en el lote matadero público y justificó la creación del mencionado colegio por insinuación de la comunidad por medio de un censo de la población estudiantil que no tenía posibilidad de acceder a los centros educativos de la ciudad especialmente el Bachillerato y esta obra fue considerada como indispensable y le permitió al Alcalde ampliar la cobertura educativa.<p></p>
                   El primer debate para la creación del colegio se dio en el Concejo Municipal el día 6 de diciembre de 1.995 y el segundo debate en plenaria el día 11 de diciembre de 1995.
                   Procediendo a su construcción y entrega a la comunidad el 17 de octubre de 1.997 
                   Guarda los datos de tu institución, una vez almacenados los datos no podrás hacer más registros.
                   Puedes actualizar la información actual, o eliminar el registro completamente y añadir uno nuevo, siempre
                   y cuando no hayas registrado libros.
                   <p></p>
                   Creación: El Honorable Consejo Municipal de Valledupar con ponencia del honorable Edil José Apolinar Arias y los Vicepresidentes Jairo Torres Giraldo y Mabel Baute de Morón, los concejales en sala plena aprobaron el Acuerdo número 049 de diciembre 11 de 1995,Por el cual se creó el Colegio Milciades Cantillo Costa en el Municipio de Valledupar.
                   <p> 
                   </p>
                   <h1>Ubicacion Geografica</h1>
                   <p>
                   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1813.6355575008165!2d-73.25397172051564!3d10.444683495200945!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e8ab98c98fcd9b1%3A0x6c2fae65d8cb852d!2sInstituto%20T%C3%A9cnico%20Milc%C3%ADades%20Cantillo!5e0!3m2!1ses!2sco!4v1588554581784!5m2!1ses!2sco" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                   </p>
                   <h1>Noticias</h1>
                   Así ha sido nuestra jornada de entrega de módulos de trabajo en casa, testimonios de los padres..
                   <p> el 10 de mayo a las 14:34</p>
                   <video width="600" height="400" autoplay>
                     <source src="../assets/videos/video2.mp4" type="video/mp4">
                    </video>
                    <p></p>
                    Así hemos trabajado durante estos días...
                    Un agradecimiento a los profesores que han tenido el bien de esta tarea.
                    tambien personal administrativo gracias por su apoyo.
                    <p>Seguimos trabajando para cumplir con todo lo dispuesto, porque cuando lo hacemos en equipo, lo logramos.</p>
                    <video width="600" height="400" autoplay>
                     <source src="../assets/videos/video3.mp4" type="video/mp4">
                    </video>
                </div>
                
            </div>
        </div>
        <?php 
            $checkInstitution=ejecutarSQL::consultar("SELECT * FROM institucion");
            $checktotal=mysql_num_rows($checkInstitution);
            if($checktotal<=0){
        ?>
        
        <?php
            }else{
                $fila=mysql_fetch_array($checkInstitution);
        ?>
        
        
        <?php
            }
            mysql_free_result($checkInstitution);
        ?>
        <div class="msjFormSend"></div>
        <div class="modal fade" tabindex="-1" role="dialog" id="ModalHelp">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center all-tittles">ayuda del sistema</h4>
                </div>
                <div class="modal-body">
                    <?php include '../help/help-admininstitution.php'; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="zmdi zmdi-thumb-up"></i> &nbsp; De acuerdo</button>
                </div>
            </div>
          </div>
        </div>
        <?php include '../inc/footer.php'; ?>
    </div>
</body>
</html>