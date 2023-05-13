<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Multa Edit</h3>
            </div>
			<?php echo form_open('multa/mismultas/'.$multa['multa_id']); ?>
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
									$selected = ($reunion['reunion_id'] == $multa['reunion_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$reunion['reunion_id'].'" '.$selected.'>'.$reunion['reunion_fecha'].'</option>';
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
									$selected = ($usuario['usuario_id'] == $multa['usuario_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$usuario['usuario_id'].'" '.$selected.'>'.$usuario['usuario_nombre'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="multa_monto" class="control-label">Multa Monto</label>
						<div class="form-group">
							<input type="text" name="multa_monto" value="<?php echo ($this->input->post('multa_monto') ? $this->input->post('multa_monto') : $multa['multa_monto']); ?>" class="form-control" id="multa_monto" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="multa_fecha" class="control-label">Multa Fecha</label>
						<div class="form-group">
							<input type="text" name="multa_fecha" value="<?php echo ($this->input->post('multa_fecha') ? $this->input->post('multa_fecha') : $multa['multa_fecha']); ?>" class="has-datepicker form-control" id="multa_fecha" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="multa_hora" class="control-label">Multa Hora</label>
						<div class="form-group">
							<input type="text" name="multa_hora" value="<?php echo ($this->input->post('multa_hora') ? $this->input->post('multa_hora') : $multa['multa_hora']); ?>" class="form-control" id="multa_hora" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="multa_detalle" class="control-label">Multa Detalle</label>
						<div class="form-group">
							<input type="text" name="multa_detalle" value="<?php echo ($this->input->post('multa_detalle') ? $this->input->post('multa_detalle') : $multa['multa_detalle']); ?>" class="form-control" id="multa_detalle" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="multa_numrec" class="control-label">Multa Numrec</label>
						<div class="form-group">
							<input type="text" name="multa_numrec" value="<?php echo ($this->input->post('multa_numrec') ? $this->input->post('multa_numrec') : $multa['multa_numrec']); ?>" class="form-control" id="multa_numrec" />
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