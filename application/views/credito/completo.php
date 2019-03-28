<style type="text/css">
	.ale{
		 font-family: "Arial", Arial, Arial, arial;
    font-size: 9px;
	}
	#mitabla {
    /*font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;*/
    font-family: "Arial", Arial, Arial, arial;
    font-size: 9px;
    border-collapse: collapse;
    width: 100%;
	/*height: 400px;*/
    
}

#mitabla td, #mitabla th {
    border: 1px solid #ddd;
    padding: 8px;

}
#mitabla td{
    vertical-align:middle;
     padding-top: 2px;
     padding-bottom: 2px;
}
#latabla td{
    vertical-align:middle;
     padding-top: 2px;
     padding-bottom: 2px;
}
#mitabla th {
    padding-top: 5px;
    padding-bottom: 5px;
    text-align: center;
    font-size: 9px;
    border-top: 1px solid black;
    border-bottom: 1px solid black;
}
</style>
<div class="ale">
<div style="width: 100%;overflow-x:hidden;overflow-y:auto;">
   
<div style="float:left; width:22%;">
    <center>COMPROBANTE<br>
    	No. 00<?php echo $credito_id; ?></center>
</div>

<div style="float:right; width:78%;">
	<div style="float:left; width:50%;">
        <center style="font-family: 'Arial', Arial, Arial, arial; font-size: 8px;">  <font size="1"><b><u><?php echo $empresa[0]['empresa_nombre']; ?></u></b></font><br>
                        <?php echo $empresa[0]['empresa_zona']; ?><br>
                        <p style="font-size: 7px;margin: 0;"><?php echo $empresa[0]['empresa_direccion']; ?></p>
                        <?php echo $empresa[0]['empresa_telefono']; ?><br>
                     </center>
    </div>
    <div style="float:right; width:50%;">
    	<center>COMPROBANTE<br>
    	No. 00<?php echo $credito_id; ?><br>
    	<?php echo date("d/m/Y  H:i:s"); ?>
    	</center>
    </div>
</div>
    
</div>
<hr style="border-color: black; margin: 1px;">
<div style="width: 100%;overflow-x:hidden;overflow-y:auto;">
   
<div style="float:left; width:22%;">
    <center><?php echo $credito[0]['cliente_apellido']; ?>  <?php echo $credito[0]['cliente_nombre']; ?><br><br>
    FECHA CRED.: <?php echo date('d/m/Y', strtotime($credito[0]['credito_fechainicio'])); ?><br>
    LIMITE CRED.: <?php echo date('d/m/Y', strtotime($credito[0]['credito_fechalimite'])); ?><br>
    </center>
<table class="table table-striped" id="mitabla">
                    <tr>
						<th></th>
						<th>DETALLE</th>
                    </tr>
                    <?php 
                    foreach($garantias as $g){ ?>
                    <tr>
						<td><?php echo $g['garantia_cantidad']; ?></td>
						<td><?php echo $g['garantia_descripcion']; ?></td>
					</tr>
				<?php } ?>
</table>
 <center>
    ESTADO CRED.: <?php echo $credito[0]['estado_descripcion']; ?><br>
   <?php echo date("d/m/Y  H:i:s"); ?>
    </center>
</div>

<div style="float:right; width:78%;">
	<div style="float:left; width:50%;padding-left: 18%;">
        		DEUDOR: <?php echo $credito[0]['cliente_apellido']; ?>  <?php echo $credito[0]['cliente_nombre']; ?><br>
        		ESTADO CRED.: <?php echo $credito[0]['estado_descripcion']; ?><br>
        		FECHA CRED.: <?php echo date('d/m/Y', strtotime($credito[0]['credito_fechainicio'])); ?><br>
    			LIMITE CRED.: <?php echo date('d/m/Y', strtotime($credito[0]['credito_fechalimite'])); ?><br>
        
</div>
<div style="float:right; width:50%;">
        <table class="table table-striped" id="latabla">
                  
                    <tr>
						<td>MONTO: <?php echo $credito[0]['credito_monto']; ?></td>
						<td>MONEDA: BOLIVIANOS</td>
					</tr>
					<tr>
						<td>INTERES: % <?php echo $credito[0]['credito_interes']; ?></td>
						<td>COMISION: % <?php echo $credito[0]['credito_comision']; ?></td>
					</tr>
					<tr>
						<td>CUSTODIO: % <?php echo $credito[0]['credito_custodia']; ?></td>
					</tr>
				
</table>
</div>
<table class="table table-striped" id="mitabla">
                  	<tr>
                  		<th colspan="5">DETALLE GARANTIA</th>
                  	</tr>
                    <tr>
						<th>No.</th>
						<th>DETALLE</th>
						<th>CANT.</th>
						<th>VALOR COM.</th>
						<TH>TOTAL</TH>
					</tr>
					<?php $suma=0;
                    $i=0; foreach($garantias as $g){ 
                    	$i=$i+1;
                    	$suma+=$g['garantia_total']; ?>
                    <tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $g['garantia_descripcion']; ?></td>
						<td align="center"><?php echo $g['garantia_cantidad']; ?></td>
						<td align="right"><?php echo number_format($g['garantia_precio'], 2, ".", ","); ?></td>
						<td align="right"><?php echo number_format($g['garantia_total'], 2, ".", ","); ?></td>
					</tr>
					
				<?php } ?>				
				<tr>
						<th colspan="5" style="text-align:right;">TOTAL Bs. :  <?php echo number_format($suma, 2, ".", ","); ?></th>
					</tr>
</table>
</div>

</div>
<div style="width: 100%;overflow-x:hidden;overflow-y:auto;">
   
<div style="float:left; width:22%;">
    <center>RECIBI CONFORME</center>
    </div>
    <div style="float:right; width:38%;">
        <center>RECIBI CONFORME</center>
    </div>
    <div style="float:right; width:38%;">
        <center>CAJERO</center>
    </div>
</div>
</div>