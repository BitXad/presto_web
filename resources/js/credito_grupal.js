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
                   alert("Este cliente no esta registrado, continue llenando los campos para registrarlo")
                    $("#cliente_id").val(0);
                    $("#cliente_nombre").val("-").focus();
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
function finalizarindividual()
{
    var base_url    = document.getElementById('base_url').value;
    var usuario_id    = document.getElementById('usuario_id').value;
    var controlador = base_url+'credito/finalizar/';   
    var credito_monto = document.getElementById('credito_monto').value;
    var credito_interes = document.getElementById('credito_interes').value;
    var credito_comision = document.getElementById('credito_comision').value;
    var credito_custodia = document.getElementById('credito_custodia').value;
    var credito_fechalimite = document.getElementById('credito_fechalimite').value;
    var credito_cuotas = document.getElementById('credito_cuotas').value;
    var tipo_credito = 2;
    var tipo_interes = document.getElementById('tipoint_id').value;
    var tipo_garantia = document.getElementById('tipogarant_id').value;
    var cliente_nombre = document.getElementById('cliente_nombre').value;
    var cliente_apellido = document.getElementById('cliente_apellido').value;
    var cliente_telefono = document.getElementById('cliente_telefono').value;
    var grupo_id = document.getElementById('grupo_id').value;
   
    var cliente_id = document.getElementById('cliente_id').value;
    if(cliente_id == 0 || credito_monto=='' || credito_monto==null){
 alert("Debe ingresar Cliente y monto de Credito");
 

}else{


     $.ajax({url: controlador,
           type:"POST",
           data:{credito_monto:credito_monto,credito_interes:credito_interes,credito_comision:credito_comision,
            credito_custodia:credito_custodia,credito_fechalimite:credito_fechalimite,credito_cuotas:credito_cuotas,
            cliente_id:cliente_id,tipo_credito:tipo_credito,tipo_interes:tipo_interes,tipo_garantia:tipo_garantia,usuario_id:usuario_id,cliente_nombre:cliente_nombre,
            cliente_apellido:cliente_apellido,cliente_telefono:cliente_telefono, grupo_id:grupo_id},
           success:function(respuesta){ 
            //location.href = base_url+'credito/individual';
             },
            
            });  
           
}
}

function mostrar_grupo(){
//    var grupo_id = document.getElementById('grupo_id').value;
//    var base_url = document.getElementById('base_url').value;
//    var controlador = base_url + 'grupo/buscar_integrante/'+grupo_id;
            
            
     $.ajax({url: controlador,
           type:"POST",
           data:{grupo_id:grupo_id},
           
           success:function(respuesta){ 
               var registro = JSON.parse(respuesta);               
              
           },
            
            });         
}

function mostrar_integrantes(){
    
     var base_url = document.getElementById('base_url').value;    
     var grupo_id = document.getElementById('grupo_id').value;
     var controlador = base_url+'grupo/buscar_integrantes/'+grupo_id;
     
     //alert(grupo_id);
      $.ajax({url: controlador,
           type:"POST",
           data:{grupo_id:grupo_id},
           success:function(respuesta){     
                              
               var registros =  JSON.parse(respuesta);
                //alert('jola mundo');
               if (registros != null){                   
                   
                    var limite = registros.length; //tamaño del arreglo de la consulta                   
                    var suma = Number(0);                    
                    html = "";
                    
                    for (var i = 0; i < limite ; i++){
                     	suma += Number(registros[i]["integrante_montosolicitado"]);
                        html += "<tr>";
                        html += "<td>"+(i+1)+"</td>";
                        html += "<td><b>"+registros[i]["cliente_apellido"]+", "+registros[i]["cliente_nombre"]+"</b></td>";
                        html += "<td><b>"+registros[i]["cliente_ci"]+" "+registros[i]["cliente_extencionci"]+"</b></td>";
                        html += "<td><b>"+registros[i]["integrante_cargo"]+"</b></td>";
                        html += "<td align='right'><b>"+Number(registros[i]["integrante_montosolicitado"]).toFixed(2)+"</b></td>";
                        html += "</tr>";
                       }
                       html += "<tr>";
                       html += "<td></td>";
                      
                       html += "<td></td>";
                       html += "<td></td>";
                       html += "<td></td>";
                       html += "<th align='right'>"+suma.toFixed(2)+"</th>";
                       html += "</tr>";
                        //$('#cotizacion_total').value(total_detalle.toFixed(2));
                       $("#tabla_integrantes").html(html);
                      // totality(total_detalle);
            }
            
            
            $("#credito_montototal").val(suma.toFixed(2));
            $("#grupo_integrantes").val(registros[0]["grupo_integrantes"]);
            $("#tipocredito_id").val("GRUPAL");
            $("#grupo").val(respuesta); 
            
        },
        error:function(respuesta){
          
       
   }
    });

}


function registrar_credito(){
    
    var base_url = document.getElementById('base_url').value;    
    var grupo_id = document.getElementById('grupo_id').value;
    var controlador = base_url+'grupo/buscar_integrantes/'+grupo_id;
    var integrante = JSON.parse(document.getElementById('grupo').value);
    
     
    var tam = integrante.length;
    
    for(i=0;i<tam;i++){
        $("#cliente_id").val(integrante[i].cliente_id);
        $("#cliente_ci").val(integrante[i].cliente_ci);
        $("#cliente_nombre").val(integrante[i].cliente_nombre);
        $("#cliente_apellido").val(integrante[i].cliente_apellido);
        $("#cliente_telefono").val(integrante[i].cliente_telefono);
        $("#credito_monto").val(integrante[i].integrante_montosolicitado);        
        //$("#credito_cuotas").val(integrante[i].grupo_cuotas);        
        
        finalizarindividual();
        
        //alert(integrante[i].cliente_nombre);
        
    }
    alert('Credito registrado con éxito..!');
    

}