<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Garante Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('garante/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Garante Id</th>
						<th>Cliente Id</th>
						<th>Garantia Id</th>
						<th>Credito Id</th>
						<th>Garante Fecha</th>
						<th>Garante Hora</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($garante as $g){ ?>
                    <tr>
						<td><?php echo $g['garante_id']; ?></td>
						<td><?php echo $g['cliente_id']; ?></td>
						<td><?php echo $g['garantia_id']; ?></td>
						<td><?php echo $g['credito_id']; ?></td>
						<td><?php echo $g['garante_fecha']; ?></td>
						<td><?php echo $g['garante_hora']; ?></td>
						<td>
                            <a href="<?php echo site_url('garante/edit/'.$g['garante_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('garante/remove/'.$g['garante_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
