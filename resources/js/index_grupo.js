$(document).on("ready",inicio);
function inicio(){
       tablagrupos();
}

function buscargrupos(e)
{
    tecla = (document.all) ? e.keyCode : e.which;
 
    if (tecla==13){ 
        tablagrupos()
    }
}

function tablagrupos(){
     var controlador = "";
     var parametro = "";
     var base_url = document.getElementById('base_url').value;
     var estado_id = document.getElementById('estado_id').value;
     var grupo = document.getElementById('filtrar').value;
   
     
     
     	if (estado_id=='' || estado_id==0) {
     		parametro = "  g.grupo_nombre like '%"+grupo+"%' ";
     	
     	}else{
     		parametro = "  g.grupo_nombre like '%"+grupo+"%'  and  g.estado_id = "+estado_id+" ";
     	}
    //alert(parametro);
     controlador = base_url+'grupo/buscar_grupos/';
      $.ajax({url: controlador,
           type:"POST",
           data:{parametro:parametro},
           success:function(respuesta){     
                              
               var registros =  JSON.parse(respuesta);
                
               if (registros != null){                   
                   
                    var n = registros.length; //tamaÃ±o del arreglo de la consulta
                   
                    
                    html = "";
                     var x = n; 
                    
                    for (var i = 0; i < x ; i++){
                    	html += "<tr>";
                    	html += "<td>"+registros[i]["grupo_id"]+"</td>";
                        html += "<td><font size='3'><b>"+registros[i]['grupo_nombre']+"</b></font><sub>["+registros[i]['grupo_id']+"]</sub></td>";
					    html += "<td>"+registros[i]['grupo_ciclo']+"</td>";
                        html += "<td>"+registros[i]['grupo_codigo']+"</td>";
                        html += "<td>"+registros[i]['grupo_integrantes']+"</td>";
                        html += "<td>"+registros[i]['asesor_nombre']+" "+registros[i]['asesor_apellido']+"</td>";
                        html += "<td>"+registros[i]['usuario_nombre']+"</td>";
                        html += "<td>"+registros[i]['estado_descripcion']+"</td>";
                        html += "<td>"+moment(registros[i]['grupo_fecha']).format("DD/MM/YY")+"<br>"+registros[i]['grupo_hora']+"</td>";
                        html += "<td>"+moment(registros[i]['grupo_iniciosolicitud']).format("DD/MM/YY")+"</td>";
                        html += "<td><font size='3'><b>"+Number(registros[i]['grupo_monto']).toFixed(2)+"</b></font></td>";
                        html += "<td>";
                        if (registros[i]['estado_id']==4) {
                        html += "<a href='"+base_url+"grupo/edit/"+registros[i]['grupo_id']+"' class='btn btn-info btn-xs' title='Modifcar caracteristicas del grupo'><span class='fa fa-pencil'></span> Modif.</a> ";
                        html += "<a href='"+base_url+"grupo/integrantes/"+registros[i]['grupo_id']+"' class='btn btn-facebook btn-xs' title='Modificar integrantes/montos solicitados'><span class='fa fa-users'></span> Modif.</a> ";
                        html += "<a class='btn btn-danger btn-xs' data-toggle='modal' data-target='#myModal"+registros[i]["grupo_id"]+"'  title='Eliminar'><span class='fa fa-trash'></span> Borrar</a>";
                        }
                        if (registros[i]['estado_id']==5) {
                        }
                        if (registros[i]['estado_id']==6) {
                        }
                        if (registros[i]['estado_id']==7) {
                        }
                        if (registros[i]['estado_id']==8) {
                        html += "<a href='"+base_url+"grupo/add_new/"+registros[i]['grupo_id']+"' class='btn btn-soundcloud btn-xs' title='Registrar Nuevo Grupo con esta Información'><span class='fa fa-plus-circle'></span> Nuevo</a>";
                        }
                        html += "<div style='white-space: normal !important;' class='modal fade' id='myModal"+registros[i]['grupo_id']+"' tabindex='-1' role='dialog' aria-labelledby='myModalLabel"+registros[i]['grupo_id']+"'>";
                        html += "<div class='modal-dialog' role='document'><br><br>";
                        html += "<div class='modal-content'><div class='modal-header'>";
                        html += "<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>x</span></button>";
                        html += "</div><div class='modal-body'>";
                        html += "<h3><b> <em class='fa fa-trash'></em></b> ¿Desea eliminar el grupo <b> "+registros[i]['grupo_nombre']+"</b> ?  </h3>";
                        html += "</div><div class='modal-footer aligncenter'>";
                        html += "<a href='"+base_url+"grupo/remove/"+registros[i]['grupo_id']+"' class='btn btn-success'><em class='fa fa-trash'></em> Si </a>";
                        html += "<a href='#' class='btn btn-danger' data-dismiss='modal'><em class='fa fa-times'></em> No </a> </div>";
                        html += "</div> </div></div>";
                        html += "</td>";
                        html += "</tr>";
                    }      
                       $("#tablagrupos").html(html);
                
                       
          }  
        },
        error:function(respuesta){
          alert("mal");       
   	},
    });

}