<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/cuotas.js'); ?>"></script>
<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<div class="box-header" style="width: 100%;font-size: 12px;">
  <H4><B>CREDITO INDIVIDUAL</B></H4>
<div class="col-md-4">
    DEUDOR: <?php echo $credito[0]['cliente_apellido']; ?>  <?php echo $credito[0]['cliente_nombre']; ?><br>
    FECHA CRED.: <?php echo date('d/m/Y', strtotime($credito[0]['credito_fechainicio'])); ?><br>
    LIMITE CRED.: <?php echo date('d/m/Y', strtotime($credito[0]['credito_fechalimite'])); ?><br>
    ESTADO CRED.: <?php echo $credito[0]['estado_descripcion']; ?><br>

   
    
</div>
<div class="col-md-4">
    MONTO: <?php echo $credito[0]['credito_monto']; ?> MONEDA: BOLIVIANOS<br>
    INTERES: % <?php echo $credito[0]['credito_interes']; ?>
    COMISION: % <?php echo $credito[0]['credito_comision']; ?>
    CUSTODIO: % <?php echo $credito[0]['credito_custodia']; ?><br>
    TIPO DE INTERES: <?php echo $credito[0]['tipoint_nombre']; ?><br>
    TIPO DE GARANTIA: <?php echo $credito[0]['tipogarant_nombre']; ?>
</div>
<div class="col-md-4 no-print">
              
            <a href="#" onclick="cobrarinteres()" data-toggle="modal" data-target="#pagarint" class="btn btn-success btn-foursquarexs" ><font size="5"><span class="fa fa-money"></span></font><br><small>Cobrar Int.</small></a>
             <!---------------------------------MODAL DE PAGAR------------------------->

  <div class="modal fade" id="pagarint" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >

          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <font size="2"><b> <span class="btn-success" >Cobrar Interes</span></b> </font><button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" >
                <div class="col-md-12">
                <div class="col-md-6">
                  <label for="cliente_nombre" class="control-label">Cobrar</label>
                <div class="form-group">
                    <input type="number" name="cuota_montocancelado" class="form-control" id="cuota_montocancelado" />
                    <div hidden>
                    <input type="text" name="credito_monto" value="<?php echo $credito[0]['credito_monto']; ?>" id="credito_monto" />
                    <input type="text" name="credito_saldo" value="<?php echo $credito[0]['credito_saldo']; ?>" id="credito_saldo" />
                    <input type="text" name="credito_interes" value="<?php echo $credito[0]['credito_interes']; ?>" id="credito_interes" />
                  <input type="text" name="credito_custodia" value="<?php echo $credito[0]['credito_custodia']; ?>" id="credito_custodia" />
                    <input type="text" name="credito_comision" value="<?php echo $credito[0]['credito_comision']; ?>" id="credito_comision" /></div>
                </div>
                </div>
                <div class="col-md-6">
                  <label for="cliente_nombre" class="control-label">Saldo</label>
                  <div class="form-group">
                     <input type="number" name="cuota_saldocapital" value="0" class="form-control" id="cuota_saldocapital" />
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
              
                <span class="fa fa-money"></span>   Cobrar  
             
            </button> 
        
            <button class="btn btn-md btn-danger" data-dismiss="modal">
            
                <span class="fa fa-close"></span>   Cancelar  
               
            </button>
                         
        </div>
        </div>
        </div>
        </div>
        <!---------------------------------FIN MODAL DE PAGAR------------------------->
            <button  href="#" data-toggle="modal" data-target="#amortizar"  class="btn btn-warning btn-foursquarexs" onclick="fechadecompra('and 1')" ><font size="5"><span class="fa fa-money"></span></font><br><small>Amortizar</small></button>
             <!---------------------------------MODAL DE PAGAR------------------------->

  <div class="modal fade" id="amortizar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
              <b> <span class="btn-warning" >Amortizar Deuda </span></b> <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
         
              <div class="col-md-12">
              
              </div>
          </div>
          <div class="modal-footer" align="right">

            <button class="btn btn-md btn-success"  type="submit">
              
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
                                 
                                 ?>
                        <tr>
                        <td><?php echo $c['cuota_numero']; ?></td>
                        <td><?php echo number_format($c['cuota_capital'], 2, ".", ","); ?></td>
                        <td><?php echo number_format($c['cuota_interes'], 2, ".", ","); ?></td>
                        <td><?php echo number_format($c['cuota_descuento'], 2, ".", ","); ?></td>
                        <td><b><?php echo number_format($c['cuota_monto'], 2, ".", ","); ?></b></td>
                        <td><?php echo date('d/m/Y',strtotime($c['cuota_fechalimite'])); ?></td>
                        <td><b><?php echo number_format($c['cuota_montocancelado'], 2, ".", ","); ?></b></td>
                        <?php if($c['cuota_fechapago']=='0000-00-00' || $c['cuota_fechapago']==null) { ?>
                        <td></td> 
                        <td></td>
                        <?php } else { ?>
                        <td><?php echo date('d/m/Y',strtotime($c['cuota_fechapago'])); ?></td>
                        <td><?php echo $c['cuota_horapago']; ?></td>
                         <?php } ?>
                        <td><?php echo $c['cuota_numrecibo']; ?></td>
                        <td><b><?php echo number_format($c['cuota_saldocapital'], 2, ".", ","); ?></b></td>
                        <td><?php echo $c['cuota_glosa']; ?></td>
                        <td><?php echo $c['estado_descripcion']; ?></td>
                        <td><a href="#" data-toggle="modal" data-target="#pagar<?php echo $c['cuota_id']; ?>" class="btn btn-success btn-xs"><span class="fa fa-money"></span></a> </td>
<!---------------------------------MODAL DE PAGAR------------------------->

  <div class="modal fade" id="pagar<?php echo $c['cuota_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
              <b> <span class="btn-success" >Pagar Deuda </span></b> <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
         
              <div class="col-md-12">
                <div class="col-md-6">
                  <label for="cliente_nombre" class="control-label">PAGO</label>
                <div class="form-group">
                    <input type="number" name="cuota_cancelado" value="<?php echo number_format($c['cuota_monto'], 2, ".", ","); ?>" class="form-control" id="cuota_cancelado" />
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

            <button class="btn btn-md btn-success"  type="submit">
              
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
                    </tr>
                    <?php } ?>
</table>
</div>
</div>