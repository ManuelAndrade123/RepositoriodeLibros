<!DOCTYPE html>
<html lang="es">

<head>
    <title>Catálogo</title>
    <?php
        session_start();
        $LinksRoute="./";
        include './inc/links.php'; 
    ?>
    <script type="text/javascript" src="js/jPages.js"></script>
    <script>
    $(document).ready(function() {
        $(function() {
            $("div.holder").jPages({
                containerID: "itemContainer",
                perPage: 20
            });
        });
        $('.btn-info-book').click(function() {
            window.location = "infobook.php?codeBook=" + $(this).attr("data-code-book");
        });
        $('.list-catalog-container li').click(function() {
            window.location = "catalog.php?CategoryCode=" + $(this).attr("data-code-category");
        });
    });
    </script>
</head>

<body>
    <?php 
        include './library/configServer.php';
        include './library/consulSQL.php';
        include './process/SecurityUser.php';
        $VarCategoryCatalog=consultasSQL::CleanStringText($_GET['CategoryCode']);
        include './inc/NavLateral.php';
    ?>
    <div class="content-page-container full-reset custom-scroll-containers">
        <?php 
            include './inc/NavUserInfo.php';  
        ?>
        <div class="container">
            <div class="page-header">
                <h1 class="all-tittles">Sistema bibliotecario <small>Catálogo de libros Digitales</small></h1>
            </div>
        </div>
        <div class="container-fluid" style="margin: 40px 0;">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <img src="assets/img/checklist.png" alt="pdf" class="img-responsive center-box"
                        style="max-width: 110px;">
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
                    Bienvenido al catálogo de libros digitales, selecciona una categoría de la lista para empezar, si
                    deseas buscar un libro por nombre o título has click en el icono &nbsp; <i
                        class="zmdi zmdi-search"></i> &nbsp; que se encuentra en la barra superior
                </div>
            </div>
        </div>
        <?php
      
        include 'cargartabla.php'; 
    ?>
        <div class="msjFormSend"></div>
        <div class="modal fade" id="ModalUpdate" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <form class="form_SRCB modal-content" action="../process/UpdateCategory.php" method="post"
                    data-type-form="update" autocomplete="off">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title text-center all-tittles">Actualizar datos de categoría</h4>
                    </div>
                    <div class="modal-body" id="ModalData"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-success"><i class="zmdi zmdi-refresh"></i> &nbsp;&nbsp;
                            Guardar cambios</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal fade" tabindex="-1" role="dialog" id="ModalHelp">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title text-center all-tittles">ayuda del sistema</h4>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <p class="lead">
                                        <strong><i class="zmdi zmdi-alert-triangle"></i> &nbsp; ¡Importante!
                                        </strong>Para desplazarte por esta ventana debes de mantener pulsado el botón
                                        izquierdo del
                                        Mouse o Touchpad en la barra de scroll y desplazarla hacia abajo o hacia arriba
                                        según donde te encuentres.
                                        <br><br>
                                        Para <strong>cerrar la ventana</strong> pulsa el botón <button type="button"
                                            class="btn btn-primary btn-xs"><i class="zmdi zmdi-thumb-up"></i> &nbsp; De
                                            acuerdo</button> que se encuentra en la parte inferior.
                                    </p>
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    <figure>
                                        <img class="img-responsive center-box" src="../assets/img-help/00.png">
                                    </figure>
                                </div>
                            </div>
                            <div class="modal fade" tabindex="-1" role="dialog" id="ModalHelp">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title text-center all-tittles">ayuda del sistema</h4>
                                        </div>
                                        <div class="modal-body">
                                            <?php include './help/help-catalog.php'; ?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal"><i
                                                    class="zmdi zmdi-thumb-up"></i> &nbsp; De acuerdo</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
</body>

</html>