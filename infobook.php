<!--
 * Sistema Bibliotecario
 * Copyright 2016 Carlos Eduardo Alfaro Orellana.
 -->
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Información de libro</title>
    <?php
        session_start();
        $LinksRoute="./";
        include './inc/links.php'; 
    ?>
    <link rel="stylesheet" href="css/jquery.datetimepicker.css">
    <script src="js/SendForm.js"></script>
    <script src="js/jquery.datetimepicker.js"></script>
</head>
<body>
    <?php  
        include './library/configServer.php';
        include './library/consulSQL.php';
        include './process/SecurityUser.php';
        include './inc/NavLateral.php';
    ?>
    <div class="content-page-container full-reset custom-scroll-containers">
        <?php 
            include './inc/NavUserInfo.php';
        ?>
        <div class="container">
            <div class="page-header">
              <h1 class="all-tittles">Sistema bibliotecario <small>Información de libro</small></h1>
            </div>
        </div>
        <?php
        $codeBook=consultasSQL::CleanStringText($_GET['codeBook']);
        $checkBookCode= ejecutarSQL::consultar("SELECT * FROM libro WHERE CodigoLibro='".$codeBook."'");
        $fila=mysql_fetch_array($checkBookCode);
        ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <img src="assets/img/book.png" class="img-responsive center-box" style="max-height: 250px;">
                    <br>
                </div>
                <div class="col-xs-12">
                    <?php
                        if($_SESSION['UserPrivilege']=='Student'||$_SESSION['UserPrivilege']=='Teacher'||$_SESSION['UserPrivilege']=='Personal'){
                            include './inc/infoBookUser.php';
                        }else{
                            include './inc/infoBookAdmin.php';
                        }
                    ?>
                </div>
                <div class="col-xs-12" style="padding: 40px 0">
                    <?php
                        $total=$fila['Existencias']-$fila['Prestado'];
                        if($total>1){
                            if($_SESSION['UserPrivilege']=='Admin'){
                               include './inc/FormLoanAdmin.php'; 
                            }
                            if($_SESSION['UserPrivilege']=='Student' || $_SESSION['UserPrivilege']=='Teacher'||$_SESSION['UserPrivilege']=='Personal'){
                               include './inc/FormLoanUsers.php';
                            }
                        }else{
                            echo '<p class="all-tittles lead text-center"><i class="zmdi zmdi-alert-triangle zmdi-hc-5x"></i> <br>GESTION DE PRESTAMOS AUN NO ESTA DISPONIBLE</p>';
                        }
                        $checkYear=ejecutarSQL::consultar("SELECT * FROM institucion");
                        $year=mysql_fetch_array($checkYear);
                    ?>
                </div>
            </div>
        </div>
        <div class="msjFormSend"></div>
        <div class="modal fade" id="ModalUpdate" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <form class="form_SRCB modal-content" action="process/UpdateBook.php" method="post" data-type-form="update" autocomplete="off">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center all-tittles">Actualizar libro</h4>
              </div>
              <div class="modal-body" id="ModalData"></div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success"><i class="zmdi zmdi-refresh"></i> &nbsp;&nbsp; Guardar cambios</button>
              </div>
            </form>
          </div>
        </div>
        <div class="modal fade" tabindex="-1" role="dialog" id="ModalHelp">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center all-tittles">ayuda del sistema</h4>
                </div>
                <div class="modal-body">
                    <?php 
                        if($_SESSION['UserPrivilege']=='Student'||$_SESSION['UserPrivilege']=='Teacher'){
                            include './help/help-infobook-users.php';
                        }else{
                            include './help/help-infobook-admin.php';
                        }
                    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="zmdi zmdi-thumb-up"></i> &nbsp; De acuerdo</button>
                </div>
            </div>
          </div>
        </div>
        <?php include './inc/footer.php'; ?>
    </div>
    <script>
        $(document).ready(function(){
            var Year=<?php echo $year['Year']; ?>;
            $('.StarCalendarInput').on('blur', function(){
                var startCal=$(this).val();
                var datainput=$(this).attr('data-input');
                var idinput="inputEnd-"+datainput;
                if(startCal!==""){
                    $('#'+idinput).removeClass('material-input-disabled').attr('placeholder','Fecha de entrega');
                }
            });
            jQuery('.StarCalendarInput').datetimepicker({
                format:'d.m.Y',
                lang:'es',
                timepicker:false,
                minDate:'0',
                maxDate:Year+'/12/31',
                yearStart:Year,
                yearEnd:Year,
                scrollInput:false
            });
            jQuery('.EndCalendarInput').datetimepicker({
                format:'d.m.Y',
                lang:'es',
                timepicker:false,
                minDate:'0',
                maxDate:Year+'/12/31',
                yearStart:Year,
                yearEnd:Year,
                scrollInput:false
            });
        });
    </script>
    <?php 
        mysql_free_result($checkYear);
    ?>
</body>
</html>