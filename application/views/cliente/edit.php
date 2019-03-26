<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script type="text/javascript">
function mostrar(a) {
    obj = document.getElementById('oculto'+a);
    obj.style.visibility = (obj.style.visibility == 'hidden') ? 'visible' : 'hidden';
    //objm = document.getElementById('map');
    if(obj.style.visibility == 'hidden'){
        $('#map').css({ 'width':'0px', 'height':'0px' });
        $('#mosmapa').text("Modificar Ubicación del Cliente");
    }else{
        $('#map').css({ 'width':'100%', 'height':'400px' });
        $('#mosmapa').text("Cerrar mapa");
    }

}
</script>
<script type="text/javascript">
    function cambiarcod(cod){
        var nombre = $("#cliente_nombre").val();
        var apellido = $("#cliente_apellido").val();
        var cad1 = nombre.substring(0,2);
        var cad2 = apellido.substring(apellido.length-1, apellido.length);
        var fecha = new Date();
        var pararand = fecha.getFullYear()+fecha.getMonth()+fecha.getDay();
        var cad3 = Math.floor((Math.random(1001,9999) * pararand));
        var cad = cad1+cad2+cad3;
        $('#cliente_codigo').val(cad);
    }
</script>
<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Editar Cliente</h3>&nbsp;&nbsp;
                <button type="button" class="btn btn-success btn-sm" onclick="cambiarcod(this);" title="Generar otro Código Cliente">
			<i class="fa fa-edit"></i>Codigo Cliente
		</button>
            </div>
            <?php echo form_open_multipart('cliente/edit/'.$cliente['cliente_id']); ?>
          	<div class="box-body">
                    <div class="row clearfix">
                        <div class="col-md-4">
                            <label for="cliente_nombre" class="control-label"><span class="text-danger">*</span>Nombre</label>
                            <div class="form-group">
                                <input type="text" name="cliente_nombre" value="<?php echo ($this->input->post('cliente_nombre') ? $this->input->post('cliente_nombre') : $cliente['cliente_nombre']); ?>" class="form-control" id="cliente_nombre" onKeyUp="this.value = this.value.toUpperCase();" required />
                                <span class="text-danger"><?php echo form_error('cliente_nombre');?></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="cliente_apellido" class="control-label"><span class="text-danger">*</span>Apellido</label>
                            <div class="form-group">
                                <input type="text" name="cliente_apellido" value="<?php echo ($this->input->post('cliente_apellido') ? $this->input->post('cliente_apellido') : $cliente['cliente_apellido']); ?>" class="form-control" id="cliente_apellido" onKeyUp="this.value = this.value.toUpperCase();" />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="cliente_ci" class="control-label">C.I.</label>
                            <div class="form-group">
                                <input type="text" name="cliente_ci" value="<?php echo ($this->input->post('cliente_ci') ? $this->input->post('cliente_ci') : $cliente['cliente_ci']); ?>" class="form-control" id="cliente_ci" onKeyUp="this.value = this.value.toUpperCase();" />
                                
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="cliente_extencionci" class="control-label">Extención C.I.</label>
                            <div class="form-group">
                                <select name="cliente_extencionci" class="form-control">
                                    <option value="">- EXTENCION -</option>
                                    <?php 
                                    foreach($all_extencion as $extencion)
                                    {
                                        $selected = ($extencion['cliente_extencionci'] == $cliente['cliente_extencionci']) ? ' selected="selected"' : "";
                                        echo '<option value="'.$extencion['cliente_extencionci'].'" '.$selected.'>'.$extencion['cliente_extencionci'].'</option>';
                                    } 
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="cliente_codigo" class="control-label">Código</label>
                            <div class="form-group">
                                <input type="text" name="cliente_codigo" value="<?php echo ($this->input->post('cliente_codigo') ? $this->input->post('cliente_codigo') : $cliente['cliente_codigo']);; ?>" class="form-control" id="cliente_codigo" readonly />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="cliente_fechanac" class="control-label">Fecha Nac.</label>
                            <div class="form-group">
                                <input type="date" name="cliente_fechanac" value="<?php echo ($this->input->post('cliente_fechanac') ? $this->input->post('cliente_fechanac') : $cliente['cliente_fechanac']);; ?>" class="form-control" id="cliente_fechanac" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="cliente_telefono" class="control-label">Teléfono</label>
                            <div class="form-group">
                                <input type="text" name="cliente_telefono" value="<?php echo ($this->input->post('cliente_telefono') ? $this->input->post('cliente_telefono') : $cliente['cliente_telefono']); ?>" class="form-control" id="cliente_telefono" onKeyUp="this.value = this.value.toUpperCase();" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="cliente_celular" class="control-label">Celular</label>
                            <div class="form-group">
                                <input type="text" name="cliente_celular" value="<?php echo ($this->input->post('cliente_celular') ? $this->input->post('cliente_celular') : $cliente['cliente_celular']); ?>" class="form-control" id="cliente_celular" onKeyUp="this.value = this.value.toUpperCase();" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label  class="control-label"><a href="#" class="btn btn-success btn-sm " id="mosmapa" onclick="mostrar('1'); return false">Modificar Ubicación del Cliente</a></label>
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
                                    milat = $('#cliente_latitud').val();
                                    //milng = document.getElementById('cliente_longitud').value;
                                    milng = $('#cliente_longitud').val();

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
                                        document.getElementById("cliente_latitud").value = this.getPosition().lat();
                                        document.getElementById("cliente_longitud").value = this.getPosition().lng();
                                      });
                                }
                                initMap();
                            </script>
                            <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC5L7UMFw0GxFZgVXCfMLhGVK5Gn7HvG_U&callback=initMap"></script>
                            </div>
                            <!-- ***********************aqui termina el mapa para capturar coordenadas *********************** -->
                        </div>
                        <div class="col-md-3">
                            <label for="cliente_latitud" class="control-label">Latitud</label>
                            <div class="form-group">
                                <input type="text" name="cliente_latitud" value="<?php echo ($this->input->post('cliente_latitud') ? $this->input->post('cliente_latitud') : $cliente['cliente_latitud']); ?>" class="form-control" id="cliente_latitud" readonly />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="cliente_longitud" class="control-label">Longitud</label>
                            <div class="form-group">
                                <input type="text" name="cliente_longitud" value="<?php echo ($this->input->post('cliente_longitud') ? $this->input->post('cliente_longitud') : $cliente['cliente_longitud']); ?>" class="form-control" id="cliente_longitud" readonly />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="cliente_direccion" class="control-label">Dirección</label>
                            <div class="form-group">
                                <input type="text" name="cliente_direccion" value="<?php echo ($this->input->post('cliente_direccion') ? $this->input->post('cliente_direccion') : $cliente['cliente_direccion']); ?>" class="form-control" id="cliente_direccion" onKeyUp="this.value = this.value.toUpperCase();" />
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <label for="cliente_referencia" class="control-label">Referencia</label>
                            <div class="form-group">
                                <input type="text" name="cliente_referencia" value="<?php echo ($this->input->post('cliente_referencia') ? $this->input->post('cliente_referencia') : $cliente['cliente_referencia']); ?>" class="form-control" id="cliente_referencia" onKeyUp="this.value = this.value.toUpperCase();" />
                            </div>
                        </div>
                        <div class="col-md-5">
                            <label for="cliente_foto" class="control-label">Foto</label>
                            <div class="form-group">
                                <input type="file" name="cliente_foto" value="<?php echo ($this->input->post('cliente_foto') ? $this->input->post('cliente_foto') : $cliente['cliente_foto']); ?>" class="btn btn-success btn-sm form-control" id="cliente_foto" accept="image/png, image/jpeg, jpg, image/gif" />
                                <input type="hidden" name="cliente_foto1" value="<?php echo ($this->input->post('cliente_foto') ? $this->input->post('cliente_foto') : $cliente['cliente_foto']); ?>" class="form-control" id="cliente_foto1" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="cliente_email" class="control-label">E-mail</label>
                            <div class="form-group">
                                <input type="email" name="cliente_email" value="<?php echo ($this->input->post('cliente_email') ? $this->input->post('cliente_email') : $cliente['cliente_email']); ?>" class="form-control" id="cliente_email" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="cliente_nit" class="control-label">Nit</label>
                            <div class="form-group">
                                <input type="number" min="0" name="cliente_nit" value="<?php echo $cliente['cliente_nit']; ?>" class="form-control" id="cliente_nit" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="cliente_razon" class="control-label">Razón</label>
                            <div class="form-group">
                                <input type="text" name="cliente_razon" value="<?php echo ($this->input->post('cliente_razon') ? $this->input->post('cliente_razon') : $cliente['cliente_razon']); ?>" class="form-control" id="cliente_razon" onKeyUp="this.value = this.value.toUpperCase();" />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="estadocivil_id" class="control-label">Estado Civil</label>
                            <div class="form-group">
                                <select name="estadocivil_id" class="form-control">
                                    <option value="0">- ESTADO CIVIL -</option>
                                    <?php 
                                    foreach($all_estado_civil as $estado_civil)
                                    {
                                        $selected = ($estado_civil['estadocivil_id'] == $cliente['estadocivil_id']) ? ' selected="selected"' : "";
                                        echo '<option value="'.$estado_civil['estadocivil_id'].'" '.$selected.'>'.$estado_civil['estadocivil_nombre'].'</option>';
                                    } 
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="categoria_id" class="control-label">Categoria</label>
                            <div class="form-group">
                                <select name="categoria_id" class="form-control">
                                    <option value="0">- CATEGORIA -</option>
                                    <?php 
                                    foreach($all_categoria as $categoria)
                                    {
                                        $selected = ($categoria['categoria_id'] == $cliente['categoria_id']) ? ' selected="selected"' : "";
                                        echo '<option value="'.$categoria['categoria_id'].'" '.$selected.'>'.$categoria['categoria_nombre'].'</option>';
                                    } 
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="asesor_id" class="control-label">Asesor</label>
                            <div class="form-group">
                                <select name="asesor_id" class="form-control">
                                    <option value="0">- ASESOR -</option>
                                    <?php 
                                    foreach($all_asesor as $asesor)
                                    {
                                        $selected = ($asesor['asesor_id'] == $cliente['asesor_id']) ? ' selected="selected"' : "";
                                        echo '<option value="'.$asesor['asesor_id'].'" '.$selected.'>'.$asesor['asesor_nombre'].'</option>';
                                    } 
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="estado_id" class="control-label">Estado</label>
                            <div class="form-group">
                                <select name="estado_id" class="form-control">
                                    <?php 
                                    foreach($all_estado as $estado)
                                    {
                                        $selected = ($estado['estado_id'] == $cliente['estado_id']) ? ' selected="selected"' : "";
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
                    <a href="<?php echo site_url('cliente'); ?>" class="btn btn-danger">
                        <i class="fa fa-times"></i> Cancelar</a>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>