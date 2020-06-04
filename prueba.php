<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="librerias/jquery.min.js"></script>
    <script src="librerias/datatable/jquery.dataTables.min.js"></script>
    <script src="librerias/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="librerias/alertify/alertify.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script type="text/javascript" src="funciones.js"></script>
    

</head>
<body>
<div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="content">
                                    <br>
                                    <form id="frmArchivos" method="post" enctype="multipart/form-data">
                                    <div class="group-material">
                                    <label>Nombre del libro</label>
                                    <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí el Nombre del libro" name="nombre_libro" id="nombre_libro" required="" pattern="[0-9]{1,20}" maxlength="20" data-toggle="tooltip" data-placement="top" title="Solo Caracteres, máximo 50 caracteres">
                                    
                                       
                                     </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlFile1">Archivo</label>
                                            <input type="file" class="form-control-file" name="file" id="file"
                                                accept="application/pdf" multiple="">
                                        </div>
                                        <button type="button" id="btnGuardar" mult
                                            class="btn btn-primary">Cargar</button>
                                    </form>
                                    <div class="col_md-7" id="cargar" >
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div> 
             
</body>
</html>