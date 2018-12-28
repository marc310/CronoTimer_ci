<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Lista de Clientes</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('cliente/add'); ?>" class="btn btn-success btn-sm">Adicionar Cliente</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th hidden>Id Cliente</th>
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th>Celular</th>
                        <th>E-mail</th>
						<th>Moeda</th>
                        <th>Preço Hora</th>
                        <th>Data de Cadastro</th>
						<th>Status</th>
                        <th></th>
                    </tr>
                    <?php foreach($clientes as $c){ 
                        if($c['status']=="0")
                        {
                            $e_status = "Inativo";
                        }
                        else if($c['status']=="1")
                        {
                            $e_status = "Ativo";
                        }
                        ?>
                    <tr>
						<td hidden><?php echo $c['id_cliente']; ?></td>
                        <td><?php echo $c['nome']; ?></td>
                        <td><?php echo $c['telefone']; ?></td>
                        <td><?php echo $c['celular']; ?></td>
                        <td><?php echo $c['email']; ?></td>
						<td><?php echo $c['simbolo']; ?></td>
                        <td><?php echo $c['preco_hora']; ?></td>
                        <td><?php echo $c['data_cadastro']; ?></td>
						<td><?php echo $e_status; ?></td>
						<td>
                            <a href="<?php echo site_url('cliente/edit/'.$c['id_cliente']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> </a> 
                            <a href="<?php echo site_url('cliente/remove/'.$c['id_cliente']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> </a>
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
