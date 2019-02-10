<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Credito Add</h3>
            </div>
            <?php echo form_open('credito/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
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
						<label for="grupo_id" class="control-label">Grupo</label>
						<div class="form-group">
							<select name="grupo_id" class="form-control">
								<option value="">select grupo</option>
								<?php 
								foreach($all_grupo as $grupo)
								{
									$selected = ($grupo['grupo_id'] == $this->input->post('grupo_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$grupo['grupo_id'].'" '.$selected.'>'.$grupo['grupo_nombre'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="garantia_id" class="control-label">Garantia</label>
						<div class="form-group">
							<select name="garantia_id" class="form-control">
								<option value="">select garantia</option>
								<?php 
								foreach($all_garantia as $garantia)
								{
									$selected = ($garantia['garantia_id'] == $this->input->post('garantia_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$garantia['garantia_id'].'" '.$selected.'>'.$garantia['garantia_descripcion'].'</option>';
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
						<label for="tipocredito_id" class="control-label">Tipo Credito</label>
						<div class="form-group">
							<select name="tipocredito_id" class="form-control">
								<option value="">select tipo_credito</option>
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
					<div class="col-md-6">
						<label for="cliente_id" class="control-label">Cliente</label>
						<div class="form-group">
							<select name="cliente_id" class="form-control">
								<option value="">select cliente</option>
								<?php 
								foreach($all_cliente as $cliente)
								{
									$selected = ($cliente['cliente_id'] == $this->input->post('cliente_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$cliente['cliente_id'].'" '.$selected.'>'.$cliente['cliente_nombre'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="credito_fechainicio" class="control-label">Credito Fechainicio</label>
						<div class="form-group">
							<input type="text" name="credito_fechainicio" value="<?php echo $this->input->post('credito_fechainicio'); ?>" class="has-datepicker form-control" id="credito_fechainicio" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="credito_horainicio" class="control-label">Credito Horainicio</label>
						<div class="form-group">
							<input type="text" name="credito_horainicio" value="<?php echo $this->input->post('credito_horainicio'); ?>" class="form-control" id="credito_horainicio" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="credito_monto" class="control-label">Credito Monto</label>
						<div class="form-group">
							<input type="text" name="credito_monto" value="<?php echo $this->input->post('credito_monto'); ?>" class="form-control" id="credito_monto" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="credito_interes" class="control-label">Credito Interes</label>
						<div class="form-group">
							<input type="text" name="credito_interes" value="<?php echo $this->input->post('credito_interes'); ?>" class="form-control" id="credito_interes" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="credito_cuotas" class="control-label">Credito Cuotas</label>
						<div class="form-group">
							<input type="text" name="credito_cuotas" value="<?php echo $this->input->post('credito_cuotas'); ?>" class="form-control" id="credito_cuotas" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="credito_fechalimite" class="control-label">Credito Fechalimite</label>
						<div class="form-group">
							<input type="text" name="credito_fechalimite" value="<?php echo $this->input->post('credito_fechalimite'); ?>" class="has-datepicker form-control" id="credito_fechalimite" />
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