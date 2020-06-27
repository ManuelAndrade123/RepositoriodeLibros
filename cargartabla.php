<?php 
session_start();
require_once "conexion.php";
$obj= new conectar();
$conexion=$obj->conexion();
$sql="SELECT id,nombre,ruta,size,fecha  from files";
$result=mysqli_query($conexion,$sql);

?>

<div class="container-fluid">
            <h2 class="text-center all-tittles">Lista de categorías</h2>
            <div class="div-table">
                <div class="div-table-row div-table-head">
                    <div class="div-table-cell">#</div>
                 
                    <div class="div-table-cell">Nombre del Archivo</div>
                    <div class="div-table-cell">Tamaño</div>
                    <div class="div-table-cell">Fecha</div>
                    <div class="div-table-cell">Descargar</div>
                    <div class="div-table-cell">Visualizar</div>
                </div>
                <div class="div-table-row">
                     <?php 
			while ($mostrar=mysqli_fetch_row($result)) {
			
                $rutaDescarga =$mostrar[2]."/".$mostrar[1];
				?>
            <tr>
                
                <div class="div-table-cell"><?php echo $mostrar[0] ?></div>
                <div class="div-table-cell"><?php echo $mostrar[2] ?></div>
                <div class="div-table-cell"><?php echo round($mostrar[3] / 1048576) ?>MB</div>
                <div class="div-table-cell"><?php echo $mostrar[4] ?></div>
                <div class="div-table-cell">
                <a  href="<?php echo $rutaDescarga ?>" download="<?php echo $mostrar[1] ?>">
                <button  class="btn btn-success" >
                <i class="zmdi zmdi-download"></i>
                 </a>
                </div>
                <div class="div-table-cell">
                <button class="btn btn-primary"  onclick="location.href='<?php echo $mostrar[2] ?>'"  target="_blank"><i class="zmdi zmdi-eye"></i></div>
            </tr>
            <?php 
			}
			?>
                </div>
            </div>
        </div>

<script type="text/javascript">
$(document).ready(function() {
    $('#iddatatable').DataTable({
        language: {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar MENU registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del START al END de un total de TOTAL registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de MAX registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }

    });
});
</script>