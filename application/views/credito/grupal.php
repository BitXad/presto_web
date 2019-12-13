<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/nuevocredito.js'); ?>"></script>
<script src="<?php echo base_url('resources/js/credito_grupal.js'); ?>"></script>
<!--<link rel="stylesheet" href="<?php //echo site_url('resources/css/AdminLTE.min.css');?>">-->
<!----------------------------- script buscador --------------------------------------->

<script type="text/javascript">
        $(document).ready(function () {
            (function ($) {
                $('#ci').keyup(function () {
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
<input type="text" value="<?php echo base_url(); ?>" id="base_url" hidden>
<div class="row">
    <div class="col-md-12">
  	<div class="col-md-7">
            <div class="panel" style="margin-bottom: 1px;">
                <div class="panel-body">
                    <!--          <center><b><u>CLIENTES</u></b></center>-->
                    <!--------------------- cliente_id --------------------->
                    <div class="container" hidden>
                        <input type="text" name="cliente_id" value="0" class="form-control" id="cliente_id" >
                        <input type="text" name="usuario_id" value="<?php echo $usuario_id; ?>" class="form-control" id="usuario_id" >
                    </div>
                    <!--------------------- fin cliente_id --------------------->
                    <div class="col-md-12">
                        <label for="grupo_id" class="control-label">GRUPO:</label>
                        <div class="form-group">                               
                            <select name="grupo_id" class="form-control" id="grupo_id" onchange="mostrar_integrantes()">
                                <option value="0">-- GRUPO --</option>
                                <?php foreach($grupo as $g){ ?>                    
                                <option value="<?php echo $g['grupo_id']; ?>"><?php echo $g['grupo_nombre']; ?></option>                    
                                <?php } ?>
                            </select>

                        </div>
                    </div>
        
                </div><!--BOX BODY-->
            </div><!--BOX-->
            <div class="panel" style="margin-bottom: 1px;">
                <div class="panel-body">
                    <b>INTEGRANTES:</b>
                    <table class="table table-striped" id="mitabla">
                        <tr>
                            <th>#</th>
                            <th>INTEGRANTE</th>
                            <th>C.I.</th>
                            <th>CARGO</th>
                            <th>MONTO Bs</th>
                        </tr>
                        <tbody class="buscar2" id="tabla_integrantes"></tbody>
                    </table>
                </div><!--BOX BODY-->
            </div><!--BOX-->
        </div><!--COL7-->
        <div class="col-md-5">
    	 <div class="panel" style="margin-bottom: 1px;">
        <div class="panel-body">
          <center><b><u>CREDITO</u></b></center>
            <div class="col-md-12">
                <div class="input-group no-print"> <span class="input-group-addon">Monto:</span>
                    <input type="text" name="credito_montototal" value="<?php echo $this->input->post('credito_montototal'); ?>" class="form-control" id="credito_montototal" readonly />
                </div>      
            </div>
            <div class="col-md-12">
                    <div class="col-md-4" style="padding-left: 0px;padding-right: 0px;">
              <div class="input-group no-print"> <span class="input-group-addon">Interes:</span>
                <input id="credito_interes" name="credito_interes" value="4" type="text" class="form-control" >
              </div></div>
              <div class="col-md-4" style="padding-left: 0px;padding-right: 0px;">
                    <div class="input-group no-print"> <span class="input-group-addon">Comision:</span>
                <input id="credito_comision" name="credito_comision" value="2" type="text" class="form-control" >
              </div></div>
              <div class="col-md-4" style="padding-left: 0px;padding-right: 0px;">
              <div class="input-group no-print"> <span class="input-group-addon">Custodio:</span>
                <input id="credito_custodia" name="credito_custodia"  value="2" type="text" class="form-control" >
              </div></div>
             </div>
            <div class="col-md-12">
                <div class="input-group no-print"> <span class="input-group-addon">Grupo Integrantes:</span>
                    <input type="text" name="grupo_integrantes" value="<?php echo $this->input->post('grupo_integrantes'); ?>" class="form-control" id="grupo_integrantes" readonly />
                </div>
            </div>
            <div class="col-md-12">
                <div class="input-group no-print"> <span class="input-group-addon">Número Reuniones:</span>
                    <input type="text" name="grupo_numreunion" value="<?php echo $this->input->post('grupo_numreunion'); ?>" class="form-control" id="grupo_numreunion" readonly />
                </div>
            </div>
          
               <!--   <div class="col-md-12" id="cuotas">
                  <div class="input-group no-print"> <span class="input-group-addon">Numero Reuniones:</span>
                   
                    <select name="credito_cuotas" id="credito_cuotas"class="form-control"  >
                        <option value="0">Sin Limite de Tiempo</option>
                        <option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option>
                        <option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option>
                        <option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option>
                        <option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option>
                        <option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option>
                        <option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option>
                        <option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option>
                        <option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option>
                        <option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option>
                    </select>
                  </div>
                 </div>-->
                 <div class="col-md-12" id="boton" style='display:block;'>
                    <br>	
                    <button class="btn btn-success btn-block" onclick="registrar_credito()"><i class="fa fa-money"></i> Desembolsar</button>
            	</div>
  <div class="row" id='loader'  style='display:none; text-align: center'>
  <img src="<?php echo base_url("resources/images/loader.gif"); ?>"  >
  </div>
    	</div><!--box-->
    	</div><!--boxBODY-->
    </div><!--COL5-->
    </div><!--COL12-->

</div><!--ROW-->
<!--<div class="row">
  
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Creditos Individuaes</h3>
            	
            </div>
            <div class="col-md-12">
              <div class="col-md-5">
              Desde: <input type="date" style=" width: 38%;" class="btn btn-facebook btn-sm form-control" value="" id="fecha_desde" name="fecha_desde"  >
                  
                      Hasta: <input type="date" style=" width: 38%;" class="btn btn-facebook btn-sm form-control" value="" id="fecha_hasta" name="fecha_hasta"  >
              </div>
              <div class="col-md-3">
                <input id="ci" name="ci" value="" type="text" class="form-control" placeholder="Ingrese C.I. del Cliente">
              </div>
              <div class="col-md-2">
                <a class="btn btn-facebook" onclick="tablacreditos(2)"><i class="fa fa-search"></i> Buscar</a>
              </div>
            </div>
            <div class="box-body">
                <table class="table table-striped" id="mitabla">
                    <tr>
						<th>#</th>
						<th>Cliente</th>
						<th>C.I.</th>
						<th>Telef.</th>
						<th>Fecha</th>
						<th>Hora</th>
						<th>Fechalimite</th>
						<th>Monto</th>
						<th>% int</th>
						<th>% com</th>
						<th>% cus</th>
						<th>Tipo</th>
						<th>Modalidad</th>
						<th>Usuario</th>
						<th>Estado</th>
						
						<th></th>
                    </tr>
                    <tbody  class="buscar" id="tablacreditos">
                
                  </tbody>
                </table>
                
            </div>
        </div>
    </div>
</div>-->
<!-- agarra los integrantes de un grupo  -->
<input value="" id="grupo" hidden>