<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Integrante Add</h3>
            </div>
            <?php echo form_open('integrante/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
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
						<label for="tipointeg_id" class="control-label">Tipo Integrante</label>
						<div class="form-group">
							<select name="tipointeg_id" class="form-control">
								<option value="">select tipo_integrante</option>
								<?php 
								foreach($all_tipo_integrante as $tipo_integrante)
								{
									$selected = ($tipo_integrante['tipointeg_id'] == $this->input->post('tipointeg_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$tipo_integrante['tipointeg_id'].'" '.$selected.'>'.$tipo_integrante['tipointeg_nombre'].'</option>';
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
						<label for="integrante_fechareg" class="control-label">Integrante Fechareg</label>
						<div class="form-group">
							<input type="text" name="integrante_fechareg" value="<?php echo $this->input->post('integrante_fechareg'); ?>" class="has-datepicker form-control" id="integrante_fechareg" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="integrante_horareg" class="control-label">Integrante Horareg</label>
						<div class="form-group">
							<input type="text" name="integrante_horareg" value="<?php echo $this->input->post('integrante_horareg'); ?>" class="form-control" id="integrante_horareg" />
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