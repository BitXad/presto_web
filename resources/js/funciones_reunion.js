$(document).on("ready",inicio);
function inicio(){
    var reunion_id = document.getElementById('idreunion_id').value;
    tablaresultadosreunion(reunion_id);
       //sumarpagados();
}

/* ****************Anular todos los detalles de servicio*************** */
function asistencia(asistencia, integrante_id, reunion_id){
    var base_url = document.getElementById('base_url').value;
    var controlador = base_url+'reunion/registrar_asistencia';
    $.ajax({url: controlador,
           type:"POST",
           data:{asistencia:asistencia, integrante_id:integrante_id, reunion_id:reunion_id},
           success:function(respuesta){
               
               var registros =  JSON.parse(respuesta);
               if (registros != null){
             /*       if(registros == "R"){
                        var estegrupo_tiempotolerancia = document.getElementById('estegrupo_tiempotolerancia').value;
                        var estareunion_hora           = document.getElementById('estareunion_hora').value;
                        var d = new Date();
                        */
                        //var hora = moment(d).format("HH:mm:ss");
                     //   var hora = new Date(estareunion_hora);
                     //   var res = moment.duration(d.diff(hora)).humanize();
                        /*var ms = moment(d,"DD/MM/YYYY HH:mm:ss").diff(moment(estareunion_hora,"DD/MM/YYYY HH:mm:ss"));
                        var dh = moment.duration(ms);
                        var s = dh.format("hh:mm:ss");*/
                      //  alert(res);
                        /*var res = moment(moment.duration(d.diff(estareunion_hora))).format("HH:mm:ss")
                        dayObj2.minutes = moment(dayObj2.endDate).diff(moment(dayObj2.startDate), 'minutes');
                        */
                        
                        //alert(s);
                        //$("#asistencia_retraso"+integrante_id).val();
                 //   }
                   tablaresultadosreunion(reunion_id);
               }
        }
        
    });
}
//Tabla resultados de la reunion de grupo
function tablaresultadosreunion(reunion_id)
{
    var controlador = "";
    var base_url = document.getElementById('base_url').value;
    var grupo_id = document.getElementById('idgrupo_id').value;
    var reunion_numero = document.getElementById('estareunion_numero').value;
    
    controlador = base_url+'reunion/getreunion';
    document.getElementById('loader').style.display = 'block'; //muestra el bloque del loader
    
    $.ajax({url: controlador,
           type:"POST",
           data:{reunion_id:reunion_id, grupo_id:grupo_id, reunion_numero:reunion_numero},
           success:function(respuesta){
               
               // $("#encontrados").val("- 0 -");
               var registros =  JSON.parse(respuesta);
                
               if (registros != null){
                    var n = registros.length; //tamaño del arreglo de la consulta
                    //$("#encontrados").val("- "+n+" -");
                    var totalp = 0;
                    var totalr = 0;
                    var totale = 0;
                    var totalf = 0;
                    var totall = 0;
                    var totalapagar = 0;
                    var totalpagado = 0;
                    var totalahorro = 0;
                    var totalretraso = 0;
                    var totalfaltas = 0;
                    var totalenvio = 0;
                    html = "";
                    for (var i = 0; i < n ; i++){
                        totalahorro = Number(totalahorro) + Number(registros[i]['asistencia_ahorro']);
                        html += "<tr>";
                        html += "<td>"+(i+1)+"</td>";
                        html += "<td>";
                        html += "<span class='text-bold' style='font-size:12px'>"+registros[i]["elcliente"]+"</span><br>";
                        html += "<b>C.I.: </b>"+registros[i]["cliente_ci"]+" "+registros[i]["cliente_extencionci"]+"<br>"; 
                        var linea    = "";
                        var telefono = "";
                        var celular  = "";
                        if(registros[i]["cliente_telefono"]>0 && registros[i]["cliente_celular"]>0){
                            linea = "-";
                        }
                        if(registros[i]["cliente_telefono"]>0){
                            telefono = "<b>Telef.: </b>"+registros[i]["cliente_telefono"];
                        }
                        if(registros[i]["cliente_celular"]>0){
                            celular = "<b>Cel.: </b>"+registros[i]["cliente_celular"];
                        }
                        html += telefono+linea+celular;
                        html += "</td>";
                        html += "<td class='text-center'>";
                        html += "<select name='asistencia"+registros[i]["integrante_id"]+"' id='asistencia"+registros[i]["integrante_id"]+"' required onchange='asistencia(this.value, "+registros[i]["integrante_id"]+", "+reunion_id+")' >";
                        html += "<option value=''>-</option>";
                        var selected1 = "";
                        var selected2 = "";
                        var selected3 = "";
                        var selected4 = "";
                        var selected5 = "";
                        if(registros[i]["asistencia_registro"] == 'P'){
                            selected1="selected";
                            totalp = totalp+1;
                        }else if(registros[i]["asistencia_registro"] == 'R'){
                            selected2="selected";
                            totalr = totalr+1;
                        }else if(registros[i]["asistencia_registro"] == 'E'){
                            selected3="selected";
                            totale = totale+1;
                        }else if(registros[i]["asistencia_registro"] == 'F'){
                            selected4="selected";
                            totalf = totalf+1;
                        }else if(registros[i]["asistencia_registro"] == 'L'){
                            selected5="selected";
                            totall = totall+1;
                        }
                        html += "<option ";
                        html += selected1+" value='P'>PRESENTE</option>";
                        html += "<option ";
                        html += selected2+" value='R'>RETRASO</option>";
                        html += "<option ";
                        html += selected3+" value='E'>ENVIO</option>";
                        html += "<option ";
                        html += selected4+" value='F'>FALTA</option>";
                        html += "<option ";
                        html += selected5+" value='L'>LICENCIA</option>";
                        //html += "<option <?php echo $selected = (registros["asistencia_registro"] == 'F') ? ' selected='selected'' : ''; ?> value='F'>F</option>";
                        //html += "<option <?php echo $selected = (registros["asistencia_registro"] == 'P') ? ' selected='selected'' : ''; ?> value='P'>P</option>";
                        //html += "<option <?php echo $selected = (registros["asistencia_registro"] == 'R') ? ' selected='selected'' : ''; ?> value='R'>R</option>";
                        html += "</select>";
                        html += "</td>";
                        html += "<td class='text-right'>";
                        html += Number(registros[i]['integrante_montosolicitado']).toFixed(2);
                        html += "</td>";
                        html += "<td class='text-right'>";
                        html += Number(registros[i]["cuota_monto"]).toFixed(2);
                        html += "<input type='hidden' name='cuota_monto"+i+"' id='cuota_monto"+i+"' value='"+Number(registros[i]["cuota_monto"]).toFixed(2)+"' class='text-right' />";
                        html += "</td>";
                        html += "<td>";
                        //var asistencia_pagado = "0.00";
                        var asistencia_pagado = Number(registros[i]["cuota_monto"]).toFixed(2);
                        if(registros[i]["asistencia_pagado"] > 0){
                            totalpagado = Number(totalpagado) + Number(registros[i]['asistencia_pagado']);
                            asistencia_pagado = registros[i]["asistencia_pagado"];
                        }else{
                            totalpagado = Number(totalpagado) + Number(registros[i]["cuota_monto"]);
                        }
                        totalapagar = Number(totalapagar) + Number(registros[i]["cuota_monto"]);
                        html += "<input type='number' step='any' min='0' name='asistencia_pagado"+i+"' id='asistencia_pagado"+i+"' value='"+Number(asistencia_pagado).toFixed(2)+"' onchange='sumarpagados(); calcularahorro("+i+");' class='text-right' onclick='this.select();' />";
                        html += "</td>";
                        html += "<td>";
                        html += "<input type='number' step='any' min='0' name='asistencia_ahorro"+i+"' id='asistencia_ahorro"+i+"' value='"+Number(registros[i]["asistencia_ahorro"]).toFixed(2)+"' class='text-right' readonly />";
                        html += "</td>";
                        html += "<td>";
                        if(registros[i]["asistencia_registro"] == 'R'){
                            totalretraso = Number(totalretraso) + Number(registros[i]['asistencia_retraso']);
                        var retraso = "0.00";
                        if(registros[i]["asistencia_retraso"] > 0){
                            retraso = registros[i]["asistencia_retraso"];
                        }
                        html += "<input type='number' step='any' min='0' name='asistencia_retraso"+i+"' id='asistencia_retraso"+i+"' value='"+Number(retraso).toFixed(2)+"' onchange='sumaretrasos()' class='text-right' onclick='this.select();' />";
                        html += "<input type='number' name='asistencia_recibor"+i+"' id='asistencia_recibor"+i+"' class='text-right' value='"+registros[i]['asistencia_recibor']+"' />";
                        }else 
                        if(registros[i]["asistencia_registro"] == 'F'){
                            totalfaltas = Number(totalfaltas) + Number(registros[i]['asistencia_falta']);
                        var falta = "0.00";
                        if(registros[i]["asistencia_falta"] > 0){
                            falta = registros[i]["asistencia_falta"];
                        }
                        html += "<input type='number' step='any' min='0' name='asistencia_falta"+i+"' id='asistencia_falta"+i+"' value='"+Number(falta).toFixed(2)+"' onchange='sumarfaltas()' class='text-right' onclick='this.select();' />";
                        html += "<input type='number' name='asistencia_recibof"+i+"' id='asistencia_recibof"+i+"' class='text-right' value='"+registros[i]['asistencia_recibof']+"' />";
                        }else 
                        if(registros[i]["asistencia_registro"] == 'E'){
                            totalenvio = Number(totalenvio) + Number(registros[i]['grupo_multaenvio']);
                        var envio = "0.00";
                        if(registros[i]["grupo_multaenvio"] > 0){
                            envio = registros[i]["grupo_multaenvio"];
                        }
                        html += "<input type='number' step='any' min='0' name='asistencia_envio"+i+"' id='asistencia_envio"+i+"' value='"+Number(envio).toFixed(2)+"' onchange='sumarenvios()' class='text-right' onclick='this.select();' />";
                        html += "<input type='number' name='asistencia_reciboe"+i+"' id='asistencia_reciboe"+i+"' class='text-right' value='"+registros[i]['asistencia_recibof']+"' />";
                        }
                        html += "</td>";
                        html += "<td>";
                        html += "<a href='"+base_url+"multa/mismultas/"+registros[i]["cliente_id"]+"' class='btn btn-primary'><i class='fa fa-file-text'></i></a>";
                        html += "</td>";
                        html += "<td class='text-right'>";
                        html += "<span id='mitotalapagar'>";
                        html += registros[i]["cuota_monto"];
                        html += "</span>";
                        
                        /*if(registros[i]["asistencia_registro"] == 'F'){
                            totalfaltas = Number(totalfaltas) + Number(registros[i]['asistencia_falta']);
                        var falta = "0.00";
                        if(registros[i]["asistencia_falta"] > 0){
                            falta = registros[i]["asistencia_falta"];
                        }
                        html += "<input type='number' step='any' min='0' name='asistencia_falta"+i+"' id='asistencia_falta"+i+"' value='"+Number(falta).toFixed(2)+"' onchange='sumarfaltas()' class='text-right' onclick='this.select();' />";
                        html += "<input type='number' name='asistencia_recibof"+i+"' id='asistencia_recibof"+i+"' class='text-right' value='"+registros[i]['asistencia_recibof']+"' />";
                        }*/
                        html += "</td>";
                        html += "<td>";
                        var observacion = "";
                        if(registros[i]["asistencia_observacion"] != null){
                            observacion = registros[i]["asistencia_observacion"];
                        }
                        html += "<input style='width: 100%' type='text' name='observacion"+i+"' id='observacion"+i+"' value='"+observacion+"' />";
                        html += "<input type='hidden' name='integrante_id"+i+"' id='integrante_id"+i+"' value='"+registros[i]['integrante_id']+"' />";
                        html += "<input type='hidden' name='asistencia_cuota"+i+"' id='asistencia_cuota"+i+"' value='"+registros[i]['cuota_monto']+"' />";
                        html += "</td>";
                        html += "<td>";
                        html += "<a class='btn btn-success btn-xs'><i class='fa fa-dollar'></i></a>";
                        html += "</td>";
                        
                        html += "</tr>";
                   }
                   
                   
                   $("#tablaresultados").html(html);
                   $("#totalp").html(totalp);
                   $("#totalr").html(totalr);
                   $("#totalpr").html(Number(totalp)+Number(totalr));
                   $("#totale").html(totale);
                   $("#totall").html(totalf);
                   $("#totalf").html(totalf);
                   //$("#numclientes").val(n);
                   /*$("#totalretraso").html(totalretraso);
                   $("#totalfaltas").html(totalfaltas);*/
                   document.getElementById('loader').style.display = 'none';
                   //$("#totalmontoprestamo").html(Number(totalpagado).toFixed(2));
                   $("#totalapagar").html(Number(totalapagar).toFixed(2));
                   $("#totalpagado").val(Number(totalpagado).toFixed(2));
                   $("#totalahorro").val(Number(totalahorro).toFixed(2));
                   $("#totalretraso").val(Number(totalretraso).toFixed(2));
                   $("#totalfaltas").val(Number(totalfaltas).toFixed(2));
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

function calcularahorro(i){
    var cuota_monto = $("#cuota_monto"+i).val();
    var cuota_pagada = $("#asistencia_pagado"+i).val();
    $("#asistencia_ahorro"+i).val(Number(cuota_pagada)-Number(cuota_monto));
}
function sumarpagados(){
    var numclientes = $("#numclientes").val();
    var totalpagado = 0;
    var totalahorro = 0;
    for (var i = 0; i < numclientes; i++) {
        var cuota  = $("#cuota_monto"+i).val();
        var pagado = $("#asistencia_pagado"+i).val();
        var ahorro = Number(pagado) - Number(cuota);
        if(ahorro >0){
            $("#asistencia_ahorro"+i).val(Number(ahorro).toFixed(2));
            totalahorro = Number(totalahorro) + Number(ahorro);
        }
            totalpagado = Number(totalpagado) + Number(pagado);
    }
    $("#totalpagado").val(Number(totalpagado).toFixed(2));
    $("#totalahorro").val(Number(totalahorro).toFixed(2));
}

function sumaretrasos(){
    var numclientes = $("#numclientes").val();
    var totalretraso = 0;
    for (var i = 0; i < numclientes; i++) {
        var pagado = $("#asistencia_retraso"+i).val();
        if(pagado){
            totalretraso = Number(totalretraso) + Number(pagado);
        }
    }
    $("#totalretraso").val(totalretraso);
}
function sumarfaltas(){
    var numclientes = $("#numclientes").val();
    var totalfaltas = 0;
    for (var i = 0; i < numclientes; i++) {
        var pagado = $("#asistencia_falta"+i).val();
        if(pagado){
            totalfaltas = Number(totalfaltas) + Number(pagado);
        }
    }
    $("#totalfaltas").val(totalfaltas);
}

function sumarenvios(){
    var numclientes = $("#numclientes").val();
    var totalenvios = 0;
    for (var i = 0; i < numclientes; i++) {
        var pagado = $("#asistencia_envio"+i).val();
        if(pagado){
            totalenvios = Number(totalenvios) + Number(pagado);
        }
    }
    $("#totalfaltas").val(totalfaltas);
}