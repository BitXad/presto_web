<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Tipo Integrante Edit</h3>
            </div>
			<?php echo form_open('tipo_integrante/edit/'.$tipo_integrante['tipointeg_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="tipointeg_nombre" class="control-label">Tipointeg Nombre</label>
						<div class="form-group">
							<input type="text" name="tipointeg_nombre" value="<?php echo ($this->input->post('tipointeg_nombre') ? $this->input->post('tipointeg_nombre') : $tipo_integrante['tipointeg_nombre']); ?>" class="form-control" id="tipointeg_nombre" />
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