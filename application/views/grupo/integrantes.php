

<div class="container">


    <div class="panel panel-primary col-md-6">
    <!--<h5><b>Hospedaje Cod: </b><?php echo "000".$hospedaje_id; ?></h5>-->
    <h5><b>Grupo: </b><?php echo $grupo['grupo_nombre']; ?></h5>
    <h5><b>Fecha/Solicitud: </b><?php echo $grupo['grupo_iniciosolicitud']; ?></h5>
    <h5><b>Asesor: </b><?php echo $grupo['grupo_fecha']; ?></h5>
    <h5><b>Monto Solicitado Bs.: </b><?php echo number_format($grupo['grupo_monto'],2,".",","); ?></h5>
    </div>



    <div class="panel panel-primary col-md-6">
    <?php echo form_open('grupo/agregar_integrante'); ?>
        <input type="hidden" name="grupo_id"  id="grupo_id" value="<?php echo $grupo['grupo_id']; ?>" >
        
        <div class="col-md-6">
                <label for="cliente_id" class="control-label">Cliente/Deudor:</label>
                <div class="form-group">
                            <select name="cliente_id" id="cliente_id"  class="form-control" required>
                                <option value="">- CLIENTE/DEUDOR -</option>
                                <?php 
                                foreach($all_cliente as $cliente)
                                {
                                        $selected = ($cliente['cliente_id'] == $grupo['cliente_id']) ? ' selected="selected"' : "";

                                        echo '<option value="'.$cliente['cliente_id'].'" '.$selected.'>'.$cliente['cliente_nombre'].'</option>';
                                } 
                                ?>
                        </select>
                </div>

        </div>
        <div class="col-md-6">
                <label for="integrante_cargo" class="control-label">Cargo:</label>
                <div class="form-group">
                        <select name="integrante_cargo" id="integrante_cargo"  class="form-control" required>
                            <option value="INTEGRANTE">INTEGRANTE</option>
                            <option value="PRESIDENTE(A)">PRESIDENTE(A)</option>
                            <option value="SECRETARIA(O)">SECRETARIA(O)</option>                                
                        </select>
                </div>

        </div>
        <div class="col-md-6">
                <!--<label for="cliente_id" class="control-label"> </label>-->
                <div class="form-group">
                    <button type="submit" class="btn btn-danger">
            		<i class="fa fa-close"></i> Agregar
                    </button>        

                </div>

        </div>
        <?php echo form_close(); ?>
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
                        <th class="no-print">Map</th>
                        <th>Categoria</th>
                        <th>Cargo</th>
                        <th>Estado</th>                
                    </tr>
                    <tbody class="buscar" id="tablaresultados">
                        <?php $j = 0; 
                            foreach($integrantes as $i) {?>
                        <tr>
                            
                            <td><?php echo ++$j; ?></td>
                            <td><?php echo $i['cliente_nombre']; ?></td>
                            <td><?php echo $i['cliente_direccion']; ?></td>
                            <td><i class="fa fa-laptop"></i></td>
                            <td><?php echo $i['cliente_telefono']; ?></td>
                            <?php 
                                $color = '';
                                if ($i['integrante_cargo']=='PRESIDENTE(A)') { $color='ORANGE'; } 
                                if ($i['integrante_cargo']=='SECRETARIA(O)') { $color='YELLOW'; } 
                            ?>
                            <td bgcolor="<?php echo $color; ?>"> <?php echo $i['integrante_cargo']; ?> </td>
                            
                            <td><?php echo $i['estado_id']; ?></td>
                            <td>
                            <a href="<?php echo site_url('integrante/remove/'.$i['integrante_id'].'/'.$i['grupo_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> </a>    
                            </td>
                           
                        </tr>
                        <?php } ?>
                        
                    </tbody>
                </table>
                                
            </div>
        </div>
    </div>
</div>