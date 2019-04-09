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
<!----------------------------- fin script buscador --------------------------------------->
<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
 <div class="box-header" style="padding-bottom: 20px;">
     <center>
    <font size="5"  ><b>COMPROBANTE DE PAGO</b></font><br>
     <font size="5"  ><b>No.:  <?php echo $cuota['credito_id']; ?></b></font></center>
 <div class="box-tools" >
    <font size="3"><b>Credito No.: </b><?php echo $cuota['credito_id']; ?></font><br>
    <font size="3"><b>RECIBO EXT.: </b><?php echo $cuota['cuota_numrecibo']; ?></font><br>
    <font size="3"><b>ESTADO: </b><?php echo $credito[0]['estado_descripcion']; ?></font> 
     </div>
    


    </div>

    <div class="panel panel-primary col-md-12" >
        <h5><b>CLIENTE: </b><?php echo $credito[0]['cliente_apellido'];?> <?php echo $credito[0]['cliente_nombre'];?>
        
        <b style="padding-left: 350px;">FECHA: </b><?php echo date('d/m/Y',strtotime($cuota['cuota_fechapago'])); ?></h5>       
   
    
  
              
  

</div>

<div class="row">
    <div class="col-md-12">
       

<div class="box">
        <table>
            <tr>
                <td  style="text-align: left; padding-left: 30px;"> 
                   SALDO TOTAL: Bs      <?php echo $credito[0]['credito_saldo']+$cuota['cuota_capital']; ?> <br> 
                   MONTO CUOTA: Bs      <?php echo $cuota['cuota_monto']; ?> <br>
                   MONTO CANCELADO: Bs  <?php echo $cuota['cuota_montocancelado']; ?> (<?php echo num_to_letras($cuota['cuota_montocancelado']); ?>)<br>  
                   SALDO PARC: Bs       <?php echo $cuota['cuota_monto']-$cuota['cuota_montocancelado']; ?> <br>
                   SALDO DEUDOR: Bs     <?php echo $credito[0]['credito_saldo']; ?> <br>
                   
              
                </td>
                <td width="50">
                    <?php echo "     "; ?><br>
                    <?php echo "     "; ?><br>
                </td>
                <td style="text-align: left;">
                   
                   CUOTA N:             <?php echo $cuota['cuota_numero']; ?> / <?php echo $credito[0]['credito_cuotas']; ?><br>
                   LIMITE DE PAGO:      <?php echo date('d/m/Y',strtotime($cuota['cuota_fechalimite'])); ?> <br>
                   OTROS: Bs            ..............................................<br>
                   GLOSA.-              <?php echo $cuota['cuota_glosa']; ?> <br>
              
                </td>
            </tr>
        </table>
        
            </div>
          
    </div>
</div>
<div class="col-md-12" style="text-align: right;">

    <font size="1"><?php echo date("d/m/Y   H:i:s"); ?></font>

</div>
<center>
    <div class="col-md-12" style="margin-top: 50px; ">
        <table>
            <tr>
                <td> <center>
                
                    <?php echo "-----------------------------------------------------"; ?><br>
                    <?php echo "RECIBI CONFORME"; ?><br>
                    </center>
                </td>
                <td width="100">
                    <?php echo "     "; ?><br>
                    <?php echo "     "; ?><br>
                </td>
                <td>
                    <center>
                    <?php echo "-----------------------------------------------------"; ?><br>
                    <?php echo "ENTREGUE CONFORME"; ?><br>                    
                    </center>
                </td>
            </tr>
        </table>
        
    </div>
    
</center>
