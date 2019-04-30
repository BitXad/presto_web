<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/cuotas.js'); ?>"></script>
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
<div class="col-md-4">

                              <a href="#" data-toggle="modal" data-target="#ajustar" class="btn btn-success btn-foursquarexs" ><font size="5"><span class="fa fa-money"></span></font><br><small>Ajustar Saldos</small></a>
                              <div class="modal fade" id="ajustar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >

          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <font size="2"><b> <span class="btn-success" >Ajustar Saldos</span></b> </font><button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" >
              </div>
            </div>
          </div>
        </div>
                           
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
                        <th colspan="2">Saldo<br>Exc./Falt.</th>
                        <th>Glosa</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>
                    
                         <?php 
                    
                      $cancelados = 0;
                      $saldos = 0;
                   
                          foreach($cuota as $c) {
                           $cancelados += $c['cuota_montocancelado'];     
                           $saldos += $c['cuota_saldocapital'];     
                                 ?>
                        <tr>
                        <td><?php echo $c['cuota_numero']; ?></td>
                        <td align="right"><?php echo number_format($c['cuota_capital'], 2, ".", ","); ?></td>
                        <td align="right"><?php echo number_format($c['cuota_monto']-$c['cuota_capital'], 2, ".", ","); ?></td>
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
                        <?php if($c['cuota_saldocapital']<= 0)  { ?>
                        <td align="right"><b><?php echo number_format(abs($c['cuota_saldocapital']), 2, ".", ","); ?></b></td><td></td>
                        <?php } else { ?>
                        <td></td><td align="right"><b><?php echo number_format($c['cuota_saldocapital'], 2, ".", ","); ?></b></td>
                        <?php } ?>
                        <td><?php echo $c['cuota_glosa']; ?></td>
                        <td><?php echo $c['estado_descripcion']; ?></td>
                        <td>
                        <?php if ($c['estado_id']==9) {  ?>
                          <a href="#" onclick="cobrarcuota(<?php echo $c['cuota_id']; ?>)" data-toggle="modal" data-target="#pagar<?php echo $c['cuota_id']; ?>" class="btn btn-success btn-xs"><span class="fa fa-money"></span></a> 
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
        <form action="<?php echo base_url('cuota/pagar/'.$c['cuota_id']); ?>"  method="POST" class="form" > 
              <div class="col-md-12">
                <div class="col-md-6">
                  <label for="cliente_nombre" class="control-label">PAGO</label>
                <div class="form-group">
                  <input type="hidden" name="credito" value="<?php echo $c['credito_id']; ?>" class="form-control"  />
                  <input type="hidden" name="cuota_monto<?php echo $c['cuota_id']; ?>" value="<?php echo $c['cuota_monto']; ?>" class="form-control" id="cuota_monto<?php echo $c['cuota_id']; ?>" />
                    <input type="number" name="cuota_montocancelado" value="<?php echo $c['cuota_monto']; ?>" class="form-control" id="cuota_montocancelado<?php echo $c['cuota_id']; ?>" step="any"/>
          
              <input type="hidden" name="cuota_capital" value="<?php echo $c['cuota_capital']; ?>" id="cuota_capital" />
            
                </div>
                </div>
                <div class="col-md-6">
                  <label for="cliente_nombre" class="control-label">SALDO</label>
                  <div class="form-group">
                     <input type="number" name="cuota_saldocapital" value="0" class="form-control" id="cuota_saldocapital<?php echo $c['cuota_id']; ?>" step="any" />
                </div>
                </div>
                <div class="col-md-6">
                  <label for="cuota_numrecibo" class="control-label">Numero Recibo</label>
                  <div class="form-group">
                    <input type="text" name="cuota_numrecibo" value="" class="form-control" id="cuota_numrecibo" />
                    <input type="hidden" name="cuota_fechapago" value="<?php echo date('Y-m-d') ?>" class="form-control" id="cuota_fechapago" />
                    <input type="hidden" name="cuota_horapago" value="<?php echo date('H:i:s') ?>" class="form-control" id="cuota_horapago" />

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
        </form>
            <button class="btn btn-md btn-danger" data-dismiss="modal">
            
                <span class="fa fa-close"></span>   Cancelar  
               
            </button>
                         
        </div>
          
          </div>
        </div>
        </div>
        <!---------------------------------FIN MODAL DE PAGAR------------------------->
         <?php }      ?>
        <?php if ($c['estado_id']==10) {  ?>
          <a href="<?php echo site_url('cuota/reciboindividual/'.$c['credito_id'].'/'.$c['cuota_id']); ?>" target="_blank" class="btn btn-facebook btn-xs"><span class="fa fa-print"></span></a> 
        <?php }      ?>
                   
                 </td> </tr>
                    <?php } ?>
                    <tr>
                      <td colspan="6"><b>TOTAL</b></td>
                      <td align="right"><b><?php echo number_format($cancelados, 2, ".", ","); ?></b></td>
                      <td colspan="3"></td>
                      <?php if ($saldos >= 0) { ?>
                        <td align="center" colspan="2"><b><?php echo number_format($saldos, 2, ".", ","); ?></b> Falt.</td>
                       <?php } else { ?>
                      <td align="center" colspan="2"><b><?php echo number_format(abs($saldos), 2, ".", ","); ?></b> Exc.</td>
                        <?php } ?>
                      
                      <td colspan="3"></td>
                    </tr>
</table>
</div>
</div>