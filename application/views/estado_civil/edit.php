<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Editar Estado Civil</h3>
            </div>
			<?php echo form_open('estado_civil/edit/'.$estado_civil['estadocivil_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="estadocivil_nombre" class="control-label"><span class="text-danger">*</span>nombre</label>
						<div class="form-group">
							<input type="text" name="estadocivil_nombre" value="<?php echo ($this->input->post('estadocivil_nombre') ? $this->input->post('estadocivil_nombre') : $estado_civil['estadocivil_nombre']); ?>" class="form-control" id="estadocivil_nombre" onKeyUp="this.value = this.value.toUpperCase();" required/>
							<span class="text-danger"><?php echo form_error('estadocivil_nombre');?></span>
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