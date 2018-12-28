<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Lista de Usuarios</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('usuario/add'); ?>" class="btn btn-success btn-sm">Novo Usuário</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th hidden>User Id</th>
						<th>Tipo</th>
						<th>Status</th>
						<th>Username</th>
						<th>Email</th>
						<th>Data Cadastro</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($usuarios as $u){ 

                        // Verifica nivel de usuario e muda a exibição
                        // '0'=>'Visitante',
                        // '1'=>'Cliente',
                        // '2'=>'Usuário',
                        // '3'=>'Administrador',
                        $tUser = $u['tipo'];
                        switch ($tUser) 
                        {
                            case '0':
                                # code...
                                $nivel = "Visitante";
                                break;
                            case '1':
                                # code...
                                $nivel = "Cliente";
                                break;
                            case '2':
                                # code...
                                $nivel = "Usuário";
                                break;
                            case '3':
                                # code...
                                $nivel = "Administrador";
                                break;
                            
                            default:
                                $nivel = "Não Identificado";
                                break;
                        }
                        #
                        // muda a exibição do status 
                        // '0'=>'Ativo',
                        // '1'=>'Inativo',
                        $uStatus = $u['status'];
                        switch ($uStatus) 
                        {
                            case '0':
                                $user_status = "Ativo";
                                break;
                            case '1':
                                $user_status = "Inativo";
                                break;
                        }
                        #
                    ?>
                    <tr>
						<td hidden><?php echo $u['user_id']; ?></td>
						<td><?php echo $nivel; ?></td>
                        <td><?php echo $user_status; ?></td>
						<td><?php echo $u['username']; ?></td>
						<td><?php echo $u['email']; ?></td>
						<td><?php echo $u['data_cadastro']; ?></td>
						<td>
                            <a href="<?php echo site_url('usuario/edit/'.$u['user_id']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> </a> 
                            <a href="<?php echo site_url('usuario/remove/'.$u['user_id']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> </a>
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
