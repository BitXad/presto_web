$(document).on("ready",inicio);
function inicio(){
       tablaresultadoscliente(1);
}

function imprimir_cliente(){
    var estafh = new Date();
    $('#fhimpresion').html(formatofecha_hora_ampm(estafh));
    $("#cabeceraprint").css("display", "");
    window.print();
    $("#cabeceraprint").css("display", "none");
}
/*aumenta un cero a un digito; es para las horas*/
function aumentar_cero(num){
    if (num < 10) {
        num = "0" + num;
    }
    return num;
}
/* recibe Date y devuelve en formato dd/mm/YYYY hh:mm:ss ampm */
function formatofecha_hora_ampm(string){
    var mifh = new Date(string);
    var info = "";
    var am_pm = mifh.getHours() >= 12 ? "p.m." : "a.m.";
    var hours = mifh.getHours() > 12 ? mifh.getHours() - 12 : mifh.getHours();
    if(string != null){
       info = aumentar_cero(mifh.getDate())+"/"+aumentar_cero((mifh.getMonth()+1))+"/"+mifh.getFullYear()+" "+aumentar_cero(hours)+":"+aumentar_cero(mifh.getMinutes())+":"+aumentar_cero(mifh.getSeconds())+" "+am_pm;
   }
    return info;
}
/*
 * Funcion que buscara productos en la tabla productos
 */
function buscarcliente(e) {
  tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==13){
        tablaresultadoscliente(2);
    }
}
/* Funcion que muestra a todos los clientes */
function mostrar_all_clientes() {
    tablaresultadoscliente(3);
}

//Tabla resultados de la busqueda en el index de cliente
function tablaresultadoscliente(limite)
{
    var controlador = "";
    var parametro = "";
    var limit = limite;
    var lim = "";
    var base_url = document.getElementById('base_url').value;
    
    if(limit == 1){
        lim = "LIMIT 50";
        controlador = base_url+'cliente/buscarclientesparam/';
    }else if(limit == 3){
        lim = "";
        controlador = base_url+'cliente/buscarclientesparam/';
    }else{
        controlador = base_url+'cliente/buscarclientesparam/';
        var estadocivil   = document.getElementById('estadocivil_id').value;
        var categoria        = document.getElementById('categoria_id').value;
        var asesor        = document.getElementById('asesor_id').value;
        var estado      = document.getElementById('estado_id').value;
        var categoriaestado = "";
        var estadociviltext   = "";
        var categoriatext   = "";
        var asesortext   = "";
        var estadotext   = "";
        if(estadocivil == 0){
           categoriaestado = "";
        }else{
           categoriaestado += " and c.estadocivil_id = ec.estadocivil_id and c.estadocivil_id = "+estadocivil+" ";
           estadociviltext = $('select[name="estadocivil_id"] option:selected').text();
           estadociviltext = "Estado Civil: "+estadociviltext;
        }
        if(categoria == 0){
           categoriaestado += "";
        }else{
           categoriaestado += " and c.categoria_id = cc.categoria_id and c.categoria_id = "+categoria+" ";
           categoriatext = $('select[name="categoria_id"] option:selected').text();
           categoriatext = "Categoria: "+categoriatext;
        }
        if(asesor == 0){
           categoriaestado += "";
        }else{
           categoriaestado += " and c.asesor_id = a.asesor_id and c.asesor_id = "+asesor+" ";
           asesortext = $('select[name="asesor_id"] option:selected').text();
           asesortext = "Asesor: "+asesortext;
        }
        if(estado == 0){
           categoriaestado += "";
        }else{
           categoriaestado += " and c.estado_id = "+estado+" ";
           estadotext = $('select[name="estado_id"] option:selected').text();
           estadotext = "Estado: "+estadotext;
        }
        
        $("#busquedacategoria").html(estadociviltext+" "+categoriatext+" "+asesortext+" "+estadotext);
        
        parametro = document.getElementById('filtrar').value;
        
    }        
    document.getElementById('loader').style.display = 'block'; //muestra el bloque del loader
    

    $.ajax({url: controlador,
           type:"POST",
           data:{parametro:parametro, categoriaestado:categoriaestado, limit:lim},
           success:function(respuesta){
               
                                     
                $("#encontrados").val("- 0 -");
               var registros =  JSON.parse(respuesta);
                
               if (registros != null){
                    var n = registros.length; //tamaño del arreglo de la consulta
                    $("#encontrados").val("- "+n+" -");
                    html = "";
                    var colorbaja = "";
                    for (var i = 0; i < n ; i++){
                        colorbaja = "style='background-color:"+registros[i]["estado_color"]+"'";
                        html += "<tr "+colorbaja+">";
                        
                        html += "<td>"+(i+1)+"</td>";
                        html += "<td><div id='horizontal'>";
                        html += "<div id='contieneimg'>";
                        var mimagen = "";
                        if(registros[i]["cliente_foto"] != null && registros[i]["cliente_foto"] !=""){
                            mimagen += "<a class='btn  btn-xs' data-toggle='modal' data-target='#mostrarimagen"+i+"' style='padding: 0px;'>";
                            mimagen += "<img src='"+base_url+"resources/images/clientes/thumb_"+registros[i]["cliente_foto"]+"' class='img img-circle' width='50' height='50' />";
                            mimagen += "</a>";
                            //mimagen = nomfoto.split(".").join("_thumb.");
                        }else{
                            mimagen = "<img src='"+base_url+"resources/images/thumb_default.jpg' class='img img-circle' width='50' height='50' />";
                        }
                        var neg = "";
                        var dir = "";
                        var lati = "";
                        var long = "";
                        var corr = "";
                        var fnac = "";
                        var codigo = "";
                        var telef = "";
                        var celular = "";
                        /*if(registros[i]["cliente_nombrenegocio"] != null){
                            neg = registros[i]["cliente_nombrenegocio"];
                        }*/
                        if(registros[i]["cliente_direccion"] != null){
                            dir = registros[i]["cliente_direccion"];
                        }
                        if(registros[i]["cliente_latitud"] != null){
                            lati = registros[i]["cliente_latitud"];
                        }
                        if(registros[i]["cliente_longitud"] != null){
                            long = registros[i]["cliente_longitud"];
                        }
                        if(registros[i]["cliente_email"] != null){
                            corr = registros[i]["cliente_email"];
                        }
                        if(registros[i]["cliente_fechanac"] != "0000-00-00" && registros[i]["cliente_fechanac"] != null){
                            fnac = "<b>F. Nac.:</b> "+moment(registros[i]["cliente_fechanac"]).format("DD/MM/YYYY");
                        }
                        var vencimiento= ""
                        if(registros[i]['cliente_fechavenc'] != "0000-00-00" && registros[i]["cliente_fechavenc"] != null){
                            vencimiento = "<b>Vence:</b> "+moment(registros[i]["cliente_fechavenc"]).format("DD/MM/YYYY");
                        }
                        var sexo="";
                        if(registros[i]["cliente_sexo"] != null && registros[i]["cliente_fechanac"] != ""){
                            sexo="<b> Sexo: </b>"+registros[i]['cliente_sexo'];
                        }
                        if(registros[i]["cliente_codigo"] != null && registros[i]["cliente_codigo"] != ""){
                            codigo = registros[i]["cliente_codigo"];
                        }
                        if(registros[i]["cliente_telefono"] != null && registros[i]["cliente_telefono"] != ""){
                            telef = registros[i]["cliente_telefono"];
                        }
                        if(registros[i]["cliente_celular"] != null && registros[i]["cliente_celular"] != ""){
                            celular = registros[i]["cliente_celular"];
                        }
                        var linea = "";
                        if(telef>0 && celular>0){
                            linea = "-";
                        }
                        //html += "<img src='"+base_url+"/resources/images/"+mimagen+"' />";
                        var estadocivil="";
                        if(registros[i]["estadocivil_id"] != null && registros[i]["estadocivil_id"] != 0 && registros[i]["estadocivil_id"] != ""){
                            estadocivil = "<b>Est. Civil: </b>"+registros[i]["estadocivil_nombre"];
                        }
                        var apcasado = "";
                       if(registros[i]["cliente_apcasado"] != null && registros[i]["cliente_apcasado"] != ""){
                           apcasado = " de "+registros[i]["cliente_apcasado"];
                       }
                        html += mimagen;
                        html += "</div>";
                        html += "<div style='padding-left: 4px'>";
                        html += "<b id='masg'>"+registros[i]["cliente_nombre"]+" "+registros[i]["cliente_apellido"]+apcasado+"</b><br>";
                        html += "<b>Codigo: </b>"+codigo+" "+fnac+sexo+"<br>";
                        html += "<b>"+registros[i]['cliente_tipodoc']+": </b>"+registros[i]["cliente_ci"]+" "+registros[i]["cliente_extencionci"]+" "+vencimiento;
                        html += "<br>"+estadocivil;
                        html+= "<br>";
                        html += "<b>Tel.: </b>"+telef+linea+celular;
                        html += "<br><b>Tipo Vivienda: </b>"+registros[i]['cliente_tipovivienda'];
                        html += " <b>Pertenencia Dom.: </b>"+registros[i]['cliente_pertenenciadom'];
                        html += "<br><b>Pertenencia Tiempo: </b>"+registros[i]['cliente_pertenenciatiempo'];
                        html += " <b>Num. Hijos: </b>"+registros[i]['cliente_numhijos'];
                        html += "</div>";
                        html += "</div>";
                        html += "</td>";
                        html += "<td>";
                        if(registros[i]['cliente_conyuge']){
                            html += "<b>Conyuge: </b>"+registros[i]['cliente_conyuge'];
                        }
                        if(registros[i]['conyuge_ci']){
                            html += "<br><b>Dcto.: </b>"+registros[i]['conyuge_ci'];
                        }
                        if(registros[i]['conyuge_telef']){
                            html += "<br><b>Telef: </b>"+registros[i]['conyuge_telef'];
                        }
                        if(registros[i]['cliente_referencia1']){
                            html += "<br><b>Ref #1: </b>"+registros[i]['cliente_referencia1'];
                        }
                        if(registros[i]['cliente_reftelef1']){
                            html += "<b> Telef #1: </b>"+registros[i]['cliente_reftelef1'];
                        }
                        if(registros[i]['cliente_referencia2']){
                            html += "<br><b>Ref #2: </b>"+registros[i]['cliente_referencia2'];
                        }
                        if(registros[i]['cliente_reftelef2']){
                            html += "<b> Telef #2: </b>"+registros[i]['cliente_reftelef2'];
                        }
                        html += "</td>";
                        html += "<td>";
                        //html += "<div style='white-space: nowrap;'><b>Neg.: </b>"+neg+"<br></div>";
                        html += "<div>";
                        html += "<b>Dir.: </b>"+dir+"<br>";
                        html += "<b>Nit: </b>"+registros[i]["cliente_nit"]+"<br>";
                        html += "<b>Razon: </b>"+registros[i]["cliente_razon"]+"<br>";
                        /*var escategoria_clientezona="";
                        if(registros[i]["zona_id"] == null || registros[i]["zona_id"] == 0 || registros[i]["zona_id"] == ""){
                            escategoria_clientezona = "No definido";
                        }else{
                            escategoria_clientezona = registros[i]["zona_nombre"];
                        }
                        html += "<b>Zona: </b>"+escategoria_clientezona;*/
                        html += "</div>";
                        html += "</td>";
                        html += "<td class='no-print' style='text-align: center'>";
                        if ((registros[i]["cliente_latitud"]==0 && registros[i]["cliente_longitud"]==0) || (registros[i]["cliente_latitud"]==null && registros[i]["cliente_longitud"]==null) || (registros[i]["cliente_latitud"]== "" && registros[i]["cliente_longitud"]=="")){
                            html += "<img src='"+base_url+"resources/images/noubicacion.png' width='30' height='30'>";
                        }else{
                            html += "<a href='https://www.google.com/maps/dir/"+registros[i]["cliente_latitud"]+","+registros[i]["cliente_longitud"]+"' target='_blank' title='lat:"+registros[i]["cliente_latitud"]+", long:"+registros[i]["cliente_longitud"]+"'>";                                                                
                            html += "<img src='"+base_url+"resources/images/blue.png' width='30' height='30'>";
                            html += "</a>";
                        }
                        html += "</td>";
                        /*var estipo_cliente="";
                        if(registros[i]["tipocliente_id"] == null || registros[i]["tipocliente_id"] == 0 || registros[i]["tipocliente_id"]== ""){
                            estipo_cliente = "No definido";
                        }else{
                            estipo_cliente = registros[i]["tipocliente_descripcion"];
                        }*/
                        var escategoria_cliente="";
                        if(registros[i]["categoria_id"] == null || registros[i]["categoria_id"] == 0 || registros[i]["categoria_id"] == ""){
                            escategoria_cliente = "No definido";
                        }else{
                            escategoria_cliente = registros[i]["categoria_nombre"];
                        }
                        var referencia="";
                        if(registros[i]["cliente_referencia"] != null || registros[i]["cliente_referencia"] != 0 || registros[i]["cliente_referencia"] != ""){
                            referencia = registros[i]["cliente_referencia"];
                        }
                        html += "<td>"+corr+"<br>";
                        //html += estipo_cliente+"<br>";
                        html += "<b>Cat.: </b>"+escategoria_cliente+"<br>";
                        html += "<b>Ref.: </b>"+referencia+"<br>";
                        html += "</td>";
                        html += "<td>";
                        if(registros[i]["asesor_id"] != null && registros[i]["asesor_id"] !="" && registros[i]["asesor_id"] !=0){
                        html += "<div id='horizontal'>";
                        html += "<div id='contieneimg' class='no-print'>";
                        var mimagena = "";
                        if(registros[i]["asesor_foto"] != null && registros[i]["asesor_foto"] !=""){
                            mimagena += "<a class='btn  btn-xs' data-toggle='modal' data-target='#mostrarimagena"+i+"' style='padding: 0px;'>";
                            mimagena += "<img src='"+base_url+"resources/images/asesores/thumb_"+registros[i]["asesor_foto"]+"' class='img img-circle' width='50' height='50' />";
                            mimagena += "</a>";
                        }else{
                            mimagena = "<img src='"+base_url+"resources/images/thumb_default.jpg' class='img img-circle' width='50' height='50' />";
                        }
                        html += mimagena;
                        html += "</div>";
                        html += "<div style='padding-left: 4px'>";
                        html += "<b id='masg'>"+registros[i]["miasesor"]+"</b><br>";
                        var linea = "";
                        if(registros[i]["asesor_telefono"]>0 && registros[i]["asesor_celular"]>0){
                            linea = "-";
                        }
                        html += "<b>Tel.: </b>"+registros[i]["asesor_telefono"]+linea+registros[i]["asesor_telefono"];
                        html += "</div>";
                        html += "</div>";
                        }
                        html += "</td>";
                        html += "<td style='background-color: "+registros[i]["estado_color"]+";'>"+registros[i]["estado_descripcion"]+"</td>";
                        html += "<td class='no-print'>";
                        html += "<a href='"+base_url+"cliente/edit/"+registros[i]["cliente_id"]+"' class='btn btn-info btn-xs' title='Modificar datos de Cliente'><span class='fa fa-pencil'></span></a>";
                        //html += "<a class='btn btn-danger btn-xs' data-toggle='modal' data-target='#myModal"+i+"' title='Eliminar'><span class='fa fa-trash'></span></a>";
                        
                        html += "<!------------------------ INICIO modal para confirmar eliminación ------------------->";
                        html += "<div class='modal fade' id='myModal"+i+"' tabindex='-1' role='dialog' aria-labelledby='myModalLabel"+i+"'>";
                        html += "<div class='modal-dialog' role='document'>";
                        html += "<br><br>";
                        html += "<div class='modal-content'>";
                        html += "<div class='modal-header'>";
                        html += "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>x</span></button>";
                        html += "</div>";
                        html += "<div class='modal-body'>";
                        html += "<!------------------------------------------------------------------->";
                        html += "<h3><b> <span class='fa fa-trash'></span></b>";
                        html += "¿Desea eliminar al Cliente <b>"+registros[i]['cliente_nombre']+" "+registros[i]["cliente_apellido"]+"</b> ?";
                        html += "</h3>";
                        html += "<!------------------------------------------------------------------->";
                        html += "</div>";
                        html += "<div class='modal-footer aligncenter'>";
                        html += "<a href='"+base_url+"cliente/remove/"+registros[i]["cliente_id"]+"' class='btn btn-success'><span class='fa fa-check'></span> Si </a>";
                        html += "<a href='#' class='btn btn-danger' data-dismiss='modal'><span class='fa fa-times'></span> No </a>";
                        html += "</div>";
                        html += "</div>";
                        html += "</div>";
                        html += "</div>";
                        html += "<!------------------------ FIN modal para confirmar eliminación ------------------->";
                        html += "<!------------------------ INICIO modal para MOSTRAR imagen REAL ------------------->";
                        html += "<div class='modal fade' id='mostrarimagen"+i+"' tabindex='-1' role='dialog' aria-labelledby='mostrarimagenlabel"+i+"'>";
                        html += "<div class='modal-dialog' role='document'>";
                        html += "<br><br>";
                        html += "<div class='modal-content'>";
                        html += "<div class='modal-header'>";
                        html += "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>x</span></button>";
                        html += "<font size='3'><b>"+registros[i]["cliente_nombre"]+" "+registros[i]["cliente_apellido"]+"</b></font>";
                        html += "</div>";
                        html += "<div class='modal-body'>";
                        html += "<!------------------------------------------------------------------->";
                        html += "<img style='max-height: 100%; max-width: 100%' src='"+base_url+"resources/images/clientes/"+registros[i]["cliente_foto"]+"' />";
                        html += "<!------------------------------------------------------------------->";
                        html += "</div>";

                        html += "</div>";
                        html += "</div>";
                        html += "</div>";
                        html += "<!------------------------ FIN modal para MOSTRAR imagen REAL ------------------->";
                        html += "<!------------------------ INICIO modal para MOSTRAR imagen REAL2 ------------------->";
                        html += "<div class='modal fade' id='mostrarimagena"+i+"' tabindex='-1' role='dialog' aria-labelledby='mostrarimagenalabel"+i+"'>";
                        html += "<div class='modal-dialog' role='document'>";
                        html += "<br><br>";
                        html += "<div class='modal-content'>";
                        html += "<div class='modal-header'>";
                        html += "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>x</span></button>";
                        html += "<font size='3'><b>"+registros[i]["miasesor"]+"</b></font>";
                        html += "</div>";
                        html += "<div class='modal-body'>";
                        html += "<!------------------------------------------------------------------->";
                        html += "<img style='max-height: 100%; max-width: 100%' src='"+base_url+"resources/images/asesores/"+registros[i]["asesor_foto"]+"' />";
                        html += "<!------------------------------------------------------------------->";
                        html += "</div>";

                        html += "</div>";
                        html += "</div>";
                        html += "</div>";
                        html += "<!------------------------ FIN modal para MOSTRAR imagen REAL2 ------------------->";
                        html += "</td>";
                        
                        
                        
                        html += "</tr>";

                   }
                   
                   
                   $("#tablaresultados").html(html);
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
  