<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Itenstrabalho Add</h3>
            </div>
            <?php echo form_open('itenstrabalho/add'); ?>
          	<div class="box-body">
          		<div class="row clearfix">
					<div class="col-md-6">
						<div class="form-group">
							<input type="checkbox" name="livre" value="1"  id="livre" />
							<label for="livre" class="control-label">Livre</label>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<input type="checkbox" name="faturado" value="1"  id="faturado" />
							<label for="faturado" class="control-label">Faturado</label>
						</div>
					</div>
					<div class="col-md-6">
						<label for="nota" class="control-label">Nota</label>
						<div class="form-group">
							<input type="text" name="nota" value="<?php echo $this->input->post('nota'); ?>" class="form-control" id="nota" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="data_inicio" class="control-label">Data Inicio</label>
						<div class="form-group">
							<input type="text" name="data_inicio" value="<?php echo $this->input->post('data_inicio'); ?>" class="has-datetimepicker form-control" id="data_inicio" />
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
						<label for="projeto_id" class="control-label">Projeto Id</label>
						<div class="form-group">
							<input type="text" name="projeto_id" value="<?php echo $this->input->post('projeto_id'); ?>" class="form-control" id="projeto_id" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="tarefa_id" class="control-label">Tarefa Id</label>
						<div class="form-group">
							<input type="text" name="tarefa_id" value="<?php echo $this->input->post('tarefa_id'); ?>" class="form-control" id="tarefa_id" />
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
					<div class="col-md-6">
						<label for="fatura_id" class="control-label">Fatura Id</label>
						<div class="form-group">
							<input type="text" name="fatura_id" value="<?php echo $this->input->post('fatura_id'); ?>" class="form-control" id="fatura_id" />
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