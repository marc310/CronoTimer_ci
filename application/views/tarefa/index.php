<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Tarefas Listing</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('tarefa/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th hidden>Id Tarefa</th>
						<th>Tarefa</th>
						<th>Descrição</th>
						<th></th>
                    </tr>
                    <?php foreach($tarefas as $t){ ?>
                    <tr>
						<td hidden><?php echo $t['id_tarefa']; ?></td>
						<td><?php echo $t['nome_tarefa']; ?></td>
						<td><?php echo $t['descricao_tarefa']; ?></td>
						<td>
                            <a href="<?php echo site_url('tarefa/edit/'.$t['id_tarefa']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('tarefa/remove/'.$t['id_tarefa']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
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
