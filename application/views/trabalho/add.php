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
						<label for="data_inicio" class="control-label"><span class="text-danger">*</span>Data de Início</label>
						<div class="form-group" id="Datainicio">
							<input type="text" name="data_inicio" value="<?php echo $this->input->post('data_inicio'); ?>" class="has-datetimepicker form-control" id="data_inicio" />
							<span class="text-danger"><?php echo form_error('data_inicio');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="data_final" class="control-label">Data Final</label>
						<div class="form-group" id="Datafinal">
							<input type="text" name="data_final" value="<?php echo $this->input->post('data_final'); ?>" class="has-datetimepicker form-control" id="data_final" />
						</div>
					</div>
					<!-- <div class="col-md-6">
						<label for="inicio" class="control-label">Inicio</label>
						<div class="form-group" id="inicio">
							<input type="text" name="inicio" value="<?php echo $this->input->post('inicio'); ?>" class="form-control"  />
						</div>
					</div>
					<div class="col-md-6">
						<label for="final" class="control-label">Final</label>
						<div class="form-group">
							<input type="text" name="final" value="<?php echo $this->input->post('final'); ?>" class="form-control" id="final" />
						</div>
					</div> -->
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

      		<div id="detalhes_work">
      		</div>
			
          	<div class="box-footer">

            	<!-- <button type="submit" class="btn btn-success">
            		<i class="fa fa-check"></i> Salvar
            	</button> -->
            	
            	<button type="button" id="iniciaCronometro" class="btn btn-success">
            		<i class="fa fa-check"></i> Iniciar
            	</button>

            	<button type="button" onclick="zerarCronometro()" id="continuaCronometro" class="btn btn-info hide">
            		<i class="fa fa-check"></i> Continuar
            	</button>

            	<button type="button" onclick="zerarCronometro()" id="resetCron" class="btn btn-danger">
            		<i class="fa fa-check"></i> Cancelar
            	</button>


          	</div>


          	<?

          		// TESTE DE FUNÇÃO PELO HELPER
          	
				$valor = "100000000";

				echo "Valor Original: R$ " . $valor;

				echo "<br />";

				$this->load->helper("funcoes");

				echo "Valor Formatado: R$ " . formata_preco($valor);
			?>


            <?php echo form_close(); ?>

      	</div>
    </div>
</div>


<script src="<?php echo site_url('resources/js/codex.js');?>"></script>
<!-- ###  SCRIPT DATEPICKER  ### -->
<script src="<?php echo site_url('resources/js/global.js');?>"></script>

