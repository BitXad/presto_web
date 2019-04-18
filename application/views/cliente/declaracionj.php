<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js'); ?>" type="text/javascript"></script>
<style type="text/css">
    @media print {
    body {
       
   transform: scale(0.94);
   transform-origin: 0.94;
 
       
    } }
    hr{
        border-top: 2px solid #000;
        margin: 0;
    }
    .normal{
        font-weight: normal;
    }
    .tamletra{
        font-size: 10pt;
    }
</style>
<div>
    <table style="border: #000 3px solid; padding-left: -10mm;">
    <tr>
        <td>
<div class="row">
    <div class="col-md-12 text-center">
        DECLARACION JURADA DE CLIENTE
        <br>
        <br>
        <hr>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        I. DATOS GENERALES DEL SOLICITANTE
        <hr>
    </div>
</div>
<div class="row tamletra">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-body">
                <div class="row clearfix">
                    <div class="col-md-4">
                        <label>NOMBRES: <span class="normal"><?php echo $cliente['cliente_nombre']; ?></span></label>
                    </div>
                    <div class="col-md-4">
                        <label>APELLIDOS: <span class="normal"><?php echo $cliente['cliente_apellido']; ?></span></label>
                    </div>
                    <div class="col-md-4">
                        <label>APELLIDO DE CASADA(O): <span class="normal"><?php echo $cliente['cliente_apcasado']; ?></span></label>
                    </div>
                    <div class="col-md-4">
                        <label>CODIGO: <span class="normal"><?php echo $cliente['cliente_codigo']; ?></span></label>
                    </div>
                    <div class="col-md-4">
                        <label>SEXO: <span class="normal"><?php echo $cliente['cliente_sexo']; ?></span></label>
                    </div>
                    <div class="col-md-4">
                        <label>ESTADO CIVIL: <span class="normal"><?php echo $cliente['estadocivil_nombre']; ?></span></label>
                    </div>
                    <div class="col-md-4">
                        <label>DOC. IDENTIFICACION: <span class="normal"><?php echo $cliente['cliente_tipodoc']; ?></span></label>
                    </div>
                    <div class="col-md-4">
                        <label>NRO. DCTO.: <span class="normal"><?php echo $cliente['cliente_ci']." ".$cliente['cliente_extencionci']; ?></span></label>
                    </div>
                    <div class="col-md-4">
                        <label>VENCE: <span class="normal"><?php echo date("d/m/Y", strtotime($cliente['cliente_fechavenc'])); ?></span></label>
                    </div>
                    <?php
                    $guion = "";
                    if($cliente['cliente_telefono'] !="" && $cliente['cliente_celular'] !=""){
                        $guion=" - ";
                    } ?>
                    <div class="col-md-4">
                        <label>TELEF. o CEL.: <span class="normal"><?php echo $cliente['cliente_telefono'].$guion.$cliente['cliente_celular']; ?></span></label>
                    </div>
                    <div class="col-md-4">
                        <label>NOMBRE PAREJA: <span class="normal"><?php echo $cliente['cliente_conyuge']; ?></span></label>
                    </div>
                    <div class="col-md-4">
                        <label>DCTO. PAREJA: <span class="normal"><?php echo $cliente['conyuge_ci']; ?></span></label>
                    </div>
                    <div class="col-md-4">
                        <label>TELEFONO PAREJA: <span class="normal"><?php echo $cliente['conyuge_telef']; ?></span></label>
                    </div>
                    <div class="col-md-4">
                        <label>REFERENCIA #1: <span class="normal"><?php echo $cliente['cliente_referencia1']; ?></span></label>
                    </div>
                    <div class="col-md-4">
                        <label>TELEFONO REF. 1: <span class="normal"><?php echo $cliente['cliente_reftelef1']; ?></span></label>
                    </div>
                    <div class="col-md-4">
                        <label>REFERENCIA #2: <span class="normal"><?php echo $cliente['cliente_referencia2']; ?></span></label>
                    </div>
                    <div class="col-md-4">
                        <label>TELEFONO REF. 2: <span class="normal"><?php echo $cliente['cliente_reftelef2']; ?></span></label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <hr>
        II. DATOS DE ACTIVIDAD (Detalles del negocio e implementacion del capital)
        <hr>
    </div>
</div>
<div class="row tamletra">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-body">
                <div class="row clearfix">
                    <div class="col-md-12">
                        <label>ACTIVIDAD ECONOMICA: <span class="normal"><?php echo "ENCONSTRUCCION.."; ?></span></label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <hr>
        III. DIRECCION DOMICILIO
        <hr>
    </div>
</div>
<div class="row tamletra">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-body">
                <div class="row clearfix">
                    <div class="col-md-12">
                        <label>DIRECCION: <span class="normal"><?php echo $cliente['cliente_direccion']; ?></span></label>
                    </div>
                    <div class="col-md-12">
                        <label>REFERENCIA: <span class="normal"><?php echo $cliente['cliente_referencia']; ?></span></label>
                    </div>
                    <div class="col-md-4">
                        <label>TIPO VIVIENDA: <span class="normal"><?php echo $cliente['cliente_tipovivienda']; ?></span></label>
                    </div>
                    <div class="col-md-4">
                        <label>PERTENENCIA DOM.: <span class="normal"><?php echo $cliente['cliente_pertenenciadom']; ?></span></label>
                    </div>
                    <div class="col-md-4">
                        <label>ANTIGUEDAD DOM.: <span class="normal"><?php echo $cliente['cliente_pertenenciatiempo']; ?></span></label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <hr>
        IV. CROQUIS DOMICILIO
        <hr>
    </div>
</div>
<div class="row tamletra">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-body">
                <div class="row clearfix">
                    <div class="col-md-12">
                        <!-- ***********************aqui empieza el mapa para capturar coordenadas *********************** -->
                        <div id="map" style="width: 100%; height: 350px;">
                            <script type="text/javascript">
                                var marker;          //variable del marcador
                                var coords_lat = {};    //coordenadas obtenidas con la geolocalización
                                var coords_lng = {};    //coordenadas obtenidas con la geolocalización
                                //Funcion principal
                                initMap = function(){
                                    //usamos la API para geolocalizar el usuario
                                    //milat = document.getElementById('cliente_latitud').value;
                                    milat = $('#cliente_latitud').val();
                                    //milng = document.getElementById('cliente_longitud').value;
                                    milng = $('#cliente_longitud').val();
                                    navigator.geolocation.getCurrentPosition(
                                    function (position){
                                        if(milat == 'undefined' || milat == null || milat ==""){
                                            coords_lat = { lat: position.coords.latitude,};
                                        }else{
                                            coords_lat = { lat: milat,};
                                        }
                                        if(milng == 'undefined' || milng == null || milng ==""){
                                            coords_lng = { lng: position.coords.longitude,};
                                        }else{
                                            coords_lng = { lng: milng,};
                                        }
                                        setMapa(coords_lat, coords_lng);  //pasamos las coordenadas al metodo para crear el mapa
                                    },function(error){console.log(error);});
                                }
                                function setMapa (coords_lat, coords_lng){
                                    //Se crea una nueva instancia del objeto mapa
                                    var map = new google.maps.Map(document.getElementById('map'),{
                                        zoom: 17, center:new google.maps.LatLng(coords_lat.lat,coords_lng.lng),
                                    });
                                    marker = new google.maps.Marker({
                                        map: map,
                                        draggable: false,
                                        animation: google.maps.Animation.DROP,
                                        position: new google.maps.LatLng(coords_lat.lat,coords_lng.lng),
                                    });
                                }
                                initMap();
                            </script>
                            <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC5L7UMFw0GxFZgVXCfMLhGVK5Gn7HvG_U&callback=initMap"></script>
                            <input type="hidden" name="cliente_latitud" value="<?php echo ($this->input->post('cliente_latitud') ? $this->input->post('cliente_latitud') : $cliente['cliente_latitud']); ?>" class="form-control" id="cliente_latitud" readonly />
                            <input type="hidden" name="cliente_longitud" value="<?php echo ($this->input->post('cliente_longitud') ? $this->input->post('cliente_longitud') : $cliente['cliente_longitud']); ?>" class="form-control" id="cliente_longitud" readonly />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <hr>
        V. OTROS DATOS
        <hr>
    </div>
</div>
<div class="row tamletra">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-body">
                <div class="row clearfix">
                    <div class="col-md-12">
                        <label>GARANTIAS PRENDARIAS: <span class="normal">___________________________________________________________________________________________________________________________________</span></label>
                    </div>
                    <div class="col-md-12">
                        <label>NUMERO DE HIJOS: <span class="normal"><?php echo $cliente['cliente_numhijos']; ?></span></label>
                    </div>
                    <div class="col-md-4">
                        <label>DEUDAS OTRAS INST.: <span class="normal">____________________________</span></label>
                    </div>
                    <div class="col-md-4">
                        <label>DETALLES CRED.: <span class="normal">____________________________</span></label>
                    </div>
                    <div class="col-md-4">
                        <label>ESTADO: <span class="normal">____________________________</span></label>
                    </div>
                </div>
            </div>
      	</div>
    </div>
</div>
</td>
</tr>
</table>
<div class="row tamletra">
    <div class="col-md-12">
    <label>LA DECLARACION DE LOS DATOS MENCIONADOS ANTERIORMENTE SON CORRECTAS, LAS MISMAS PODRAN SER UTILIZADOS PARA ACCIONES JUDICIALES, Y 
    EXTRAJUDICIALES Y OTROS QUE LO VEA CONVENIENTE EL ACREEDOR DURANTE LA RELACION CREDITICIA.
    </label>
    </div>
</div>
<br>
<br>
<div class="row tamletra">
    <div class="col-md-4 text-center">
    <label>-----------------------<br>FIRMA CLIENTE</label>
    </div>
    <div class="col-md-4 text-center">
    <label>-----------------------<br>FIRMA GARANTE</label>
    </div>
    <div class="col-md-4 text-center">
    <label>--------------------------<br>FIRMA INSTITUCION</label>
    </div>
</div>
<div class="row tamletra">
    <div class="col-md-12 text-right">
    <label>FECHA:____________________________________________</label>
    </div>
</div>
</div>
