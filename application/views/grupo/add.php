<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Registra: Grupo</h3>
            </div>
            <?php echo form_open('grupo/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="asesor_id" class="control-label">Asesor(*)</label>
						<div class="form-group">
                                                    <select name="asesor_id" class="form-control" required autofocus="true">
								<option value="">- ASESOR -</option>    
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
<!--					<div class="col-md-6">
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
					</div>-->
<!--					<div class="col-md-6">
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
					</div>-->

					<div class="col-md-6" hidden>
						<label for="grupo_fecha" class="control-label">Fecha</label>
						<div class="form-group">
                                                    <input type="date" name="grupo_fecha" value="<?php echo date('Y-m-d'); ?>" class="form-control" id="grupo_fecha"/>
						</div>
					</div>
					<div class="col-md-6" hidden>
						<label for="grupo_hora" class="control-label">Hora</label>
						<div class="form-group">
							<input type="time" name="grupo_hora" value="<?php echo date('H:i:s'); ?>" class="form-control" id="grupo_hora" />
						</div>
					</div>

					<div class="col-md-6">
						<label for="grupo_nombre" class="control-label">Nombre/Grupo(*)</label>
						<div class="form-group">
							<input type="text" name="grupo_nombre" value="<?php echo $this->input->post('grupo_nombre'); ?>" class="form-control" id="grupo_nombre" required  onKeyUp="this.value = this.value.toUpperCase();"/>
						</div>
					</div>
					<div class="col-md-3">
						<label for="grupo_codigo" class="control-label">Código</label>
						<div class="form-group">
							<input type="text" name="grupo_codigo" value="<?php echo $this->input->post('grupo_codigo'); ?>" class="form-control" id="grupo_codigo" required  onKeyUp="this.value = this.value.toUpperCase();"/>
						</div>
					</div>
					<div class="col-md-3">
						<label for="grupo_iniciosolicitud" class="control-label">Fecha Solicitud</label>
						<div class="form-group">
							<input type="date" name="grupo_iniciosolicitud" value="<?php echo date('Y-m-d'); ?>" class="form-control" id="grupo_iniciosolicitud" />
						</div>
					</div>
					<div class="col-md-3">
						<label for="grupo_monto" class="control-label">Monto Solicitado Bs</label>
						<div class="form-group">
							<input type="text" name="grupo_monto" value="<?php echo $this->input->post('grupo_monto'); ?>" class="form-control" id="grupo_monto" required/>
						</div>
					</div>
					<div class="col-md-3">
						<label for="grupo_integrantes" class="control-label">Num. Integrantes(*)</label>
						<div class="form-group">
                                                    <input type="number" name="grupo_integrantes" value="<?php echo $this->input->post('grupo_integrantes'); ?>" class="form-control" id="grupo_integrantes" required/>
						</div>
					</div>
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-floppy-o"></i> Guardar
            	</button>
            	<a href="<?php echo base_url('grupo'); ?>" type="button" class="btn btn-danger">
            		<i class="fa fa-close"></i> Cancelar
            	</a>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>