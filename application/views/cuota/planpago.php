<!----------------------------- script buscador --------------------------------------->
<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script type="text/javascript">
        $(document).ready(function () {
            (function ($) {
                $('#filtrar').keyup(function () {
                    var rex = new RegExp($(this).val(), 'i');
                    $('.buscar tr').hide();
                    $('.buscar tr').filter(function () {
                        return rex.test($(this).text());
                    }).show();
                })
            }(jQuery));
        });

</script>
<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
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
</style>

<!----------------------------- fin script buscador --------------------------------------->
<!------------------ ESTILO DE LAS TABLAS -------------
<link href="<?php echo base_url('resources/css/alejo.css'); ?>" rel="stylesheet">---->
<link href="<?php echo base_url('resources/css/cabecera.css'); ?>" rel="stylesheet">     
<!-------------------------------------------------------->

<div class="box-header">
  <div class="cuerpo">
                    <div class="columna_derecha">
                        <center> 
                       CLIENTE: <?php echo $credito[0]['cliente_apellido']; ?> <?php echo $credito[0]['cliente_nombre']; ?><br>
                       C. I.: <?php echo $credito[0]['cliente_ci']; ?>

                    </center>
                    </div>
                    <div class="columna_izquierda">
                       <center>  <font size="3"><b><u><?php echo $empresa[0]['empresa_nombre']; ?></u></b></font><br>
                        <?php echo $empresa[0]['empresa_zona']; ?><br>
                        <?php echo $empresa[0]['empresa_direccion']; ?><br>
                        <?php echo $empresa[0]['empresa_telefono']; ?>
                    </div> </center>
                    <div class="columna_central">
                        <center>      <h3 class="box-title"><u>PLAN DE PAGOS</u></h3><BR>
                                    CREDITO No.: <?php echo $credito[0]['credito_id']; ?> <br>
                                    <?php echo date('d/m/Y H:i:s'); ?> 
                </center>
                    </div>


            </div>
            <hr style="border-color: black; margin: 3px; ">
            <div class="cuerpo" >

                    <div class="columna_derecha">
                      TOTAL: <b><?php echo  number_format($credito[0]['credito_monto'], 2, ".", ",") ?></b><br>
                      
                      INT.: <b><?php echo  number_format(($credito[0]['credito_interes']+$credito[0]['credito_comision']+$credito[0]['credito_custodia']), 2, ".", ",") ?></b><br>
                       SALDO:<b><?php  echo number_format($credito[0]['credito_saldo'], 2, ".", ",") ?></b><br>
                    </div>
                    <div class="columna_izquierda">
                    
                       Fecha y Hora: <b><?php $fecha_format = date('d/m/Y', strtotime($credito[0]['credito_fechainicio'])); echo $fecha_format; ?>   <?php echo $credito[0]['credito_horainicio']; ?></b><br>
                       <b>TIPO DE INTERES:</b> <?php echo $credito[0]['tipoint_nombre']; ?><br>
                        <b>TIPO DE GARANTIA:</b> <?php echo $credito[0]['tipogarant_nombre']; ?>
                       
                    </div> 

                 </div>  
                
</div>
<div class="row">
    <div class="col-md-12">
       
        <div class="box">
            
            <div class="box-body table-responsive">
                <table class="table table-striped table-condensed" id="mitabla">
                      <tr>
                        <th>CTA.</th>                        
                        <th>PARC.</th>
                        <th>INT.</th>
                        <th>LIMITE</th>
                        <th>TOTAL</th>
                        <th>EFECT.</th>
                       
                        <th>FECHA<br>PAGO</th>
                       
                    </tr>
                    <tbody class="buscar">
                    <?php $i = 1; 
                    $total = 0;
                      $cancelados = 0;
                    $cont = 0;
                          foreach($cuota as $c){;
                                 $cont = $cont+1;
                                 $subtotal = $c['cuota_monto'];
                                 $subcancelados = $c['cuota_montocancelado'];
                                 $total = $subtotal + $total;
                                 $cancelados = $subcancelados + $cancelados;
                                 $saldito = $credito[0]['credito_monto']-$cancelados;
                                 ?>
                  <tr  >



                        <td><?php echo $cont ?></td>
                       
                        <td style="text-align: right;"><?php echo number_format($c['cuota_capital'], 2, ".", ","); ?></td>
                        <td align="right"><?php echo number_format($c['cuota_monto']-$c['cuota_capital'], 2, ".", ","); ?></td>
                        <td style="text-align: center;"><?php echo $fecha_format = date('d/m/Y', strtotime($c['cuota_fechalimite']));  ?></td>
                        
                        <td style="text-align: right;"><b><?php echo number_format($c['cuota_monto'], 2, ".", ","); ?></b></td>
                        
                        <td style="text-align: right;"><b><?php echo number_format($c['cuota_montocancelado'], 2, ".", ","); ?></b></td>
                         <td style="text-align: center;"><?php if ($c['cuota_fechapago']=='0000-00-00' || $c['cuota_fechapago']==null) { echo ("NO PAGADO");
                         
                        } else{ echo $fecha_format = date('d/m/Y', strtotime($c['cuota_fechapago'])); } ?> </td>
                      
                       
                
                    
                    </tr>
                   <?php  $i++;  } ?>
                   <tr>
                     <td><b>TOTAL</td>
                     <td style="text-align: right;"></td>
                     <td style="text-align: right;"></td>
                     <td style="text-align: right;"></td>
                     <td style="text-align: right;"></td>
                     <td style="text-align: right; font-size: 12px;"><b><?php echo  number_format($cancelados, 2, ".", ","); ?></td>
                     <td style="text-align: right;"></td>
                     
                   </tr>
                   <tr>
                    <th colspan="10"> SALDO A CANCELAR <?php echo number_format($saldito, 2, ".", ",") ?> <br>
                        <?php echo num_to_letras($saldito); ?></th>    
                      
                    </tr>
                </table>               
            </div>
            
        </div>

        <div class="cuerpo">
                    <div class="columna_derecha">
                        <center>
                        <hr style="border-color: black; width: 80%;"> 
                       GARANTE: .................................<br>
                       C.I.: ............................................
                       <!-- VENDEDOR: <?php echo $credito[0]['usuario_nombre']; ?>-->

                    </center>
                    </div>
                    <div class="columna_izquierda">
                       <center>  
                         <hr style="border-color: black; width: 80%;">
                        CAJERO(A)
                       
                    </div> </center>
                    <div class="columna_central">
                      <CENTER>
                         <hr style="border-color: black; width: 60%;">
                        TITULAR: ................................<br>
                        C.I.: ..........................................
                   
                         
               
                </center>
                    </div>

          

            </div>
        
    </div>
</div>
