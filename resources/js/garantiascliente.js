$(document).on("ready",inicio);
function inicio(){
    var grupo_id = document.getElementById('grupo_id').value;
    var integrante_id = document.getElementById('integrante_id').value;
    tablagarantias(integrante_id);
}

function tablagarantias(integrante_id){
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'garantia/get_garantiaintegrante/';
     
    $.ajax({url: controlador,
        type:"POST",
        data:{integrante_id:integrante_id},
        success:function(respuesta){
            var registros =  JSON.parse(respuesta);
            if (registros != null){                   
                   
                    var n = registros.length;
                    var suma = Number(0);
                    html = "";
                    
                    html += "<table class='table table-striped' id='mitabla'";
                    html += "<tr><th colspan='4'>GARANTIAS</th></tr>";
                    html += "<tr>";
                    html += "<th>CANT.</th>";
                    html += "<th>DESCRIPCION</th>";
                    html += "<th>PRECIO</th>";
                    html += "<th>TOTAL</th>";
                    html += "</tr>";
                    html += "<tbody id='garantiaaas'>";
                    for (var i = 0; i < n ; i++){
                     	suma += Number(registros[i]["garantia_total"]);
                        html += "<tr>";
                        html += "<td>"+registros[i]["garantia_cantidad"]+"</td>";
                        html += "<td><b>"+registros[i]["garantia_descripcion"]+"</b></td>";
                        html += "<td><b>"+Number(registros[i]["garantia_precio"]).toFixed(2)+"</b></td>";
                        html += "<td><b>"+Number(registros[i]["garantia_total"]).toFixed(2)+"</b></td>";
                        html += "</tr>";
                    }
                        html += "<tr>";
                        html += "<td></td>";
                      
                        html += "<td></td>";
                        html += "<td></td>";
                        html += "<th>"+suma.toFixed(2)+"</th>";
                        html += "</tr>";
                        html += "</table>";
                        $("#garantias").html(html);
          }  
        },
        error:function(respuesta){
          
       
   }
    });

}

function registragarantia(cliente_id,integrante_id,grupo_id){
    var base_url    = document.getElementById('base_url').value;
    var descripcion = document.getElementById('garantia_descripcion').value;
    var cantidad    = document.getElementById('garantia_cantidad').value;
    var precio      = document.getElementById('garantia_precio').value;
    var total       = document.getElementById('garantia_total').value;
    var observacion = document.getElementById('garantia_observacion').value;
    //var garantia_foto = document.getElementById('garantia_foto');
    //var garantia_foto = foto.files;
    var controlador = base_url+"garantia/registrargarantia";
    $('#modalgarantia').modal('hide');
    $.ajax({url: controlador,
           type:"POST",
           data:{integrante_id:integrante_id, descripcion:descripcion, cantidad:cantidad, precio:precio,
                 total:total, observacion:observacion},
            success:function(resul){
                var registros =  JSON.parse(resul);
                    
                if (registros != null){
                    if(registros == "ok"){
                    	$("#exampleModal input").val("");
					    $("#garantia_precio").val("");
					    $("#garantia_cantidad").val("");
					    $("#garantia_total").val("");
                    	$("#garantia_observacion").val('');
                    	$("#garantia_descripcion").val('');
                        tablagarantias(integrante_id);
                        
                    }
                }else{
                    alert("Descripcion, Cantidad y Precio no deben estar vacios");
                }
        },
        error:function(resul){
          // alert("Algo salio mal...!!!");
           
        }
    });
}

function totaly(){
    var cantidad  = document.getElementById('garantia_cantidad').value;
    var precio    = document.getElementById('garantia_precio').value;
    $("#garantia_total").val(cantidad*precio);
}