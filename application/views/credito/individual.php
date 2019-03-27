<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/nuevocredito.js'); ?>"></script>
<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<input type="text" value="<?php echo base_url(); ?>" id="base_url" hidden>
<div class="row">
    <div class="col-md-12">
    	
  	<div class="col-md-7">
        <div class="panel">
        <div class="panel-body">
<!--------------------- cliente_id --------------------->
<div class="container" hidden>
    <input type="text" name="cliente_id" value="0" class="form-control" id="cliente_id" >
    <input type="text" name="usuario_id" value="<?php echo $usuario_id; ?>" class="form-control" id="usuario_id" >
</div>

<!--------------------- fin cliente_id --------------------->
        
        <div class="col-md-3">
            <label for="cliente_ci" class="control-label">C.I.</label>
            <div class="form-group">
                <input type="number" name="cliente_ci" class="form-control" id="cliente_ci" value=""  onkeypress="validar(event,1)"  />
            </div>
        </div>
        
        <div class="col-md-3">
            <label for="cliente_nombre" class="control-label">NOMBRE</label>
            <div class="form-group">
                <input type="text" name="cliente_nombre" class="form-control" id="cliente_nombre" value=""  />
            </div>
        </div>
        <div class="col-md-3">
            <label for="cliente_apellido" class="control-label">APELLIDO</label>
            <div class="form-group">
            <div class="form-group">
                <input type="text" name="cliente_apellido" class="form-control" id="cliente_apellido" value=""  />
            </div>
                
            </div>
        </div>

        
        <div class="col-md-3">
            <label for="cliente_telefono" class="control-label">TELEFONO</label>
            <div class="form-group">
                <input type="number" name="cliente_telefono" class="form-control" id="cliente_telefono"  value=""/>
            </div>
        </div>
        </div><!--BOX BODY-->
         </div><!--BOX-->
        <div class="panel">
        <div class="panel-body">
					<div class="col-md-6">
						<label for="garantia_descripcion" class="control-label">Descripcion</label>
						<div class="form-group">
							<input type="text" name="garantia_descripcion" value="<?php echo $this->input->post('garantia_descripcion'); ?>" class="form-control" id="garantia_descripcion" />
						</div>
					</div>
					
					<div class="col-md-2">
						<label for="garantia_cantidad" class="control-label">Cantidad</label>
						<div class="form-group">
							<input type="text" name="garantia_cantidad" value="<?php echo $this->input->post('garantia_cantidad'); ?>" class="form-control" id="garantia_cantidad" />
						</div>
					</div>
					<div class="col-md-2">
						<label for="garantia_precio" class="control-label">Precio</label>
						<div class="form-group">
							<input type="text" name="garantia_precio" value="<?php echo $this->input->post('garantia_precio'); ?>" class="form-control" id="garantia_precio" />
						</div>
					</div>
					<div class="col-md-2">
						<label for="garantia_precio" class="control-label"></label>
						<div class="form-group">
					<a class="btn btn-success btn-xs" onclick="creagarantia_aux()"><i class="fa fa-cart-arrow-down"></i> Agregar<br>
					 Garantia</a>
				</div>
            	</div>
            	
                <table class="table table-striped" id="mitabla">
                    <tr>
						<th>CANT.</th>
						<th>DESCRIPCION</th>
						<th>PRECIO</th>
						<th>TOTAL</th>
					</tr>
					 <tbody class="buscar2" id="garantias">
				</table>
    </div><!--BOX BODY-->
    </div><!--BOX-->
        
        
      
    </div><!--COL7-->
    <div class="col-md-5">
    	 <div class="panel">
        <div class="panel-body">
    	 		<div class="col-md-12">
                  <div class="input-group no-print"> <span class="input-group-addon">Monto:</span>
                    <input type="text" name="credito_monto" value="<?php echo $this->input->post('credito_monto'); ?>" class="form-control" id="credito_monto" />
                  </div>
                 </div>
                 <div class="col-md-12">
                  <div class="input-group no-print"> <span class="input-group-addon">Tipo de Prestamo:</span>
                   
							<select name="tipocredito_id" class="form-control">
							
								<?php 
								foreach($all_tipo_credito as $tipo_credito)
								{
									$selected = ($tipo_credito['tipocredito_id'] == $this->input->post('tipocredito_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$tipo_credito['tipocredito_id'].'" '.$selected.'>'.$tipo_credito['tipocredito_nombre'].'</option>';
								} 
								?>
							</select>
					
                  </div>
                 </div>
                 <div class="col-md-12">
                 	<div class="col-md-4" style="padding-left: 0px;padding-right: 0px;">
                  <div class="input-group no-print"> <span class="input-group-addon">Interes:</span>
                    <input id="filtrar" type="text" class="form-control" >
                  </div></div>
                  <div class="col-md-4" style="padding-left: 0px;padding-right: 0px;">
                  	<div class="input-group no-print"> <span class="input-group-addon">Comision:</span>
                    <input id="filtrar" type="text" class="form-control" >
                  </div></div>
                  <div class="col-md-4" style="padding-left: 0px;padding-right: 0px;">
                  <div class="input-group no-print"> <span class="input-group-addon">Custodio:</span>
                    <input id="filtrar" type="text" class="form-control" >
                  </div></div>
                 </div>
                 <div class="col-md-12">
                 	<?php  $date = date("Y-m-d"); $mod_date = strtotime($date."+ 1 months");?>
                  <div class="input-group no-print"> <span class="input-group-addon">Fecha Pago:</span>
                   <input type="date" name="credito_fechalimite" value="<?php echo date("Y-m-d",$mod_date); ?>" class=" form-control" id="credito_fechalimite" />
                  </div>
                 </div>
                 <div class="col-md-12">
                  <div class="input-group no-print"> <span class="input-group-addon">Capitalista:</span>
                    <input id="filtrar" type="text" class="form-control" >
                  </div>
                 </div>
                 <div class="col-md-12">
                  <div class="input-group no-print"> <span class="input-group-addon">Capital Disponible:</span>
                    <input id="filtrar" type="text" class="form-control" >
                  </div>
                 </div>
                  <div class="col-md-12">
                  <div class="input-group no-print"> <span class="input-group-addon">Cuotas:</span>
                    <input type="number" name="credito_cuotas" value="<?php echo $this->input->post('credito_cuotas'); ?>" class="form-control" id="credito_cuotas" />
                  </div>
                 </div>
                 <div class="col-md-12">
						
					<a class="btn btn-success" onclick="finalizar_credito()"><i class="fa fa-save"></i> Finalizar</a>
				
            	</div>
    	</div><!--box-->
    	</div><!--boxBODY-->
    </div><!--COL5-->
    </div><!--COL12-->

</div><!--ROW-->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Creditos</h3>
            	
            </div>
            <div class="box-body">
                <table class="table table-striped" id="mitabla">
                    <tr>
						<th>Credito Id</th>
						<th>Estado Id</th>
						<th>Grupo Id</th>
						<th>Garantia Id</th>
						<th>Usuario Id</th>
						<th>Tipocredito Id</th>
						<th>Cliente Id</th>
						<th>Credito Fechainicio</th>
						<th>Credito Horainicio</th>
						<th>Credito Monto</th>
						<th>Credito Interes</th>
						<th>Credito Cuotas</th>
						<th>Credito Fechalimite</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($credito as $c){ ?>
                    <tr>
						<td><?php echo $c['credito_id']; ?></td>
						<td><?php echo $c['estado_id']; ?></td>
						<td><?php echo $c['grupo_id']; ?></td>
						<td><?php echo $c['garantia_id']; ?></td>
						<td><?php echo $c['usuario_id']; ?></td>
						<td><?php echo $c['tipocredito_id']; ?></td>
						<td><?php echo $c['cliente_id']; ?></td>
						<td><?php echo $c['credito_fechainicio']; ?></td>
						<td><?php echo $c['credito_horainicio']; ?></td>
						<td><?php echo $c['credito_monto']; ?></td>
						<td><?php echo $c['credito_interes']; ?></td>
						<td><?php echo $c['credito_cuotas']; ?></td>
						<td><?php echo $c['credito_fechalimite']; ?></td>
						<td>
                            <a href="<?php echo site_url('credito/edit/'.$c['credito_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('credito/remove/'.$c['credito_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
