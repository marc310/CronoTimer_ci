<div class="row">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Projeto Edit</h3>
            </div>
			<?php echo form_open('projeto/edit/'.$projeto['id_projeto']); ?>
			<div class="box-body">
				<div class="row clearfix">
					<div class="col-md-6">
						<label for="cliente_id" class="control-label"><span class="text-danger">*</span>Cliente</label>
						<div class="form-group">
							<select name="cliente_id" class="form-control">
								<option value="">select cliente</option>
								<?php 
								foreach($all_clientes as $cliente)
								{
									$selected = ($cliente['id_cliente'] == $projeto['cliente_id']) ? ' selected="selected"' : "";

									echo '<option value="'.$cliente['id_cliente'].'" '.$selected.'>'.$cliente['nome'].'</option>';
								} 
								?>
							</select>
							<span class="text-danger"><?php echo form_error('cliente_id');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="nome_projeto" class="control-label"><span class="text-danger">*</span>Nome Projeto</label>
						<div class="form-group">
							<input type="text" name="nome_projeto" value="<?php echo ($this->input->post('nome_projeto') ? $this->input->post('nome_projeto') : $projeto['nome_projeto']); ?>" class="form-control" id="nome_projeto" />
							<span class="text-danger"><?php echo form_error('nome_projeto');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="descricao_projeto" class="control-label">Descricao Projeto</label>
						<div class="form-group">
							<input type="text" name="descricao_projeto" value="<?php echo ($this->input->post('descricao_projeto') ? $this->input->post('descricao_projeto') : $projeto['descricao_projeto']); ?>" class="form-control" id="descricao_projeto" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="preco_projeto" class="control-label">Preco Projeto</label>
						<div class="form-group">
							<input type="text" name="preco_projeto" value="<?php echo ($this->input->post('preco_projeto') ? $this->input->post('preco_projeto') : $projeto['preco_projeto']); ?>" class="form-control" id="preco_projeto" />
							<span class="text-danger"><?php echo form_error('preco_projeto');?></span>
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