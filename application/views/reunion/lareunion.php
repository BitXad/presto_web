<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/funciones_reunion.js'); ?>" type="text/javascript"></script>
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<div class="box-header">
    <h3 class="box-title">GRUPO&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $reunion['grupo_nombre']; ?></h3><br>
    <h3 class="box-title">REUNION: <?php echo date("d/m/Y", strtotime($reunion['reunion_fecha']))." ".$reunion['reunion_hora']; ?></h3><br>
    <h3 class="box-title">ASESOR&nbsp;&nbsp;&nbsp;: <?php echo $reunion['elasesor']; ?></h3>
</div>
<div class="row" id='loader'  style='display:none; text-align: center'>
    <!--<img src="<?php echo base_url("resources/images/loader.gif"); ?>"  >-->
</div>
<?php echo form_open('reunion/registrareunion'); ?>
<input type="hidden" name="idreunion_id" id="idreunion_id" value="<?php echo $reunion['reunion_id']; ?>" />
<input type="hidden" name="idgrupo_id" id="idgrupo_id" value="<?php echo $reunion['grupo_id']; ?>" />
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body table-responsive">
                <table class="table table-striped" id="mitabla">
                    <tr>
                        <th>#</th>
                        <th>Integrante</th>
                        <th>Asistencia</th>
                        <th>Cuota</th>
                        <th>Pagado</th>
                        <th>Ahorro</th>
                        <th>Retraso/Recibo</th>
                        <th>Faltas/Recibo</th>
                        <th>Observaciones</th>
                    </tr>
                    <tbody class="buscar" id="tablaresultados">
                    <?php /*$i=0;
                    foreach($all_clientes as $cliente){
                        ?>
                    <tr>
                        <td><?php echo $i+1; ?></td>
                        <td>
                            <?php echo $cliente['elcliente']."<br>";
                            echo "<b>C.I.: </b>".$cliente['cliente_ci']." ".$cliente['cliente_extencionci'];
                            $linea    = "";
                            $telefono = "";
                            $celular  = "";
                            if($cliente['cliente_telefono']>0 && $cliente['cliente_celular']>0){
                                $linea = "-";
                            }
                            ?>
                        </td>
                        <td class="text-center">
                            <select name="asistencia<?php echo $i; ?>" id="asistencia<?php echo $i; ?>" required onchange="asistencia(this.value, <?php echo $cliente['cliente_id']; ?>, <?php echo $reunion['reunion_id']; ?>)" >
                                <option value="">-</option>
                                <option <?php echo $selected = ($cliente['asistencia_registro'] == "A") ? ' selected="selected"' : ""; ?> value="A">A</option>
                                <option <?php echo $selected = ($cliente['asistencia_registro'] == "F") ? ' selected="selected"' : ""; ?> value="F">F</option>
                                <option <?php echo $selected = ($cliente['asistencia_registro'] == "P") ? ' selected="selected"' : ""; ?> value="P">P</option>
                                <option <?php echo $selected = ($cliente['asistencia_registro'] == "R") ? ' selected="selected"' : ""; ?> value="R">R</option>
                            </select>
                        </td>
                        <td class="text-right">
                            <?php echo number_format($cliente['cuota_monto'],'2','.',',') ?>
                        </td>
                        <td>
                            <?php if($cliente['asistencia_registro'] == "A" || $cliente['asistencia_registro'] == "R"){ ?>
                            <input type="number" step="any" min="0" max="<?php echo $cliente['cuota_monto']; ?>" name="lacuota<?php echo $i; ?>" id="lacuota<?php echo $i; ?>" value="<?php echo $cliente['cuota_monto']; ?>" class="text-right" onclick="this.select();" />
                            <?php } ?>
                        </td>
                        <td>
                            <?php if($cliente['asistencia_registro'] == "R"){ ?>
                            <input type="number" step="any" min="0" name="retraso<?php echo $i; ?>" id="retraso<?php echo $i; ?>" value="0.00" class="text-right" onclick="this.select();" />
                            <input type="text" name="multa_numrecr<?php echo $i; ?>" id="multa_numrecr<?php echo $i; ?>" />
                            <?php } ?>
                        </td>
                        <td>
                            <?php if($cliente['asistencia_registro'] == "F"){ ?>
                            <input type="number" step="any" min="0" name="falta<?php echo $i; ?>" id="falta<?php echo $i; ?>" value="0.00" class="text-right" onclick="this.select();" />
                            <input type="text" name="multa_numrecf<?php echo $i; ?>" id="multa_numrecf<?php echo $i; ?>" />
                            <?php } ?>
                        </td>
                        <td>
                            <input style="width: 100%" type="text" name="observaciones<?php echo $i; ?>" id="observiaciones<?php echo $i; ?>" />
                            <input type="hidden" name="cliente_id<?php echo $i; ?>" id="cliente_id<?php echo $i; ?>" value='<?php echo $cliente['cliente_id'] ?>' />
                        </td>
                    </tr>
                    <?php $i++; } */ ?>
                    </tbody>
                    <tr>
                        <td class="text-right text-bold" style="" colspan="2">TOTAL:</td>
                        <td>
                            <span id="totala">A = 0</span><br>
                            <span id="totalf">F = 0</span><br>
                            <span id="totalp">P = 0</span><br>
                            <span id="totalr">R = 0</span><br>
                        </td>
                        <td></td>
                        <td><input type="number" step="any" min="0" name="totalpagado" id="totalpagado" value="0.00" class="text-right" readonly /></td>
                        <td><input type="number" step="any" min="0" name="totalahorro" id="totalahorro" value="0.00" class="text-right" readonly /></td>
                        <td><input type="number" name="totalretraso" id="totalretraso" value="0.00" class="text-right" readonly /></td>
                        <td><input type="number" name="totalfaltas" id="totalfaltas" value="0.00" class="text-right" readonly /></td>
                        <td></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<input type="hidden" name="numclientes" id="numclientes" value="0" />
<div class="box-header text-center">
    <button type="submit" class="btn btn-success">
        <i class="fa fa-check"></i> Registrar Reunión
    </button>
    <a href="<?php echo site_url('reunion'); ?>" class="btn btn-danger">
        <i class="fa fa-times"></i> Cancelar</a>
</div>
<?php echo form_close(); ?>