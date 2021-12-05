$(buscar_datos());

//Se creará una funcion por campo
function buscar_datos(consulta)//el nombre de la variable que se manda
{
	$.ajax({
		url : 'Vistas/modulos/zonas.php',
		type : 'GET',
		dataType : 'html',
		data : { consulta: consulta },//Tiene que ser el ultimo 
		})

	.done(function(respuesta){
		$("#datos").html(respuesta);
    })
    .fail(function(){
        console.log("error");
    })
}

$(document).on('keyup', '#nombre', function()//#nombre es el nombre con el que se identifica al input
{
	var valorBusqueda=$(this).val();
	if (valorBusqueda!="")
	{
		buscar_datos(valorBusqueda);//Aquí se llama a la función 
	} else {
			buscar_datos();
	}
});
