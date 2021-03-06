<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Editar Tipo Credito</h3>
            </div>
			<?php echo form_open('tipo_credito/edit/'.$tipo_credito['tipocredito_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="tipocredito_nombre" class="control-label">Tipocredito Nombre</label>
						<div class="form-group">
							<input type="text" name="tipocredito_nombre" value="<?php echo ($this->input->post('tipocredito_nombre') ? $this->input->post('tipocredito_nombre') : $tipo_credito['tipocredito_nombre']); ?>" class="form-control" id="tipocredito_nombre" onKeyUp="this.value = this.value.toUpperCase();" required />
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Guardar
				</button>
				<a href="<?php echo site_url('tipo_credito/index'); ?>" class="btn btn-danger">
                                <i class="fa fa-times"></i> Cancelar</a>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>