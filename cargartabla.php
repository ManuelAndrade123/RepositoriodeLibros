<?php 
require_once "conexion.php";
$obj= new conectar();
$conexion=$obj->conexion();
$sql="SELECT id,nombre,size,nombre_libro from files";
$result=mysqli_query($conexion,$sql);
?>


<div  style="font-size: 13px;  text-transform: uppercase;" class="table-responsive">
	<table  class="table" id="iddatatable">
		<thead>
			<tr>
			    <td><b>ID. </b></td>
				<td><b>nombre</b></td>
                <td><b>tamaño</b></td>
                <td><b>nombre libro</b></td>

                
			</tr>
		</thead>
		<tbody>
			<?php 
			while ($mostrar=mysqli_fetch_row($result)) {
				?>
				<tr >
				    <td><?php echo $mostrar[0] ?></td>
					<td><?php echo $mostrar[1] ?></td>
					<td><?php echo $mostrar[2] ?></td>
					<td><?php echo $mostrar[3] ?></td>
                    
                    
                    <!--
                    <td style="text-align: center; font-size: 13px; border: #A5C6FF 1px solid;">
						<span class="btn btn-success btn-sm" data-toggle="modal"  data-target="#modalEditar" onclick="agregaFrmActualizar('<?php echo $mostrar[0] ?>')">
							<span  class="fa fa-pencil-square-o"></span>
						</span>
					</td>
					
                    -->
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