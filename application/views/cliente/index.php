<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Cliente Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('cliente/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Cliente Id</th>
						<th>Estadocivil Id</th>
						<th>Estado Id</th>
						<th>Categoria Id</th>
						<th>Asesor Id</th>
						<th>Cliente Extencionci</th>
						<th>Cliente Nombre</th>
						<th>Cliente Apellido</th>
						<th>Cliente Ci</th>
						<th>Cliente Codigo</th>
						<th>Cliente Telefono</th>
						<th>Cliente Celular</th>
						<th>Cliente Direccion</th>
						<th>Cliente Latitud</th>
						<th>Cliente Longitud</th>
						<th>Cliente Referencia</th>
						<th>Cliente Foto</th>
						<th>Cliente Email</th>
						<th>Cliente Fechanac</th>
						<th>Cliente Nit</th>
						<th>Cliente Razon</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($cliente as $c){ ?>
                    <tr>
						<td><?php echo $c['cliente_id']; ?></td>
						<td><?php echo $c['estadocivil_id']; ?></td>
						<td><?php echo $c['estado_id']; ?></td>
						<td><?php echo $c['categoria_id']; ?></td>
						<td><?php echo $c['asesor_id']; ?></td>
						<td><?php echo $c['cliente_extencionci']; ?></td>
						<td><?php echo $c['cliente_nombre']; ?></td>
						<td><?php echo $c['cliente_apellido']; ?></td>
						<td><?php echo $c['cliente_ci']; ?></td>
						<td><?php echo $c['cliente_codigo']; ?></td>
						<td><?php echo $c['cliente_telefono']; ?></td>
						<td><?php echo $c['cliente_celular']; ?></td>
						<td><?php echo $c['cliente_direccion']; ?></td>
						<td><?php echo $c['cliente_latitud']; ?></td>
						<td><?php echo $c['cliente_longitud']; ?></td>
						<td><?php echo $c['cliente_referencia']; ?></td>
						<td><?php echo $c['cliente_foto']; ?></td>
						<td><?php echo $c['cliente_email']; ?></td>
						<td><?php echo $c['cliente_fechanac']; ?></td>
						<td><?php echo $c['cliente_nit']; ?></td>
						<td><?php echo $c['cliente_razon']; ?></td>
						<td>
                            <a href="<?php echo site_url('cliente/edit/'.$c['cliente_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('cliente/remove/'.$c['cliente_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
