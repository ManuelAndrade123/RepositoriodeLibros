
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Inicio</title>
    <?php
        session_start();
        $LinksRoute="./";
        include './inc/links.php'; 
    ?>
</head>
<body>
    <?php 
        include './library/configServer.php';
        include './library/consulSQL.php';
        if ($_SESSION['UserPrivilege']=='Admin') {
    
        }  else {
            header("Location: process/logout.php");
            exit();
        }
        include './inc/NavLateral.php';
    ?>
    <div class="content-page-container full-reset custom-scroll-containers">
        <?php 
            include './inc/NavUserInfo.php';
        ?>
        <div class="container">
            <div class="page-header">
              <h1 class="all-tittles">INICIO</h1>
            </div>
        </div>
        <?php 
            $checkAdmins=ejecutarSQL::consultar("SELECT * FROM administrador WHERE Nombre <> 'Super Administrador'");
            $checkStudents=ejecutarSQL::consultar("SELECT * FROM estudiante");
            $checkTeachers=ejecutarSQL::consultar("SELECT * FROM docente");
            $checkPersonalA=ejecutarSQL::consultar("SELECT * FROM personal");
            $checkProviders=ejecutarSQL::consultar("SELECT * FROM proveedor");
            $checkBooks=ejecutarSQL::consultar("SELECT * FROM libro");
            $totalBooks=0;
            while($DBT=mysql_fetch_array($checkBooks)){
                $totalBooks=$totalBooks+$DBT['Existencias'];
            }
            $checkCategories=ejecutarSQL::consultar("SELECT * FROM categoria");
            $checkSections=ejecutarSQL::consultar("SELECT * FROM seccion");
            $checkReservation=ejecutarSQL::consultar("SELECT * FROM prestamo WHERE Estado='Reservacion'");
            $checkLoanPending=ejecutarSQL::consultar("SELECT * FROM prestamo WHERE Estado='Prestamo'");
            $checkLoan=ejecutarSQL::consultar("SELECT * FROM prestamo WHERE Estado='Entregado'");
        ?>
        <section class="full-reset text-center" style="padding: 40px 0;">
            <article class="tile" data-href="./admin/adminlistuser.php" data-num="<?php echo mysql_num_rows($checkAdmins); ?>">
                <div class="tile-icon full-reset"><i class="zmdi zmdi-face"></i></div>
                <div class="tile-name all-tittles">administradores</div>
                <div class="tile-num full-reset"><?php echo mysql_num_rows($checkAdmins); ?></div>
            </article>
            <article class="tile" data-href="./admin/adminliststudent.php" data-num="<?php echo mysql_num_rows($checkStudents); ?>">
                <div class="tile-icon full-reset"><i class="zmdi zmdi-accounts"></i></div>
                <div class="tile-name all-tittles">estudiantes</div>
                <div class="tile-num full-reset"><?php echo mysql_num_rows($checkStudents); ?></div>
            </article>
            <article class="tile" data-href="./admin/adminlistteacher.php" data-num="<?php echo mysql_num_rows($checkTeachers); ?>">
                <div class="tile-icon full-reset"><i class="zmdi zmdi-male-alt"></i></div>
                <div class="tile-name all-tittles">docentes</div>
                <div class="tile-num full-reset"><?php echo mysql_num_rows($checkTeachers); ?></div>
            </article>
           
            
            <article class="tile" data-href="./catalog.php" data-num="<?php echo $totalBooks; ?>">
                <div class="tile-icon full-reset"><i class="zmdi zmdi-book"></i></div>
                <div class="tile-name all-tittles">libros</div>
                <div class="tile-num full-reset"><?php echo $totalBooks; ?></div>
            </article>
            <article class="tile" data-href="./admin/adminlistcategory.php" data-num="<?php echo mysql_num_rows($checkCategories); ?>">
                <div class="tile-icon full-reset"><i class="zmdi zmdi-bookmark-outline"></i></div>
                <div class="tile-name all-tittles">categorías</div>
                <div class="tile-num full-reset"><?php echo mysql_num_rows($checkCategories); ?></div>
            </article>
           
            <article class="tile" data-href="./admin/adminreservation.php" data-num="<?php echo mysql_num_rows($checkReservation); ?>">
                <div class="tile-icon full-reset"><i class="zmdi zmdi-timer"></i></div>
                <div class="tile-name all-tittles">reservaciones</div>
                <div class="tile-num full-reset"><?php echo mysql_num_rows($checkReservation); ?></div>
            </article>
            <article class="tile" data-href="./admin/adminloanpending.php" data-num="<?php echo mysql_num_rows($checkLoanPending); ?>">
                <div class="tile-icon full-reset"><i class="zmdi zmdi-time-restore"></i></div>
                <div class="tile-name all-tittles" style="width: 90%;">devoluciones pendientes</div>
                <div class="tile-num full-reset"><?php echo mysql_num_rows($checkLoanPending); ?></div>
            </article>
            <article class="tile" data-href="./admin/adminloan.php" data-num="<?php echo mysql_num_rows($checkLoan); ?>">
                <div class="tile-icon full-reset"><i class="zmdi zmdi-calendar"></i></div>
                <div class="tile-name all-tittles">préstamos</div>
                <div class="tile-num full-reset"><?php echo mysql_num_rows($checkLoan); ?></div>
            </article>
           
        </section>
        <?php
            if($_SESSION['CheckConfig']=='unrevised'){
                $selIns=ejecutarSQL::consultar("SELECT * FROM institucion");
                $DataInsT=mysql_fetch_array($selIns);
                date_default_timezone_set('America/El_Salvador');
                $Year=date("Y");
                if((mysql_num_rows($checkReservation)>=1 || mysql_num_rows($checkLoanPending)>=1) && $DataInsT['Year']!=$Year){
                    echo '<script type="text/javascript">
                        swal({ 
                            title:"¡Importante!", 
                            text:"Bienvenido Administrador <strong>'.$_SESSION['UserName'].'</strong><br>1 - Hay devoluviones pendientes o reservaciones por aprobar.<br>2 - El año de la fecha actual de tu computadora no coincide con la que has registrado en los datos de la institución, verifica y corrige el problema para que el sistema funcione correctamente.", 
                            type: "warning",
                            html: true,
                            animation: "slide-from-top",
                            confirmButtonText: "Aceptar" 
                        });
                    </script>';
                }else if(mysql_num_rows($checkReservation)>=1 || mysql_num_rows($checkLoanPending)>=1){
                    echo '<script type="text/javascript">
                        swal({ 
                            title:"¡Importante!", 
                            text:"Bienvenido Administrador <strong>'.$_SESSION['UserName'].'</strong><br>Hay devoluviones pendientes o reservaciones por aprobar.", 
                            type: "warning",
                            html: true,
                            animation: "slide-from-top",
                            confirmButtonText: "Aceptar" 
                        });
                    </script>';
                }else if($DataInsT['Year']!=$Year){
                    if(mysql_num_rows($selIns)>0){
                        echo '<script type="text/javascript">
                            swal({ 
                                title:"¡Importante!", 
                                text:"Bienvenido Administrador <strong>'.$_SESSION['UserName'].'</strong><br>El año de la fecha actual de tu computadora no coincide con la que has registrado en los datos de la institución, verifica y corrige el problema para que el sistema funcione correctamente.", 
                                type: "warning",
                                html: true,
                                animation: "slide-from-top",
                                confirmButtonText: "Aceptar" 
                            });
                        </script>';
                    }
                }
                $_SESSION['CheckConfig']='revised';
            }
            mysql_free_result($checkAdmins);
            mysql_free_result($checkStudents);
            mysql_free_result($checkTeachers);
            mysql_free_result($checkProviders);
            mysql_free_result($checkBooks);
            mysql_free_result($checkCategories);
            mysql_free_result($checkSections);
            mysql_free_result($checkReservation);
            mysql_free_result($checkLoanPending);
            mysql_free_result($checkLoan);
            mysql_free_result($selIns);
            mysql_free_result($checkPersonalA);
        ?>
        <div class="modal fade" tabindex="-1" role="dialog" id="ModalHelp">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center all-tittles">ayuda del sistema</h4>
                </div>
                <div class="modal-body">
                    <?php include './help/help-home.php'; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="zmdi zmdi-thumb-up"></i> &nbsp; De acuerdo</button>
                </div>
            </div>
          </div>
        </div>
        <?php include './inc/footer.php'; ?>
    </div>
</body>
</html>