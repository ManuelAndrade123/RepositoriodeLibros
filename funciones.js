$(document).ready(function(){
    $('#btnGuardar').click(function() {

        upload_file();

    });
});

function upload_file(){
    //validar_file();
    var file = $("#file").prop('files')[0];
    console.log(file);   

    var formData = new FormData();
    formData.append('file',file);

    $.ajax({
        url: "subirarchivo.php",
        type: "POST",
        dataType: "text",
        cache:false,
         contentType: false,
         processData: false,
         data: formData,
    })
    .done(function(data){
      console.log("seccess");
      //$("#btnGuardar").load('CargarTabla.php');
      $('#cargar').load('cargartabla.php');
    })
    .fail(function(){
        console.log("error");
    })
      .always(function(){
        console.log("complete");
      });
}