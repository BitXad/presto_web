<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('resources/js/garantiascliente.js'); ?>" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var estadocivil = "";
        estadocivil = $("#estadocivil_id").val();
        if(estadocivil == 2 || estadocivil == 5){
            $("#conyujepareja").html("*");
            document.getElementById("cliente_conyuge").required = true;
            document.getElementById("cliente_conyuge").readOnly = false;
            $("#telefonopareja").html("*");
            document.getElementById("conyuge_telef").required = true;
            document.getElementById("conyuge_telef").readOnly = false;
            document.getElementById("conyuge_ci").readOnly = false;
        }else{
            $("#conyujepareja").html("");
            document.getElementById("cliente_conyuge").required = false;
            document.getElementById("cliente_conyuge").readOnly = true;
            $("#telefonopareja").html("");
            document.getElementById("conyuge_telef").required = false;
            document.getElementById("conyuge_telef").readOnly = true;
            document.getElementById("conyuge_ci").readOnly = true;
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
            document.getElementById("cliente_conyuge").readOnly = false;
            $("#telefonopareja").html("*");
            document.getElementById("conyuge_telef").required = true;
            document.getElementById("conyuge_telef").readOnly = false;
            document.getElementById("conyuge_ci").readOnly = false;
            //cliente_conyuge.attributes.required = "required";
        }else{
            $("#conyujepareja").html("");
            document.getElementById("cliente_conyuge").required = false;
            document.getElementById("cliente_conyuge").readOnly = true;
            $("#telefonopareja").html("");
            document.getElementById("conyuge_telef").required = false;
            document.getElementById("conyuge_telef").readOnly = true;
            document.getElementById("conyuge_ci").readOnly = true;
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
<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Editar Cliente</h3>&nbsp;&nbsp;
                <button type="button" class="btn btn-success btn-sm" onclick="cambiarcod(this);" title="Generar otro Código Cliente">
			<i class="fa fa-edit"></i>Codigo Cliente
		</button>
            </div>
            <?php echo form_open_multipart('cliente/editar2/'.$cliente['cliente_id'].'/'.$grupo_id); ?>
          	<div class="box-body">
                    <div class="row clearfix">
                        <div class="col-md-4">
                            <label for="cliente_nombre" class="control-label"><span class="text-danger">*</span>Nombre</label>
                            <div class="form-group">
                                <input type="text" name="cliente_nombre" value="<?php echo ($this->input->post('cliente_nombre') ? $this->input->post('cliente_nombre') : $cliente['cliente_nombre']); ?>" class="form-control" id="cliente_nombre" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" required />
                                <span class="text-danger"><?php echo form_error('cliente_nombre');?></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="cliente_apellido" class="control-label"><span class="text-danger">*</span>Apellido</label>
                            <div class="form-group">
                                <input type="text" name="cliente_apellido" value="<?php echo ($this->input->post('cliente_apellido') ? $this->input->post('cliente_apellido') : $cliente['cliente_apellido']); ?>" class="form-control" id="cliente_apellido" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" required />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="cliente_apcasado" class="control-label">Apellido de Casada(o)</label>
                            <div class="form-group">
                                <input type="text" name="cliente_apcasado" value="<?php echo ($this->input->post('cliente_apcasado') ? $this->input->post('cliente_apcasado') : $cliente['cliente_apcasado']); ?>" class="form-control" id="cliente_apcasado" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="cliente_codigo" class="control-label"><span class="text-danger">*</span>Código</label>
                            <div class="form-group">
                                <input type="text" name="cliente_codigo" value="<?php echo ($this->input->post('cliente_codigo') ? $this->input->post('cliente_codigo') : $cliente['cliente_codigo']); ?>" class="form-control" id="cliente_codigo" required readonly />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="cliente_sexo" class="control-label">Sexo</label>
                            <div class="form-group">
                                <select name="cliente_sexo" id="cliente_sexo" class="form-control" style="width: 100%">
                                    <option <?php echo ($cliente['cliente_sexo'] == "F" ? "selected" : ""); ?> value="F">F</option>
                                    <option <?php echo ($cliente['cliente_sexo'] == "M" ? "selected" : ""); ?> value="M">M</option>
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
                                        $selected = ($estado_civil['estadocivil_id'] == $cliente['estadocivil_id']) ? ' selected="selected"' : "";
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
                                    <option <?php echo ($cliente['cliente_tipodoc'] == "C.I." ? "selected" : ""); ?> value="C.I.">C.I.</option>
                                    <option <?php echo ($cliente['cliente_tipodoc'] == "RUN" ? "selected" : ""); ?> value="RUN">RUN</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="cliente_ci" class="control-label"><span class="text-danger">*</span>Nro. Dcto.</label>
                            <div class="form-group">
                                <input type="text" name="cliente_ci" value="<?php echo ($this->input->post('cliente_ci') ? $this->input->post('cliente_ci') : $cliente['cliente_ci']); ?>" class="form-control" id="cliente_ci" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" required />
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
                                        $selected = ($extencion['cliente_extencionci'] == $cliente['cliente_extencionci']) ? ' selected="selected"' : "";
                                        echo '<option value="'.$extencion['cliente_extencionci'].'" '.$selected.'>'.$extencion['cliente_extencionci'].'</option>';
                                    } 
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="cliente_fechavenc" class="control-label"><span class="text-danger">*</span>Fecha Venc. Dcto.</label>
                            <div class="form-group">
                                <input type="date" name="cliente_fechavenc" value="<?php echo $cliente['cliente_fechavenc']; ?>" class="form-control" id="cliente_fechavenc" required />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="cliente_fechanac" class="control-label"><span class="text-danger">*</span>Fecha Nac.</label>
                            <div class="form-group">
                                <input type="date" name="cliente_fechanac" value="<?php echo ($this->input->post('cliente_fechanac') ? $this->input->post('cliente_fechanac') : $cliente['cliente_fechanac']);; ?>" class="form-control" id="cliente_fechanac" required />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="cliente_telefono" class="control-label">Teléfono</label>
                            <div class="form-group">
                                <input type="text" name="cliente_telefono" value="<?php echo ($this->input->post('cliente_telefono') ? $this->input->post('cliente_telefono') : $cliente['cliente_telefono']); ?>" class="form-control" id="cliente_telefono" required onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="cliente_celular" class="control-label"><span class="text-danger">*</span>Celular</label>
                            <div class="form-group">
                                <input type="text" name="cliente_celular" value="<?php echo ($this->input->post('cliente_celular') ? $this->input->post('cliente_celular') : $cliente['cliente_celular']); ?>" class="form-control" id="cliente_celular" required onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="cliente_conyuge" class="control-label"><span id="conyujepareja" class="text-danger"></span>Pareja</label>
                            <div class="form-group">
                                <input type="text" name="cliente_conyuge" value="<?php echo $cliente['cliente_conyuge']; ?>" class="form-control" id="cliente_conyuge" onKeyUp='this.value = this.value.toUpperCase();' />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="conyuge_ci" class="control-label">Pareja Dcto.</label>
                            <div class="form-group">
                                <input type="text" name="conyuge_ci" value="<?php echo $cliente['conyuge_ci']; ?>" class="form-control" id="conyuge_ci" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="conyuge_telef" class="control-label"><span id="telefonopareja" class="text-danger"></span>Pareja Telef.:</label>
                            <div class="form-group">
                                <input type="text" name="conyuge_telef" value="<?php echo $cliente['conyuge_telef']; ?>" class="form-control" id="conyuge_telef" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="cliente_referencia1" class="control-label"><span class="text-danger">*</span>Referencia #1</label>
                            <div class="form-group">
                                <input type="text" name="cliente_referencia1" value="<?php echo $cliente['cliente_referencia1']; ?>" class="form-control" id="cliente_referencia1" required onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="cliente_reftelef1" class="control-label"><span class="text-danger">*</span>Teléfono Ref. #1</label>
                            <div class="form-group">
                                <input type="text" name="cliente_reftelef1" value="<?php echo $cliente['cliente_reftelef1']; ?>" class="form-control" id="cliente_reftelef1" required onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="cliente_referencia2" class="control-label">Referencia #2</label>
                            <div class="form-group">
                                <input type="text" name="cliente_referencia2" value="<?php echo $cliente['cliente_referencia2']; ?>" class="form-control" id="cliente_referencia2" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="cliente_reftelef2" class="control-label">Teléfono Ref. #2</label>
                            <div class="form-group">
                                <input type="text" name="cliente_reftelef2" value="<?php echo $cliente['cliente_reftelef2']; ?>" class="form-control" id="cliente_reftelef2" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="cliente_actividadeconomica" class="control-label"><span class="text-danger">*</span>Actividad Económica</label>
                            <div class="form-group">
                                <input type="text" name="cliente_actividadeconomica" value="<?php echo ($this->input->post('cliente_actividadeconomica') ? $this->input->post('cliente_actividadeconomica') : $cliente['cliente_actividadeconomica']); ?>" class="form-control" id="cliente_actividadeconomica" required onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="cliente_refactividad" class="control-label">Referencia Actividad Económica</label>
                            <div class="form-group">
                                <input type="text" name="cliente_refactividad" value="<?php echo ($this->input->post('cliente_refactividad') ? $this->input->post('cliente_refactividad') : $cliente['cliente_refactividad']); ?>" class="form-control" id="cliente_refactividad" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="cliente_tipovivienda" class="control-label">Tipo de Vivienda</label>
                            <div class="form-group">
                                <select name="cliente_tipovivienda" id="cliente_tipovivienda"  class="form-control"  style="width: 100%">
                                    <option <?php echo ($cliente['cliente_tipovivienda'] == "DEPARTAMENTO" ? "selected" : ""); ?> value="DEPARTAMENTO">DEPARTAMENTO</option>
                                    <option <?php echo ($cliente['cliente_tipovivienda'] == "CASA" ? "selected" : ""); ?> value="CASA">CASA</option>
                                    <option <?php echo ($cliente['cliente_tipovivienda'] == "CUARTO" ? "selected" : ""); ?> value="CUARTO">CUARTO</option>
                                    <option <?php echo ($cliente['cliente_tipovivienda'] == "OTRO" ? "selected" : ""); ?> value="OTRO">OTRO</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="cliente_pertenenciadom" class="control-label">Pertenencia Dom.</label>
                            <div class="form-group">
                                <select name="cliente_pertenenciadom" id="cliente_pertenenciadom"  class="form-control" style="width: 100%">
                                    <option <?php echo ($cliente['cliente_pertenenciadom'] == "PROPIO" ? "selected" : ""); ?> value="PROPIO">PROPIO</option>
                                    <option <?php echo ($cliente['cliente_pertenenciadom'] == "ALQUILER" ? "selected" : ""); ?> value="ALQUILER">ALQUILER</option>
                                    <option <?php echo ($cliente['cliente_pertenenciadom'] == "ANTICRETICO" ? "selected" : ""); ?> value="ANTICRETICO">ANTICRETICO</option>
                                    <option <?php echo ($cliente['cliente_pertenenciadom'] == "MIXTO" ? "selected" : ""); ?> value="MIXTO">MIXTO</option>
                                    <option <?php echo ($cliente['cliente_pertenenciadom'] == "OTRO" ? "selected" : ""); ?> value="OTRO">OTRO</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="cliente_pertenenciatiempo" class="control-label"><span class="text-danger">*</span>Antiguedad Domiciliaria</label>
                            <div class="form-group">
                                <input type="text" name="cliente_pertenenciatiempo" value="<?php echo $cliente['cliente_pertenenciatiempo']; ?>" class="form-control" id="cliente_pertenenciatiempo" required onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="cliente_numhijos" class="control-label">Nro. de Hijos</label>
                            <div class="form-group">
                                <input type="number" min="0" name="cliente_numhijos" value="<?php echo $cliente['cliente_numhijos']; ?>" class="form-control" id="cliente_numhijos" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="cliente_edadhijos" class="control-label">Edad Hijo(s)</label>
                            <div class="form-group">
                                <input type="text" name="cliente_edadhijos" value="<?php echo $cliente['cliente_edadhijos']; ?>" class="form-control" id="cliente_edadhijos" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            </div>
                        </div>
                        <div class="col-md-5">
                            <label for="cliente_direccion" class="control-label"><span class="text-danger">*</span>Dirección</label>
                            <div class="form-group">
                                <input type="text" name="cliente_direccion" value="<?php echo ($this->input->post('cliente_direccion') ? $this->input->post('cliente_direccion') : $cliente['cliente_direccion']); ?>" class="form-control" id="cliente_direccion" required onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
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
                            <label for="cliente_latitud" class="control-label"><span class="text-danger">*</span>Latitud</label>
                            <div class="form-group">
                                <input type="text" name="cliente_latitud" value="<?php echo ($this->input->post('cliente_latitud') ? $this->input->post('cliente_latitud') : $cliente['cliente_latitud']); ?>" class="form-control" id="cliente_latitud" required readonly />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="cliente_longitud" class="control-label"><span class="text-danger">*</span>Longitud</label>
                            <div class="form-group">
                                <input type="text" name="cliente_longitud" value="<?php echo ($this->input->post('cliente_longitud') ? $this->input->post('cliente_longitud') : $cliente['cliente_longitud']); ?>" class="form-control" id="cliente_longitud" required readonly />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="cliente_referencia" class="control-label"><span class="text-danger">*</span>Referencia</label>
                            <div class="form-group">
                                <input type="text" name="cliente_referencia" value="<?php echo ($this->input->post('cliente_referencia') ? $this->input->post('cliente_referencia') : $cliente['cliente_referencia']); ?>" class="form-control" id="cliente_referencia" required onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="cliente_foto" class="control-label">Foto</label>
                            <div class="form-group">
                                <input type="file" name="cliente_foto" value="<?php echo ($this->input->post('cliente_foto') ? $this->input->post('cliente_foto') : $cliente['cliente_foto']); ?>" class="btn btn-success btn-sm form-control" id="cliente_foto" accept="image/png, image/jpeg, jpg, image/gif" />
                                <input type="hidden" name="cliente_foto1" value="<?php echo ($this->input->post('cliente_foto') ? $this->input->post('cliente_foto') : $cliente['cliente_foto']); ?>" class="form-control" id="cliente_foto1" />
                            </div>
                        </div>
                        <div class="col-md-3">
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
                        <div class="col-md-3">
                            <label for="cliente_razon" class="control-label">Razón</label>
                            <div class="form-group">
                                <input type="text" name="cliente_razon" value="<?php echo ($this->input->post('cliente_razon') ? $this->input->post('cliente_razon') : $cliente['cliente_razon']); ?>" class="form-control" id="cliente_razon" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
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
                                        echo '<option value="'.$asesor['asesor_id'].'" '.$selected.'>'.$asesor['asesor_nombre']." ".$asesor['asesor_apellido'].'</option>';
                                    } 
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
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
                        <div class="col-md-3">
                            <label for="garantia" class="control-label">Garantia</label>
                            <div class="form-group">
                        <a  data-toggle='modal' data-target='#modalgarantia' class='btn btn-soundcloud btn-md' title='Ver/Registrar Garantia'><i class='fa fa-briefcase'></i> + Agregar</a>
                        <input type="hidden" name="grupo_id" value="<?php echo $grupo_id; ?>" class="form-control" id="grupo_id" />
                        <input type="hidden" name="integrante_id" value="<?php echo $integrante["integrante_id"]; ?>" class="form-control" id="integrante_id" />
                        <input type="hidden" name="base_url" value="<?php echo base_url(); ?>" class="form-control" id="base_url" />
                    </div></div>
                    <div class="col-md-6">
                        <label for="garantian" class="control-label"></label>
                        <div id='garantias'>
                        </div>
                    </div>
                    </div>
                </div></div>
          	<div class="box-footer">
            	<button type="submit" class="btn btn-success">
                    <i class="fa fa-check"></i> Guardar
            	</button>
                    <a href="<?php echo site_url('grupo/integrantes/'.$grupo_id); ?>" class="btn btn-danger">
                        <i class="fa fa-times"></i> Cancelar</a>
          	</div>
            <?php echo form_close(); ?>
      	</div>
    </div>
</div>


<!------------------------ INICIO modal para registrar Garantia ------------------->
                        <div class='modal fade' id='modalgarantia' tabindex='-1' role='dialog' aria-labelledby='modalgarantia'>
                        <div class='modal-dialog' role='document'>
                        <br><br>
                        <div class='modal-content'>
                        <div class='modal-header text-center'>
                        <span style='font-size:12pt' class='text-bold'>NUEVA GARANTIA</span>
                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>x</span></button>
                        </div>
                        <div class='modal-body'>
                        <!------------------------------------------------------------------->
                        <div class='col-md-12'>
                        <label for='garantia_descripcion' class='control-label'><span class='text-danger'>*</span>Descripción</label>
                        <div class='form-group'>
                        <input type='text' name='garantia_descripcion' class='form-control ' id='garantia_descripcion' required onkeyup='var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);' onclick='this.select();' />
                        </div>
                        </div>
                        <div class='col-md-4'>
                        <label for='garantia_cantidad' class='control-label'><span class='text-danger'>*</span>Cantidad</label>
                        <div class='form-group'>
                        <input type='number' step='any' min='0' name='garantia_cantidad' class='form-control' id='garantia_cantidad' required onkeyup='totaly()' />
                        </div>
                        </div>
                        <div class='col-md-4'>
                        <label for='garantia_precio' class='control-label'><span class='text-danger'>*</span>Precio</label>
                        <div class='form-group'>
                        <input type='number' step='any' min='0' name='garantia_precio' class='form-control' id='garantia_precio' required onkeyup='totaly()' />
                        </div>
                        </div>
                        <div class='col-md-4'>
                        <label for='garantia_total' class='control-label'><span class='text-danger'>*</span>Total</label>
                        <div class='form-group'>
                        <input type='number' step='any' min='0' name='garantia_total' class='form-control' id='garantia_total' readonly />
                        </div>
                        </div>
                        <div class='col-md-8'>
                        <label for='garantia_observacion' class='control-label'>Observación</label>
                        <div class='form-group'>
                        <input type='text' name='garantia_observacion' class='form-control' id='garantia_observacion' onkeyup='var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);' />
                        </div>
                        </div>
                        
                        <!------------------------------------------------------------------->
                        </div>
                        <div class='modal-footer aligncenter'>
                        <a onclick='registragarantia(<?php echo $cliente["cliente_id"];?>,<?php echo $integrante["integrante_id"];?>,<?php echo $grupo_id;?>)' class='btn btn-success'><span class='fa fa-check'></span> Si </a>
                        <a href='#' class='btn btn-danger' data-dismiss='modal'><span class='fa fa-times'></span> No </a>
                        </div>
                        </div>
                        </div>
                        </div>
                        <!------------------------ FIN modal para Registrar Garantia ------------------->