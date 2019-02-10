<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Garantia Add</h3>
            </div>
            <?php echo form_open('garantia/add'); ?>
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
						<label for="garantia_descripcion" class="control-label">Garantia Descripcion</label>
						<div class="form-group">
							<input type="text" name="garantia_descripcion" value="<?php echo $this->input->post('garantia_descripcion'); ?>" class="form-control" id="garantia_descripcion" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="garantia_codigo" class="control-label">Garantia Codigo</label>
						<div class="form-group">
							<input type="text" name="garantia_codigo" value="<?php echo $this->input->post('garantia_codigo'); ?>" class="form-control" id="garantia_codigo" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="garantia_cantidad" class="control-label">Garantia Cantidad</label>
						<div class="form-group">
							<input type="text" name="garantia_cantidad" value="<?php echo $this->input->post('garantia_cantidad'); ?>" class="form-control" id="garantia_cantidad" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="garantia_precio" class="control-label">Garantia Precio</label>
						<div class="form-group">
							<input type="text" name="garantia_precio" value="<?php echo $this->input->post('garantia_precio'); ?>" class="form-control" id="garantia_precio" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="garantia_observacion" class="control-label">Garantia Observacion</label>
						<div class="form-group">
							<input type="text" name="garantia_observacion" value="<?php echo $this->input->post('garantia_observacion'); ?>" class="form-control" id="garantia_observacion" />
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