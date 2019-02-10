<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Multa Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('multa/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Multa Id</th>
						<th>Reunion Id</th>
						<th>Usuario Id</th>
						<th>Multa Monto</th>
						<th>Multa Fecha</th>
						<th>Multa Hora</th>
						<th>Multa Detalle</th>
						<th>Multa Numrec</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($multa as $m){ ?>
                    <tr>
						<td><?php echo $m['multa_id']; ?></td>
						<td><?php echo $m['reunion_id']; ?></td>
						<td><?php echo $m['usuario_id']; ?></td>
						<td><?php echo $m['multa_monto']; ?></td>
						<td><?php echo $m['multa_fecha']; ?></td>
						<td><?php echo $m['multa_hora']; ?></td>
						<td><?php echo $m['multa_detalle']; ?></td>
						<td><?php echo $m['multa_numrec']; ?></td>
						<td>
                            <a href="<?php echo site_url('multa/edit/'.$m['multa_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('multa/remove/'.$m['multa_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
