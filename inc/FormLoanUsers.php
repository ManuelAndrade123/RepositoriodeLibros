<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2">
            <div class="page-header">
              <h1 class="all-tittles">Realizar <small>reservación</small></h1>
            </div>
            <p class="lead">
                Para poder realizar una reservación deberá de llenar los campos del siguiente formulario.
            </p>
            <form action="process/AddLoanUsers.php" method="post" class="form_SRCB" data-type-form="saveReservation" autocomplete="off">
                <?php
                    $checkAd=ejecutarSQL::consultar("SELECT * FROM administrador WHERE Nombre='Super Administrador'");
                    $rowAd=mysql_fetch_array($checkAd);
                    echo '<input type="hidden"  name="bookCode" value="'.$codeBook.'">';
                    echo '<input type="hidden"  name="bookCorrelative" value="Sin seleccionar">';
                    echo '<input type="hidden"  name="userKey" value="'.$_SESSION['primaryKey'].'">';
                    echo '<input type="hidden"  name="adminCode" value="'.$rowAd['CodigoAdmin'].'">';
                    echo '<input type="hidden"  name="userType" value="'.$_SESSION['UserPrivilege'].'">';
                    mysql_free_result($checkAd);
                ?>
                <div class="group-material">
                    <span>Fecha de solicitud</span>
                    <input type="text" readonly class="material-control StarCalendarInput" data-input="users" required="" name="startDate" placeholder="Fecha de solicitud">
                </div>
                <div class="group-material">
                    <span>Fecha de entrega</span>
                    <input type="text" readonly class="material-control EndCalendarInput material-input-disabled" id="inputEnd-users" required="" name="endDate" placeholder="Primero debes seleccionar la fecha de solicitud">
                </div>
                <p class="text-center">
                    <button type="reset" class="btn btn-info" style="margin-right: 20px;"><i class="zmdi zmdi-roller"></i> &nbsp;&nbsp; Limpiar campos</button>
                    <button type="submit" class="btn btn-primary"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Realizar reservación</button>
                </p>
            </form>
        </div>
    </div>
</div>