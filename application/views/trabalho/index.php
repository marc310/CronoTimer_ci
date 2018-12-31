<!-- ########################################################################################### -->

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Lista de Entradas de Trabalho</h3>
            	<div class="box-tools">

<!-- ########################################################################################### -->

            		<!-- Button trigger modal -->
					<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalAdd">
					  Iniciar
					</button>

                    <a href="<?php echo site_url('trabalho/add'); ?>" class="btn btn-success btn-sm">Novo</a> 
                </div>
            </div>

<!-- ########################################################################################### -->

            <div class="box-body" id="trabalho_table">
                <table class="table table-striped">
                    <tr>
						<th>ID</th>
						<th>Projeto Id</th>
						<th>Tarefa Id</th>
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
						<td><input type="button" name="edit" value="Edit" id="<?php echo $i['id_trabalho']; ?>" class="btn btn-info btn-xs edit_data" /></td> 
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
<!-- ########################################################################################### -->

<!-- ########################################################################################### -->
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
      <div class="modal-header">
        <h5 class="modal-title" id="modalAddLabel">CronoTimer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <?php echo form_open('trabalho/add'); ?>

        <div class="box-body">
          		<div class="row clearfix">
					
					<!-- <div class="col-md-6">
						<div class="form-group">
							<input type="checkbox" name="faturado" value="1"  id="faturado" />
							<label for="faturado" class="control-label">Faturado</label>
						</div>
					</div> -->
					<div class="col-md-6">
						<label for="projeto_id" class="control-label"><span class="text-danger">*</span>Projeto</label>
						<div class="form-group">
							<select name="projeto_id" class="form-control">
								<option value="">Selecione o Projeto</option>
								<?php 
								foreach($all_projetos as $projeto)
								{
									$selected = ($projeto['id_projeto'] == $this->input->post('projeto_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$projeto['id_projeto'].'" '.$selected.'>'.$projeto['nome_projeto'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('projeto_id');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="tarefa_id" class="control-label"><span class="text-danger">*</span>Tarefa</label>
						<div class="form-group">
							<select name="tarefa_id" class="form-control">
								<option value="">select tarefa</option>
								<?php 
								foreach($all_tarefas as $tarefa)
								{
									$selected = ($tarefa['id_tarefa'] == $this->input->post('tarefa_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$tarefa['id_tarefa'].'" '.$selected.'>'.$tarefa['nome_tarefa'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('tarefa_id');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="nota" class="control-label">Nota</label>
						<div class="form-group">
							<input type="text" name="nota" value="<?php echo $this->input->post('nota'); ?>" class="form-control" id="nota" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="data_inicio" class="control-label"><span class="text-danger">*</span>Data Inicio</label>
						<div class="form-group">
							<input type="text" name="data_inicio" value="<?php echo $this->input->post('data_inicio'); ?>" class="has-datetimepicker form-control" id="data_inicio" />
							<span class="text-danger"><?php echo form_error('data_inicio');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="data_final" class="control-label">Data Final</label>
						<div class="form-group">
							<input type="text" name="data_final" value="<?php echo $this->input->post('data_final'); ?>" class="has-datetimepicker form-control" id="data_final" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="inicio" class="control-label">Inicio</label>
						<div class="form-group">
							<input type="text" name="inicio" value="<?php echo $this->input->post('inicio'); ?>" class="form-control" id="inicio" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="final" class="control-label">Final</label>
						<div class="form-group">
							<input type="text" name="final" value="<?php echo $this->input->post('final'); ?>" class="form-control" id="final" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="horas" class="control-label">Horas</label>
						<div class="form-group">
							<input type="text" name="horas" value="<?php echo $this->input->post('horas'); ?>" class="form-control" id="horas" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="horaInt" class="control-label">HoraInt</label>
						<div class="form-group">
							<input type="text" name="horaInt" value="<?php echo $this->input->post('horaInt'); ?>" class="form-control" id="horaInt" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="moeda" class="control-label">Moeda</label>
						<div class="form-group">
							<input type="text" name="moeda" value="<?php echo $this->input->post('moeda'); ?>" class="form-control" id="moeda" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="rendimento" class="control-label">Rendimento</label>
						<div class="form-group">
							<input type="text" name="rendimento" value="<?php echo $this->input->post('rendimento'); ?>" class="form-control" id="rendimento" />
						</div>
					</div>
					<!-- <div class="col-md-6">
						<label for="fatura_id" class="control-label">Fatura Id</label>
						<div class="form-group">
							<input type="text" name="fatura_id" value="<?php echo $this->input->post('fatura_id'); ?>" class="form-control" id="fatura_id" />
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<input type="checkbox" name="livre" value="1"  id="livre" />
							<label for="livre" class="control-label">Livre</label>
						</div>
					</div> -->
				</div>
			</div>

					<?php
					// $datestring = "Year: %Y Month: %m Day: %d - %h:%i %s";
					// $time = time();

					$now = time();
					// $human = unix_to_human($now);
					// $unix = human_to_unix($human);
					$dataUnix = date('Y-m-d H:i:s', $now);
					

					echo $now . " e a assim com strtotime: " . $dataUnix;

					// echo " || " . strtotime($dataAtual);

					//echo mdate($datestring, $time);
					//echo $unix . " and " . $human;
					?>

          	
          	<div>
				<button type="button" href="<?php echo site_url('trabalho/inicia_cronometro'); ?>" class="btn btn-outline-success" onclick="inicia_cronometro()">
            		<i class="fa fa-check"></i> Iniciar
            	</button>
	        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
	        <button type="button" class="btn btn-primary">Salvar</button> -->
	      
	      </div>

<!-- ########################################################################################### -->

      </div>
      <div class="modal-footer">
				<button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Save
            	</button>
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary">Salvar</button> -->
      
      </div>
            <?php echo form_close(); ?>

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
            		<i class="fa fa-check"></i> Save
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

<script>  
 $(document).ready(function(){  
      $('#add').click(function(){  
           $('#insert').val("Insert");  
           $('#insert_form')[0].reset();  
      });  
      $(document).on('click', '.edit_data', function(){  
           var itenstrabalho = $(this).attr("id_trabalho");  
           $.ajax({  
                url:'<?php echo site_url('trabalho/edit/'.$i['id_trabalho']); ?>',  
                method:"POST",  
                data:{id_trabalho:id_trabalho},  
                dataType:"json",  
                success:function(data){  
                     $('#projeto_id').val(data.projeto_id);  
                     $('#tarefa_id').val(data.tarefa_id);  
                     $('#nota').val(data.nota);
                     $('#data_inicio').val(data.data_inicio);
                     $('#insert').val("Update");  
                     $('#add_data_Modal').modal('show');  

     				// 'projeto_id' => $this->input->post('projeto_id'),
					// 'tarefa_id' => $this->input->post('tarefa_id'),
					// 'nota' => $this->input->post('nota'),
					// 'data_inicio' => $inicio_t,
					// 'data_final' => $final_t,
					// 'inicio' => $this->input->post('inicio'),
					// 'final' => $this->input->post('final'),
					// 'horas' => $this->input->post('horas'),
					// 'horaInt' => $this->input->post('horaInt'),
					// 'moeda' => $this->input->post('moeda'),
					// 'rendimento' => $this->input->post('rendimento'),
                }  
           });  
      });  
      // $('#insert_form').on("submit", function(event){  
      //      event.preventDefault();  
      //      if($('#name').val() == "")  
      //      {  
      //           alert("Name is required");  
      //      }  
      //      else if($('#address').val() == '')  
      //      {  
      //           alert("Address is required");  
      //      }  
      //      else if($('#designation').val() == '')  
      //      {  
      //           alert("Designation is required");  
      //      }  
      //      else if($('#age').val() == '')  
      //      {  
      //           alert("Age is required");  
      //      }  
      //      else  
      //      {  
      //           $.ajax({  
      //                url:"insert.php",  
      //                method:"POST",  
      //                data:$('#insert_form').serialize(),  
      //                beforeSend:function(){  
      //                     $('#insert').val("Inserting");  
      //                },  
      //                success:function(data){  
      //                     $('#insert_form')[0].reset();  
      //                     $('#add_data_Modal').modal('hide');  
      //                     $('#trabalho_table').html(data);  
      //                }  
      //           });  
      //      }  
      // });  
      $(document).on('click', '.view_data', function(){  
           var employee_id = $(this).attr("id");  
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"select.php",  
                     method:"POST",  
                     data:{employee_id:employee_id},  
                     success:function(data){  
                          $('#employee_detail').html(data);  
                          $('#dataModal').modal('show');  
                     }  
                });  
           }            
      });  
      $(".datepicker" ).datepicker({ dateFormat: 'dd/mm/yy' }); 
 });  
 </script>