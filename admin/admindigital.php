
 <!DOCTYPE html>
<html lang="es">
<head>
    <title>Digital</title>
    <?php
        session_start();
        $LinksRoute="../";
        include '../inc/links.php'; 
    ?>
    <script type="text/javascript" src="funciones.js"></script>
    <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    
    
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
              <h1 class="all-tittles">Libros digitales</h1>
            </div>
        </div>
        <div class="container-fluid">
            <ul class="nav nav-tabs nav-justified"  style="font-size: 17px;">
            
              <li role="presentation"  class="active"><a href="admincategory.php"> Libros Digitales</a></li>
            </ul>
        </div>
        <div class="container-fluid"  style="margin: 50px 0;">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <img src="../assets/img/category.png" alt="user" class="img-responsive center-box" style="max-width: 110px;">
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
                    Bienvenido a la sección para registrar nuevos libros digitales, debes de llenar el siguiente formulario para registrar un libro digital
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 lead">
                    <ol class="breadcrumb">
                      <li class="active">Nuevo Libro Digital</li>
                      <li><a href="adminlistcategory.php">Listado de Libros Digitales</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="container-flat-form">
                <div class="title-flat-form title-flat-blue">Agregar un nuevo libro digital</div>
                <form action="../process/AddCategory.php" method="post" class="form_SRCB" data-type-form="save"  autocomplete="off">
                    <div class="row">
                       <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí el Nombre del libro" name="nombre_libro" id="nombre_libro" required="" pattern="[0-9]{1,20}" maxlength="20" data-toggle="tooltip" data-placement="top" title="Solo Caracteres, máximo 50 caracteres">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Nombre del libro</label>
                            </div>
                            
                            <label>Adjuntar libro digital</label>
                            <div class="group-material">
                            <input type="file" class="form-control-file" name="file" id="file"accept="application/pdf" multiple="">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                            </div>
                            
                            
                            </div>
                            </div>

                            <p class="text-center">
                                <button type="reset" class="btn btn-info" style="margin-right: 20px;"><i class="zmdi zmdi-roller"></i> &nbsp;&nbsp; Limpiar</button>
                                <button type="button" id="btnGuardar" mult
                                            class="btn btn-primary">Cargar</button>
                            </p> 
                       </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="msjFormSend"></div>
        <div class="modal fade" tabindex="-1" role="dialog" id="ModalHelp">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center all-tittles">ayuda del sistema</h4>
                </div>
                <div class="modal-body">
                    <?php include '../help/help-admincategory.php'; ?>
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