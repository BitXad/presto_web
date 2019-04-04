<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<div class="box-header" style="font-family: 'Arial', Arial, Arial, arial;width: 100%;font-size: 11px;">
  <H4><B>CREDITO INDIVIDUAL</B></H4>
<div class="col-md-4">
    <b>DEUDOR:</b> <?php echo $credito[0]['cliente_apellido']; ?>  <?php echo $credito[0]['cliente_nombre']; ?><br>
    <b>FECHA CRED.:</b> <?php echo date('d/m/Y', strtotime($credito[0]['credito_fechainicio'])); ?><br>
    <b>LIMITE CRED.:</b> <?php echo date('d/m/Y', strtotime($credito[0]['credito_fechalimite'])); ?><br>
    <b>ESTADO CRED.:</b> <?php echo $credito[0]['estado_descripcion']; ?><br>

    
</div>
<div class="col-md-4">
    <b>MONTO:</b> <?php echo number_format($credito[0]['credito_monto'], 2, ".", ","); ?> <b>SALDO:</b> <?php echo number_format($credito[0]['credito_saldo'], 2, ".", ","); ?><br>
    <b>INTERES:</b> % <?php echo $credito[0]['credito_interes']; ?>
    <b>COMISION:</b> % <?php echo $credito[0]['credito_comision']; ?>
    <b>CUSTODIO:</b> % <?php echo $credito[0]['credito_custodia']; ?><br>
    <b>TIPO DE INTERES:</b> <?php echo $credito[0]['tipoint_nombre']; ?><br>
    <b>TIPO DE GARANTIA:</b> <?php echo $credito[0]['tipogarant_nombre']; ?>
</div>
</div>
<div class="box">
            <div class="box-body table-responsive">
                <table class="table table-striped table-condensed" id="mitabla">
                      <tr>
                                  
                        <th>Num.<br>Cuota</th>
                        <th>Capital</th>
                        <th>Interes</th>
                        <th>Desc.</th>
                        <th>Total</th>
                        <th>Fecha<br>Limite</th>
                        <th>Cancelado</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Num.<br>recibo</th>
                        <th>Saldo</th>
                        <th>Glosa</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>
                    
                         <?php 
                    
                      $cancelados = 0;
                   
                          foreach($cuota as $c) {
                           $cancelados += $c['cuota_montocancelado'];     
                                 ?>
                        <tr>
                        <td><?php echo $c['cuota_numero']; ?></td>
                        <td align="right"><?php echo number_format($c['cuota_capital'], 2, ".", ","); ?></td>
                        <td align="right"><?php echo number_format($c['cuota_interes'], 2, ".", ","); ?></td>
                        <td align="right"><?php echo number_format($c['cuota_descuento'], 2, ".", ","); ?></td>
                        <td align="right"><b><?php echo number_format($c['cuota_monto'], 2, ".", ","); ?></b></td>
                        <td><?php echo date('d/m/Y',strtotime($c['cuota_fechalimite'])); ?></td>
                        <td align="right"><b><?php echo number_format($c['cuota_montocancelado'], 2, ".", ","); ?></b></td>
                        <?php if($c['cuota_fechapago']=='0000-00-00' || $c['cuota_fechapago']==null) { ?>
                        <td></td> 
                        <td></td>
                        <?php } else { ?>
                        <td><?php echo date('d/m/Y',strtotime($c['cuota_fechapago'])); ?></td>
                        <td><?php echo $c['cuota_horapago']; ?></td>
                         <?php } ?>
                        <td><?php echo $c['cuota_numrecibo']; ?></td>
                        <td align="right"><b><?php echo number_format($c['cuota_saldocapital'], 2, ".", ","); ?></b></td>
                        <td><?php echo $c['cuota_glosa']; ?></td>
                        <td><?php echo $c['estado_descripcion']; ?></td>
                        <td><a href="#" data-toggle="modal" data-target="#pagar<?php echo $c['cuota_id']; ?>" class="btn btn-success btn-xs"><span class="fa fa-money"></span></a> 
<!---------------------------------MODAL DE PAGAR------------------------->

  <div class="modal fade" id="pagar<?php echo $c['cuota_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
              <font size="2"><b> <span class="btn-success" >Pagar Cuota</span></b> </font><button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
         
              <div class="col-md-12">
                <div class="col-md-6">
                  <label for="cliente_nombre" class="control-label">PAGO</label>
                <div class="form-group">
                    <input type="number" name="cuota_cancelado" value="<?php echo $c['cuota_monto']; ?>" class="form-control" id="cuota_cancelado" />
                </div>
                </div>
                <div class="col-md-6">
                  <label for="cliente_nombre" class="control-label">SALDO</label>
                  <div class="form-group">
                     <input type="number" name="saldo" value="0" class="form-control" id="saldo" />
                </div>
                </div>
                <div class="col-md-6">
                  <label for="cuota_numrecibo" class="control-label">Numero Recibo</label>
                  <div class="form-group">
                    <input type="text" name="cuota_numrecibo" value="" class="form-control" id="cuota_numrecibo" />
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="cuota_glosa" class="control-label">Glosa</label>
                  <div class="form-group">
                    <input type="text" name="cuota_glosa" value="" class="form-control" id="cuota_glosa" />
                  </div>
                </div>
              </div>
          </div>
          <div class="modal-footer" align="right">

            <button class="btn btn-md btn-success"  >
              
                <span class="fa fa-money"></span>   Amortizar  
             
            </button> 
        
            <button class="btn btn-md btn-danger" data-dismiss="modal">
            
                <span class="fa fa-close"></span>   Cancelar  
               
            </button>
                         
        </div>
          
          </div>
        </div>
        </div>
        <!---------------------------------FIN MODAL DE PAGAR------------------------->
                   </td> </tr>
                    <?php } ?>
                    <tr>
                      <td colspan="6"><b>TOTAL</b></td>
                      <td align="right"><b><?php echo number_format($cancelados, 2, ".", ","); ?></b></td>
                      <td colspan="7"></td>
                    </tr>
</table>
</div>
</div>