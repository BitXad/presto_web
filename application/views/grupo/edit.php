<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Grupo Edit</h3>
            </div>
			<?php echo form_open('grupo/edit/'.$grupo['grupo_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="asesor_id" class="control-label">Asesor</label>
						<div class="form-group">
							<select name="asesor_id" class="form-control">
								<option value="">select asesor</option>
								<?php 
								foreach($all_asesor as $asesor)
								{
									$selected = ($asesor['asesor_id'] == $grupo['asesor_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$asesor['asesor_id'].'" '.$selected.'>'.$asesor['asesor_nombre'].'</option>';
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
									$selected = ($usuario['usuario_id'] == $grupo['usuario_id']) ? ' selected="selected"' : "";

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
									$selected = ($estado['estado_id'] == $grupo['estado_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$estado['estado_id'].'" '.$selected.'>'.$estado['estado_descripcion'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="grupo_fecha" class="control-label">Grupo Fecha</label>
						<div class="form-group">
							<input type="text" name="grupo_fecha" value="<?php echo ($this->input->post('grupo_fecha') ? $this->input->post('grupo_fecha') : $grupo['grupo_fecha']); ?>" class="has-datepicker form-control" id="grupo_fecha" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="grupo_hora" class="control-label">Grupo Hora</label>
						<div class="form-group">
							<input type="text" name="grupo_hora" value="<?php echo ($this->input->post('grupo_hora') ? $this->input->post('grupo_hora') : $grupo['grupo_hora']); ?>" class="form-control" id="grupo_hora" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="grupo_nombre" class="control-label">Grupo Nombre</label>
						<div class="form-group">
							<input type="text" name="grupo_nombre" value="<?php echo ($this->input->post('grupo_nombre') ? $this->input->post('grupo_nombre') : $grupo['grupo_nombre']); ?>" class="form-control" id="grupo_nombre" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="grupo_codigo" class="control-label">Grupo Codigo</label>
						<div class="form-group">
							<input type="text" name="grupo_codigo" value="<?php echo ($this->input->post('grupo_codigo') ? $this->input->post('grupo_codigo') : $grupo['grupo_codigo']); ?>" class="form-control" id="grupo_codigo" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="grupo_iniciosolicitud" class="control-label">Grupo Iniciosolicitud</label>
						<div class="form-group">
							<input type="text" name="grupo_iniciosolicitud" value="<?php echo ($this->input->post('grupo_iniciosolicitud') ? $this->input->post('grupo_iniciosolicitud') : $grupo['grupo_iniciosolicitud']); ?>" class="has-datepicker form-control" id="grupo_iniciosolicitud" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="grupo_monto" class="control-label">Grupo Monto</label>
						<div class="form-group">
							<input type="text" name="grupo_monto" value="<?php echo ($this->input->post('grupo_monto') ? $this->input->post('grupo_monto') : $grupo['grupo_monto']); ?>" class="form-control" id="grupo_monto" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="grupo_integrantes" class="control-label">Grupo Integrantes</label>
						<div class="form-group">
							<input type="text" name="grupo_integrantes" value="<?php echo ($this->input->post('grupo_integrantes') ? $this->input->post('grupo_integrantes') : $grupo['grupo_integrantes']); ?>" class="form-control" id="grupo_integrantes" />
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