$(document).on("ready",inicio);

function inicio(){
    
//cobrarinteres();
      
}


function cobrarinteres(){
		
		var saldo = document.getElementById('credito_saldo').value;
		var monto = document.getElementById('credito_monto').value;
		var interes = Number(document.getElementById('credito_interes').value);
		var custodio =  Number(document.getElementById('credito_custodia').value);
		var comision =  Number(document.getElementById('credito_comision').value);
		var suaminteres = Number(interes+custodio+comision);
		var total = Number(saldo*suaminteres/100);
      	if (saldo>0) {
            $("#cuota_montocancelado").val(saldo*suaminteres/100).keyup(function () {
              var value = $(this).val();
               $("#cuota_saldocapital").val(total-value);
              
          });

        }
 
}