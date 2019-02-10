<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Tipo Credito Edit</h3>
            </div>
			<?php echo form_open('tipo_credito/edit/'.$tipo_credito['tipocredito_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="tipocredito_nombre" class="control-label">Tipocredito Nombre</label>
						<div class="form-group">
							<input type="text" name="tipocredito_nombre" value="<?php echo ($this->input->post('tipocredito_nombre') ? $this->input->post('tipocredito_nombre') : $tipo_credito['tipocredito_nombre']); ?>" class="form-control" id="tipocredito_nombre" />
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