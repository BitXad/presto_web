$(document).on("ready",inicio);

function inicio(){

        
        tablagarantia();
       

}
function validar(e,opcion) {
    
  tecla = (document.all) ? e.keyCode : e.which;
 
    if (tecla==13){ 
    if (opcion==1){   //si la pulsacion proviene del nit          
            buscarcliente();            
        }
    } 
 
}
function buscarcliente(){

   var base_url = document.getElementById('base_url').value;
   var cliente_ci = document.getElementById('cliente_ci').value;
   var controlador = base_url+'credito/buscarcliente';
 
    $.ajax({url:controlador,
            type:"POST",
            data:{cliente_ci:cliente_ci},
            success:function(respuesta){
                
                var registros = eval(respuesta);

                if (registros[0]!=null){ //Si el cliente es nuevo o no existe
                    
                    
                    $("#cliente_id").val(registros[0]["cliente_id"]);
                    $("#cliente_nombre").val(registros[0]["cliente_nombre"]);
                    $("#cliente_apellido").val(registros[0]["cliente_apellido"]);
                    $("#cliente_telefono").val(registros[0]["cliente_telefono"]);
                    
                    
                }
                else 
                {
                    //$("#razon_social").val('SIN NOMBRECILLO');
                   
                    $("#cliente_id").val(0);
                    $("#cliente_nombre").val("-");
                    $("#cliente_apellido").val("-");
                    $("#cliente_telefono").val(0);
                  
                }

            },
            error:function(respuesta){			
                $("#cliente_ci").val('SIN NOMBRE');
                
                $("#cliente_id").val(0);
            }                
    }); 

}

function creagarantia_aux(){
       
        var controlador = "";
   
        var cantidad = document.getElementById('garantia_cantidad').value; 
        
        var precio = document.getElementById('garantia_precio').value;
        var descripcion = document.getElementById('garantia_descripcion').value;
        var usuario_id = document.getElementById('usuario_id').value;

    
    var base_url = document.getElementById('base_url').value;
    
    controlador = base_url+'credito/garantia_aux/';
   
    
    $.ajax({url: controlador,
           type:"POST",
           data:{cantidad:cantidad,descripcion:descripcion,precio:precio,usuario_id:usuario_id},
           success:function(respuesta){     
               
               tablagarantia();                      
            
        }
        
    });
}

function tablagarantia(){
     var controlador = "";
     var limite = 500;
     var base_url = document.getElementById('base_url').value;
     var usuario_id = document.getElementById('usuario_id').value;
     controlador = base_url+'credito/garantiacredito/';
     
      $.ajax({url: controlador,
           type:"POST",
           data:{usuario_id:usuario_id},
           success:function(respuesta){     
                              
               var registros =  JSON.parse(respuesta);
                
               if (registros != null){                   
                   
                    var n = registros.length; //tamaÃ±o del arreglo de la consulta
                   
                    var suma = Number(0);
                    
                    html = "";
                     if (n <= limite) x = n; 
                   else x = limite;
                    
                    for (var i = 0; i < x ; i++){
                     	suma += Number(registros[i]["garantia_total"]);
                        html += "<tr>";
                        html += "<td>"+registros[i]["garantia_cantidad"]+"</td>";
                        html += "<td><b>"+registros[i]["garantia_descripcion"]+"</b></td>";
                        html += "<td><b>"+Number(registros[i]["garantia_precio"]).toFixed(2)+"</b></td>";
                        html += "<td><b>"+Number(registros[i]["garantia_total"]).toFixed(2)+"</b></td>";
//                        html += "<td> <input id='cotizacion_id'  name='cotizacion_id' type='hidden' class='form-control' value='"+cotizacion_id+"'>";
                      
                        //html += "<td><button type='button' onclick='actualizarDetalle("+registros[i]["detallecot_id"]+","+registros[i]["producto_id"]+","+cotizacion_id+")' class='btn btn-success btn-sm'><i class='fa fa-random'></i></button>";
                        //html += "<button type='button' onclick='quitardetallec("+registros[i]["detallecot_id"]+")' class='btn btn-danger btn-sm'><span class='fa fa-trash'></span></button></td>";

                      
                        html += "</tr>";
                       }
                       html += "<tr>";
                      // html += "<td><input id='total'  name='total' type='text' class='form-control' value='"+total_detalle+"'></td>";
                       html += "<td></td>";
                      
                       html += "<td></td>";
                       html += "<td></td>";
                       html += "<th>"+suma.toFixed(2)+"</th>";
                       html += "</tr>";
                        //$('#cotizacion_total').value(total_detalle.toFixed(2));
                       $("#garantias").html(html);
                      // totality(total_detalle);
                       
          }  
        },
        error:function(respuesta){
          
       
   }
    });

}