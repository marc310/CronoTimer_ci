<!-- ########################################################################################### -->

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Lista de Entradas de Trabalho</h3>
            	<div class="box-tools">

<!-- ########################################################################################### -->

            		<!-- Button trigger modal -->
      					<button type="button" href="<?php echo site_url('trabalho/add'); ?>" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalAdd">
      					  Timer
      					</button>

                    <!-- <a href="<?php echo site_url('trabalho/add'); ?>" class="btn btn-success btn-sm">Novo</a>  -->
              </div>
            </div>

<!-- ########################################################################################### -->

            <div class="box-body" id="trabalho_table">
                <table class="table table-striped">
                    <tr>
						<th>ID</th>
						<th>Projeto</th>
						<th>Tarefa</th>
						<th>Nota</th>
						<th>Início</th>
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
                            <a href="<?php echo site_url('trabalho/edit/'.$i['id_trabalho']); ?>" data-toggle="modal" data-target="#modalEdit" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> </a> <!-- editar -->
                            <a href="<?php echo site_url('trabalho/remove/'.$i['id_trabalho']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> </a> <!-- deletar -->
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

<!-- <?php echo site_url('trabalho/edit/'.$i['id_trabalho']); ?> -->

<!-- ########################################################################################### -->

<!-- ########################################################################################### -->
<!-- ########################################################################################### -->
<!-- ################################## MODAL ADICIONAR ######################################## -->
<!-- ########################################################################################### -->
<!-- ########################################################################################### -->
        
<!-- ########################################################################################### -->
<!-- Modal configs -->
<!-- ########################################################################################### -->

<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="modalAddLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
     

    </div>
  </div>
</div>


<!-- ########################################################################################### -->
<!-- ########################################################################################### -->
<!-- #################################### MODAL EDITAR ######################################### -->
<!-- ########################################################################################### -->
<!-- ########################################################################################### -->


<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEditLabel">CronoTimer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

<!-- ########################################################################################### -->


<!-- ########################################################################################### -->

      </div>
      <div class="modal-footer">
				<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Salvar
            	</button>
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary">Salvar</button> -->
      
      </div>
    </div>
  </div>
</div>


<!-- ########################################################################################### -->
<!-- ########################################################################################### -->
<!-- ####################################### SCRIPT ############################################ -->
<!-- ########################################################################################### -->
<!-- ########################################################################################### -->

