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
					<a class="btn btn-success btn-xs" onclick="creagarantia_aux()"><i class="fa fa-cart-arrow-down"></i> Agregar</a>
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
                  <div class="input-group no-print"> <span class="input-group-addon">Tipo de Credito:</span>
							
					 <input type="text" name="tipocredito_id" value="INDIVIDUAL" class="form-control" id="tipocredito_id" readonly />		
                  </div>
                 </div>
                 <div class="col-md-12">
                  <div class="input-group no-print"> <span class="input-group-addon">Tipo de Garantia:</span>
                   
							<select name="tipogarant_id" class="form-control" id="tipogarant_id">
							
								<?php 
								foreach($all_tipo_garantia as $tipo_garantia)
								{
									$selected = ($tipo_garantia['tipogarant_id'] == $this->input->post('tipogarant_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$tipo_garantia['tipogarant_id'].'" '.$selected.'>'.$tipo_garantia['tipogarant_nombre'].'</option>';
								} 
								?>
							</select>
					
                  </div>
                 </div>
                 <div class="col-md-12">
                  <div class="input-group no-print"> <span class="input-group-addon">Tipo de Interes:</span>
                   
							<select name="tipoint_id" class="form-control" id="tipoint_id">
							
								<?php 
								foreach($all_tipo_interes as $tipo_interes)
								{
									$selected = ($tipo_interes['tipoint_id'] == $this->input->post('tipoint_id')) ? ' 
									selected="selected"' : "";

									echo '<option value="'.$tipo_interes['tipoint_id'].'" '.$selected.'>'.$tipo_interes['tipoint_nombre'].'</option>';
								} 
								?>
							</select>
					
                  </div>
                 </div>
                 <div class="col-md-12">
                 	<div class="col-md-4" style="padding-left: 0px;padding-right: 0px;">
                  <div class="input-group no-print"> <span class="input-group-addon">Interes:</span>
                    <input id="credito_interes" name="credito_interes" value="4" type="text" class="form-control" >
                  </div></div>
                  <div class="col-md-4" style="padding-left: 0px;padding-right: 0px;">
                  	<div class="input-group no-print"> <span class="input-group-addon">Comision:</span>
                    <input id="credito_comision" name="credito_comision" value="2" type="text" class="form-control" >
                  </div></div>
                  <div class="col-md-4" style="padding-left: 0px;padding-right: 0px;">
                  <div class="input-group no-print"> <span class="input-group-addon">Custodio:</span>
                    <input id="credito_custodia" name="credito_custodia"  value="2" type="text" class="form-control" >
                  </div></div>
                 </div>
                 <div class="col-md-12">
                 	<?php  $date = date("Y-m-d"); $mod_date = strtotime($date."+ 1 months");?>
                  <div class="input-group no-print"> <span class="input-group-addon">Fecha Pago:</span>
                   <input type="date" name="credito_fechalimite" value="<?php echo date("Y-m-d",$mod_date); ?>" class=" form-control" id="credito_fechalimite" />
                  </div>
                 </div>
                 <!--<div class="col-md-12">
                  <div class="input-group no-print"> <span class="input-group-addon">Capitalista:</span>
                    <input id="Capitalista" type="text" class="form-control" >
                  </div>
                 </div>
                 <div class="col-md-12">
                  <div class="input-group no-print"> <span class="input-group-addon">Capital Disponible:</span>
                    <input id="capitaler" type="text" class="form-control" >
                  </div>
                 </div>-->
                  <div class="col-md-12">
                  <div class="input-group no-print"> <span class="input-group-addon">Cuotas:</span>
                   
                    <select name="credito_cuotas" id="credito_cuotas"class="form-control"  >
<option value="0">Sin Limite de Tiempo</option>
<option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
<option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option>
<option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option>
<option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option>
<option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option>
<option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option>
<option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option>
<option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option>
<option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option>
</select>
                  </div>
                 </div>
                 <div class="col-md-12">
						
					<a class="btn btn-success" onclick="finalizarindividual()"><i class="fa fa-save"></i> Finalizar</a>
				
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
						<th>#</th>
						<th>Cliente</th>
						<th>C.I.</th>
						<th>Telef.</th>
						<th>Fecha</th>
						<th>Hora</th>
						<th>Fechalimite</th>
						<th>Monto</th>
						<th>% int</th>
						<th>% com</th>
						<th>% cus</th>
						<th>Tipo</th>
						<th>Modalidad</th>
						<th>Usuario</th>
						<th>Estado</th>
						
						<th></th>
                    </tr>
                    <?php foreach($credito as $c){ ?>
                    <tr>
						<td><?php echo $c['credito_id']; ?></td>
						<td><?php echo $c['cliente_nombre']; ?></td>
						<td><?php echo $c['cliente_ci']; ?></td>
						<td><?php echo $c['cliente_telefono']; ?></td>
						<td><?php echo $c['credito_fechainicio']; ?></td>
						<td><?php echo $c['credito_horainicio']; ?></td>
						<td><?php echo $c['credito_fechalimite']; ?></td>
						<td><?php echo $c['credito_monto']; ?></td>
						<td><?php echo $c['credito_interes']; ?></td>
						<td><?php echo $c['credito_comision']; ?></td>
						<td><?php echo $c['credito_custodia']; ?></td>
						<td><?php echo $c['tipoint_nombre']; ?></td>
						<td><?php echo $c['tipogarant_nombre']; ?></td>
						<td><?php echo $c['usuario_nombre']; ?></td>
						<td style="background: <?php echo $c['estado_color']; ?>"><?php echo $c['estado_descripcion']; ?></td>
						<td>
                            <a href="<?php echo site_url('credito/edit/'.$c['credito_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span></a> 
                            <a href="<?php echo site_url('credito/remove/'.$c['credito_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>
                            <a href="<?php echo site_url('credito/completo/'.$c['credito_id']); ?>" target="_blank" class="btn btn-facebook btn-xs"><span class="fa fa-print"></span></a>
                           
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
