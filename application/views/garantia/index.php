<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Garantias</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('garantia/add'); ?>" class="btn btn-success btn-sm">+ Añadir</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped" id="mitabla">
                    <tr>
						<th>#</th>
						<th>Estado</th>
						<th>Descripcion</th>
						<th>Codigo</th>
						<th>Cantidad</th>
						<th>Precio</th>
						<th>Observacion</th>
						<th></th>
                    </tr>
                    <?php
                        $i = 0;
                        foreach($garantia as $g){ ?>
                    <tr>
                        <td><?php echo $i+1; ?></td>
						<td><?php echo $g['estado_descripcion']; ?></td>
						<td><?php echo $g['garantia_descripcion']; ?></td>
						<td><?php echo $g['garantia_codigo']; ?></td>
						<td><?php echo $g['garantia_cantidad']; ?></td>
						<td><?php echo $g['garantia_precio']; ?></td>
						<td><?php echo $g['garantia_observacion']; ?></td>
						<td>
                            <a href="<?php echo site_url('garantia/edit/'.$g['garantia_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span></a> 
                            <a href="<?php echo site_url('garantia/remove/'.$g['garantia_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
