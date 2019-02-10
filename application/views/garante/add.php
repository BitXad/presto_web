<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Garante Add</h3>
            </div>
            <?php echo form_open('garante/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<label for="cliente_id" class="control-label">Cliente Id</label>
						<div class="form-group">
							<input type="text" name="cliente_id" value="<?php echo $this->input->post('cliente_id'); ?>" class="form-control" id="cliente_id" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="garantia_id" class="control-label">Garantia Id</label>
						<div class="form-group">
							<input type="text" name="garantia_id" value="<?php echo $this->input->post('garantia_id'); ?>" class="form-control" id="garantia_id" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="credito_id" class="control-label">Credito Id</label>
						<div class="form-group">
							<input type="text" name="credito_id" value="<?php echo $this->input->post('credito_id'); ?>" class="form-control" id="credito_id" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="garante_fecha" class="control-label">Garante Fecha</label>
						<div class="form-group">
							<input type="text" name="garante_fecha" value="<?php echo $this->input->post('garante_fecha'); ?>" class="has-datepicker form-control" id="garante_fecha" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="garante_hora" class="control-label">Garante Hora</label>
						<div class="form-group">
							<input type="text" name="garante_hora" value="<?php echo $this->input->post('garante_hora'); ?>" class="form-control" id="garante_hora" />
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