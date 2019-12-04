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

            <div class="input-group">
                      <span class="input-group-addon"> 
                        Buscar 
                      </span>           
                <input id="filtrar" type="text" class="form-control" placeholder="Ingresa el nombre del grupo, del asesor"  >
            </div>
            <div class="box-body  table-responsive">
                <table class="table table-striped" id="mitabla">
                    <tr>
                        <th>#</th>
                        <th>Grupo</th>
                        <th>Ciclo</th>
                        <th>Codigo</th>
                        <th>Integ.</th>
                        <th>Asesor</th>
                        <th>Usuario</th>
                        <th>Estado</th>
                        <th>Fecha</th>
                        <th>Solicitud</th>
                        <th>Monto</th>
                        <th></th>
                    </tr>
                    <tbody class="buscar">
                    <?php $i = 1; 
                    foreach($grupo as $g){ ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td>
                            <font size="3"><b><?php echo $g['grupo_nombre']; ?></b></font><sub>[<?php echo $g['grupo_id']; ?>]</sub>

                        </td>
                        <td><?php echo $g['grupo_ciclo']; ?></td>
                        <td><?php echo $g['grupo_codigo']; ?></td>
                        <td><?php echo $g['grupo_integrantes']; ?></td>
                        <td><?php echo $g['asesor_nombre']." ".$g['asesor_apellido']; ?></td>
                        <td><?php echo $g['usuario_nombre']; ?></td>
                        <td><?php echo $g['estado_descripcion']; ?></td>
                        <td><?php echo $g['grupo_fecha']; ?><br>
                        <?php echo $g['grupo_hora']; ?></td>
                        <td><?php echo $g['grupo_iniciosolicitud']; ?></td>
                        <td><font size="3"><b><?php echo number_format($g['grupo_monto'],2,".",","); ?></b></font size="3"></td>
                        <td>
                            
                        
                            <a href="<?php echo site_url('grupo/edit/'.$g['grupo_id']); ?>" class="btn btn-info btn-xs" title="Modifcar caracteristicas del grupo"><span class="fa fa-pencil"></span> Modif.</a> 
                            <a href="<?php echo site_url('grupo/integrantes/'.$g['grupo_id']); ?>" class="btn btn-facebook btn-xs" title="Modificar integrantes/montos solicitados"><span class="fa fa-users"></span> Modif.</a> 
                            <?php if ($g['estado_id']!=14) {  ?>
                            <a href="<?php echo site_url('grupo/add_new/'.$g['grupo_id']); ?>" class="btn btn-soundcloud btn-xs" title="Registrar Nuevo Grupo con esta Información"><span class="fa fa-plus-circle"></span> Nuevo</a> 
                             <?php } ?>
                            <a class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal<?php echo $i; ?>"  title="Eliminar"><span class="fa fa-trash"></span> Borrar</a>
                            <div style="white-space: normal !important;" class="modal fade" id="myModal<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $i; ?>">
                                      <div class="modal-dialog" role="document">
                                            <br><br>
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                                 
                                          </div>
                                          <div class="modal-body">

                                          

                                           <h1><b> <em class="fa fa-trash"></em></b>
                                               ¿Desea eliminar el grupo <b> <?php echo $g['grupo_nombre']; ?></b> ?
                                           </h1>
                                           
                                          </div>
                                          <div class="modal-footer aligncenter">


                                                      <a href="<?php echo site_url('grupo/remove/'.$g['grupo_id']); ?>" class="btn btn-success"><em class="fa fa-trash"></em> Si </a>

                                                      <a href="#" class="btn btn-danger" data-dismiss="modal"><em class="fa fa-times"></em> No </a>
                                          </div>

                                        </div>
                                      </div>
                                    </div>
                                   
                        </td>
                    </tr>
                    <?php } ?>
                    <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                    </tr>                    
                   </tbody> 
                </table>
                                
            </div>
        </div>
    </div>
</div>

                                    