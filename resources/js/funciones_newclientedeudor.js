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
                        html += "<td id='horizontal'>";
                        html += "<font size='1'>"+registros[i]["cliente_apellido"]+", "+registros[i]["cliente_nombre"]+"</font><br>";
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
                        html += "<a href='"+base_url+"cliente/declaracionj/"+registros[i]["cliente_id"]+"' class='btn btn-primary btn-xs' target='_blank' title='Declaración jurada'><span class='fa fa-list-ul'></span></a>";
                        html += "<a href='"+base_url+"integrante/remove/"+registros[i]["integrante_id"]+"/"+grupo_id+"' class='btn btn-danger btn-xs' title='Eliminar a Cliente de grupo'><span class='fa fa-trash'></span></a>";
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
    var cliente_apellido = document.getElementById('cliente_apellido').value;
    controlador = base_url+'grupo/aniadir_newcliente';
    //$('#modalnewclientedeudor').modal('hide');
    $.ajax({url: controlador,
           type:"POST",
           data:{cliente_nombre:cliente_nombre, cliente_apellido:cliente_apellido},
           success:function(respuesta){
               
               var registros =  JSON.parse(respuesta);
                
                if (registros != null){
                    $('#modalnewclientedeudor').modal('hide');
                    if(registros == "existe"){
                        alert("El cliente ya se encuentra Registrado, por favor verifique sus datos!.");
                    }else{
                        html = "";
                        html += "<option value='"+registros["cliente_id"]+"' selected >";
                        html += registros["cliente_apellido"]+", "+registros["cliente_nombre"];
                        html += "</option>";
                        $("#cliente_id").append(html);
                        $("#cliente_nombre").val("");
                        $("#cliente_apellido").val("");
                        $("#aviso_clientenew").text("");
                    }
                }else{
                    $("#aviso_clientenew").text("Nombre(s) y Apellido(s) no deben estar en blanco");
                }
        },
        error:function(respuesta){
           html = "";
           $("#cliente_id").html(html);
        }
        
    });   

}
/* hace el registro a un grupo de un integrante, previa verificacion.. */
function registrarnuevointegrante(grupo_id, grupo_monto){
    var controlador = "";
    var base_url  = document.getElementById('base_url').value;
    var cliente_id       = document.getElementById('cliente_id').value;
    var integrante_cargo = document.getElementById('integrante_cargo').value;
    var integrante_monto = document.getElementById('integrante_monto').value;
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

/*
function registrarnuevacategoria(){
    var controlador = "";
    var base_url  = document.getElementById('base_url').value;
    var parametro = document.getElementById('nueva_categoria').value;
    controlador = base_url+'producto/aniadircategoria/';
    $('#modalcategoria').modal('hide');
    $.ajax({url: controlador,
           type:"POST",
           data:{parametro:parametro},
           success:function(respuesta){
               
               var registros =  JSON.parse(respuesta);
                
               if (registros != null){
                    html = "";
                    html += "<option value='"+registros["categoria_id"]+"' selected >";
                    html += registros["categoria_nombre"];
                    html += "</option>";
                    $("#categoria_id").append(html);
            }
        },
        error:function(respuesta){
           html = "";
           $("#categoria_id").html(html);
        }
        
    });   

}
*/