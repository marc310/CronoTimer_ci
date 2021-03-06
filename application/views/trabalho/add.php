<!-- MODAL -->

<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Iniciar CronoTimer</h3>
            </div>

            <?php
            $attributes = array('name' => 'form-cronotimer', 'id' => 'form-cronotimer');
            echo form_open('trabalho/add', $attributes);
            ?>

          	<div class="box-body">
          		<div class="row clearfix">

					<!-- <div class="col-md-6">
						<div class="form-group">
							<input type="checkbox" name="faturado" value="1"  id="faturado" />
							<label for="faturado" class="control-label">Faturado</label>
						</div>
					</div> -->

					<div class="col-md-6">
						<label for="cliente_id" class="control-label"><span class="text-danger">*</span>Cliente</label> <span class="required">*</span>
						<div class="form-group">
							<select name="cliente_id" id="cliente_id" class="form-control" required="required">
								<option value="">Selecione o Cliente</option>
								<?php
								foreach($all_clientes as $cliente)
								{
									// $selected = ($cliente['id_cliente'] == $this->input->post('cliente_id')) ? ' selected="selected"' : "";

									echo '<option value="'.$cliente['id_cliente'].'" '.$selected.'>'.$cliente['nome'].'</option>';
								}
								?>
							</select>
							<span class="text-danger"><?php echo form_error('cliente_id');?></span>
						</div>
					</div>

					<div class="col-md-6">
						<label for="projeto_id" class="control-label"><span class="text-danger">*</span>Projeto</label> <span class="required">*</span>
						<div class="form-group">
							<select name="projeto_id" id="projeto_id" class="form-control" required="required">
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
						<label for="tarefa_id" class="control-label"><span class="text-danger">*</span>Tarefa</label> <span class="required">*</span>
						<div class="form-group">
							<select name="tarefa_id" class="form-control" required="required">
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
					<div class="col-md-12">
						<label for="nota" class="control-label">Nota</label>
						<div class="form-group">
							<input type="text" name="nota" value="<?php echo $this->input->post('nota'); ?>" class="form-control" id="nota" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="data_inicio" class="control-label"><span class="text-danger">*</span>Data de Início</label> <span class="required">*</span>
						<div class="form-group" id="Datainicio">
							<input type="text" name="data_inicio" value="<?php echo $this->input->post('data_inicio'); ?>" class="has-datetimepicker form-control" id="data_inicio" required="required" />
							<span class="text-danger"><?php echo form_error('data_inicio');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="data_final" class="control-label">Data Final</label> <span class="required">*</span>
						<div class="form-group" id="Datafinal">
							<input type="text" name="data_final" value="<?php echo $this->input->post('data_final'); ?>" class="has-datetimepicker form-control" id="data_final" required="required"/>
						</div>
					</div>
					<div class="col-md-6" hidden>
						<label for="inicio" class="control-label">Inicio</label>
						<div class="form-group" id="inicio">
							<input type="text" name="inicio" id="inputInicio" value="<?php echo $this->input->post('inicio'); ?>" class="form-control"  />
						</div>
					</div>
					<div class="col-md-6" hidden>
						<label for="final" class="control-label">Final</label>
						<div class="form-group">
							<input type="text" name="final" value="<?php echo $this->input->post('final'); ?>" class="form-control" id="inputFinal" />
						</div>
					</div>
					<div class="col-md-6" hidden>
						<label for="horas" class="control-label">Horas</label>
						<div class="form-group">
							<input type="text" name="horas" id="horas" value="<?php echo $this->input->post('horas'); ?>" class="form-control" id="horas" />
						</div>
					</div>
					<div class="col-md-6" hidden>
						<label for="horaInt" class="control-label">HoraInt</label>
						<div class="form-group">
							<input type="text" name="horaInt" value="<?php echo $this->input->post('horaInt'); ?>" class="form-control" id="horaInt" />
						</div>
					</div>
					<div class="col-md-6" hidden>
						<label for="moeda" class="control-label">Moeda</label>
						<div class="form-group">
							<input type="text" name="moeda" value="<?php echo $this->input->post('moeda'); ?>" class="form-control" id="moeda" />
						</div>
					</div>
					<div class="col-md-6" hidden>
						<label for="rendimento" class="control-label">Rendimento</label>
						<div class="form-group">
							<input type="text" name="rendimento" value="<?php echo $this->input->post('rendimento'); ?>" class="form-control" id="rendimento" />
						</div>
					</div>
					<div class="col-md-6" hidden>
						<label for="fatura_id" class="control-label">Fatura Id</label>
						<div class="form-group">
							<input type="text" name="fatura_id" value="<?php echo $this->input->post('fatura_id'); ?>" class="form-control" id="fatura_id" />
						</div>
					</div>
					<div class="col-md-6" >
						<div class="form-group">

							<div class="custom-control custom-radio">
								<input type="radio" id="porHora" value="1" name="livre" class="custom-control-input">
								<label class="custom-control-label" for="porHora">Por Hora</label>
							</div>
							<div class="custom-control custom-radio">
								<input type="radio" id="porProjeto" value="2" name="livre" class="custom-control-input">
								<label class="custom-control-label" for="porProjeto">Por Projeto</label>
							</div>

						</div>	
					</div>
				</div>
			</div>
			<!-- Javascript innerHTML -->

			<div class="container">
				<h1 data-timer>00:00:00</h1>
			</div>
			<div id="contador">
			</div>

      		<div id="detalhes_work">
      		</div>

			<!-- Javascript innerHTML -->


          	<div class="box-footer">

            	<button type="submit" id="botaoSalvarTime" class="btn btn-primary hide">
            		<i class="fa fa-check"></i> Salvar
            	</button>

            	<button type="button" id="iniciaCronometro" class="btn btn-success">
            		<i class="fa fa-check"></i> Iniciar
            	</button>

				<button type="button" id="pararCronometro" class="btn btn-Danger hide">
            		<i class="fa fa-check"></i> Parar
            	</button>

            	<button type="button" id="cleanCronometro" class="btn btn-secondary hide">
            		<i class="fa fa-check"></i> Limpar
            	</button>

            	<button type="button" id="cancelaCron" class="btn btn-outline-secondary">
            		<i class="fa fa-check"></i> Cancelar
            	</button>


          	</div>


          	 <?php

          		// TESTE DE FUNÇÃO PELO HELPER

				$this->load->helper("funcoes");
				$valor = "100000000";

				echo "Valor Original: R$ " . $valor;

				echo "<br />";

				echo "Valor Formatado: R$ " . formata_preco($valor);
			?>


            <?php echo form_close(); ?>

      	</div>
    </div>
</div>


<script src="<?php echo site_url('resources/js/timer.js');?>"></script>
<!-- ###  SCRIPT DATEPICKER  ### -->
<script src="<?php echo site_url('resources/js/global.js');?>"></script>

<script>
// $(document).ready(function(){

// $('#country').change(function(){
//   var country_id = $('#country').val();
//   if(country_id != '')
//   {
//    $.ajax({
//     url:"<?php echo base_url(); ?>dynamic_dependent/fetch_state",
//     method:"POST",
//     data:{country_id:country_id},
//     success:function(data)
//     {
//      $('#state').html(data);
//      $('#city').html('<option value="">Select City</option>');
//     }
//    });
//   }
//   else
//   {
//    $('#state').html('<option value="">Select State</option>');
//    $('#city').html('<option value="">Select City</option>');
//   }
//  });

//  $('#state').change(function(){
//   var state_id = $('#state').val();
//   if(state_id != '')
//   {
//    $.ajax({
//     url:"<?php echo base_url(); ?>dynamic_dependent/fetch_city",
//     method:"POST",
//     data:{state_id:state_id},
//     success:function(data)
//     {
//      $('#city').html(data);
//     }
//    });
//   }
//   else
//   {
//    $('#city').html('<option value="">Select City</option>');
//   }
//  });
 
// });
</script>
