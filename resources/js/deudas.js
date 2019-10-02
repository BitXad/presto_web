$(document).on("ready",inicio);
function inicio(){
    var grupo_id = document.getElementById('grupo_id').value;
    var integrante_id = document.getElementById('integrante_id').value;
    tabladeudas(integrante_id);
}

function tabladeudas(integrante_id,grupo_id){
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'integrante/get_deudas/';
     
    $.ajax({url: controlador,
        type:"POST",
        data:{integrante_id:integrante_id},
        success:function(respuesta){
            var registros =  JSON.parse(respuesta);
            if (registros != null){                   
                   
                    var n = registros.length;
                    html = "";
                    
                    html += "<table class='table table-striped' id='mitabla'";
                    html += "<tr><th colspan='3'>DEUDAS</th></tr>";
                    html += "<tr>";
                    html += "<th>NOMBRE</th>";
                    html += "<th>DETALLE</th>";
                    html += "<th>ESTADO</th>";
                    html += "</tr>";
                    html += "<tbody id='deudaaas'>";
                    for (var i = 0; i < n ; i++){
                        html += "<tr>";
                        html += "<td>"+registros[i]["deudainst_nombre"]+"</td>";
                        html += "<td><b>"+registros[i]["deudainst_detalle"]+"</b></td>";
                        html += "<td><b>"+registros[i]["deudainst_estado"]+"</b></td>";
                        html += "</tr>";
                    }
                        html += "</table>";
                        $("#deudas").html(html);
          }  
        },
        error:function(respuesta){
          
       
   }
    });

}

function registradeuda(cliente_id,integrante_id,grupo_id){
    var base_url    = document.getElementById('base_url').value;
    var nombre = document.getElementById('deudainst_nombre').value;
    var detalle    = document.getElementById('deudainst_detalle').value;
    var estado      = document.getElementById('deudainst_estado').value;
    var controlador = base_url+"integrante/registrardeudas";
    $('#modaldeuda').modal('hide');
    $.ajax({url: controlador,
           type:"POST",
           data:{cliente_id:cliente_id,integrante_id:integrante_id,nombre:nombre,detalle:detalle,estado:estado},
            success:function(resul){
                var registros =  JSON.parse(resul);
                    
                if (registros != null){
                    if(registros == "ok"){
                    	$("#exampleModal input").val("");
					    $("#deudainst_nombre").val("");
					    $("#deudainst_detalle").val("");
					    $("#deudainst_estado").val("");
                        tabladeudas(integrante_id);
                        
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