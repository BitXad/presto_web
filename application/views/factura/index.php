<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Factura Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('factura/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Factura Id</th>
						<th>Usuario Id</th>
						<th>Cuota Id</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($factura as $f){ ?>
                    <tr>
						<td><?php echo $f['factura_id']; ?></td>
						<td><?php echo $f['usuario_id']; ?></td>
						<td><?php echo $f['cuota_id']; ?></td>
						<td>
                            <a href="<?php echo site_url('factura/edit/'.$f['factura_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('factura/remove/'.$f['factura_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
