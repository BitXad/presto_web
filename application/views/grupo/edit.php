<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Modificar: Grupo</h3>
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
                            <input type="text" name="grupo_departamento" value="<?php echo ($this->input->post('grupo_departamento') ? $this->input->post('grupo_departamento') : $grupo['grupo_departamento']); ?>" class="form-control" id="grupo_departamento" />
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label for="grupo_municipio" class="control-label">Municipio</label>
                        <div class="form-group">
                            <input type="text" name="grupo_municipio" value="<?php echo ($this->input->post('grupo_municipio') ? $this->input->post('grupo_municipio') : $grupo['grupo_municipio']); ?>" class="form-control" id="grupo_municipio" />
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="grupo_provincia" class="control-label">Provincia</label>
                        <div class="form-group">
                            <input type="text" name="grupo_provincia" value="<?php echo ($this->input->post('grupo_provincia') ? $this->input->post('grupo_provincia') : $grupo['grupo_provincia']); ?>" class="form-control" id="grupo_provincia" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="grupo_zona" class="control-label">Zona</label>
                        <div class="form-group">
                            <input type="text" name="grupo_zona" value="<?php echo ($this->input->post('grupo_zona') ? $this->input->post('grupo_zona') : $grupo['grupo_zona']); ?>" class="form-control" id="grupo_zona" />
                        </div>
                    </div>

                    <div class="col-md-4">
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
                            <input type="text" name="grupo_monto" value="<?php echo ($this->input->post('grupo_monto') ? $this->input->post('grupo_monto') : $grupo['grupo_monto']); ?>" class="form-control" id="grupo_monto" required/>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="grupo_multafalta" class="control-label">Multa/Falta Bs</label>
                        <div class="form-group">
                            <input type="text" name="grupo_multafalta" value="<?php echo ($this->input->post('grupo_multafalta') ? $this->input->post('grupo_multafalta') : $grupo['grupo_multafalta']); ?>" class="form-control" id="grupo_multafalta" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="grupo_multaretraso" class="control-label">Multa/Retraso Bs</label>
                        <div class="form-group">
                            <input type="text" name="grupo_multaretraso" value="<?php echo ($this->input->post('grupo_multaretraso') ? $this->input->post('grupo_multaretraso') : $grupo['grupo_multaretraso']); ?>" class="form-control" id="grupo_multaretraso" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="grupo_cuotas" class="control-label">Multa/Cuota Bs</label>
                        <div class="form-group">
                            <input type="text" name="grupo_cuotas" value="<?php echo ($this->input->post('grupo_cuotas') ? $this->input->post('grupo_cuotas') : $grupo['grupo_cuotas']); ?>" class="form-control" id="grupo_cuotas" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="grupo_ahorro" class="control-label">Multa/Mora Bs</label>
                        <div class="form-group">
                            <input type="text" name="grupo_ahorro" value="<?php echo ($this->input->post('grupo_ahorro') ? $this->input->post('grupo_ahorro') : $grupo['grupo_ahorro']); ?>" class="form-control" id="grupo_ahorro" />
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