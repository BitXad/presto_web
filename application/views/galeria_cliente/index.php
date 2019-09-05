<!------------------ ESTILO DE LAS TABLAS ----------------->
<link href="<?php echo base_url('resources/css/mitabla.css'); ?>" rel="stylesheet">
<!-------------------------------------------------------->
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Galeria Cliente: <?php echo $cliente['cliente_apellido'].', '.$cliente['cliente_nombre']; ?></h3>
            	<div class="box-tools">
                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal">+ Añadir</button>
                    
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped" id="mitabla">
                    <tr>
						<th>#</th>
						<th colspan="2">Imagen</th>
						<th></th>
                    </tr>
                    <?php $i=0;
                    foreach($galeria_cliente as $e){ 
                        $i=$i+1; ?>
                    <tr>
						<td><?php echo $i; ?></td>
						<td><?php echo $e['galeria_nombre']; ?></td>
                        
                        <td> <a class="btn  btn-xs" id="contieneimg" data-toggle="modal" data-target="#mostrarimagen<?php echo $i; ?>" style="padding: 0px;">
                                        <?php
                                        echo '<img src="'.site_url('/resources/images/clientes/'.$e['galeria_imagen']).'" />';
                                        ?>
                                    </a>
                           <!------------------------ INICIO modal para MOSTRAR imagen REAL ------------------->
                                    <div class="modal fade" id="mostrarimagen<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="mostrarimagenlabel<?php echo $i; ?>">
                                      <div class="modal-dialog" role="document">
                                            <br><br>
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                                            <font size="3"><b><?php echo $e['galeria_nombre']; ?></b></font>
                                          </div>
                                            <div class="modal-body">
                                           <!------------------------------------------------------------------->
                                           <?php echo '<img style="max-height: 100%; max-width: 100%" src="'.site_url('/resources/images/clientes/'.$e['galeria_imagen']).'" />'; ?>
                                           <!------------------------------------------------------------------->
                                          </div>
                                          
                                        </div>
                                      </div>
                                    </div>
                            <!------------------------ FIN modal para MOSTRAR imagen REAL -------------------></td>
						<td>
                            <a href="<?php echo site_url('galeria_cliente/remove/'.$e['galeria_id'].'/'.$cliente['cliente_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span></a> 
                            <!--<a href="<?php echo site_url('galeria_cliente/remove/'.$e['galeria_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>----->
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Añadir Galeria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open_multipart('galeria_cliente/add/'.$cliente['cliente_id']); ?>
            
                <div class="row clearfix">
                    <div class="col-md-6">
                        <label for="galeria_nombre" class="control-label"><span class="text-danger">*</span>Nombre</label>
                        <div class="form-group">
                            <input type="text" name="galeria_nombre" value="<?php echo $this->input->post('galeria_nombre'); ?>" class="form-control" id="galeria_nombre" onKeyUp="this.value = this.value.toUpperCase();" required/>
                    </div></div>
                    <div class="col-md-6">
                        <label for="galeria_imagen" class="control-label"><span class="text-danger">*</span>Imagen</label>
                        <div class="form-group">
                            <input type="file" name="galeria_imagen" value="<?php echo $this->input->post('galeria_imagen'); ?>" class="form-control" id="galeria_imagen" required/>
                        </div>
                    </div>
                </div>
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Guardar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
</div>
