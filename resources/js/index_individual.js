$(document).on("ready",start);

function start(){

 tablacreditos(1);
        
}

function tablacreditos(dato){
     var controlador = "";
     var parametro = "";
     var base_url = document.getElementById('base_url').value;
     var fecha_desde = document.getElementById('fecha_desde').value;
     var fecha_hasta = document.getElementById('fecha_hasta').value;
     var ci = document.getElementById('ci').value;
     var today = new Date();
     var hoy = moment(today).format('YYYY-MM-DD'); 
     var clave = dato;
     
     if (clave==1) {
     	parametro = "  date(credito_fechainicio) >= '"+hoy+"'  and  date(credito_fechainicio) <='"+hoy+"' ";
     	
     }else {
     	if (fecha_desde=='' || fecha_hasta=='') {
     		parametro = "  k.cliente_ci = '"+ci+"' ";
     	}else if (ci=='') {
     		parametro = "  date(credito_fechainicio) >= '"+fecha_desde+"'  and  date(credito_fechainicio) <='"+fecha_hasta+"' ";
     	}else{
     		parametro = "  k.cliente_ci = '"+ci+"' and  date(credito_fechainicio) >= '"+fecha_desde+"'  and  date(credito_fechainicio) <='"+fecha_hasta+"' ";
     	}
     	
     }
     controlador = base_url+'credito/creditos/';
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
                    	html += "<td>"+registros[i]["credito_id"]+"</td>";
						html += "<td>"+registros[i]["cliente_nombre"]+" "+registros[i]["cliente_apellido"]+"</td>";
						html += "<td>"+registros[i]["cliente_ci"]+"</td>";
						html += "<td>"+registros[i]["cliente_telefono"]+"</td>";
						html += "<td>"+moment(registros[i]["credito_fechainicio"]).format('DD/MM/YYYY')+"</td>";
						html += "<td>"+registros[i]["credito_horainicio"]+"</td>";
						html += "<td>"+moment(registros[i]["credito_fechalimite"]).format('DD/MM/YYYY')+"</td>";
						html += "<td>"+registros[i]["credito_monto"]+"</td>";
						html += "<td>"+registros[i]["credito_interes"]+"</td>";
						html += "<td>"+registros[i]["credito_comision"]+"</td>";
						html += "<td>"+registros[i]["credito_custodia"]+"</td>";
						html += "<td>"+registros[i]["tipoint_nombre"]+"</td>";
						html += "<td>"+registros[i]["tipogarant_nombre"]+"</td>";
						html += "<td>"+registros[i]["usuario_nombre"]+"</td>";
						html += "<td style='background: "+registros[i]["estado_color"]+"'>"+registros[i]["estado_descripcion"]+"</td>";
						html += "<td><a href='"+base_url+"credito/completo/"+registros[i]["credito_id"]+"' target='_blank' class='btn btn-facebook btn-xs'><span class='fa fa-print'></span></a>";
                        html += " <a href='"+base_url+"credito/planpago/"+registros[i]["credito_id"]+"' target='_blank' class='btn btn-info btn-xs'><span class='fa fa-file-powerpoint-o'></span></a>";
                     	if (registros[i]['credito_cuotas']==0) {
                     	html += " <a href='"+base_url+"cuota/sintiempo/"+registros[i]["credito_id"]+"' target='_blank' class='btn btn-success btn-xs'><span class='fa fa-money'></span></a></td>";	
                     	}else if (registros[i]['credito_cuotadia']>=1) {
                     	html += " <a href='"+base_url+"cuota/individual/"+registros[i]["credito_id"]+"' target='_blank' class='btn btn-success btn-xs'><span class='fa fa-money'></span></a></td>";	
                        }else{
                        html += " <a href='"+base_url+"cuota/individual/"+registros[i]["credito_id"]+"' target='_blank' class='btn btn-success btn-xs'><span class='fa fa-money'></span></a></td>"; 
                     	}
                     	html += "</tr>";
                    }      
                       $("#tablacreditos").html(html);
                
                       
          }  
        },
        error:function(respuesta){
          alert("hola");       
   	},
    });

}