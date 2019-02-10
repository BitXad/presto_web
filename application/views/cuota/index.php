<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Cuota Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('cuota/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Cuota Id</th>
						<th>Credito Id</th>
						<th>Usuario Id</th>
						<th>Estado Id</th>
						<th>Cuota Numero</th>
						<th>Cuota Capital</th>
						<th>Cuota Interes</th>
						<th>Cuota Descuento</th>
						<th>Cuota Monto</th>
						<th>Cuota Fechalimite</th>
						<th>Cuota Montocancelado</th>
						<th>Cuota Fechapago</th>
						<th>Cuota Horapago</th>
						<th>Cuota Saldocapital</th>
						<th>Cuota Numrecibo</th>
						<th>Cuota Banco</th>
						<th>Cuota Glosa</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($cuota as $c){ ?>
                    <tr>
						<td><?php echo $c['cuota_id']; ?></td>
						<td><?php echo $c['credito_id']; ?></td>
						<td><?php echo $c['usuario_id']; ?></td>
						<td><?php echo $c['estado_id']; ?></td>
						<td><?php echo $c['cuota_numero']; ?></td>
						<td><?php echo $c['cuota_capital']; ?></td>
						<td><?php echo $c['cuota_interes']; ?></td>
						<td><?php echo $c['cuota_descuento']; ?></td>
						<td><?php echo $c['cuota_monto']; ?></td>
						<td><?php echo $c['cuota_fechalimite']; ?></td>
						<td><?php echo $c['cuota_montocancelado']; ?></td>
						<td><?php echo $c['cuota_fechapago']; ?></td>
						<td><?php echo $c['cuota_horapago']; ?></td>
						<td><?php echo $c['cuota_saldocapital']; ?></td>
						<td><?php echo $c['cuota_numrecibo']; ?></td>
						<td><?php echo $c['cuota_banco']; ?></td>
						<td><?php echo $c['cuota_glosa']; ?></td>
						<td>
                            <a href="<?php echo site_url('cuota/edit/'.$c['cuota_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('cuota/remove/'.$c['cuota_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
