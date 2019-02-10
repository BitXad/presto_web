<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Asesor Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('asesor/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Asesor Id</th>
						<th>Estado Id</th>
						<th>Asesor Nombre</th>
						<th>Asesor Apellido</th>
						<th>Asesor Ci</th>
						<th>Asesor Telefono</th>
						<th>Asesor Celular</th>
						<th>Asesor Latitud</th>
						<th>Asesor Longitud</th>
						<th>Asesor Foto</th>
						<th>Asesor Fechanac</th>
						<th>Asesor Profesion</th>
						<th>Asesor Espcialidad</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($asesor as $a){ ?>
                    <tr>
						<td><?php echo $a['asesor_id']; ?></td>
						<td><?php echo $a['estado_id']; ?></td>
						<td><?php echo $a['asesor_nombre']; ?></td>
						<td><?php echo $a['asesor_apellido']; ?></td>
						<td><?php echo $a['asesor_ci']; ?></td>
						<td><?php echo $a['asesor_telefono']; ?></td>
						<td><?php echo $a['asesor_celular']; ?></td>
						<td><?php echo $a['asesor_latitud']; ?></td>
						<td><?php echo $a['asesor_longitud']; ?></td>
						<td><?php echo $a['asesor_foto']; ?></td>
						<td><?php echo $a['asesor_fechanac']; ?></td>
						<td><?php echo $a['asesor_profesion']; ?></td>
						<td><?php echo $a['asesor_espcialidad']; ?></td>
						<td>
                            <a href="<?php echo site_url('asesor/edit/'.$a['asesor_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('asesor/remove/'.$a['asesor_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
