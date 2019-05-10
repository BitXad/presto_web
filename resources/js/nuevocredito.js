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
    document.getElementById('loader').style.display = 'block'; //muestra el bloque del loader
    document.getElementById('boton').style.display = 'none'; //ocultar el bloque del loader 
    var base_url    = document.getElementById('base_url').value;
    var usuario_id    = document.getElementById('usuario_id').value;
    var controlador = base_url+'credito/finalizar/';   
    var credito_monto = document.getElementById('credito_monto').value;
    var credito_interes = document.getElementById('credito_interes').value;
    var credito_comision = document.getElementById('credito_comision').value;
    var credito_custodia = document.getElementById('credito_custodia').value;
    var modo = document.getElementById('modo').value;
    var credito_fechalimite = document.getElementById('credito_fechalimite').value;
    var credito_cuotas = document.getElementById('credito_cuotas').value;
    var tipo_credito = 2;
    var tipo_interes = document.getElementById('tipoint_id').value;
    var tipo_garantia = document.getElementById('tipogarant_id').value;
    var cliente_nombre = document.getElementById('cliente_nombre').value;
    var cliente_apellido = document.getElementById('cliente_apellido').value;
    var cliente_telefono = document.getElementById('cliente_telefono').value;
    var cuota_parcial = document.getElementById('cuota_parcial').value;
    var cuota_interes = document.getElementById('cuota_interes').value;
   
    var cliente_id = document.getElementById('cliente_id').value;
    if(cliente_id == 0 || credito_monto=='' || credito_monto==null){
 alert("Debe ingresar Cliente y monto de Credito");
 

}else{


     $.ajax({url: controlador,
           type:"POST",
           data:{credito_monto:credito_monto,credito_interes:credito_interes,credito_comision:credito_comision,
            credito_custodia:credito_custodia,credito_fechalimite:credito_fechalimite,credito_cuotas:credito_cuotas,
            cliente_id:cliente_id,tipo_credito:tipo_credito,tipo_interes:tipo_interes,tipo_garantia:tipo_garantia,usuario_id:usuario_id,cliente_nombre:cliente_nombre,
            cliente_apellido:cliente_apellido,cliente_telefono:cliente_telefono,modo:modo,cuota_parcial:cuota_parcial,cuota_interes:cuota_interes},
           success:function(respuesta){

             location.href = base_url+'credito/individual';
             },
            
            });  
           
}
}

function ocultar(){
               
                     var value = document.getElementById('modo').value;
                     var limite = document.getElementById('credito_fechalimite').value;
                     var today = new Date();
                     var monto = document.getElementById('credito_monto').value;
                     var credito_interes = document.getElementById('credito_interes').value;
                     var credito_comision = document.getElementById('credito_comision').value;
                     var credito_custodia = document.getElementById('credito_custodia').value;
                     var suma = Number(credito_custodia + credito_comision + credito_interes);
                     //var hoy = moment(today).format("YYYY-MM-DD");
                     html = "";
                     html2 = "";
                     var diff = moment(limite).diff(moment(today), 'days');
                     if (value==1) {
                      document.getElementById('diaria').style.display = 'block';
                      
                      html += "Fecha Limite Credito:";
                     
                      html2 += "<div class='input-group no-print'> <span class='input-group-addon'>Numero Cuotas:</span><input type='text' name='credito_cuotas' class='form-control' value='"+Number(diff)+"' id='credito_cuotas' readonly /></div>";
                      
                      $('#cuota_parcial').val(Number(monto/diff).toFixed(2));
                      $('#cuota_interes').val(Number(monto/suma/diff).toFixed(2));
                      $('#cuota_fija').val(Number((monto/diff)+(monto/suma/diff)).toFixed(2));
                      $('#fechinga').html(html);
                      $('#cuotas').html(html2);
                      }else if (value==2) {
                      var intervalo = Number($('#intervalo').val()).toFixed(2);
                      document.getElementById('diaria').style.display = 'block';
                      document.getElementById('intervalos').style.display = 'block';
                      
                      
                      html += "Fecha Limite Credito:";
                     
                      
                      html2 += "<div class='input-group no-print'> <span class='input-group-addon'>Numero Cuotas:</span><input type='text' name='credito_cuotas' class='form-control' value='"+Number(diff/intervalo).toFixed(2)+"' id='credito_cuotas' readonly /></div>";
                      
                      $('#cuota_parcial').val(Number(monto/diff*intervalo).toFixed(2));
                      $('#cuota_parcial').val(Number(monto/diff*intervalo).toFixed(2));
                      $('#cuota_interes').val(Number(monto/suma/diff*intervalo).toFixed(2));
                      $('#cuota_fija').val(Number((monto/diff)+(monto/suma/diff)).toFixed(2));
                      $('#credito_cuotas').val(diff/intervalo);
                      $('#fechinga').html(html);
                      $('#cuotas').html(html2);
                      } else {
                      document.getElementById('diaria').style.display = 'none';
                      document.getElementById('intervalos').style.display = 'none'
                     html += "Fecha Primer Pago:";
                     
                     html2 += "<div class='input-group no-print'> <span class='input-group-addon'>Numero Cuotas:</span><select name='credito_cuotas' id='credito_cuotas'class='form-control'  ><option value='0'>Sin Limite de Tiempo</option><option value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option><option value='5'>5</option><option value='6'>6</option><option value='7'>7</option><option value='8'>8</option><option value='9'>9</option><option value='10'>10</option><option value='11'>11</option><option value='12'>12</option><option value='13'>13</option><option value='14'>14</option><option value='15'>15</option><option value='16'>16</option><option value='17'>17</option><option value='18'>18</option><option value='19'>19</option><option value='20'>20</option><option value='21'>21</option><option value='22'>22</option><option value='23'>23</option><option value='24'>24</option><option value='25'>25</option><option value='26'>26</option><option value='27'>27</option><option value='28'>28</option><option value='29'>29</option><option value='30'>30</option><option value='31'>31</option><option value='32'>32</option><option value='33'>33</option><option value='34'>34</option><option value='35'>35</option><option value='36'>36</option></select></div>";
                     $('#fechinga').html(html);
                    $('#cuotas').html(html2);
                   }


                    
                
      }      