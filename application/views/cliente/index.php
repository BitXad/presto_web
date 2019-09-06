<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/funciones_cliente.js'); ?>" type="text/javascript"></script>
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
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li><a href="<?php echo site_url('')?>"><i class="fa fa-dashboard"></i> Inicio</a></li>
                <li class="active"><b>Clientes: </b></li>
                <input style="border-width: 0; background-color: #DEDEDE" id="encontrados" type="text"  size="5" value=" 0" readonly="true">
            </ol>
            <div class="input-group">
                <span class="input-group-addon">Buscar</span>           
                <input id="filtrar" type="text" class="form-control" placeholder="Ingrese el nombre, codigo, ci, nit" onkeypress="buscarcliente(event)" autocomplete="off" >
            </div>
        </div>
        <div class="col-md-3">
            <div class="box-tools">
                <select name="estadocivil_id" class="btn-primary btn-sm btn-block" id="estadocivil_id" onchange="tablaresultadoscliente(2)">
                    <option value="" disabled selected >-- ESTADO CIVIL --</option>
                    <option value="0"> Todos los Estados Civiles </option>
                    <?php 
                    foreach($all_estadocivil as $estadocivil)
                    {
                        echo '<option value="'.$estadocivil['estadocivil_id'].'">'.$estadocivil['estadocivil_nombre'].'</option>';
                    } 
                    ?>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="box-tools">
                <select name="categoria_id" class="btn-primary btn-sm btn-block" id="categoria_id" onchange="tablaresultadoscliente(2)">
                    <option value="" disabled selected >-- CATEGORIAS --</option>
                    <option value="0"> Todas Las Categorias </option>
                    <?php 
                    foreach($all_categoria as $categoria)
                    {
                        echo '<option value="'.$categoria['categoria_id'].'">'.$categoria['categoria_nombre'].'</option>';
                    } 
                    ?>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box-tools">
                <select name="asesor_id" class="btn-primary btn-sm btn-block" id="asesor_id" onchange="tablaresultadoscliente(2)">
                    <option value="" disabled selected >-- ASESORES --</option>
                    <option value="0"> Todos los Asesores </option>
                    <?php 
                    foreach($all_asesor as $asesor)
                    {
                        echo '<option value="'.$asesor['asesor_id'].'">'.$asesor['asesor_nombre'].' '.$asesor['asesor_apellido'].'</option>';
                    } 
                    ?>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="box-tools">
                <select name="estado_id" class="btn-primary btn-sm btn-block" id="estado_id" onchange="tablaresultadoscliente(2)">
                    <option value="" disabled selected >-- ESTADOS --</option>
                    <option value="0"> Todos los Estados </option>
                    <?php 
                    foreach($all_estado as $estado)
                    {
                        echo '<option value="'.$estado['estado_id'].'">'.$estado['estado_descripcion'].'</option>';
                    } 
                    ?>
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <a href="<?php echo base_url('cliente/add/'); ?>" class="btn btn-success btn-foursquarexs" title="Registrar nuevo Cliente"><font size="5"><span class="fa fa-user-plus"></span></font><br><small>Registrar</small></a>
        <a onclick="tablaresultadoscliente(3)" class="btn btn-info btn-foursquarexs" title="Muestra Todos los Clientes"><font size="5"><span class="fa fa-eye"></span></font><br><small>Ver Todo</small></a>
        <a onclick="imprimir_cliente()" class="btn btn-warning btn-foursquarexs" title="Imprimir Clientes"><font size="5"><span class="fa fa-print"></span></font><br><small>Imprimir</small></a>
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
                        <th>Nombre</th>
                        <th>Datos Adicionales</th>
                        <th>Dirección</th>
                        <th class="no-print">Map</th>
                        <th class="no-print">Categoria</th>
                        <th>Asesor</th>
                        <th>Estado</th>
                        <th class="no-print"></th>
                    </tr>
                    <tbody class="buscar" id="tablaresultados">
                    </tbody>
                </table>
                                
            </div>
        </div>
    </div>
</div>
