<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Lista de Entradas de Trabalho</h3>
            	<div class="box-tools">
                    <a href="<?php echo site_url('trabalho/add'); ?>" class="btn btn-success btn-sm">Novo</a> 
                </div>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>Id Trabalho</th>
						<th>Projeto Id</th>
						<th>Tarefa Id</th>
						<th>Nota</th>
						<th>Inicio</th>
						<th>Final</th>
						<th>Horas</th>
						<th hidden>HoraInt</th>
						<th>Moeda</th>
						<th>Rendimento</th>
						<th hidden>Faturado</th>
						<th hidden>Fatura Id</th>
						<th></th>
                    </tr>
                    <?php foreach($trabalhos as $i){ ?>
                    <tr>
						<td><?php echo $i['id_trabalho']; ?></td>
						<td><?php echo $i['nome_projeto']; ?></td>
						<td><?php echo $i['nome_tarefa']; ?></td>
						<td><?php echo $i['nota']; ?></td>
						<td><?php echo $i['data_inicio']; ?></td>
						<td><?php echo $i['data_final']; ?></td>
						<td><?php echo $i['horas']; ?></td>
						<td hidden><?php echo $i['horaInt']; ?></td>
						<td><?php echo $i['moeda']; ?></td>
						<td><?php echo $i['rendimento']; ?></td>
						<td hidden><?php echo $i['faturado']; ?></td>
						<td hidden><?php echo $i['fatura_id']; ?></td>
						<td>
                            <a href="<?php echo site_url('trabalho/edit/'.$i['id_trabalho']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> </a> 
                            <a href="<?php echo site_url('trabalho/remove/'.$i['id_trabalho']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> </a>
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
