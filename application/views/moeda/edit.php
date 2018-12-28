<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Moeda Edit</h3>
            </div>
			<?php echo form_open('moeda/edit/'.$moeda['id_moeda']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="codigo" class="control-label"><span class="text-danger">*</span>Codigo</label>
						<div class="form-group">
							<input type="text" name="codigo" value="<?php echo ($this->input->post('codigo') ? $this->input->post('codigo') : $moeda['codigo']); ?>" class="form-control" id="codigo" />
							<span class="text-danger"><?php echo form_error('codigo');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="simbolo" class="control-label"><span class="text-danger">*</span>Simbolo</label>
						<div class="form-group">
							<input type="text" name="simbolo" value="<?php echo ($this->input->post('simbolo') ? $this->input->post('simbolo') : $moeda['simbolo']); ?>" class="form-control" id="simbolo" />
							<span class="text-danger"><?php echo form_error('simbolo');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="descricao" class="control-label">Descricao</label>
						<div class="form-group">
							<input type="text" name="descricao" value="<?php echo ($this->input->post('descricao') ? $this->input->post('descricao') : $moeda['descricao']); ?>" class="form-control" id="descricao" />
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