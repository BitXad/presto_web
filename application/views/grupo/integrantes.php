<script src="<?php echo base_url('resources/js/jquery-2.2.3.min.js');?>"></script>
<script src="<?php echo base_url('resources/js/funciones_newclientedeudor.js'); ?>" type="text/javascript"></script>
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
<div class="container">
    <center>
        <h3>
            GRUPO: <?php echo $grupo['grupo_nombre']; ?>
        </h3>
    </center>
        
</div>
<div class="container-wrapper">


    <div class="panel panel-primary col-md-4">
    <!--<h5><b>Hospedaje Cod: </b><?php //echo "000".$hospedaje_id; ?></h5>-->
    <h5><b>Grupo: </b><?php echo $grupo['grupo_nombre']; ?></h5>
    <h5><b>Fecha/Solicitud: </b><?php echo date("d/m/Y", strtotime($grupo['grupo_iniciosolicitud'])); ?></h5>
    <h5><b>Asesor: </b><?php echo $grupo['asesor_nombre']." ".$grupo['asesor_apellido']; ?></h5>
    <h5><b>Monto Solicitado Bs.: </b><?php echo number_format($grupo['grupo_monto'],2,".",","); ?></h5>
    </div>



    <div class="panel panel-primary col-md-8 no-print">
    <?php //echo form_open('grupo/agregar_integrante'); ?>
        <input type="hidden" name="grupo_id"  id="grupo_id" value="<?php echo $grupo['grupo_id']; ?>" >
        <input type="hidden" name="grupo_monto"  id="grupo_monto" value="<?php echo $grupo['grupo_monto']; ?>" >
        
        <div class="col-md-5">
            <label for="cliente_id" class="control-label">Cliente/Deudor:</label>
            <div class="form-group" style="display: flex">
                <select name="cliente_id" id="cliente_id"  class="form-control" required>
                    <option value="">- CLIENTE/DEUDOR -</option>
                    <?php 
                    foreach($all_cliente as $cliente)
                    {
                            $selected = ($cliente['cliente_id'] == $grupo['cliente_id']) ? ' selected="selected"' : "";

                            echo '<option value="'.$cliente['cliente_id'].'" '.$selected.'>'.$cliente['cliente_nombre']." ".$cliente['cliente_apellido'].' C.I.:'.$cliente['cliente_ci'].'</option>';
                    } 
                    ?>
                </select>
                <a data-toggle="modal" data-target="#modalnewclientedeudor" class="btn btn-warning" title="Registrar Nuevo Cliente/Deudor">
                    <i class="fa fa-plus-circle"></i></a>
            </div>
        </div>
        <div class="col-md-5">
                <label for="integrante_cargo" class="control-label">Cargo:</label>
                <div class="form-group">
                        <select name="integrante_cargo" id="integrante_cargo"  class="form-control" required>
                            <option value="INTEGRANTE">INTEGRANTE</option>
                            <option value="PRESIDENTE(A)">PRESIDENTE(A)</option>
                            <option value="SECRETARIA(O)">SECRETARIA(O)</option>                                
                        </select>
                </div>

        </div>
        <div class="col-md-2">
            <label for="integrante_monto" class="control-label">Monto Bs</label>
            <div class="form-group">
                <input type="number" step="any" min="0" name="integrante_monto" value="<?php echo $this->input->post('integrante_montosolicitado'); ?>" class="form-control" id="integrante_monto" required/>
            </div>
        </div>
        <div class="col-md-6">
                <!--<label for="cliente_id" class="control-label"> </label>-->
                <div class="form-group">
                    <button class="btn btn-facebook btn-block" onclick="registrarnuevointegrante(<?php echo $grupo['grupo_id']; ?>, <?php echo $grupo['grupo_monto']; ?>, 0)">
            		<i class="fa fa-floppy-o"></i> Agregar
                    </button>        

                </div>

        </div>
        <div class="col-md-6">
                <!--<label for="cliente_id" class="control-label"> </label>-->
                <div class="form-group">
                    <a href="<?php echo base_url('grupo'); ?>" type="submit" class="btn btn-danger btn-block">
            		<i class="fa fa-undo"></i> Salir
                    </a>        

                </div>

        </div>
        <?php //echo form_close(); ?>
    </div>



</div>


<div class="row">
    <div class="col-md-12">
        <div class="box">
            
            <div class="box-body table-responsive">
                <table class="table table-striped" id="mitabla">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Dirección</th>
                        <th>Monto Bs</th>
                        <th>Categoria</th>
                        <th>Cargo</th>
                        <th class="no-print"></th>                
                    </tr>
                    <tbody class="buscar" id="tablaresultados">
                        <?php /*$j = 0;
                              $total = 0;
                            foreach($integrantes as $i) {
                                $total += $i['integrante_montosolicitado'];
                                ?>
                        <tr>
                            
                            <td><?php echo ++$j; ?></td>
                            <td><?php echo $i['cliente_nombre'].", ".$i['cliente_nombre']; ?></td>
                            <td><?php echo $i['cliente_direccion']; ?></td>
                            <td align="right"><?php echo number_format($i['integrante_montosolicitado'],2,".",","); ?></td>
                            <td><?php echo $i['cliente_telefono']; ?></td>
                            <?php 
                                $color = '';
                                if ($i['integrante_cargo']=='PRESIDENTE(A)') { $color='ORANGE'; } 
                                if ($i['integrante_cargo']=='SECRETARIA(O)') { $color='YELLOW'; } 
                            ?>
                            <td bgcolor="<?php echo $color; ?>"> <?php echo $i['integrante_cargo']; ?> </td>
                            
                            <td class="no-print"><?php echo $i['estado_id']; ?></td>
                            <td class="no-print">
                                <a href="<?php echo site_url('integrante/remove/'.$i['integrante_id'].'/'.$i['grupo_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> </a>    
                            </td>
                           
                        </tr>
                        <?php } */?>
                        
                    </tbody>
                    <tr>
                        <th> </th>
                        <th> </th>
                        <th>Total Bs</th>
                        <th align="right"><span id="restotal"></span><?php //echo number_format($total,2,".",","); ?></th>
                        <th> </th>
                        <th> </th>
                        <th> </th>                
                    </tr>
                    
                    
                </table>
                                
            </div>
        </div>
    </div>
</div>

<!------------------------ INICIO modal para Registrar nuevo Cliente/Deudor ------------------->
<div class="modal fade" id="modalnewclientedeudor" tabindex="-1" role="dialog" aria-labelledby="labelmodalnewclientedeudor">
    <div class="modal-dialog" role="document">
        <br><br>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
            </div>
            <div class="modal-body">
               <!------------------------------------------------------------------->
               <span class="text-danger" id="aviso_clientenew"></span>
               <div class="col-md-6">
                    <label for="cliente_nombre" class="control-label">Nombre(s)</label>
                    <div class="form-group">
                        <input type="text" name="cliente_nombre"  class="form-control" id="cliente_nombre" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                    </div>
                </div>
               <div class="col-md-6">
                    <label for="cliente_apellido" class="control-label">Apellido(s)</label>
                    <div class="form-group">
                        <input type="text" name="cliente_apellido"  class="form-control" id="cliente_apellido" onkeyup="var start = this.selectionStart; var end = this.selectionEnd; this.value = this.value.toUpperCase(); this.setSelectionRange(start, end);" />
                    </div>
                </div>
               <div class="col-md-6">
                    <label for="integrante_cargo1" class="control-label">Cargo:</label>
                    <div class="form-group">
                        <select name="integrante_cargo1" id="integrante_cargo1"  class="form-control" required>
                            <option value="INTEGRANTE">INTEGRANTE</option>
                            <option value="PRESIDENTE(A)">PRESIDENTE(A)</option>
                            <option value="SECRETARIA(O)">SECRETARIA(O)</option>                                
                        </select>
                    </div>

                </div>
               <div class="col-md-5">
                    <label for="integrante_monto1" class="control-label">Monto Bs</label>
                    <div class="form-group">
                        <input type="number" step="any" min="0" name="integrante_monto1" value="<?php echo $this->input->post('integrante_montosolicitado1'); ?>" class="form-control" id="integrante_monto1" required/>
                    </div>
                </div>
               <!------------------------------------------------------------------->
            </div>
            <div class="modal-footer aligncenter">
                <a onclick="registrarnuevoclientedeudor()" class="btn btn-success"><span class="fa fa-check"></span> Registrar </a>
                <a href="#" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-times"></span> No </a>
            </div>
        </div>
    </div>
</div>
<!------------------------ FIN modal para Registrar nuevo Cliente/Deudor ------------------->