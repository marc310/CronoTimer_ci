<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Tarefa Edit</h3>
            </div>
			<?php echo form_open('tarefa/edit/'.$tarefa['id_tarefa']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="nome_tarefa" class="control-label"><span class="text-danger">*</span>Nome Tarefa</label>
						<div class="form-group">
							<input type="text" name="nome_tarefa" value="<?php echo ($this->input->post('nome_tarefa') ? $this->input->post('nome_tarefa') : $tarefa['nome_tarefa']); ?>" class="form-control" id="nome_tarefa" />
							<span class="text-danger"><?php echo form_error('nome_tarefa');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="descricao_tarefa" class="control-label">Descricao Tarefa</label>
						<div class="form-group">
							<input type="text" name="descricao_tarefa" value="<?php echo ($this->input->post('descricao_tarefa') ? $this->input->post('descricao_tarefa') : $tarefa['descricao_tarefa']); ?>" class="form-control" id="descricao_tarefa" />
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