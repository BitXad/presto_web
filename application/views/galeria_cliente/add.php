<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Añadir Galeria</h3>
            </div>
            <?php echo form_open_multipart('estado_civil/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="galeria_nombre" class="control-label"><span class="text-danger">*</span>Nombre</label>
						<div class="form-group">
							<input type="text" name="galeria_nombre" value="<?php echo $this->input->post('galeria_nombre'); ?>" class="form-control" id="galeria_nombre" onKeyUp="this.value = this.value.toUpperCase();" required/>
					</div></div>
					<div class="col-md-6">
						<label for="galeria_imagen" class="control-label"><span class="text-danger">*</span>Imagen</label>
						<div class="form-group">
							<input type="file" name="galeria_imagen" value="<?php echo $this->input->post('galeria_imagen'); ?>" class="form-control" id="galeria_imagen" required/>
						</div>
					</div>
				</div>
			</div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
                <i class="fa fa-check"></i> Guardar
              </button>
              <a href="<?php echo site_url('estado_civil/index'); ?>" class="btn btn-danger">
                                <i class="fa fa-times"></i> Cancelar</a>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>