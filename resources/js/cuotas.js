$(document).on("ready",inicio);

function inicio(){
    
//cobrarinteres();
      
}


function cobrarinteres(){
		
    var radio1 = document.getElementById('inter1').checked;
   
    var ultimopago = document.getElementById('credito_ultimopago').value;
    var today = new Date();
    var ultimo = moment(ultimopago).format("YYYY-MM-DD");
    var hoy = moment(today).format("YYYY-MM-DD");

    var diff = moment(hoy).diff(moment(ultimo), 'days');
    var meses = moment(hoy).diff(moment(ultimo), 'months');
    var division = Number(diff/30);   
    var diventero = Math.trunc(division);
    var divdecimal = division-diventero;
    
    if (radio1==true){
      if (divdecimal<=0.5) {
         var factor=1;
         var medio = 0.5;
      }else{
         var factor=1;
         var medio = 1;
      }
   
     html2 = ""; 
     html2 +="<select name='meses' class='form-control' id='meses' onchange='calcularinteresmes("+factor+")'>";
  
     html2 +="<option value=''>Meses</option>"; 
    for (var i = 1; i <= meses; i++) {
  
    html2 +="<option value='"+i+"'>"+i+"</option>";

    }
    html2 +="<option value='"+Number(i+medio-1)+"'>"+Number(i+medio-1)+"</option>";
    html2 += "</select>";
    $("#misele").html(html2);
   
   
  }else {
    var factor= 30;
    html2 = "";  
    html2 +="<select name='dias' class='form-control' id='dias' onchange='calcularinteresdias("+factor+")'>";
   html2 +="<option value=''>Dias</option>";
for (var i = 1; i <= diff; i++) {
 
   html2 +="<option value='"+i+"'>"+i+"</option>";
}
    html2 += "</select>";
    $("#misele").html(html2);
    
  }


 
}
function cobrarcuota(cuota_id){
		
			
            $("#cuota_montocancelado"+cuota_id+"").keyup(function () {
              var value = $(this).val();
              var cuota = Number(document.getElementById("cuota_monto"+cuota_id+"").value);

               $("#cuota_saldocapital"+cuota_id+"").val(cuota-value);
              
          });

}
function calcularinteresdias(factor){
  var dias = document.getElementById('dias').value;
    var saldo = document.getElementById('credito_saldo').value;
    var monto = document.getElementById('credito_monto').value;
    var interes = Number(document.getElementById('credito_interes').value);
    var custodio =  Number(document.getElementById('credito_custodia').value);
    var comision =  Number(document.getElementById('credito_comision').value);
    var suaminteres = Number(interes+custodio+comision);
    var interesporc = Number(suaminteres/100*dias/factor).toFixed(2);
    var total = Number(saldo*interesporc*dias).toFixed(2);
    
    $("#cuota_monto").val(saldo*interesporc)
        if (saldo>0) {
            $("#cuota_montocancelado").val(saldo*interesporc).keyup(function () {
              var value = $(this).val();
               $("#cuota_saldocapital").val(total-value);
              
          });

        }
}

function calcularinteresmes(factor){
    var meses = document.getElementById('meses').value;
    var saldo = document.getElementById('credito_saldo').value;
    var monto = document.getElementById('credito_monto').value;
    var interes = Number(document.getElementById('credito_interes').value);
    var custodio =  Number(document.getElementById('credito_custodia').value);
    var comision =  Number(document.getElementById('credito_comision').value);
    var suaminteres = Number(interes+custodio+comision);
    var interesporc = Number(suaminteres/100*meses/factor).toFixed(2);
    var total = Number(saldo*interesporc*meses).toFixed(2);
    
    $("#cuota_monto").val(saldo*interesporc)
        if (saldo>0) {
            $("#cuota_montocancelado").val(saldo*interesporc).keyup(function () {
              var value = $(this).val();
               $("#cuota_saldocapital").val(total-value);
              
          });

        }
}

function amortizar(){
		
			
            $("#cuota_montocancelado1").keyup(function () {
              var value = $(this).val();
              var cuota = Number(document.getElementById("credito_saldo1").value);

               $("#cuota_saldocapital1").val(cuota-value);
              
          });

}