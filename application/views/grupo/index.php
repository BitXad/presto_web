<!----------------------------- script buscador --------------------------------------->
<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/index_grupo.js'); ?>" type="text/javascript"></script>
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
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
  <div class="box-header">
                <h3 class="box-title">Grupos</h3>
                <div class="box-tools">
                    <a href="<?php echo site_url('grupo/add'); ?>" class="btn btn-success btn-sm"><i class="fa fa-users"> </i> Registrar</a> 
                </div>
            </div>  
<div class="row">
    <div class="col-md-12">
        
        <div class="col-md-8">
            <div class="input-group">
                      <span class="input-group-addon"> 
                        Buscar 
                      </span>           
                <input id="filtrar" onkeypress="buscargrupos(event)" type="text" class="form-control" placeholder="Ingresa el nombre del grupo, del asesor"  >
            </div>
        </div>
        <div class="col-md-4">
            <select name="estado_id" class="form-control" id="estado_id" onchange="tablagrupos()">
                <option value="0">-TODOS-</option>
                                    <?php 
                                    foreach($estados as $estado)
                                    {
                                        $selected = ($estado['estado_id'] == $cliente['estado_id']) ? ' selected="selected"' : "";
                                        echo '<option value="'.$estado['estado_id'].'" '.$selected.'>'.$estado['estado_descripcion'].'</option>';
                                    } 
                                    ?>
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="box">
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
                    <tbody class="buscar" id="tablagrupos">
                    
                                     
                   </tbody> 
                </table>
                                
          </div>
    </div>
</div>

                                    