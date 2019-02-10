<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Tipo Integrante Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('tipo_integrante/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Tipointeg Id</th>
						<th>Tipointeg Nombre</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($tipo_integrante as $t){ ?>
                    <tr>
						<td><?php echo $t['tipointeg_id']; ?></td>
						<td><?php echo $t['tipointeg_nombre']; ?></td>
						<td>
                            <a href="<?php echo site_url('tipo_integrante/edit/'.$t['tipointeg_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('tipo_integrante/remove/'.$t['tipointeg_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
