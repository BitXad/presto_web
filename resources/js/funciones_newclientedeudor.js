$(document).on("ready",inicio);
function inicio(){
    var grupo_id = document.getElementById('grupo_id').value;
    mostrar_integrantes(grupo_id);
}

function mostrar_integrantes(grupo_id){
    var base_url    = document.getElementById('base_url').value;
    var controlador = base_url+"grupo/buscar_integrantes/"+grupo_id;
     
    $.ajax({url: controlador,
           type:"POST",
           data:{},
            success:function(resul){
                var registros =  JSON.parse(resul);
                if (registros != null){
                    var n = registros.length; //tamaño del arreglo de la consulta
                    var total = 0;
                    html = "";
                    for (var i = 0; i < n ; i++){
                        total   = Number(total)  + Number(registros[i]['integrante_montosolicitado']);
                        html += "<tr>";
                      
                        html += "<td>"+(i+1)+"</td>";
                        html += "<td>";
                        html += "<font size='1'>"+registros[i]["cliente_nombre"]+" "+registros[i]["cliente_apellido"]+" </font>";
                        html += "</td>";
                        var direccion = "";
                        if(registros[i]["cliente_direccion"] != null){
                            direccion = registros[i]["cliente_direccion"];
                        }
                        html += "<td>"+direccion+"</td>";
                        
                        html += "<td>"+Number(registros[i]["integrante_montosolicitado"]).toFixed(2)+"</td>";
                        var categoria_nombre = "";
                        if(registros[i]["categoria_nombre"] != null){
                            categoria_nombre = registros[i]["categoria_nombre"];
                        }
                        html += "<td>"+categoria_nombre+"</td>";
                        html += "<td>"+registros[i]["integrante_cargo"]+"</td>";
                        //html += "<td>"+registros[i]["estado_descripcion"]+"</td>";
                        html += "<td class='no-print'>";
                        html += "<a href='"+base_url+"cliente/editar2/"+registros[i]["cliente_id"]+"/"+grupo_id+"' class='btn btn-info btn-xs' title='Modificar datos'><span class='fa fa-pencil'></span></a>";
                        html += "<a onclick='tablagarantia("+registros[i]["integrante_id"]+")' data-toggle='modal' data-target='#modalgarantia"+registros[i]["cliente_id"]+"' class='btn btn-soundcloud btn-xs' title='Ver/Registrar Garantia'><i class='fa fa-briefcase'></i></a>";
                        html += "<a href='"+base_url+"cliente/declaracionj/"+registros[i]["cliente_id"]+"' class='btn btn-primary btn-xs' target='_blank' title='Declaración jurada'><span class='fa fa-list-ul'></span></a>";
                        html += "<a class='btn btn-danger btn-xs' data-toggle='modal' data-target='#myModal"+registros[i]["integrante_id"]+"' title='Eliminar a Integrante de grupo'><span class='fa fa-trash'></span></a>";
                        
                        html += "<!------------------------ INICIO modal para confirmar eliminación ------------------->";
                        html += "<div class='modal fade' id='myModal"+registros[i]["integrante_id"]+"' tabindex='-1' role='dialog' aria-labelledby='myModalLabel"+registros[i]["integrante_id"]+"'>";
                        html += "<div class='modal-dialog' role='document'>";
                        html += "<br><br>";
                        html += "<div class='modal-content'>";
                        html += "<div class='modal-header'>";
                        html += "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>x</span></button>";
                        html += "</div>";
                        html += "<div class='modal-body'>";
                        html += "<!------------------------------------------------------------------->";
                        html += "<h3><b> <span class='fa fa-trash'></span></b>";
                        html += "¿Desea eliminar al Integrante <b> "+registros[i]["cliente_apellido"]+", "+registros[i]["cliente_nombre"]+"</b> ?";
                        html += "</h3>";
                        html += "<!------------------------------------------------------------------->";
                        html += "</div>";
                        html += "<div class='modal-footer aligncenter'>";
                        html += "<a href='"+base_url+"integrante/remove/"+registros[i]["integrante_id"]+"/"+grupo_id+"' class='btn btn-success'><span class='fa fa-check'></span> Si </a>";
                        html += "<a href='#' class='btn btn-danger' data-dismiss='modal'><span class='fa fa-times'></span> No </a>";
                        html += "</div>";
                        html += "</div>";
                        html += "</div>";
                        html += "</div>";
                        html += "<!------------------------ FIN modal para confirmar eliminación ------------------->";
                        
                        html += "<!------------------------ INICIO modal para registrar Garantia ------------------->";
                        html += "<div class='modal fade' id='modalgarantia"+registros[i]["cliente_id"]+"' tabindex='-1' role='dialog' aria-labelledby='modalgarantia"+registros[i]["cliente_id"]+"'>";
                        html += "<div class='modal-dialog' role='document'>";
                        html += "<br><br>";
                        html += "<div class='modal-content'>";
                        html += "<div class='modal-header text-center'>";
                        html += "<span style='font-size:12pt' class='text-bold'>NUEVA GARANTIA</span>";
                        html += "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>x</span></button>";
                        html += "</div>";
                        html += "<div class='modal-body'>";
                        html += "<!------------------------------------------------------------------->";
                        html += "<div class='col-md-12'>";
                        html += "<label for='garantia_descripcion"+registros[i]["cliente_id"]+"' class='control-label'><span class='text-danger'>*</span>Descripción</label>";
                        html += "<div class='form-group'>";
                        html += "<input type='text' name='garantia_descripcion"+registros[i]["cliente_id"]+"' class='form-control ' id='garantia_descripcion"+registros[i]["cliente_id"]+"' required onkeyup='var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);' onclick='this.select();' />";
                        html += "</div>";
                        html += "</div>";
                        html += "<div class='col-md-4'>";
                        html += "<label for='garantia_cantidad"+registros[i]["cliente_id"]+"' class='control-label'><span class='text-danger'>*</span>Cantidad</label>";
                        html += "<div class='form-group'>";
                        html += "<input type='number' step='any' min='0' name='garantia_cantidad"+registros[i]["cliente_id"]+"' class='form-control' id='garantia_cantidad"+registros[i]["cliente_id"]+"' required />";
                        html += "</div>";
                        html += "</div>";
                        html += "<div class='col-md-4'>";
                        html += "<label for='garantia_precio"+registros[i]["cliente_id"]+"' class='control-label'><span class='text-danger'>*</span>Precio</label>";
                        html += "<div class='form-group'>";
                        html += "<input type='number' step='any' min='0' name='garantia_precio"+registros[i]["cliente_id"]+"' class='form-control' id='garantia_precio"+registros[i]["cliente_id"]+"' required onchange='eltotal("+registros[i]["cliente_id"]+")' />";
                        html += "</div>";
                        html += "</div>";
                        html += "<div class='col-md-4'>";
                        html += "<label for='garantia_total"+registros[i]["cliente_id"]+"' class='control-label'><span class='text-danger'>*</span>Total</label>";
                        html += "<div class='form-group'>";
                        html += "<input type='number' step='any' min='0' name='garantia_total"+registros[i]["cliente_id"]+"' class='form-control' id='garantia_total"+registros[i]["cliente_id"]+"' readonly />";
                        html += "</div>";
                        html += "</div>";
                        html += "<div class='col-md-12'>";
                        html += "<label for='garantia_observacion"+registros[i]["cliente_id"]+"' class='control-label'>Observación</label>";
                        html += "<div class='form-group'>";
                        html += "<input type='text' name='garantia_observacion"+registros[i]["cliente_id"]+"' class='form-control' id='garantia_observacion"+registros[i]["cliente_id"]+"' onkeyup='var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);' />";
                        html += "</div>";
                        html += "</div>";
                        html += "<div id='garantias"+registros[i]["integrante_id"]+"'>";
                        html += "</div>";
                        html += "<!------------------------------------------------------------------->";
                        html += "</div>";
                        html += "<div class='modal-footer aligncenter'>";
                        html += "<a onclick='registrargarantia("+registros[i]["cliente_id"]+", "+registros[i]["integrante_id"]+", "+grupo_id+")' class='btn btn-success'><span class='fa fa-check'></span> Si </a>";
                        html += "<a href='#' class='btn btn-danger' data-dismiss='modal'><span class='fa fa-times'></span> No </a>";
                        html += "</div>";
                        html += "</div>";
                        html += "</div>";
                        html += "</div>";
                        html += "<!------------------------ FIN modal para Registrar Garantia ------------------->";
                        
                        html += "</td>";
                        
                        html += "<tr>";
                   }
                    $("#tablaresultados").html(html);
                    $("#restotal").text(Number(total).toFixed(2));
            }
                
        },
        error:function(resul){
          // alert("Algo salio mal...!!!");
           html = "";
           $("#detalleservicio").html(html);
        }
        
    });   

}



/* hace el registro rapido de un cliente/deudor */
function registrarnuevoclientedeudor(){
    var controlador = "";
    var base_url  = document.getElementById('base_url').value;
    var cliente_nombre   = document.getElementById('cliente_nombre').value;
    var grupo_id         = document.getElementById('grupo_id').value;
    var grupo_monto         = document.getElementById('grupo_monto').value;
    var cliente_apellido = document.getElementById('cliente_apellido').value;
    var integrante_monto1 = document.getElementById('integrante_monto1').value;
    controlador = base_url+'grupo/aniadir_newcliente';
    //$('#modalnewclientedeudor').modal('hide');
    $.ajax({url: controlador,
           type:"POST",
           data:{cliente_nombre:cliente_nombre, cliente_apellido:cliente_apellido,
                 integrante_monto1:integrante_monto1},
           success:function(respuesta){
               
               var registros =  JSON.parse(respuesta);
                
                if (registros != null){
                    $('#modalnewclientedeudor').modal('hide');
                    if(registros == "existe"){
                        alert("El cliente ya se encuentra Registrado, por favor verifique sus datos!.");
                    }else{
                        html = "";
                        html += "<option value='"+registros["cliente_id"]+"' selected >";
                        html += registros["cliente_apellido"]+", "+registros["cliente_nombre"]+" C.I.:"+registros["cliente_ci"];
                        html += "</option>";
                        $("#cliente_id").append(html);
                        $("#cliente_nombre").val("");
                        $("#cliente_apellido").val("");
                        $("#aviso_clientenew").text("");
                        registrarnuevointegrante(grupo_id, grupo_monto, 1);
                    }
                }else{
                    $("#aviso_clientenew").text("Nombre(s), Apellido(s) y Monto no deben estar en blanco");
                }
        },
        error:function(respuesta){
           html = "";
           $("#cliente_id").html(html);
        }
        
    });   

}
/* hace el registro a un grupo de un integrante, previa verificacion.. */
function registrarnuevointegrante(grupo_id, grupo_monto, origen){
    var controlador = "";
    var base_url  = document.getElementById('base_url').value;
    var cliente_id       = document.getElementById('cliente_id').value;
    var integrante_cargo = "";
    var integrante_monto = "";
    if(origen == 0){
        integrante_cargo = document.getElementById('integrante_cargo').value;
        integrante_monto = document.getElementById('integrante_monto').value;
    }else if(origen == 1){
        integrante_cargo = document.getElementById('integrante_cargo1').value;
        integrante_monto = document.getElementById('integrante_monto1').value;
    }
    /*var integrante_cargo = document.getElementById('integrante_cargo').value;
    var integrante_monto = document.getElementById('integrante_monto').value;*/
    controlador = base_url+'grupo/agregar_integrante';
    $.ajax({url: controlador,
           type:"POST",
           data:{cliente_id:cliente_id, integrante_cargo:integrante_cargo, integrante_monto:integrante_monto,
                 grupo_id:grupo_id, grupo_monto:grupo_monto},
           success:function(respuesta){
               
               var registros =  JSON.parse(respuesta);
                
                if (registros != null){
                    if(registros == "existe_integrante"){
                        alert("El cliente ya se encuentra Registrado en este grupo, por favor verifique sus datos!.");
                    }else if(registros == "grupo_lleno"){
                        alert("Este Grupo ya esta lleno");
                    }else if(registros == "monto_excedido"){
                        alert("El monto ingresado sobrepasa al monto solicitado por el grupo");
                    }else{
                        $('#cliente_id').find('option:first').attr('selected', 'selected').parent('select');
                        $('#integrante_cargo').find('option:first').attr('selected', 'selected').parent('select');
                        $("#integrante_monto").val("");
                        $('#integrante_cargo1').find('option:first').attr('selected', 'selected').parent('select');
                        $("#integrante_monto1").val("");
                        mostrar_integrantes(grupo_id);
                    }
            }else{
                alert("Debe seleccionar un cliente/monto Bs. no debe estar vacio");
                    //$("#aviso_integrantegrupo").text("Nombre(s) y Apellido(s) no deben estar en blanco");
                }
        },
        error:function(respuesta){
           html = "";
           $("#cliente_id").html(html);
        }
        
    });   

}

function eltotal(cliente_id){
    var cantidad  = document.getElementById('garantia_cantidad'+cliente_id).value;
    var precio    = document.getElementById('garantia_precio'+cliente_id).value;
    $("#garantia_total"+cliente_id).val(cantidad*precio);
}

function registrargarantia(cliente_id, integrante_id, grupo_id){
    var base_url    = document.getElementById('base_url').value;
    var descripcion = document.getElementById('garantia_descripcion'+cliente_id).value;
    var cantidad    = document.getElementById('garantia_cantidad'+cliente_id).value;
    var precio      = document.getElementById('garantia_precio'+cliente_id).value;
    var total       = document.getElementById('garantia_total'+cliente_id).value;
    var observacion = document.getElementById('garantia_observacion'+cliente_id).value;
    var controlador = base_url+"garantia/registrargarantia";
    $('#modalgarantia'+cliente_id).modal('hide');
    $.ajax({url: controlador,
           type:"POST",
           data:{integrante_id:integrante_id, descripcion:descripcion, cantidad:cantidad, precio:precio,
                 total:total, observacion:observacion},
            success:function(resul){
                var registros =  JSON.parse(resul);
                    
                if (registros != null){
                    if(registros == "ok"){
                    
                        mostrar_integrantes(grupo_id);
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

function tablagarantia(integrante_id){
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
                        $("#garantias"+integrante_id).html(html);
          }  
        },
        error:function(respuesta){
          
       
   }
    });

}