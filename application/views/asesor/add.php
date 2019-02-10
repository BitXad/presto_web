<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Asesor Add</h3>
            </div>
            <?php echo form_open('asesor/add'); ?>
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
						<label for="asesor_nombre" class="control-label">Asesor Nombre</label>
						<div class="form-group">
							<input type="text" name="asesor_nombre" value="<?php echo $this->input->post('asesor_nombre'); ?>" class="form-control" id="asesor_nombre" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="asesor_apellido" class="control-label">Asesor Apellido</label>
						<div class="form-group">
							<input type="text" name="asesor_apellido" value="<?php echo $this->input->post('asesor_apellido'); ?>" class="form-control" id="asesor_apellido" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="asesor_ci" class="control-label">Asesor Ci</label>
						<div class="form-group">
							<input type="text" name="asesor_ci" value="<?php echo $this->input->post('asesor_ci'); ?>" class="form-control" id="asesor_ci" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="asesor_telefono" class="control-label">Asesor Telefono</label>
						<div class="form-group">
							<input type="text" name="asesor_telefono" value="<?php echo $this->input->post('asesor_telefono'); ?>" class="form-control" id="asesor_telefono" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="asesor_celular" class="control-label">Asesor Celular</label>
						<div class="form-group">
							<input type="text" name="asesor_celular" value="<?php echo $this->input->post('asesor_celular'); ?>" class="form-control" id="asesor_celular" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="asesor_latitud" class="control-label">Asesor Latitud</label>
						<div class="form-group">
							<input type="text" name="asesor_latitud" value="<?php echo $this->input->post('asesor_latitud'); ?>" class="form-control" id="asesor_latitud" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="asesor_longitud" class="control-label">Asesor Longitud</label>
						<div class="form-group">
							<input type="text" name="asesor_longitud" value="<?php echo $this->input->post('asesor_longitud'); ?>" class="form-control" id="asesor_longitud" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="asesor_foto" class="control-label">Asesor Foto</label>
						<div class="form-group">
							<input type="text" name="asesor_foto" value="<?php echo $this->input->post('asesor_foto'); ?>" class="form-control" id="asesor_foto" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="asesor_fechanac" class="control-label">Asesor Fechanac</label>
						<div class="form-group">
							<input type="text" name="asesor_fechanac" value="<?php echo $this->input->post('asesor_fechanac'); ?>" class="has-datepicker form-control" id="asesor_fechanac" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="asesor_profesion" class="control-label">Asesor Profesion</label>
						<div class="form-group">
							<input type="text" name="asesor_profesion" value="<?php echo $this->input->post('asesor_profesion'); ?>" class="form-control" id="asesor_profesion" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="asesor_espcialidad" class="control-label">Asesor Espcialidad</label>
						<div class="form-group">
							<input type="text" name="asesor_espcialidad" value="<?php echo $this->input->post('asesor_espcialidad'); ?>" class="form-control" id="asesor_espcialidad" />
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