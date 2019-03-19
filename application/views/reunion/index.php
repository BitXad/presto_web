<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Reunion</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('reunion/add'); ?>" class="btn btn-success btn-sm">+ Añadir</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped" id="mitabla">
                    <tr>
						<th>#</th>
						<th>Grupo</th>
						<th>Fecha</th>
						<th>Hora</th>
						<th></th>
                    </tr>
                    <?php $i=0; 
                    foreach($reunion as $r){ 
                        $i=$i+1; ?>
                    <tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $r['grupo_nombre']; ?></td>
						<td><?php echo date('d/m/Y',strtotime($r['reunion_fecha'])); ?></td>
						<td><?php echo $r['reunion_hora']; ?></td>
						<td>
                            <a href="<?php echo site_url('reunion/edit/'.$r['reunion_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span></a> 
                            <a href="<?php echo site_url('reunion/remove/'.$r['reunion_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
