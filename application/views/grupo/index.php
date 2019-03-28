<!----------------------------- script buscador --------------------------------------->
<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
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
<!----------------------------- fin script buscador --------------------------------------->
<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Grupos</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('grupo/add'); ?>" class="btn btn-success btn-sm"><i class="fa fa-users"> </i> Registrar</a> 
                </div>
            </div>
            <div class="box-body  table-responsive">
                <table class="table table-striped" id="mitabla">
                    <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Codigo</th>
                            <th>Integ.</th>
                            <th>Asesor</th>
                            <th>Usuario</th>
                            <th>Estado Id</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>solicitud</th>
                            <th>Monto</th>
                            <th>Actions</th>
                    </tr>
                    <?php $i = 1; 
                        foreach($grupo as $g){ ?>
                    <tr>
                            <td><?php echo $i++; ?></td>
                            <td>
                                <font size="3"><b><?php echo $g['grupo_nombre']; ?></b></font><sub>[<?php echo $g['grupo_id']; ?>]</sub>
                            
                            </td>
                            <td><?php echo $g['grupo_codigo']; ?></td>
                            <td><?php echo $g['grupo_integrantes']; ?></td>
                            <td><?php echo $g['asesor_nombre']." ".$g['asesor_apellido']; ?></td>
                            <td><?php echo $g['usuario_nombre']; ?></td>
                            <td><?php echo $g['estado_descripcion']; ?></td>
                            <td><?php echo $g['grupo_fecha']; ?></td>
                            <td><?php echo $g['grupo_hora']; ?></td>
                            <td><?php echo $g['grupo_iniciosolicitud']; ?></td>
                            <td><font size="3"><b><?php echo number_format($g['grupo_monto'],2,".",","); ?></b></font size="3"></td>
                            <td>
                            <a href="<?php echo site_url('grupo/edit/'.$g['grupo_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Modif.</a> 
                            <a href="<?php echo site_url('grupo/remove/'.$g['grupo_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Borrar</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
