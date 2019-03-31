$(document).on("ready",inicio);
function inicio(){
    var reunion_id = document.getElementById('idreunion_id').value;
       tablaresultadosreunion(reunion_id);
}

/* ****************Anular todos los detalles de servicio*************** */
function asistencia(asistencia, cliente_id, reunion_id){
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'reunion/registrar_asistencia';
    $.ajax({url: controlador,
           type:"POST",
           data:{asistencia:asistencia, cliente_id:cliente_id, reunion_id:reunion_id},
           success:function(respuesta){
               
               var registros =  JSON.parse(respuesta);
               if (registros != null){
                    if("ok"){
                       tablaresultadosreunion(reunion_id);
                   }
               }
        }
        
    });
}
//Tabla resultados de la reunion de grupo
function tablaresultadosreunion(reunion_id)
{
    var controlador = "";
    var parametro = "";
    var base_url = document.getElementById('base_url').value;
    
    controlador = base_url+'reunion/getreunion';       
    document.getElementById('loader').style.display = 'block'; //muestra el bloque del loader
    
    $.ajax({url: controlador,
           type:"POST",
           data:{reunion_id:reunion_id},
           success:function(respuesta){
               
               // $("#encontrados").val("- 0 -");
               var registros =  JSON.parse(respuesta);
                
               if (registros != null){
                    var n = registros.length; //tamaño del arreglo de la consulta
                    //$("#encontrados").val("- "+n+" -");
                    var totala = 0;
                    var totalf = 0;
                    var totalp = 0;
                    var totalr = 0;
                    /*var totalpagado = 0;
                    var totalretraso = 0;
                    var totalfaltas = 0; */
                    html = "";
                    for (var i = 0; i < n ; i++){
                        html += "<tr>";
                        html += "<td>"+(i+1)+"</td>";
                        html += "<td>";
                        html += registros[i]["elcliente"]+"<br>";
                        html += "<b>C.I.: </b>"+registros[i]["cliente_ci"]+" "+registros[i]["cliente_extencionci"]; 
                        var linea    = "";
                        var telefono = "";
                        var celular  = "";
                        if(registros[i]["cliente_telefono"]>0 && registros[i]["cliente_celular"]>0){
                            linea = "-";
                        }
                        html += "</td>";
                        html += "<td class='text-center'>";
                        html += "<select name='asistencia"+i+"' id='asistencia"+i+"' required onchange='asistencia(this.value, "+registros[i]["cliente_id"]+", "+reunion_id+")' >";
                        html += "<option value=''>-</option>";
                        var selected1 = "";
                        var selected2 = "";
                        var selected3 = "";
                        var selected4 = "";
                        if(registros[i]["asistencia_registro"] == 'A'){
                            selected1="selected";
                            totala = totala+1;
                        }else if(registros[i]["asistencia_registro"] == 'F'){
                            selected2="selected";
                            totalf = totalf+1;
                        }else if(registros[i]["asistencia_registro"] == 'P'){
                            selected3="selected";
                            totalp = totalp+1;
                        }else if(registros[i]["asistencia_registro"] == 'R'){
                            selected4="selected";
                            totalr = totalr+1;
                        }
                        html += "<option ";
                        html += selected1+" value='A'>A</option>";
                        html += "<option ";
                        html += selected2+" value='F'>F</option>";
                        html += "<option ";
                        html += selected3+" value='P'>P</option>";
                        html += "<option ";
                        html += selected4+" value='R'>R</option>";
                        //html += "<option <?php echo $selected = (registros["asistencia_registro"] == 'F') ? ' selected='selected'' : ''; ?> value='F'>F</option>";
                        //html += "<option <?php echo $selected = (registros["asistencia_registro"] == 'P') ? ' selected='selected'' : ''; ?> value='P'>P</option>";
                        //html += "<option <?php echo $selected = (registros["asistencia_registro"] == 'R') ? ' selected='selected'' : ''; ?> value='R'>R</option>";
                        html += "</select>";
                        html += "</td>";
                        html += "<td class='text-right'>";
                        html += Number(registros[i]["cuota_monto"]).toFixed(2);
                        html += "</td>";
                        html += "<td>";
                        if(registros[i]["asistencia_registro"] == 'A' || registros[i]["asistencia_registro"] == 'R'){
                        html += "<input type='number' step='any' min='0' max='"+registros[i]["cuota_monto"]+"' name='lacuota"+i+"' id='lacuota"+i+"' value='"+registros[i]["cuota_monto"]+"' class='text-right' onclick='this.select();' />";
                        }
                        html += "</td>";
                        html += "<td>";
                        if(registros[i]["asistencia_registro"] == 'R'){
                        html += "<input type='number' step='any' min='0' name='retraso"+i+"' id='retraso"+i+"' value='0.00' class='text-right' onclick='this.select();' />";
                        html += "<input type='number' name='multa_numrecr"+i+"' id='multa_numrecr"+i+"' />";
                        }
                        html += "</td>";
                        html += "<td>";
                        if(registros[i]["asistencia_registro"] == 'F'){
                        html += "<input type='number' step='any' min='0' name='falta"+i+"' id='falta"+i+"' value='0.00' class='text-right' onclick='this.select();' />";
                        html += "<input type='number' name='multa_numrecf"+i+"' id='multa_numrecf"+i+"' />";
                        }
                        html += "</td>";
                        html += "<td>";
                        html += "<input style='width: 100%' type='text' name='observaciones"+i+"' id='observaciones"+i+"' />";
                        html += "<input type='hidden' name='cliente_id"+i+"' id='cliente_id"+i+"' />";
                        html += "</td>";
                        
                        html += "</tr>";
                   }
                   
                   
                   $("#tablaresultados").html(html);
                   $("#totala").html("A = "+totala);
                   $("#totalf").html("F = "+totalf);
                   $("#totalp").html("P = "+totalp);
                   $("#totalr").html("R = "+totalr);
                   $("#numclientes").val(n);
                   /*$("#totalretraso").html(totalretraso);
                   $("#totalfaltas").html(totalfaltas);*/
                   document.getElementById('loader').style.display = 'none';
            }
         document.getElementById('loader').style.display = 'none'; //ocultar el bloque del loader
        },
        error:function(respuesta){
           // alert("Algo salio mal...!!!");
           html = "";
           $("#tablaresultados").html(html);
        },
        complete: function (jqXHR, textStatus) {
            document.getElementById('loader').style.display = 'none'; //ocultar el bloque del loader 
            //tabla_inventario();
        }
        
    });   

}
