<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var estadocivil = "";
        estadocivil = $("#estadocivil_id").val();
        if(estadocivil == 2 || estadocivil == 5){
            $("#conyujepareja").html("*");
            document.getElementById("cliente_conyuge").required = true;
            $("#telefonopareja").html("*");
            document.getElementById("conyuge_telef").required = true;
        }else{
            $("#conyujepareja").html("");
            document.getElementById("cliente_conyuge").required = false;
            $("#telefonopareja").html("");
            document.getElementById("conyuge_telef").required = false;
        }
    });
</script>
<script type="text/javascript">
    function pareja_obligado(){
        var estadocivil = "";
        estadocivil = $("#estadocivil_id").val();
        if(estadocivil == 2 || estadocivil == 5){
            $("#conyujepareja").html("*");
            document.getElementById("cliente_conyuge").required = true;
            $("#telefonopareja").html("*");
            document.getElementById("conyuge_telef").required = true;
            //cliente_conyuge.attributes.required = "required";
        }else{
            $("#conyujepareja").html("");
            document.getElementById("cliente_conyuge").required = false;
            $("#telefonopareja").html("");
            document.getElementById("conyuge_telef").required = false;
        }
    }
</script>
<script type="text/javascript">
function mostrar(a) {
    obj = document.getElementById('oculto'+a);
    obj.style.visibility = (obj.style.visibility == 'hidden') ? 'visible' : 'hidden';
    //objm = document.getElementById('map');
    if(obj.style.visibility == 'hidden'){
        $('#map').css({ 'width':'0px', 'height':'0px' });
        $('#mosmapa').text("Obtener Ubicación del Cliente");
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
<script type="text/javascript">
    $(document).ready(function(){
    $("#cliente_apellido").change(function(){
        var nombre = $("#cliente_nombre").val();    
        var apellido = $("#cliente_apellido").val();
        var cad1 = nombre.substring(0,2);
        var cad2 = apellido.substring(apellido.length-1, apellido.length);
        var fecha = new Date();
        var pararand = fecha.getFullYear()+fecha.getMonth()+fecha.getDay();
        var cad3 = Math.floor((Math.random(1001,9999) * pararand));
        var cad = cad1+cad2+cad3;
        $('#cliente_codigo').val(cad);
        $('#cliente_razon').val(nombre+' '+apellido);
    });
    $("#cliente_ci").change(function(){
        var ci = $("#cliente_ci").val();
        $('#cliente_nit').val(ci);
    });
  });
    
</script>
<?php if($resultado == 1){ ?>
<script type="text/javascript">
    $(document).ready(function(){
        var esnombre = $("#cliente_nombre").val();
        var esapellido = $("#cliente_apellido").val();
        alert("El Cliente '"+esnombre+" "+esapellido+"' \n ya se encuentra REGISTRADO");
    });
</script>
<?php } ?>
<style type="text/css">
    #map{
        height: 100%;
        width: 100%;
    }
</style>
<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Añadir Cliente</h3>&nbsp;&nbsp;
                <button type="button" class="btn btn-success btn-sm" onclick="cambiarcod(this);" title="Generar otro Código Cliente">
			<i class="fa fa-edit"></i>Codigo Cliente
		</button>
            </div>
            <?php echo form_open_multipart('cliente/add'); ?>
          	<div class="box-body">
                    <div class="row clearfix">
                        <div class="col-md-4">
                            <label for="cliente_nombre" class="control-label"><span class="text-danger">*</span>Nombres</label>
                            <div class="form-group">
                                <input type="text" name="cliente_nombre" value="<?php echo $this->input->post('cliente_nombre'); ?>" class="form-control" id="cliente_nombre" onKeyUp='this.value = this.value.toUpperCase();' required autofocus />
                                <span class="text-danger"><?php echo form_error('cliente_nombre');?></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="cliente_apellido" class="control-label"><span class="text-danger">*</span>Apellidos</label>
                            <div class="form-group">
                                <input type="text" name="cliente_apellido" value="<?php echo $this->input->post('cliente_apellido'); ?>" class="form-control" id="cliente_apellido" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" required />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="cliente_apcasado" class="control-label">Apellido de Casada(o)</label>
                            <div class="form-group">
                                <input type="text" name="cliente_apcasado" value="<?php echo $this->input->post('cliente_apcasado'); ?>" class="form-control" id="cliente_apcasado" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="cliente_codigo" class="control-label"><span class="text-danger">*</span>Código</label>
                            <div class="form-group">
                                <input type="text" name="cliente_codigo" value="<?php echo $this->input->post('cliente_codigo'); ?>" class="form-control" id="cliente_codigo" required readonly />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="cliente_sexo" class="control-label">Sexo</label>
                            <div class="form-group">
                                <select name="cliente_sexo" id="cliente_sexo" class="form-control" style="width: 100%">
                                    <option value="F">F</option>
                                    <option value="M">M</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="estadocivil_id" class="control-label">Estado Civil</label>
                            <div class="form-group">
                                <select name="estadocivil_id" id="estadocivil_id" class="form-control" onchange="pareja_obligado()">
                                    <!--<option value="0">- ESTADO CIVIL -</option>-->
                                    <?php 
                                    foreach($all_estado_civil as $estado_civil)
                                    {
                                        $selected = ($estado_civil['estadocivil_id'] == $this->input->post('estadocivil_id')) ? ' selected="selected"' : "";
                                        echo '<option value="'.$estado_civil['estadocivil_id'].'" '.$selected.'>'.$estado_civil['estadocivil_nombre'].'</option>';
                                    } 
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="cliente_tipodoc" class="control-label">Tipo de Documento</label>
                            <div class="form-group">
                                <select name="cliente_tipodoc" id="cliente_tipodoc" class="form-control">
                                    <option value="C.I.">C.I.</option>
                                    <option value="RUN">RUN</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="cliente_ci" class="control-label"><span class="text-danger">*</span>Nro. Dcto.</label>
                            <div class="form-group">
                                <input type="text" name="cliente_ci" value="<?php echo $this->input->post('cliente_ci'); ?>" class="form-control" id="cliente_ci" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" required />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="cliente_extencionci" class="control-label"><span class="text-danger">*</span>Extención Dcto.</label>
                            <div class="form-group">
                                <select name="cliente_extencionci" class="form-control" required>
                                    <option value="">- EXTENCION -</option>
                                    <?php 
                                    foreach($all_extencion as $extencion)
                                    {
                                        $selected = ($extencion['cliente_extencionci'] == $this->input->post('cliente_extencionci')) ? ' selected="selected"' : "";
                                        echo '<option value="'.$extencion['cliente_extencionci'].'" '.$selected.'>'.$extencion['cliente_extencionci'].'</option>';
                                    } 
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="cliente_fechavenc" class="control-label"><span class="text-danger">*</span>Fecha Venc. Dcto.</label>
                            <div class="form-group">
                                <input type="date" name="cliente_fechavenc" value="<?php echo $this->input->post('cliente_fechavenc'); ?>" class="form-control" id="cliente_fechavenc" required />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="cliente_fechanac" class="control-label"><span class="text-danger">*</span>Fecha Nac.</label>
                            <div class="form-group">
                                <input type="date" name="cliente_fechanac" value="<?php echo $this->input->post('cliente_fechanac'); ?>" class="form-control" id="cliente_fechanac" required />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="cliente_telefono" class="control-label">Teléfono</label>
                            <div class="form-group">
                                <input type="text" name="cliente_telefono" value="<?php echo $this->input->post('cliente_telefono'); ?>" class="form-control" id="cliente_telefono" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="cliente_celular" class="control-label"><span class="text-danger">*</span>Celular</label>
                            <div class="form-group">
                                <input type="text" name="cliente_celular" value="<?php echo $this->input->post('cliente_celular'); ?>" class="form-control" id="cliente_celular" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" required />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="cliente_conyuge" class="control-label"><span id="conyujepareja" class="text-danger"></span>Pareja</label>
                            <div class="form-group">
                                <input type="text" name="cliente_conyuge" value="<?php echo $this->input->post('cliente_conyuge'); ?>" class="form-control" id="cliente_conyuge" onKeyUp='this.value = this.value.toUpperCase();' />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="conyuge_ci" class="control-label">Pareja Dcto.</label>
                            <div class="form-group">
                                <input type="text" name="conyuge_ci" value="<?php echo $this->input->post('conyuge_ci'); ?>" class="form-control" id="cliente_ci" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="conyuge_telef" class="control-label"><span id="telefonopareja" class="text-danger"></span>Pareja Telef.:</label>
                            <div class="form-group">
                                <input type="text" name="conyuge_telef" value="<?php echo $this->input->post('conyuge_telef'); ?>" class="form-control" id="conyuge_telef" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="cliente_referencia1" class="control-label"><span class="text-danger">*</span>Referencia #1</label>
                            <div class="form-group">
                                <input type="text" name="cliente_referencia1" value="<?php echo $this->input->post('cliente_referencia1'); ?>" class="form-control" id="cliente_referencia1" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" required />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="cliente_reftelef1" class="control-label"><span class="text-danger">*</span>Teléfono Ref. #1</label>
                            <div class="form-group">
                                <input type="text" name="cliente_reftelef1" value="<?php echo $this->input->post('cliente_reftelef1'); ?>" class="form-control" id="cliente_reftelef1" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" required />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="cliente_referencia2" class="control-label">Referencia #2</label>
                            <div class="form-group">
                                <input type="text" name="cliente_referencia2" value="<?php echo $this->input->post('cliente_referencia2'); ?>" class="form-control" id="cliente_referencia2" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="cliente_reftelef2" class="control-label">Teléfono Ref. #2</label>
                            <div class="form-group">
                                <input type="text" name="cliente_reftelef2" value="<?php echo $this->input->post('cliente_reftelef2'); ?>" class="form-control" id="cliente_reftelef2" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="cliente_tipovivienda" class="control-label">Tipo de Vivienda</label>
                            <div class="form-group">
                                <select name="cliente_tipovivienda" id="cliente_tipovivienda"  class="form-control"  style="width: 100%">
                                    <option value="DEPARTAMENTO">DEPARTAMENTO</option>
                                    <option value="CASA">CASA</option>
                                    <option value="CUARTO">CUARTO</option>
                                    <option value="OTRO">OTRO</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="cliente_pertenenciadom" class="control-label">Pertenencia Dom.</label>
                            <div class="form-group">
                                <select name="cliente_pertenenciadom" id="cliente_pertenenciadom"  class="form-control" style="width: 100%">
                                    <option value="PROPIO">PROPIO</option>
                                    <option value="ALQUILER">ALQUILER</option>
                                    <option value="ANTICRETICO">ANTICRETICO</option>
                                    <option value="MIXTO">MIXTO</option>
                                    <option value="OTROS">OTRO</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="cliente_pertenenciatiempo" class="control-label"><span class="text-danger">*</span>Antiguedad Domiciliaria</label>
                            <div class="form-group">
                                <input type="text" name="cliente_pertenenciatiempo" value="<?php echo $this->input->post('cliente_pertenenciatiempo'); ?>" class="form-control" id="cliente_pertenenciatiempo" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" required />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="cliente_numhijos" class="control-label">Nro. de Hijos</label>
                            <div class="form-group">
                                <input type="number" min="0" name="cliente_numhijos" value="<?php echo $this->input->post('cliente_numhijos'); ?>" class="form-control" id="cliente_numhijos" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="cliente_direccion" class="control-label"><span class="text-danger">*</span>Dirección</label>
                            <div class="form-group">
                                <input type="text" name="cliente_direccion" value="<?php echo $this->input->post('cliente_direccion'); ?>" class="form-control" id="cliente_direccion" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label  class="control-label"><a href="#" class="btn btn-success btn-sm " id="mosmapa" onclick="mostrar('1'); return false">Obtener Ubicación del Cliente</a></label>
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
                                        navigator.geolocation.getCurrentPosition(
                                          function (position){
                                            coords_lat =  {
                                              lat: position.coords.latitude,
                                            };
                                            coords_lng =  {
                                              lng: position.coords.longitude,
                                            };
                                            setMapa(coords_lat, coords_lng);  //pasamos las coordenadas al metodo para crear el mapa

                                          },function(error){console.log(error);});
                                }

                                function setMapa (coords_lat, coords_lng)
                                {
                                        document.getElementById("cliente_latitud").value = coords_lat.lat;
                                        document.getElementById("cliente_longitud").value = coords_lng.lng;
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
                            <label for="cliente_latitud" class="control-label"><span class="text-danger">*</span>Latitud</label>
                            <div class="form-group">
                                <input type="text" name="cliente_latitud" value="<?php echo $this->input->post('cliente_latitud'); ?>" class="form-control" id="cliente_latitud" required readonly />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="cliente_longitud" class="control-label"><span class="text-danger">*</span>Longitud</label>
                            <div class="form-group">
                                <input type="text" name="cliente_longitud" value="<?php echo $this->input->post('cliente_longitud'); ?>" class="form-control" id="cliente_longitud" required readonly />
                            </div>
                        </div>
                        
                        
                        <div class="col-md-6">
                            <label for="cliente_referencia" class="control-label"><span class="text-danger">*</span>Referencia</label>
                            <div class="form-group">
                                <input type="text" name="cliente_referencia" value="<?php echo $this->input->post('cliente_referencia'); ?>" class="form-control" id="cliente_referencia" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" required />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="cliente_foto" class="control-label">Foto</label>
                            <div class="form-group">
                                <input type="file" name="cliente_foto" value="<?php echo $this->input->post('cliente_foto'); ?>" class="btn btn-success btn-sm form-control" id="cliente_foto" accept="image/png, image/jpeg, jpg, image/gif" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="cliente_email" class="control-label">E-mail</label>
                            <div class="form-group">
                                <input type="email" name="cliente_email" value="<?php echo $this->input->post('cliente_email'); ?>" class="form-control" id="cliente_email" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="cliente_nit" class="control-label">Nit</label>
                            <div class="form-group">
                                <input type="number" min="0" name="cliente_nit" value="<?php echo ($this->input->post('cliente_nit') > 0) ? $this->input->post('cliente_nit'): 0 ; ?>" class="form-control" id="cliente_nit" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="cliente_razon" class="control-label">Razón</label>
                            <div class="form-group">
                                <input type="text" name="cliente_razon" value="<?php echo $this->input->post('cliente_razon'); ?>" class="form-control" id="cliente_razon" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="categoria_id" class="control-label">Categoria</label>
                            <div class="form-group">
                                <select name="categoria_id" id="categoria_id" class="form-control">
                                    <option value="0">- CATEGORIA -</option>
                                    <?php 
                                    foreach($all_categoria as $categoria)
                                    {
                                        $selected = ($categoria['categoria_id'] == $this->input->post('categoria_id')) ? ' selected="selected"' : "";
                                        echo '<option value="'.$categoria['categoria_id'].'" '.$selected.'>'.$categoria['categoria_nombre'].'</option>';
                                    } 
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="asesor_id" class="control-label">Asesor</label>
                            <div class="form-group">
                                <select name="asesor_id" id="asesor_id" class="form-control">
                                    <option value="0">- ASESOR -</option>
                                    <?php 
                                    foreach($all_asesor as $asesor)
                                    {
                                        $selected = ($asesor['asesor_id'] == $this->input->post('asesor_id')) ? ' selected="selected"' : "";
                                        echo '<option value="'.$asesor['asesor_id'].'" '.$selected.'>'.$asesor['asesor_nombre']." ".$asesor['asesor_apellido'].'</option>';
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