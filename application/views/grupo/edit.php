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
        $('#grupo_codigo').val(cad1+cad2+anio+mes+dia+min);
    }
</script>
<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Modificar: Grupo</h3>
                <button type="button" class="btn btn-success btn-sm" onclick="cambiarcodgrupo();" title="genera codigo">
                    <i class="fa fa-edit"></i> Generar Código
		</button>
            </div>
            <?php echo form_open('grupo/edit/'.$grupo['grupo_id']); ?>
            <div class="box-body">
                <div class="row clearfix">
                    <div class="col-md-5">
                        <label for="asesor_id" class="control-label">Asesor</label>
                        <div class="form-group">
                            <select name="asesor_id" class="form-control" required>
                                <option value="">- ASESOR -</option>
                                <?php 
                                foreach($all_asesor as $asesor)
                                {
                                    $selected = ($asesor['asesor_id'] == $grupo['asesor_id']) ? ' selected="selected"' : "";

                                    echo '<option value="'.$asesor['asesor_id'].'" '.$selected.'>'.$asesor['asesor_nombre'].' '.$asesor['asesor_apellido'].'</option>';
                                } 
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <label for="grupo_nombre" class="control-label">Nombre/Grupo(*)</label>
                        <div class="form-group">
                            <input type="text" name="grupo_nombre" value="<?php echo ($this->input->post('grupo_nombre') ? $this->input->post('grupo_nombre') : $grupo['grupo_nombre']); ?>" class="form-control" id="grupo_nombre" required/>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label for="grupo_codigo" class="control-label">Código</label>
                        <div class="form-group">
                            <input type="text" name="grupo_codigo" value="<?php echo ($this->input->post('grupo_codigo') ? $this->input->post('grupo_codigo') : $grupo['grupo_codigo']); ?>" class="form-control" id="grupo_codigo" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="grupo_integrantes" class="control-label">Integrantes/Grupos Solidarios(*)</label>
                        <div class="form-group">
                            <input type="number" name="grupo_integrantes" value="<?php echo ($this->input->post('grupo_integrantes') ? $this->input->post('grupo_integrantes') : $grupo['grupo_integrantes']); ?>" class="form-control" id="grupo_integrantes" required/>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="grupo_departamento" class="control-label">Departamento</label>
                        <div class="form-group">
                            <?php
                            $ben = "";
                            $chu = "";
                            $coc = "";
                            $lap = "";
                            $oru = "";
                            $pan = "";
                            $pot = "";
                            $san = "";
                            $tar = "";
                            if($grupo['grupo_departamento'] == "BENI"){
                                $ben = "selected";
                            }elseif($grupo['grupo_departamento'] == "CHUQUISACA"){
                                $chu = "selected";
                            }elseif($grupo['grupo_departamento'] == "COCHABAMBA"){
                                $coc = "selected";
                            }elseif($grupo['grupo_departamento'] == "LA PAZ"){
                                $lap = "selected";
                            }elseif($grupo['grupo_departamento'] == "ORURO"){
                                $oru = "selected";
                            }elseif($grupo['grupo_departamento'] == "PANDO"){
                                $pan = "selected";
                            }elseif($grupo['grupo_departamento'] == "POTOSI"){
                                $pot = "selected";
                            }elseif($grupo['grupo_departamento'] == "SANTA CRUZ"){
                                $san = "selected";
                            }elseif($grupo['grupo_departamento'] == "TARIJA"){
                                $tar = "selected";
                            }else
                            ?>
                            <!--<input type="text" name="grupo_departamento" value="<?php //echo ($this->input->post('grupo_departamento') ? $this->input->post('grupo_departamento') : $grupo['grupo_departamento']); ?>" class="form-control" id="grupo_departamento" />-->
                            <select name="grupo_departamento" id="grupo_departamento" class="form-control">
                                <option <?php echo $ben;?> value="BENI">BENI</option>
                                <option <?php echo $chu;?> value="CHUQUISACA">CHUQUISACA</option>
                                <option <?php echo $coc;?> value="COCHABAMBA">COCHABAMBA</option>
                                <option <?php echo $lap;?> value="LA PAZ">LA PAZ</option>
                                <option <?php echo $oru;?> value="ORURO">ORURO</option>
                                <option <?php echo $pan;?> value="PANDO">PANDO</option>
                                <option <?php echo $pot;?> value="POTOSI">POTOSI</option>                                                        
                                <option <?php echo $san;?> value="SANTA CRUZ">SANTA CRUZ</option>                                                        
                                <option <?php echo $tar;?> value="TARIJA">TARIJA</option>                                                        
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label for="grupo_municipio" class="control-label">Municipio</label>
                        <div class="form-group">
                            <input type="text" name="grupo_municipio" value="<?php echo ($this->input->post('grupo_municipio') ? $this->input->post('grupo_municipio') : $grupo['grupo_municipio']); ?>" class="form-control" id="grupo_municipio" />
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label for="grupo_provincia" class="control-label">Provincia</label>
                        <div class="form-group">
                            <input type="text" name="grupo_provincia" value="<?php echo ($this->input->post('grupo_provincia') ? $this->input->post('grupo_provincia') : $grupo['grupo_provincia']); ?>" class="form-control" id="grupo_provincia" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="grupo_zona" class="control-label">Zona</label>
                        <div class="form-group">
                            <input type="text" name="grupo_zona" value="<?php echo ($this->input->post('grupo_zona') ? $this->input->post('grupo_zona') : $grupo['grupo_zona']); ?>" class="form-control" id="grupo_zona" />
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label for="grupo_fecha" class="control-label">Fecha Creación</label>
                        <div class="form-group">
                            <input type="date" name="grupo_fecha" value="<?php echo $grupo['grupo_fecha']; ?>" class="form-control" id="grupo_fecha"/>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="grupo_hora" class="control-label">Hora Creación</label>
                        <div class="form-group">
                            <input type="time" name="grupo_hora" value="<?php echo $grupo['grupo_hora']; ?>" class="form-control" id="grupo_hora" />
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <label for="grupo_diareunion" class="control-label">Dia reunión</label>
                        <div class="form-group">
                                <!--<input type="text" name="grupo_diareunion" value="<?php //echo $this->input->post('grupo_diareunion'); ?>" class="form-control" id="grupo_diareunion" />-->
                            <?php
                            $lun = "";
                            $mar = "";
                            $mie = "";
                            $jue = "";
                            $vie = "";
                            $sab = "";
                            $dom = "";
                            if($grupo['grupo_diareunion'] == "LUNES"){
                                $lun = "selected";
                            }elseif($grupo['grupo_diareunion'] == "MARTES"){
                                $mar = "selected";
                            }elseif($grupo['grupo_diareunion'] == "MIERCOLES"){
                                $mie = "selected";
                            }elseif($grupo['grupo_diareunion'] == "JUEVES"){
                                $jue = "selected";
                            }elseif($grupo['grupo_diareunion'] == "VIERNES"){
                                $vie = "selected";
                            }elseif($grupo['grupo_diareunion'] == "SABADO"){
                                $sab = "selected";
                            }elseif($grupo['grupo_diareunion'] == "DOMINGO"){
                                $dom = "selected";
                            }else
                            ?>
                            <select name="grupo_diareunion" id="grupo_diareunion" class="form-control">
                                <option <?php echo $lun;?> value="LUNES">LUNES</option>
                                <option <?php echo $mar;?> value="MARTES">MARTES</option>
                                <option <?php echo $mie;?> value="MIERCOLES">MIERCOLES</option>
                                <option <?php echo $jue;?> value="JUEVES">JUEVES</option>
                                <option <?php echo $vie;?> value="VIERNES">VIERNES</option>
                                <option <?php echo $sab;?> value="SABADO">SABADO</option>
                                <option <?php echo $dom;?> value="DOMINGO">DOMINGO</option>                                                        
                            </select>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="grupo_horareunion" class="control-label">Hora Reunión</label>
                        <div class="form-group">
                            <input type="time" name="grupo_horareunion" value="<?php echo $grupo['grupo_horareunion']; ?>" class="form-control" id="grupo_horareunion" />
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label for="grupo_tiemporeunion" class="control-label">Tiempo de Reunión</label>
                        <div class="form-group">
                            <?php
                            $dia = "";
                            $sem = "";
                            $bis = "";
                            $qui = "";
                            $men = "";
                            if($grupo['grupo_tiemporeunion'] == "1"){
                                $dia = "selected";
                            }elseif($grupo['grupo_tiemporeunion'] == "7"){
                                $sem = "selected";
                            }else
                                if($grupo['grupo_tiemporeunion'] == "14"){
                                $bis = "selected";
                            }else
                                if($grupo['grupo_tiemporeunion'] == "15"){
                                $qui = "selected";
                            }else
                                if($grupo['grupo_tiemporeunion'] == "30"){
                                $men = "selected";
                            }
                            ?>
                            <select name="grupo_tiemporeunion" id="grupo_tiemporeunion" class="form-control">
                                <option <?php echo $dia;?> value="1">DIARIO (1 DIA)</option>
                                <option <?php echo $sem;?> value="7">SEMANAL (7 DIAS)</option>
                                <option <?php echo $bis;?> value="14">BISEMANAL (14 DIAS)</option>
                                <option <?php echo $qui;?> value="15">QUINCENAL (15 DIAS)</option>
                                <option <?php echo $men;?> value="30">MENSUAL (30 DIAS)</option>                                                                                                               
                            </select>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="grupo_iniciosolicitud" class="control-label">Fecha Solicitud</label>
                        <div class="form-group">
                            <input type="date" name="grupo_iniciosolicitud" value="<?php echo $grupo['grupo_iniciosolicitud']; ?>" class="form-control" id="grupo_iniciosolicitud" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="grupo_monto" class="control-label">Monto Solicitado Bs</label>
                        <div class="form-group">
                            <input type="number" step="any" min="0" name="grupo_monto" value="<?php echo ($this->input->post('grupo_monto') ? $this->input->post('grupo_monto') : $grupo['grupo_monto']); ?>" class="form-control" id="grupo_monto" required/>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="grupo_multaretraso" class="control-label">Multa/Retraso(por minuto) Bs</label>
                        <div class="form-group">
                            <input type="number" step="any" min="0" name="grupo_multaretraso" value="<?php echo ($this->input->post('grupo_multaretraso') ? $this->input->post('grupo_multaretraso') : $grupo['grupo_multaretraso']); ?>" class="form-control" id="grupo_multaretraso" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="grupo_multaenvio" class="control-label">Multa/Envio Bs</label>
                        <div class="form-group">
                            <input type="number" step="any" min="0" name="grupo_multaenvio" value="<?php echo ($this->input->post('grupo_multaenvio') ? $this->input->post('grupo_multaenvio') : $grupo['grupo_multaenvio']); ?>" class="form-control" id="grupo_multaenvio" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="grupo_numlicencia" class="control-label">Num. Licencias</label>
                        <div class="form-group">
                            <input type="number" name="grupo_numlicencia" value="<?php echo ($this->input->post('grupo_numlicencia') ? $this->input->post('grupo_numlicencia') : $grupo['grupo_numlicencia']); ?>" class="form-control" id="grupo_numlicencia" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="grupo_multafalta" class="control-label">Multa/Falta Bs</label>
                        <div class="form-group">
                            <input type="number" step="any" min="0" name="grupo_multafalta" value="<?php echo ($this->input->post('grupo_multafalta') ? $this->input->post('grupo_multafalta') : $grupo['grupo_multafalta']); ?>" class="form-control" id="grupo_multafalta" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="grupo_multamora" class="control-label">Multa/Mora Bs</label>
                        <div class="form-group">
                            <input type="number" step="any" min="0" name="grupo_multamora" value="<?php echo ($this->input->post('grupo_multamora') ? $this->input->post('grupo_multamora') : $grupo['grupo_multamora']); ?>" class="form-control" id="grupo_multamora" />
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                            <label for="usuario_id" class="control-label">Usuario</label>
                            <div class="form-group">
                                    <select name="usuario_id" class="form-control" required>
                                            <option value="">- USUARIO -</option>
                                            <?php 
                                            foreach($all_usuario as $usuario)
                                            {
                                                    $selected = ($usuario['usuario_id'] == $grupo['usuario_id']) ? ' selected="selected"' : "";

                                                    echo '<option value="'.$usuario['usuario_id'].'" '.$selected.'>'.$usuario['usuario_nombre'].'</option>';
                                            } 
                                            ?>
                                    </select>
                            </div>
                    </div>
                    <div class="col-md-3">
                            <label for="estado_id" class="control-label">Estado</label>
                            <div class="form-group">
                                    <select name="estado_id" class="form-control">
                                            <option value="">- ESTADO -</option>
                                            <?php 
                                            foreach($all_estado as $estado)
                                            {
                                                    $selected = ($estado['estado_id'] == $grupo['estado_id']) ? ' selected="selected"' : "";

                                                    echo '<option value="'.$estado['estado_id'].'" '.$selected.'>'.$estado['estado_descripcion'].'</option>';
                                            } 
                                            ?>
                                    </select>
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