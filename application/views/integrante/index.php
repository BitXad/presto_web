<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Integrante Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('integrante/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Integrante Id</th>
						<th>Cliente Id</th>
						<th>Tipointeg Id</th>
						<th>Garantia Id</th>
						<th>Grupo Id</th>
						<th>Integrante Fechareg</th>
						<th>Integrante Horareg</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($integrante as $i){ ?>
                    <tr>
						<td><?php echo $i['integrante_id']; ?></td>
						<td><?php echo $i['cliente_id']; ?></td>
						<td><?php echo $i['tipointeg_id']; ?></td>
						<td><?php echo $i['garantia_id']; ?></td>
						<td><?php echo $i['grupo_id']; ?></td>
						<td><?php echo $i['integrante_fechareg']; ?></td>
						<td><?php echo $i['integrante_horareg']; ?></td>
						<td>
                            <a href="<?php echo site_url('integrante/edit/'.$i['integrante_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('integrante/remove/'.$i['integrante_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
