<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Añadir Reunion</h3>
            </div>
            <?php echo form_open('reunion/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="grupo_id" class="control-label">Grupo</label>
						<div class="form-group">
							<select name="grupo_id" class="form-control" required>
								<option value="">- GRUPO -</option>
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
						<label for="reunion_fecha" class="control-label">Fecha</label>
						<div class="form-group">
							<input type="date" name="reunion_fecha" value="<?php echo ($this->input->post('reunion_fecha') ? $this->input->post('reunion_fecha') : date("Y-m-d")); ?>" class="form-control" id="reunion_fecha" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="reunion_hora" class="control-label">Hora</label>
						<div class="form-group">
							<input type="time" name="reunion_hora" value="<?php echo ($this->input->post('reunion_hora') ? $this->input->post('reunion_hora') : date("H:i:s")); ?>" class="form-control" id="reunion_hora" />
						</div>
					</div>
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Guardar
            	</button>
              <a href="<?php echo site_url('reunion/index'); ?>" class="btn btn-danger">
                                <i class="fa fa-times"></i> Cancelar</a>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>