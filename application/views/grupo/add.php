<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Registra: Grupo</h3>
            </div>
            <?php echo form_open('grupo/add'); ?>
          	<div class="box-body">
                    
                   
          		<div class="row clearfix">
                            
					<div class="col-md-12">
						<label for="asesor_id" class="control-label">Asesor(*)</label>
						<div class="form-group">
                                                    <select name="asesor_id" class="form-control" required>
								<option value="">- ASESOR -</option>    
								<?php 
								foreach($all_asesor as $asesor)
								{
									$selected = ($asesor['asesor_id'] == $this->input->post('asesor_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$asesor['asesor_id'].'" '.$selected.'>'.$asesor['asesor_nombre'].'</option>';
								} 
								?>
							</select>
						</div>
					</div>
                
                                        <!-------------------------------- TITULO --------------------------->
<!--                                        <div class="box-header panel-primary ">
                                            <center>
                                            <h3 class="box-title" >
                                                <b>UBICACIÓN</b>
                                            </h3>                                                
                                            </center>
                                        </div> -->
                                        <!-------------------------------- FIN TITULO --------------------------->
                                        
					<div class="col-md-4">
						<label for="grupo_departamento" class="control-label">Departamento</label>
						<div class="form-group">
							<input type="text" name="grupo_departamento" value="<?php echo $this->input->post('grupo_departamento'); ?>" class="form-control" id="grupo_departamento" />
						</div>
					</div>
                                        
					<div class="col-md-4">
						<label for="grupo_municipio" class="control-label">Municipio</label>
						<div class="form-group">
							<input type="text" name="grupo_municipio" value="<?php echo $this->input->post('grupo_municipio'); ?>" class="form-control" id="grupo_municipio" />
						</div>
					</div>
                                        
					<div class="col-md-4">
						<label for="grupo_provincia" class="control-label">Provincia</label>
						<div class="form-group">
							<input type="text" name="grupo_provincia" value="<?php echo $this->input->post('grupo_provincia'); ?>" class="form-control" id="grupo_provincia" />
                                                </div>
                                        </div>
                                        
					<div class="col-md-4">
						<label for="grupo_zona" class="control-label">Zona</label>
						<div class="form-group">
							<input type="text" name="grupo_zona" value="<?php echo $this->input->post('grupo_zona'); ?>" class="form-control" id="grupo_zona" />
						</div>
					</div>
                            
					<div class="col-md-4">
						<label for="grupo_fecha" class="control-label">Fecha Creación</label>
						<div class="form-group">
                                                    <input type="date" name="grupo_fecha" value="<?php echo date('Y-m-d'); ?>" class="form-control" id="grupo_fecha"/>
						</div>
					</div>
					<div class="col-md-4">
						<label for="grupo_hora" class="control-label">Hora Creación</label>
						<div class="form-group">
							<input type="time" name="grupo_hora" value="<?php echo date('H:i:s'); ?>" class="form-control" id="grupo_hora" />
						</div>
					</div>
                                        

					<div class="col-md-6">
						<label for="grupo_nombre" class="control-label">Nombre/Grupo(*)</label>
						<div class="form-group">
							<input type="text" name="grupo_nombre" value="<?php echo $this->input->post('grupo_nombre'); ?>" class="form-control" id="grupo_nombre" required  onKeyUp="this.value = this.value.toUpperCase();"/>
						</div>
					</div>

					<div class="col-md-3">
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
                                        
                                        
                                        
<!--					<div class="col-md-6">
						<label for="usuario_id" class="control-label">Usuario</label>
						<div class="form-group">
							<select name="usuario_id" class="form-control">
								<option value="">select usuario</option>
								<?php 
//								foreach($all_usuario as $usuario)
//								{
//									$selected = ($usuario['usuario_id'] == $this->input->post('usuario_id')) ? ' selected="selected"' : "";
//
//									echo '<option value="'.$usuario['usuario_id'].'" '.$selected.'>'.$usuario['usuario_nombre'].'</option>';
//								} 
								?>
							</select>
						</div>
					</div>-->
<!--					<div class="col-md-6">
						<label for="estado_id" class="control-label">Estado</label>
						<div class="form-group">
							<select name="estado_id" class="form-control">
								<option value="">select estado</option>
								<?php 
//								foreach($all_estado as $estado)
//								{
//									$selected = ($estado['estado_id'] == $this->input->post('estado_id')) ? ' selected="selected"' : "";
//
//									echo '<option value="'.$estado['estado_id'].'" '.$selected.'>'.$estado['estado_descripcion'].'</option>';
//								} 
								?>
							</select>
						</div>
					</div>-->

                
                                        <!-------------------------------- TITULO --------------------------->
<!--                                        <div class="box-header with-border">
                                            <center>
                                            <h3 class="box-title" ><b>----------------- PARÁMETROS -----------------</b></h3>                                                
                                            </center>
                                        </div> -->
                                        <!-------------------------------- FIN TITULO --------------------------->
                                        
                                        <div class="col-md-4">
						<label for="grupo_diareunion" class="control-label">Dia reunión</label>
						<div class="form-group">
							<!--<input type="text" name="grupo_diareunion" value="<?php echo $this->input->post('grupo_diareunion'); ?>" class="form-control" id="grupo_diareunion" />-->
                                                    <select id="grupo_diareunion" class="form-control">
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
							<input type="time" name="grupo_horareunion" value="<?php echo date('H:i'); ?>" class="form-control" id="grupo_horareunion" />
						</div>
					</div>

                                        <div class="col-md-4">
						<label for="grupo_diareunion" class="control-label">Forma Reunion</label>
						<div class="form-group">
							<!--<input type="text" name="grupo_diareunion" value="<?php echo $this->input->post('grupo_diareunion'); ?>" class="form-control" id="grupo_diareunion" />-->
                                                    <select id="grupo_diareunion" class="form-control">
                                                        <option value="1">DIARIO (1 DIA)</option>
                                                        <option value="7">SEMANAL (7 DIAS)</option>
                                                        <option value="14">BISEMANAL (14 DIAS)</option>
                                                        <option value="15">QUINCENAL (15 DIAS)</option>
                                                        <option value="30">MENSUAL (30 DIAS)</option>                                                                                                               
                                                    </select>
                                                    
                                                </div>
					</div>

					<div class="col-md-3">
						<label for="grupo_iniciosolicitud" class="control-label">Fecha Solicitud</label>
						<div class="form-group">
							<input type="date" name="grupo_iniciosolicitud" value="<?php echo date('Y-m-d'); ?>" class="form-control" id="grupo_iniciosolicitud" />
						</div>
					</div>
					<div class="col-md-3">
						<label for="grupo_monto" class="control-label">Monto Solicitado Bs</label>
						<div class="form-group">
							<input type="text" name="grupo_monto" value="<?php echo $this->input->post('grupo_monto'); ?>" class="form-control" id="grupo_monto" required/>
						</div>
					</div>

					<div class="col-md-6" hidden>
						<label for="grupo_fechahora" class="control-label">Fechahora</label>
						<div class="form-group">
							<input type="text" name="grupo_fechahora" value="<?php echo $this->input->post('grupo_fechahora'); ?>" class="has-datetimepicker form-control" id="grupo_fechahora" />
						</div>
					</div>
                                        
					<div class="col-md-3">
						<label for="grupo_multafalta" class="control-label">Multa/Falta Bs</label>
						<div class="form-group">
							<input type="text" name="grupo_multafalta" value="<?php echo $this->input->post('grupo_multafalta'); ?>" class="form-control" id="grupo_multafalta" />
						</div>
					</div>
					<div class="col-md-3">
						<label for="grupo_multaretraso" class="control-label">Multa/Retraso Bs</label>
						<div class="form-group">
							<input type="text" name="grupo_multaretraso" value="<?php echo $this->input->post('grupo_multaretraso'); ?>" class="form-control" id="grupo_multaretraso" />
						</div>
					</div>
					<div class="col-md-3">
						<label for="grupo_cuotas" class="control-label">Multa/Cuota Bs</label>
						<div class="form-group">
							<input type="text" name="grupo_cuotas" value="<?php echo $this->input->post('grupo_cuotas'); ?>" class="form-control" id="grupo_cuotas" />
						</div>
					</div>
					<div class="col-md-3">
						<label for="grupo_ahorro" class="control-label">Multa/Mora Bs</label>
						<div class="form-group">
							<input type="text" name="grupo_ahorro" value="<?php echo $this->input->post('grupo_ahorro'); ?>" class="form-control" id="grupo_ahorro" />
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