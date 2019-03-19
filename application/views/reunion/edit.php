<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Editar Reunion</h3>
            </div>
			<?php echo form_open('reunion/edit/'.$reunion['reunion_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="grupo_id" class="control-label">Grupo</label>
						<div class="form-group">
							<select name="grupo_id" class="form-control" required>
								<option value="">select grupo</option>
								<?php 
								foreach($all_grupo as $grupo)
								{
									$selected = ($grupo['grupo_id'] == $reunion['grupo_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$grupo['grupo_id'].'" '.$selected.'>'.$grupo['grupo_nombre'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="reunion_fecha" class="control-label">Fecha</label>
						<div class="form-group">
							<input type="date" name="reunion_fecha" value="<?php echo ($this->input->post('reunion_fecha') ? $this->input->post('reunion_fecha') : $reunion['reunion_fecha']); ?>" class="form-control" id="reunion_fecha" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="reunion_hora" class="control-label">Hora</label>
						<div class="form-group">
							<input type="time" name="reunion_hora" value="<?php echo ($this->input->post('reunion_hora') ? $this->input->post('reunion_hora') : $reunion['reunion_hora']); ?>" class="form-control" id="reunion_hora" />
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