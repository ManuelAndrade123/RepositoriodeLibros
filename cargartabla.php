<?php 
session_start();
require_once "conexion.php";
$obj= new conectar();
$conexion=$obj->conexion();
$sql="SELECT id,nombre,ruta,size,fecha  from files";
$result=mysqli_query($conexion,$sql);

?>

<style>
	table { border: 1px solid #E7E7E7;}
	td{
	
	
	 text-transform: uppercase;
	 border: #E7E7E7 1px solid;
	}
	td{text-align: center;}
</style>
<div  class="table-responsive">
    <table class="table table-striped"  id="iddatatable">
        <thead>
            <tr>
                <td><b>ID.</b></td>
                <td><b>Archivo</b></td>
                <td><b>Nombre Libro</b></td>
                <td><b>Tamaño</b></td>
                <td><b>Fecha subida</b></td>
                <td><b>Descargar</b></td>
                <td><b>Visualizar</b></td>
                <td><b>Eliminar</b></td>
            </tr>
        </thead>
        <tbody>
            <?php 
			while ($mostrar=mysqli_fetch_row($result)) {
			
                $rutaDescarga =$mostrar[2]."/".$mostrar[1];
				?>
            <tr>
                <td><?php echo $mostrar[0] ?></td>
                <td><?php echo $mostrar[1] ?></td>
                <td><?php echo $mostrar[2] ?></td>
                <td><?php echo ($mostrar[3] / 1048576) ?>MB</td>
                <td><?php echo $mostrar[4] ?></td>
                
                
				<td>
                    <a href="<?php echo $rutaDescarga ?>" download="<?php echo $mostrar[1] ?>"
                        class="btn btn-warning btn-sm">
                        <span class="fa fa-download"></span>
                </td>
                <td>
                    <a href="<?php echo $mostrar[2] ?>" target="_blank"
                        class="btn btn-primary btn-sm">
                        <span class="fa fa-eye"></span>
                </td>

				<a href="<?php echo $mostrar[3] ?>" target="_blank"></a>
				<td >
					<span class="btn btn-success btn-sm" data-toggle="modal"  data-target="#modalArchivo" >
						<span  class="fa fa-pencil-square-o"></span>
					</span>
				</td>
            </tr>
            <?php 
			}
			?>
        </tbody>
    </table>
    
    
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