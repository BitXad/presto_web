<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Cliente Add</h3>
            </div>
            <?php echo form_open('cliente/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="estadocivil_id" class="control-label">Estado Civil</label>
						<div class="form-group">
							<select name="estadocivil_id" class="form-control">
								<option value="">select estado_civil</option>
								<?php 
								foreach($all_estado_civil as $estado_civil)
								{
									$selected = ($estado_civil['estadocivil_id'] == $this->input->post('estadocivil_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$estado_civil['estadocivil_id'].'" '.$selected.'>'.$estado_civil['estadocivil_nombre'].'</option>';
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
						<label for="categoria_id" class="control-label">Categoria</label>
						<div class="form-group">
							<select name="categoria_id" class="form-control">
								<option value="">select categoria</option>
								<?php 
								foreach($all_categoria as $categoria)
								{
									$selected = ($categoria['categoria_id'] == $this->input->post('categoria_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$categoria['categoria_id'].'" '.$selected.'>'.$categoria['categoria_nombre'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="asesor_id" class="control-label">Asesor</label>
						<div class="form-group">
							<select name="asesor_id" class="form-control">
								<option value="">select asesor</option>
								<?php 
								foreach($all_asesor as $asesor)
								{
									$selected = ($asesor['asesor_id'] == $this->input->post('asesor_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$asesor['asesor_id'].'" '.$selected.'>'.$asesor['asesor_nombre'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="cliente_extencionci" class="control-label">Cliente Extencionci</label>
						<div class="form-group">
							<input type="text" name="cliente_extencionci" value="<?php echo $this->input->post('cliente_extencionci'); ?>" class="form-control" id="cliente_extencionci" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="cliente_nombre" class="control-label">Cliente Nombre</label>
						<div class="form-group">
							<input type="text" name="cliente_nombre" value="<?php echo $this->input->post('cliente_nombre'); ?>" class="form-control" id="cliente_nombre" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="cliente_apellido" class="control-label">Cliente Apellido</label>
						<div class="form-group">
							<input type="text" name="cliente_apellido" value="<?php echo $this->input->post('cliente_apellido'); ?>" class="form-control" id="cliente_apellido" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="cliente_ci" class="control-label">Cliente Ci</label>
						<div class="form-group">
							<input type="text" name="cliente_ci" value="<?php echo $this->input->post('cliente_ci'); ?>" class="form-control" id="cliente_ci" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="cliente_codigo" class="control-label">Cliente Codigo</label>
						<div class="form-group">
							<input type="text" name="cliente_codigo" value="<?php echo $this->input->post('cliente_codigo'); ?>" class="form-control" id="cliente_codigo" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="cliente_telefono" class="control-label">Cliente Telefono</label>
						<div class="form-group">
							<input type="text" name="cliente_telefono" value="<?php echo $this->input->post('cliente_telefono'); ?>" class="form-control" id="cliente_telefono" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="cliente_celular" class="control-label">Cliente Celular</label>
						<div class="form-group">
							<input type="text" name="cliente_celular" value="<?php echo $this->input->post('cliente_celular'); ?>" class="form-control" id="cliente_celular" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="cliente_direccion" class="control-label">Cliente Direccion</label>
						<div class="form-group">
							<input type="text" name="cliente_direccion" value="<?php echo $this->input->post('cliente_direccion'); ?>" class="form-control" id="cliente_direccion" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="cliente_latitud" class="control-label">Cliente Latitud</label>
						<div class="form-group">
							<input type="text" name="cliente_latitud" value="<?php echo $this->input->post('cliente_latitud'); ?>" class="form-control" id="cliente_latitud" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="cliente_longitud" class="control-label">Cliente Longitud</label>
						<div class="form-group">
							<input type="text" name="cliente_longitud" value="<?php echo $this->input->post('cliente_longitud'); ?>" class="form-control" id="cliente_longitud" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="cliente_referencia" class="control-label">Cliente Referencia</label>
						<div class="form-group">
							<input type="text" name="cliente_referencia" value="<?php echo $this->input->post('cliente_referencia'); ?>" class="form-control" id="cliente_referencia" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="cliente_foto" class="control-label">Cliente Foto</label>
						<div class="form-group">
							<input type="text" name="cliente_foto" value="<?php echo $this->input->post('cliente_foto'); ?>" class="form-control" id="cliente_foto" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="cliente_email" class="control-label">Cliente Email</label>
						<div class="form-group">
							<input type="text" name="cliente_email" value="<?php echo $this->input->post('cliente_email'); ?>" class="form-control" id="cliente_email" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="cliente_fechanac" class="control-label">Cliente Fechanac</label>
						<div class="form-group">
							<input type="text" name="cliente_fechanac" value="<?php echo $this->input->post('cliente_fechanac'); ?>" class="has-datepicker form-control" id="cliente_fechanac" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="cliente_nit" class="control-label">Cliente Nit</label>
						<div class="form-group">
							<input type="text" name="cliente_nit" value="<?php echo $this->input->post('cliente_nit'); ?>" class="form-control" id="cliente_nit" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="cliente_razon" class="control-label">Cliente Razon</label>
						<div class="form-group">
							<input type="text" name="cliente_razon" value="<?php echo $this->input->post('cliente_razon'); ?>" class="form-control" id="cliente_razon" />
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