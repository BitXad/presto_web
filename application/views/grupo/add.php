<script src="<?php echo site_url('resources/js/jquery-2.2.3.min.js');?>"></script>
<script type="text/javascript">
    function cambiarcodgrupo(){
        var nombre = $("#grupo_nombre").val();
        var cad1 = nombre.substring(0,2);
        var cad2 = nombre.substring(nombre.length-1,nombre.length);
        
        var estetime = new Date();
        var anio = estetime.getFullYear();
        anio = anio -2000;
        var mes = parseInt(estetime.getMonth())+1;
        if(mes>0&&mes<10){
            mes = "0"+mes;
        }
        var dia = parseInt(estetime.getDate());
        if(dia>0&&dia<10){
            dia = "0"+dia;
        }
        var min = estetime.getMinutes();
        if(min>0&&min<10){
            min = "0"+min;
        }
        /*
        var hora = estetime.getHours();
        if(hora>0&&hora<10){
            hora = "0"+hora;
        }
        
        var seg = estetime.getSeconds();
        if(seg>0&&seg<10){
            seg = "0"+seg;
        }*/
        $('#grupo_codigo').val(cad1+cad2+anio+mes+dia+min);
    }
</script>
<script type="text/javascript">
    $(document).ready(function(){
    $("#grupo_nombre").change(function(){
        var nombre = $("#grupo_nombre").val();
        var cad1 = nombre.substring(0,2);
        var cad2 = nombre.substring(nombre.length-1,nombre.length);
        
        var estetime = new Date();
        var anio = estetime.getFullYear();
        anio = anio -2000;
        var mes = parseInt(estetime.getMonth())+1;
        if(mes>0&&mes<10){
            mes = "0"+mes;
        }
        var dia = parseInt(estetime.getDate());
        if(dia>0&&dia<10){
            dia = "0"+dia;
        }
        var min = estetime.getMinutes();
        if(min>0&&min<10){
            min = "0"+min;
        }
        $('#grupo_codigo').val(cad1+cad2+anio+mes+dia+min);
    });
  });
    
</script>

<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Registra: Grupo</h3>
                <button type="button" class="btn btn-success btn-sm" onclick="cambiarcodgrupo();" title="genera codigo">
                    <i class="fa fa-edit"></i> Generar Código
		</button>
            </div>
            <?php echo form_open('grupo/add'); ?>
          	<div class="box-body">
                    <div class="row clearfix">
                        <div class="col-md-4">
                            <label for="asesor_id" class="control-label">Asesor(*)</label>
                            <div class="form-group">
                                <?php
                                if($tipousuario_id == 3){
                                ?>
                                <select name="asesor_id" class="form-control" required>
                                    <?php 
                                    foreach($all_asesor as $asesor)
                                    {
                                        if($asesor['usuario_id'] == $usuario_id){
                                            $selected = ($asesor['asesor_id'] == $this->input->post('asesor_id')) ? ' selected="selected"' : "";
                                            echo '<option value="'.$asesor['asesor_id'].'" '.$selected.'>'.$asesor['asesor_nombre'].' '.$asesor['asesor_apellido'].'</option>';
                                        }
                                    } 
                                    ?>
                                </select>
                                <?php
                                }else{
                                ?><select name="asesor_id" class="form-control" required>
                                    <option value="">- ASESOR -</option>    
                                    <?php 
                                    foreach($all_asesor as $asesor)
                                    {
                                        $selected = ($asesor['asesor_id'] == $this->input->post('asesor_id')) ? ' selected="selected"' : "";

                                        echo '<option value="'.$asesor['asesor_id'].'" '.$selected.'>'.$asesor['asesor_nombre'].' '.$asesor['asesor_apellido'].'</option>';
                                    } 
                                    ?>
                                </select>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="grupo_nombre" class="control-label">Nombre/Grupo(*)</label>
                            <div class="form-group">
                                <input type="text" name="grupo_nombre" value="<?php echo $this->input->post('grupo_nombre'); ?>" class="form-control" id="grupo_nombre" required onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            </div>
                        </div>

                        <div class="col-md-2">
                            <label for="grupo_codigo" class="control-label">Código</label>
                            <div class="form-group">
                                <input type="text" name="grupo_codigo" value="<?php echo $this->input->post('grupo_codigo'); ?>" class="form-control" id="grupo_codigo" required  onKeyUp="this.value = this.value.toUpperCase();"/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="grupo_integrantes" class="control-label">Integrantes/Grupos Solidarios(*)</label>
                            <div class="form-group">
                                <input type="number" name="grupo_integrantes" value="<?php echo $this->input->post('grupo_integrantes'); ?>" class="form-control" id="grupo_integrantes" required/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="grupo_departamento" class="control-label">Departamento</label>
                            <div class="form-group">
                                <!--<input type="text" name="grupo_departamento" value="<?php //echo $this->input->post('grupo_departamento'); ?>" class="form-control" id="grupo_departamento" />-->
                                <select name="grupo_departamento" id="grupo_departamento" class="form-control">
                                    <option value="BENI">BENI</option>
                                    <option value="CHUQUISACA">CHUQUISACA</option>
                                    <option value="COCHABAMBA">COCHABAMBA</option>
                                    <option value="LA PAZ">LA PAZ</option>
                                    <option value="ORURO">ORURO</option>
                                    <option value="PANDO">PANDO</option>
                                    <option value="POTOSI">POTOSI</option>                                                        
                                    <option value="SANTA CRUZ">SANTA CRUZ</option>                                                        
                                    <option value="TARIJA">TARIJA</option>                                                        
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                                <label for="grupo_municipio" class="control-label">Municipio</label>
                                <div class="form-group">
                                        <input type="text" name="grupo_municipio" value="<?php echo $this->input->post('grupo_municipio'); ?>" class="form-control" id="grupo_municipio" />
                                </div>
                        </div>

                        <div class="col-md-3">
                                <label for="grupo_provincia" class="control-label">Provincia</label>
                                <div class="form-group">
                                        <input type="text" name="grupo_provincia" value="<?php echo $this->input->post('grupo_provincia'); ?>" class="form-control" id="grupo_provincia" />
                                </div>
                        </div>

                        <div class="col-md-3">
                                <label for="grupo_zona" class="control-label">Zona</label>
                                <div class="form-group">
                                        <input type="text" name="grupo_zona" value="<?php echo $this->input->post('grupo_zona'); ?>" class="form-control" id="grupo_zona" />
                                </div>
                        </div>

                        <div class="col-md-3">
                                <label for="grupo_fecha" class="control-label">Fecha Creación</label>
                                <div class="form-group">
                                    <input type="date" name="grupo_fecha" value="<?php echo date('Y-m-d'); ?>" class="form-control" id="grupo_fecha"/>
                                </div>
                        </div>
                        <div class="col-md-3">
                                <label for="grupo_hora" class="control-label">Hora Creación</label>
                                <div class="form-group">
                                        <input type="time" name="grupo_hora" value="<?php echo date('H:i:s'); ?>" class="form-control" id="grupo_hora" />
                                </div>
                        </div>

                        <div class="col-md-3">
                                <label for="grupo_diareunion" class="control-label">Dia reunión</label>
                                <div class="form-group">
                                        <!--<input type="text" name="grupo_diareunion" value="<?php //echo $this->input->post('grupo_diareunion'); ?>" class="form-control" id="grupo_diareunion" />-->
                                    <select name="grupo_diareunion" id="grupo_diareunion" class="form-control">
                                        <option value="LUNES">LUNES</option>
                                        <option value="MARTES">MARTES</option>
                                        <option value="MIERCOLES">MIERCOLES</option>
                                        <option value="JUEVES">JUEVES</option>
                                        <option value="VIERNES">VIERNES</option>
                                        <option value="SABADO">SABADO</option>
                                        <option value="DOMINGO">DOMINGO</option>                                                        
                                    </select>

                                </div>
                        </div>

                        <div class="col-md-3">
                                <label for="grupo_horareunion" class="control-label">Hora Reunión</label>
                                <div class="form-group">
                                    <input  data-format="hh:mm:ss" type="time" name="grupo_horareunion" value="<?php echo date('H:i:s'); ?>" class="form-control" id="grupo_horareunion" />
                                </div>
                        </div>

                        <div class="col-md-3">
                                <label for="grupo_tiemporeunion" class="control-label">Tiempo de Reunión</label>
                                <div class="form-group">
                                    <select name="grupo_tiemporeunion" id="grupo_tiemporeunion" class="form-control">
                                        <option value="1">DIARIO (1 DIA)</option>
                                        <option value="7">SEMANAL (7 DIAS)</option>
                                        <option value="14">BISEMANAL (14 DIAS)</option>
                                        <option value="15">QUINCENAL (15 DIAS)</option>
                                        <option value="30">MENSUAL (28 DIAS)</option>                                                                                                               
                                        <option value="30">MENSUAL (30 DIAS)</option>                                                                                                               
                                    </select>

                                </div>
                        </div>

                        <div class="col-md-3">
                                <label for="grupo_iniciosolicitud" class="control-label">Fecha Entrega de Solicitud</label>
                                <div class="form-group">
                                        <input type="date" name="grupo_iniciosolicitud" value="<?php echo date('Y-m-d'); ?>" class="form-control" id="grupo_iniciosolicitud" />
                                </div>
                        </div>
                        <div class="col-md-3">
                                <label for="grupo_monto" class="control-label">Monto Solicitado Bs</label>
                                <div class="form-group">
                                        <input type="number" step="any" min="0" name="grupo_monto" value="<?php echo $this->input->post('grupo_monto'); ?>" class="form-control" id="grupo_monto" required/>
                                </div>
                        </div>
                        <div class="col-md-3">
                                <label for="grupo_tiempotolerancia" class="control-label">Tiempo de Tolerancia</label>
                                <div class="form-group">
                                        <input type="text" name="grupo_tiempotolerancia" value="<?php echo $this->input->post('grupo_tiempotolerancia'); ?>" class="form-control" id="grupo_tiempotolerancia" required/>
                                </div>
                        </div>
                        <div class="col-md-3">
                            <label for="grupo_multaretraso" class="control-label">Multa/Retraso(Bs)</label>
                            <div class="form-group" style=" display: flex" >
                                <input style="width: 30%; display: flex; " type="number" step="any" min="0" name="grupo_multaretraso" value="<?php echo $this->input->post('grupo_multaretraso'); ?>" class="form-control" id="grupo_multaretraso" />
                                <input style="width: 70%; display: inherit" type="text" name="grupo_multaretrasodetalle" value="<?php echo $this->input->post('grupo_multaretrasodetalle'); ?>" class="form-control" id="grupo_multaretrasodetalle" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="grupo_multaenvio" class="control-label">Multa/Envio Bs</label>
                            <div class="form-group">
                                <input type="number" step="any" min="0" name="grupo_multaenvio" value="<?php echo $this->input->post('grupo_multaenvio'); ?>" class="form-control" id="grupo_multaenvio" />
                            </div>
                        </div>
                        <div class="col-md-3">
                                <label for="grupo_numlicencia" class="control-label">Num. Licencias</label>
                                <div class="form-group">
                                    <input type="number" name="grupo_numlicencia" value="<?php echo $this->input->post('grupo_numlicencia'); ?>" class="form-control" id="grupo_numlicencia" />
                                </div>
                        </div>
                        <div class="col-md-3">
                                <label for="grupo_multafalta" class="control-label">Multa/Falta Bs</label>
                                <div class="form-group">
                                        <input type="number" step="any" min="0" name="grupo_multafalta" value="<?php echo $this->input->post('grupo_multafalta'); ?>" class="form-control" id="grupo_multafalta" />
                                </div>
                        </div>
                        <div class="col-md-3">
                                <label for="grupo_multamora" class="control-label">Multa/Mora Bs</label>
                                <div class="form-group">
                                        <input type="number" step="any" min="0" name="grupo_multamora" value="<?php echo $this->input->post('grupo_multamora'); ?>" class="form-control" id="grupo_multamora" />
                                </div>
                        </div>
                    </div>
			</div>
            
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
            		<i class="fa fa-floppy-o"></i> Guardar
            	</button>
            	<a href="<?php echo base_url('grupo'); ?>" type="button" class="btn btn-danger">
            		<i class="fa fa-close"></i> Cancelar
            	</a>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>