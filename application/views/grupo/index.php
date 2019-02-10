<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Grupo Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('grupo/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Grupo Id</th>
						<th>Asesor Id</th>
						<th>Usuario Id</th>
						<th>Estado Id</th>
						<th>Grupo Fecha</th>
						<th>Grupo Hora</th>
						<th>Grupo Nombre</th>
						<th>Grupo Codigo</th>
						<th>Grupo Iniciosolicitud</th>
						<th>Grupo Monto</th>
						<th>Grupo Integrantes</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($grupo as $g){ ?>
                    <tr>
						<td><?php echo $g['grupo_id']; ?></td>
						<td><?php echo $g['asesor_id']; ?></td>
						<td><?php echo $g['usuario_id']; ?></td>
						<td><?php echo $g['estado_id']; ?></td>
						<td><?php echo $g['grupo_fecha']; ?></td>
						<td><?php echo $g['grupo_hora']; ?></td>
						<td><?php echo $g['grupo_nombre']; ?></td>
						<td><?php echo $g['grupo_codigo']; ?></td>
						<td><?php echo $g['grupo_iniciosolicitud']; ?></td>
						<td><?php echo $g['grupo_monto']; ?></td>
						<td><?php echo $g['grupo_integrantes']; ?></td>
						<td>
                            <a href="<?php echo site_url('grupo/edit/'.$g['grupo_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('grupo/remove/'.$g['grupo_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
