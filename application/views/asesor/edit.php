<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script type="text/javascript">
function mostrar(a) {
    obj = document.getElementById('oculto'+a);
    obj.style.visibility = (obj.style.visibility == 'hidden') ? 'visible' : 'hidden';
    //objm = document.getElementById('map');
    if(obj.style.visibility == 'hidden'){
        $('#map').css({ 'width':'0px', 'height':'0px' });
        $('#mosmapa').text("Modificar Ubicación del Asesor");
    }else{
        $('#map').css({ 'width':'100%', 'height':'400px' });
        $('#mosmapa').text("Cerrar mapa");
    }

}
</script>
<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Editar Asesor</h3>
            </div>
                <?php echo form_open_multipart('asesor/edit/'.$asesor['asesor_id']); ?>
                <div class="box-body">
                    <div class="row clearfix">
                        
					<div class="col-md-5">
						<label for="asesor_nombre" class="control-label"><span class="text-danger">*</span>Nombre</label>
						<div class="form-group">
							<input type="text" name="asesor_nombre" value="<?php echo ($this->input->post('asesor_nombre') ? $this->input->post('asesor_nombre') : $asesor['asesor_nombre']); ?>" class="form-control" id="asesor_nombre" onKeyUp="this.value = this.value.toUpperCase();" required />
                                                        <span class="text-danger"><?php echo form_error('asesor_nombre');?></span>
						</div>
					</div>
					<div class="col-md-5">
						<label for="asesor_apellido" class="control-label"><span class="text-danger">*</span>Apellido</label>
						<div class="form-group">
							<input type="text" name="asesor_apellido" value="<?php echo ($this->input->post('asesor_apellido') ? $this->input->post('asesor_apellido') : $asesor['asesor_apellido']); ?>" class="form-control" id="asesor_apellido" onKeyUp="this.value = this.value.toUpperCase();" required />
                                                        <span class="text-danger"><?php echo form_error('asesor_apellido');?></span>
						</div>
					</div>
					<div class="col-md-2">
						<label for="asesor_ci" class="control-label">C.I.</label>
						<div class="form-group">
							<input type="text" name="asesor_ci" value="<?php echo ($this->input->post('asesor_ci') ? $this->input->post('asesor_ci') : $asesor['asesor_ci']); ?>" class="form-control" id="asesor_ci" onKeyUp="this.value = this.value.toUpperCase();" />
						</div>
					</div>
                        <div class="col-md-4">
                            <label for="asesor_fechanac" class="control-label">Fecha Nacimiento</label>
                            <div class="form-group">
                                <input type="date" name="asesor_fechanac" value="<?php echo ($this->input->post('asesor_fechanac') ? $this->input->post('asesor_fechanac') : $asesor['asesor_fechanac']); ?>" class="form-control" id="asesor_fechanac" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="asesor_telefono" class="control-label">Teléfono</label>
                            <div class="form-group">
                                <input type="text" name="asesor_telefono" value="<?php echo ($this->input->post('asesor_telefono') ? $this->input->post('asesor_telefono') : $asesor['asesor_telefono']); ?>" class="form-control" id="asesor_telefono" onKeyUp="this.value = this.value.toUpperCase();" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="asesor_celular" class="control-label">Celular</label>
                            <div class="form-group">
                                <input type="text" name="asesor_celular" value="<?php echo ($this->input->post('asesor_celular') ? $this->input->post('asesor_celular') : $asesor['asesor_celular']); ?>" class="form-control" id="asesor_celular" onKeyUp="this.value = this.value.toUpperCase();" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label  class="control-label"><a href="#" class="btn btn-success btn-sm " id="mosmapa" onclick="mostrar('1'); return false">Modificar Ubicación del Asesor</a></label>
                            <!-- ***********************aqui empieza el mapa para capturar coordenadas *********************** -->
                            <div id="oculto1" style="visibility:hidden">
                            <div id="map"></div>
                            <script type="text/javascript">
                                var marker;          //variable del marcador
                                var coords_lat = {};    //coordenadas obtenidas con la geolocalización
                                var coords_lng = {};    //coordenadas obtenidas con la geolocalización


                                //Funcion principal
                                initMap = function () 
                                {
                                    //usamos la API para geolocalizar el usuario

                                    //milat = document.getElementById('cliente_latitud').value;
                                    milat = $('#asesor_latitud').val();
                                    //milng = document.getElementById('cliente_longitud').value;
                                    milng = $('#asesor_longitud').val();

                                        navigator.geolocation.getCurrentPosition(
                                        function (position){
                                            if(milat == 'undefined' || milat == null || milat ==""){
                                                coords_lat =  {
                                                lat: position.coords.latitude,
                                                };
                                                //milat = position.coords.latitude;
                                            }else{
                                                coords_lat =  {
                                                lat: milat,
                                                };
                                            }
                                            if(milng == 'undefined' || milng == null || milng ==""){
                                                coords_lng =  {
                                                  lng: position.coords.longitude,
                                                };
                                                //lng = position.coords.longitude;
                                            }else{
                                                coords_lng =  {
                                                  lng: milng,
                                                };
                                            } 
                                            /*coords_lat =  {
                                                lat: milat,
                                                };

                                            coords_lng =  {
                                                  lng: milng,
                                                };*/
                                            setMapa(coords_lat, coords_lng);  //pasamos las coordenadas al metodo para crear el mapa


                                          },function(error){console.log(error);});
                                }

                                function setMapa (coords_lat, coords_lng)
                                {
                                    //document.getElementById("cliente_latitud").value = coords_lat.lat;
                                   // document.getElementById("cliente_longitud").value = coords_lng.lng;
                                      //Se crea una nueva instancia del objeto mapa
                                      var map = new google.maps.Map(document.getElementById('map'),
                                      {
                                        zoom: 13,
                                        center:new google.maps.LatLng(coords_lat.lat,coords_lng.lng),

                                      });

                                      //Creamos el marcador en el mapa con sus propiedades
                                      //para nuestro obetivo tenemos que poner el atributo draggable en true
                                      //position pondremos las mismas coordenas que obtuvimos en la geolocalización
                                      marker = new google.maps.Marker({
                                        map: map,
                                        draggable: true,
                                        animation: google.maps.Animation.DROP,
                                        position: new google.maps.LatLng(coords_lat.lat,coords_lng.lng),

                                      });
                                      //agregamos un evento al marcador junto con la funcion callback al igual que el evento dragend que indica 
                                      //cuando el usuario a soltado el marcador
                                      //marker.addListener('click', toggleBounce);

                                      marker.addListener( 'dragend', function (event)
                                      {
                                        //escribimos las coordenadas de la posicion actual del marcador dentro del input #coords
                                        document.getElementById("asesor_latitud").value = this.getPosition().lat();
                                        document.getElementById("asesor_longitud").value = this.getPosition().lng();
                                      });
                                }
                                initMap();
                            </script>
                            <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC5L7UMFw0GxFZgVXCfMLhGVK5Gn7HvG_U&callback=initMap"></script>
                            </div>
                            <!-- ***********************aqui termina el mapa para capturar coordenadas *********************** -->
                        </div>
                        <div class="col-md-3">
                            <label for="asesor_latitud" class="control-label">Latitud</label>
                            <div class="form-group">
                                <input type="text" name="asesor_latitud" value="<?php echo ($this->input->post('asesor_latitud') ? $this->input->post('asesor_latitud') : $asesor['asesor_latitud']); ?>" class="form-control" id="asesor_latitud" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="asesor_longitud" class="control-label">Longitud</label>
                            <div class="form-group">
                                <input type="text" name="asesor_longitud" value="<?php echo ($this->input->post('asesor_longitud') ? $this->input->post('asesor_longitud') : $asesor['asesor_longitud']); ?>" class="form-control" id="asesor_longitud" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="asesor_foto" class="control-label">Foto</label>
                            <div class="form-group">
                                <input type="file" name="asesor_foto" value="<?php echo ($this->input->post('asesor_foto') ? $this->input->post('asesor_foto') : $asesor['asesor_foto']); ?>" class="btn btn-success btn-sm form-control" id="asesor_foto" accept="image/png, image/jpeg, jpg, image/gif" />
                                <input type="hidden" name="asesor_foto1" value="<?php echo ($this->input->post('asesor_foto') ? $this->input->post('asesor_foto') : $asesor['asesor_foto']); ?>" class="form-control" id="asesor_foto1" />
                            </div>
                        </div>
					
                        <div class="col-md-6">
                            <label for="asesor_profesion" class="control-label">Profesión</label>
                            <div class="form-group">
                                <input type="text" name="asesor_profesion" value="<?php echo ($this->input->post('asesor_profesion') ? $this->input->post('asesor_profesion') : $asesor['asesor_profesion']); ?>" class="form-control" id="asesor_profesion" onKeyUp="this.value = this.value.toUpperCase();" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="asesor_especialidad" class="control-label">Especialidad</label>
                            <div class="form-group">
                                <input type="text" name="asesor_especialidad" value="<?php echo ($this->input->post('asesor_especialidad') ? $this->input->post('asesor_especialidad') : $asesor['asesor_especialidad']); ?>" class="form-control" id="asesor_especialidad" onKeyUp="this.value = this.value.toUpperCase();" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="estado_id" class="control-label">Estado</label>
                            <div class="form-group">
                                <select name="estado_id" class="form-control">
                                    <option value="">select estado</option>
                                    <?php 
                                    foreach($all_estado as $estado)
                                    {
                                        $selected = ($estado['estado_id'] == $asesor['estado_id']) ? ' selected="selected"' : "";
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
                    <i class="fa fa-check"></i> Guardar
                </button>
                <a href="<?php echo site_url('asesor'); ?>" class="btn btn-danger">
                        <i class="fa fa-times"></i> Cancelar</a>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>