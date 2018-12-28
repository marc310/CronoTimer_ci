<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Lista de Projetos</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('projeto/add'); ?>" class="btn btn-success btn-sm">Novo Projeto</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th hidden>Id Projeto</th>
                        <th hidden>Cliente Id</th>
						<th>Cliente</th>
						<th>Nome do Projeto</th>
                        <th>Descrição Projeto</th>
                        <th hidden>ID Moeda</th>
						<th>Moeda</th>
						<th>Preço Projeto</th>
						<th></th>
                    </tr>
                    <?php foreach($projetos as $p){ ?>
                    <tr>
						<td hidden><?php echo $p['id_projeto']; ?></td>
                        <td hidden><?php echo $p['cliente_id']; ?></td>
						<td><?php echo $p['nome']; ?></td>
						<td><?php echo $p['nome_projeto']; ?></td>
                        <td><?php echo $p['descricao_projeto']; ?></td>
                        <td hidden><?php echo $p['moeda_id']; ?></td>
						<td><?php echo $p['simbolo']; ?></td>
						<td><?php echo $p['preco_projeto']; ?></td>
						<td>
                            <a href="<?php echo site_url('projeto/edit/'.$p['id_projeto']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> </a> 
                            <a href="<?php echo site_url('projeto/remove/'.$p['id_projeto']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> </a>
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
