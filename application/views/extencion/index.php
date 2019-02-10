<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Extencion Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('extencion/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Cliente Extencionci</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($extencion as $e){ ?>
                    <tr>
						<td><?php echo $e['cliente_extencionci']; ?></td>
						<td>
                            <a href="<?php echo site_url('extencion/edit/'.$e['cliente_extencionci']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('extencion/remove/'.$e['cliente_extencionci']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
