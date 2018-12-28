<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Trabalho Edit</h3>
            </div>
			<?php echo form_open('trabalho/edit/'.$trabalho['id_trabalho']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<div class="form-group">
							<input type="checkbox" name="livre" value="1" <?php echo ($trabalho['livre']==1 ? 'checked="checked"' : ''); ?> id='livre' />
							<label for="livre" class="control-label">Livre</label>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<input type="checkbox" name="faturado" value="1" <?php echo ($trabalho['faturado']==1 ? 'checked="checked"' : ''); ?> id='faturado' />
							<label for="faturado" class="control-label">Faturado</label>
						</div>
					</div>
					<div class="col-md-6">
						<label for="projeto_id" class="control-label"><span class="text-danger">*</span>Projeto</label>
						<div class="form-group">
							<select name="projeto_id" class="form-control">
								<option value="">select projeto</option>
								<?php 
								foreach($all_projetos as $projeto)
								{
									$selected = ($projeto['id_projeto'] == $trabalho['projeto_id']) ? ' selected="selected"' : "";

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
									$selected = ($tarefa['id_tarefa'] == $trabalho['tarefa_id']) ? ' selected="selected"' : "";

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
							<input type="text" name="nota" value="<?php echo ($this->input->post('nota') ? $this->input->post('nota') : $trabalho['nota']); ?>" class="form-control" id="nota" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="data_inicio" class="control-label"><span class="text-danger">*</span>Data Inicio</label>
						<div class="form-group">
							<input type="text" name="data_inicio" value="<?php echo ($this->input->post('data_inicio') ? $this->input->post('data_inicio') : $trabalho['data_inicio']); ?>" class="has-datetimepicker form-control" id="data_inicio" />
							<span class="text-danger"><?php echo form_error('data_inicio');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="data_final" class="control-label">Data Final</label>
						<div class="form-group">
							<input type="text" name="data_final" value="<?php echo ($this->input->post('data_final') ? $this->input->post('data_final') : $trabalho['data_final']); ?>" class="has-datetimepicker form-control" id="data_final" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="inicio" class="control-label">Inicio</label>
						<div class="form-group">
							<input type="text" name="inicio" value="<?php echo ($this->input->post('inicio') ? $this->input->post('inicio') : $trabalho['inicio']); ?>" class="form-control" id="inicio" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="final" class="control-label">Final</label>
						<div class="form-group">
							<input type="text" name="final" value="<?php echo ($this->input->post('final') ? $this->input->post('final') : $trabalho['final']); ?>" class="form-control" id="final" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="horas" class="control-label">Horas</label>
						<div class="form-group">
							<input type="text" name="horas" value="<?php echo ($this->input->post('horas') ? $this->input->post('horas') : $trabalho['horas']); ?>" class="form-control" id="horas" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="horaInt" class="control-label">HoraInt</label>
						<div class="form-group">
							<input type="text" name="horaInt" value="<?php echo ($this->input->post('horaInt') ? $this->input->post('horaInt') : $trabalho['horaInt']); ?>" class="form-control" id="horaInt" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="moeda" class="control-label">Moeda</label>
						<div class="form-group">
							<input type="text" name="moeda" value="<?php echo ($this->input->post('moeda') ? $this->input->post('moeda') : $trabalho['moeda']); ?>" class="form-control" id="moeda" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="rendimento" class="control-label">Rendimento</label>
						<div class="form-group">
							<input type="text" name="rendimento" value="<?php echo ($this->input->post('rendimento') ? $this->input->post('rendimento') : $trabalho['rendimento']); ?>" class="form-control" id="rendimento" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="fatura_id" class="control-label">Fatura Id</label>
						<div class="form-group">
							<input type="text" name="fatura_id" value="<?php echo ($this->input->post('fatura_id') ? $this->input->post('fatura_id') : $trabalho['fatura_id']); ?>" class="form-control" id="fatura_id" />
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Save
				</button>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>