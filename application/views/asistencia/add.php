<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Asistencia Add</h3>
            </div>
            <?php echo form_open('asistencia/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="reunion_id" class="control-label">Reunion</label>
						<div class="form-group">
							<select name="reunion_id" class="form-control">
								<option value="">select reunion</option>
								<?php 
								foreach($all_reunion as $reunion)
								{
									$selected = ($reunion['reunion_id'] == $this->input->post('reunion_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$reunion['reunion_id'].'" '.$selected.'>'.$reunion['grupo_id'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="aistencia_fecha" class="control-label">Aistencia Fecha</label>
						<div class="form-group">
							<input type="text" name="aistencia_fecha" value="<?php echo $this->input->post('aistencia_fecha'); ?>" class="has-datepicker form-control" id="aistencia_fecha" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="aistencia_hora" class="control-label">Aistencia Hora</label>
						<div class="form-group">
							<input type="text" name="aistencia_hora" value="<?php echo $this->input->post('aistencia_hora'); ?>" class="form-control" id="aistencia_hora" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="aistencia_registro" class="control-label">Aistencia Registro</label>
						<div class="form-group">
							<input type="text" name="aistencia_registro" value="<?php echo $this->input->post('aistencia_registro'); ?>" class="form-control" id="aistencia_registro" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="asistencia_observacion" class="control-label">Asistencia Observacion</label>
						<div class="form-group">
							<input type="text" name="asistencia_observacion" value="<?php echo $this->input->post('asistencia_observacion'); ?>" class="form-control" id="asistencia_observacion" />
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