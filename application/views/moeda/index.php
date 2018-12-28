<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Moedas Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('moeda/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Id Moeda</th>
						<th>Codigo</th>
						<th>Simbolo</th>
						<th>Descricao</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($moedas as $m){ ?>
                    <tr>
						<td><?php echo $m['id_moeda']; ?></td>
						<td><?php echo $m['codigo']; ?></td>
						<td><?php echo $m['simbolo']; ?></td>
						<td><?php echo $m['descricao']; ?></td>
						<td>
                            <a href="<?php echo site_url('moeda/edit/'.$m['id_moeda']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('moeda/remove/'.$m['id_moeda']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                <div class="pull-right">
                    <?php echo $this->pagination->create_links(); ?>                    
                </div>                
            </div>
        </div>
    </div>
</div>
