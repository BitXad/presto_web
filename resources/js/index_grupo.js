$(document).on("ready",inicio);
function inicio(){
       tablagrupos();
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
    alert(parametro);
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