<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
<script type="text/javascript">
        $(document).ready(function () {
            
            (function ($) {
                $('#filtrar').keyup(function () {
                    var rex = new RegExp($(this).val(), 'i');
                    $('.buscar tr').hide();
                    $('.buscar tr').filter(function () {
                        return rex.test($(this).text());
                    }).show();
                })
            }(jQuery));
        });
</script>

<div class="box-header">
    <h3 class="box-title">Reuni&oacute;n</h3>
    <div class="box-tools">
        <a href="<?php echo site_url('reunion/add'); ?>" class="btn btn-success btn-sm">+ Añadir</a> 
    </div>
</div>
<div class="row no-print">
    <div class="col-md-9">
        <div class="col-md-12">
            <!-- <ol class="breadcrumb">
                <li><a href="<?php //echo site_url('')?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
                <li class="active"><b>Clientes: </b></li>
                <input style="border-width: 0; background-color: #DEDEDE" id="encontrados" type="text"  size="5" value=" 0" readonly="true">
            </ol>-->
            <div class="input-group">
                <span class="input-group-addon">Buscar</span>           
                <input id="filtrar" type="text" class="form-control" placeholder="Ingrese el nombre, número de reunión" onkeypress="buscar_reunion(event)" autocomplete="off" autofocus >
            </div>
        </div>
    </div>
</div>
<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            
            <div class="box-body">
                <table class="table table-striped" id="mitabla">
                    <tr>
						<th>#</th>
						<th>Grupo</th>
						<th>Fecha</th>
						<th>Hora</th>
						<th></th>
                    </tr>
                    <tbody class="buscar">
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
                            <a href="<?php echo site_url('reunion/genasistencia/'.$r['reunion_id']); ?>" class="btn btn-warning btn-xs" title="instalar reunión"><span class="fa fa-users"></span></a>
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
                                
            </div>
        </div>
    </div>
</div>
