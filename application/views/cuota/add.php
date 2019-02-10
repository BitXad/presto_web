<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Cuota Add</h3>
            </div>
            <?php echo form_open('cuota/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="credito_id" class="control-label">Credito</label>
						<div class="form-group">
							<select name="credito_id" class="form-control">
								<option value="">select credito</option>
								<?php 
								foreach($all_credito as $credito)
								{
									$selected = ($credito['credito_id'] == $this->input->post('credito_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$credito['credito_id'].'" '.$selected.'>'.$credito['credito_id'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="usuario_id" class="control-label">Usuario</label>
						<div class="form-group">
							<select name="usuario_id" class="form-control">
								<option value="">select usuario</option>
								<?php 
								foreach($all_usuario as $usuario)
								{
									$selected = ($usuario['usuario_id'] == $this->input->post('usuario_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$usuario['usuario_id'].'" '.$selected.'>'.$usuario['usuario_nombre'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="estado_id" class="control-label">Estado</label>
						<div class="form-group">
							<select name="estado_id" class="form-control">
								<option value="">select estado</option>
								<?php 
								foreach($all_estado as $estado)
								{
									$selected = ($estado['estado_id'] == $this->input->post('estado_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$estado['estado_id'].'" '.$selected.'>'.$estado['estado_descripcion'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="cuota_numero" class="control-label">Cuota Numero</label>
						<div class="form-group">
							<input type="text" name="cuota_numero" value="<?php echo $this->input->post('cuota_numero'); ?>" class="form-control" id="cuota_numero" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="cuota_capital" class="control-label">Cuota Capital</label>
						<div class="form-group">
							<input type="text" name="cuota_capital" value="<?php echo $this->input->post('cuota_capital'); ?>" class="form-control" id="cuota_capital" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="cuota_interes" class="control-label">Cuota Interes</label>
						<div class="form-group">
							<input type="text" name="cuota_interes" value="<?php echo $this->input->post('cuota_interes'); ?>" class="form-control" id="cuota_interes" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="cuota_descuento" class="control-label">Cuota Descuento</label>
						<div class="form-group">
							<input type="text" name="cuota_descuento" value="<?php echo $this->input->post('cuota_descuento'); ?>" class="form-control" id="cuota_descuento" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="cuota_monto" class="control-label">Cuota Monto</label>
						<div class="form-group">
							<input type="text" name="cuota_monto" value="<?php echo $this->input->post('cuota_monto'); ?>" class="form-control" id="cuota_monto" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="cuota_fechalimite" class="control-label">Cuota Fechalimite</label>
						<div class="form-group">
							<input type="text" name="cuota_fechalimite" value="<?php echo $this->input->post('cuota_fechalimite'); ?>" class="has-datepicker form-control" id="cuota_fechalimite" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="cuota_montocancelado" class="control-label">Cuota Montocancelado</label>
						<div class="form-group">
							<input type="text" name="cuota_montocancelado" value="<?php echo $this->input->post('cuota_montocancelado'); ?>" class="form-control" id="cuota_montocancelado" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="cuota_fechapago" class="control-label">Cuota Fechapago</label>
						<div class="form-group">
							<input type="text" name="cuota_fechapago" value="<?php echo $this->input->post('cuota_fechapago'); ?>" class="has-datepicker form-control" id="cuota_fechapago" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="cuota_horapago" class="control-label">Cuota Horapago</label>
						<div class="form-group">
							<input type="text" name="cuota_horapago" value="<?php echo $this->input->post('cuota_horapago'); ?>" class="form-control" id="cuota_horapago" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="cuota_saldocapital" class="control-label">Cuota Saldocapital</label>
						<div class="form-group">
							<input type="text" name="cuota_saldocapital" value="<?php echo $this->input->post('cuota_saldocapital'); ?>" class="form-control" id="cuota_saldocapital" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="cuota_numrecibo" class="control-label">Cuota Numrecibo</label>
						<div class="form-group">
							<input type="text" name="cuota_numrecibo" value="<?php echo $this->input->post('cuota_numrecibo'); ?>" class="form-control" id="cuota_numrecibo" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="cuota_banco" class="control-label">Cuota Banco</label>
						<div class="form-group">
							<input type="text" name="cuota_banco" value="<?php echo $this->input->post('cuota_banco'); ?>" class="form-control" id="cuota_banco" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="cuota_glosa" class="control-label">Cuota Glosa</label>
						<div class="form-group">
							<input type="text" name="cuota_glosa" value="<?php echo $this->input->post('cuota_glosa'); ?>" class="form-control" id="cuota_glosa" />
						</div>
					</div>
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Save
            	</button>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>