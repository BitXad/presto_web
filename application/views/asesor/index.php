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
    
    function imprimir_asesor(){
//    var estafh = new Date();
//    $('#fhimpresion').html(formatofecha_hora_ampm(estafh));
//    $("#cabeceraprint").css("display", "");
    window.print();
//    $("#cabeceraprint").css("display", "none");
}
</script>
<style type="text/css">
    #contieneimg{
        width: 45px;
        height: 45px;
        text-align: center;
    }
    #contieneimg img{
        width: 45px;
        height: 45px;
        text-align: center;
    }
    #horizontal{
        display: flex;
        white-space: nowrap;
        border-style: none !important;
    }
    #masg{
        font-size: 12px;
    }
    td div div{
        
    }
</style>
<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->

<div class="row no-print">
    <div class="col-md-9">
        <div class="box-header">
            <h3 class="box-title">Asesores</h3>
        </div>
        <!-- <div class="col-md-12">
            <ol class="breadcrumb">
                <li><a href="<?php //echo site_url('')?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
                <li class="active"><b>Clientes: </b></li>
                <input style="border-width: 0; background-color: #DEDEDE" id="encontrados" type="text"  size="5" value=" 0" readonly="true">
            </ol>
            <div class="input-group">
                <span class="input-group-addon">Buscar</span>           
                <input id="filtrar" type="text" class="form-control" placeholder="Ingrese el nombre, codigo, ci, nit" onkeypress="buscarcliente(event)" autocomplete="off" >
            </div>
        </div> -->
        <!--<div class="col-md-12">-->
        <div class="input-group">
                <span class="input-group-addon">Buscar</span>           
                <input id="filtrar" type="text" class="form-control" placeholder="Ingrese el nombre, codigo, ci, nit, profesión, especialidad" onkeypress="buscarcliente(event)" autocomplete="off" >
            </div>
        <!--</div>-->
    </div>
    <div class="col-md-3">
        <a href="<?php echo base_url('asesor/add/'); ?>" class="btn btn-success btn-foursquarexs" title="Registrar nuevo Asesor"><font size="5"><span class="fa fa-user-plus"></span></font><br><small>Registrar</small></a>
        <!--<a onclick="tablaresultadoscliente(3)" class="btn btn-info btn-foursquarexs" title="Muestra Todos los Asesores"><font size="5"><span class="fa fa-eye"></span></font><br><small>Ver Todo</small></a>-->
        <a onclick="imprimir_asesor()" class="btn btn-warning btn-foursquarexs" title="Imprimir Asesores"><font size="5"><span class="fa fa-print"></span></font><br><small>Imprimir</small></a>
    </div>
</div>
<div class="row" id='loader'  style='display:none; text-align: center'>
    <img src="<?php echo base_url("resources/images/loader.gif"); ?>"  >
</div>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body table-responsive">
                <table class="table table-striped" id="mitabla">
                    <tr>
                        <th>#</th>
                        <th>Asesor</th>
                        <th class="no-print">Map</th>
                        <th>Profesión</th>
                        <th>Especialidad</th>
                        <th>Estado</th>
                        <th class="no-print"></th>
                    </tr>
                    <tbody class="buscar" id="tablaresultados">
                    <?php
                    $i = 0;
                    foreach($asesor as $a){
                        $colorbaja = "";
                        $colorbaja = "style='background-color:".$a['estado_color']."'";?>
                           
                    <tr <?php echo $colorbaja; ?>>
                        <td><?php echo $i+1; ?></td>
                        <td>
                            <div id="horizontal">
                                <div id="contieneimg">
                                    <?php
                                    $mimagen = "thumb_".$a['asesor_foto'];
                                    if($a['asesor_foto']){
                                    ?>
                                    <a class="btn  btn-xs" data-toggle="modal" data-target="#mostrarimagen<?php echo $i; ?>" style="padding: 0px;">
                                        <?php
                                        echo '<img src="'.site_url('/resources/images/asesores/'.$mimagen).'" />';
                                        ?>
                                    </a>
                                    <?php }
                                    else{
                                       echo '<img style src="'.site_url('/resources/images/thumb_default.jpg').'" />'; 
                                    }
                                    ?>
                                </div>
                                <div style="padding-left: 4px">
                                    <?php
                                    $fechanac = "";
                                    if($a['asesor_fechanac'] != "0000-00-00" && $a['asesor_fechanac'] != null)
                                    {
                                        $fechanac = "F. Nac.:".date("d/m/Y", strtotime($a['asesor_fechanac']));
                                    }
                                    echo "<b id='masg'>".$a['asesor_nombre']." ".$a['asesor_apellido']."</b><br>";
                                          echo "<b>C.I.: </b>".$a['asesor_ci']." ".$fechanac."<br>";
                                          $linea = "";
                                          if($a['asesor_telefono'] >0 && $a['asesor_celular']>0){
                                              $linea = "-";
                                          }
                                          echo "<b>Tel.: </b>".$a['asesor_telefono'].$linea.$a['asesor_celular'];
                                    ?>
                                </div>
                             </div>
                        </td>
                        <td class="no-print" style="text-align: center">
                            <?php
                                if ($a['asesor_latitud']==0 && $a['asesor_longitud']==0)
                                { ?>
                                    <img src="<?php echo base_url('resources/images/noubicacion.png'); ?>" width="30" height="30">
                            <?php
                                }
                                else{?>                                                              
                                    <a href="https://www.google.com/maps/dir/<?php echo $a['asesor_latitud'];?>,<?php echo $a['asesor_longitud'];?>" target="_blank" title="lat:<?php echo $a['asesor_latitud'];?>,long:<?php echo $a['asesor_longitud'];?>">                                                                
                                    <img src="<?php echo base_url('resources/images/blue.png'); ?>" width="30" height="30">
                                    </a>
                            <?php
                                } ?>
                        </td>
                        <td><?php echo $a['asesor_profesion']; ?></td>
                        <td><?php echo $a['asesor_especialidad']; ?></td>
                        <td><?php echo $a['estado_descripcion']; ?></td>
                        <td class="no-print">
                            <a href="<?php echo site_url('asesor/edit/'.$a['asesor_id']); ?>" class="btn btn-info btn-xs" title="Modificar"><span class="fa fa-pencil"></span></a> 
                            <a class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal<?php echo $i; ?>"  title="Eliminar"><span class="fa fa-trash"></span></a>
                            <!------------------------ INICIO modal para confirmar eliminación ------------------->
                                    <div class="modal fade" id="myModal<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $i; ?>">
                                      <div class="modal-dialog" role="document">
                                            <br><br>
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                                          </div>
                                          <div class="modal-body">
                                           <!------------------------------------------------------------------->
                                           <h3><b> <span class="fa fa-trash"></span></b>
                                               ¿Desea eliminar al Asesor <b> <?php echo $a['asesor_nombre']." ".$a['asesor_apellido']; ?></b> ?
                                           </h3>
                                           <!------------------------------------------------------------------->
                                          </div>
                                          <div class="modal-footer aligncenter">
                                                      <a href="<?php echo site_url('asesor/remove/'.$a['asesor_id']); ?>" class="btn btn-success"><span class="fa fa-check"></span> Si </a>
                                                      <a href="#" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times"></span> No </a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                    <!------------------------ FIN modal para confirmar eliminación ------------------->
                    <!------------------------ INICIO modal para MOSTRAR imagen REAL ------------------->
                                    <div class="modal fade" id="mostrarimagen<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="mostrarimagenlabel<?php echo $i; ?>">
                                      <div class="modal-dialog" role="document">
                                            <br><br>
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                                            <font size="3"><b><?php echo $a['asesor_nombre']." ".$a['asesor_apellido']; ?></b></font>
                                          </div>
                                            <div class="modal-body">
                                           <!------------------------------------------------------------------->
                                           <?php echo '<img style="max-height: 100%; max-width: 100%" src="'.site_url('/resources/images/asesores/'.$a['asesor_foto']).'" />'; ?>
                                           <!------------------------------------------------------------------->
                                          </div>
                                          
                                        </div>
                                      </div>
                                    </div>
                    <!------------------------ FIN modal para MOSTRAR imagen REAL ------------------->
                        </td>
                    </tr>
                    <?php $i++; } ?>
                    </tbody>
                </table>
                                
            </div>
        </div>
    </div>
</div>
