
<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Credito Listing</h3>
            	
            </div>
            <div class="box-body">
                <table class="table table-striped" id="mitabla">
                    <tr>
						<th>Credito Id</th>
						<th>Estado Id</th>
						<th>Grupo Id</th>
						<th>Garantia Id</th>
						<th>Usuario Id</th>
						<th>Tipocredito Id</th>
						<th>Cliente Id</th>
						<th>Credito Fechainicio</th>
						<th>Credito Horainicio</th>
						<th>Credito Monto</th>
						<th>Credito Interes</th>
						<th>Credito Cuotas</th>
						<th>Credito Fechalimite</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($credito as $c){ ?>
                    <tr>
						<td><?php echo $c['credito_id']; ?></td>
						<td><?php echo $c['estado_id']; ?></td>
						<td><?php echo $c['grupo_id']; ?></td>
						<td><?php echo $c['garantia_id']; ?></td>
						<td><?php echo $c['usuario_id']; ?></td>
						<td><?php echo $c['tipocredito_id']; ?></td>
						<td><?php echo $c['cliente_id']; ?></td>
						<td><?php echo $c['credito_fechainicio']; ?></td>
						<td><?php echo $c['credito_horainicio']; ?></td>
						<td><?php echo $c['credito_monto']; ?></td>
						<td><?php echo $c['credito_interes']; ?></td>
						<td><?php echo $c['credito_cuotas']; ?></td>
						<td><?php echo $c['credito_fechalimite']; ?></td>
						<td>
                            <a href="<?php echo site_url('credito/edit/'.$c['credito_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('credito/remove/'.$c['credito_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
