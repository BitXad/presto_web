<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Factura Edit</h3>
            </div>
			<?php echo form_open('factura/edit/'.$factura['factura_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="usuario_id" class="control-label">Usuario Id</label>
						<div class="form-group">
							<input type="text" name="usuario_id" value="<?php echo ($this->input->post('usuario_id') ? $this->input->post('usuario_id') : $factura['usuario_id']); ?>" class="form-control" id="usuario_id" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="cuota_id" class="control-label">Cuota Id</label>
						<div class="form-group">
							<input type="text" name="cuota_id" value="<?php echo ($this->input->post('cuota_id') ? $this->input->post('cuota_id') : $factura['cuota_id']); ?>" class="form-control" id="cuota_id" />
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