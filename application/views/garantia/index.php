<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Garantia Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('garantia/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Garantia Id</th>
						<th>Estado Id</th>
						<th>Garantia Descripcion</th>
						<th>Garantia Codigo</th>
						<th>Garantia Cantidad</th>
						<th>Garantia Precio</th>
						<th>Garantia Observacion</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($garantia as $g){ ?>
                    <tr>
						<td><?php echo $g['garantia_id']; ?></td>
						<td><?php echo $g['estado_id']; ?></td>
						<td><?php echo $g['garantia_descripcion']; ?></td>
						<td><?php echo $g['garantia_codigo']; ?></td>
						<td><?php echo $g['garantia_cantidad']; ?></td>
						<td><?php echo $g['garantia_precio']; ?></td>
						<td><?php echo $g['garantia_observacion']; ?></td>
						<td>
                            <a href="<?php echo site_url('garantia/edit/'.$g['garantia_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('garantia/remove/'.$g['garantia_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
