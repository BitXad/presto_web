<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Categoria Edit</h3>
            </div>
			<?php echo form_open('categoria/edit/'.$categoria['categoria_id']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="categoria_nombre" class="control-label">Categoria Nombre</label>
						<div class="form-group">
							<input type="text" name="categoria_nombre" value="<?php echo ($this->input->post('categoria_nombre') ? $this->input->post('categoria_nombre') : $categoria['categoria_nombre']); ?>" class="form-control" id="categoria_nombre" />
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